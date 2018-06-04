<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use Illuminate\Http\Event;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Seller_Product;
use App\Models\Order;
use App\Models\OrderShipping;
use App\Models\OrderItem;
use App\Models\OrderService;
use Mail;


use Auth;
use DB;
use Session;

class OrdersController extends Controller
{
    

    public function store(Request $request)
    {  

        $user=Auth::user();  
        $user_id = $user->id; 

        $total_price = $request->input('total_price');

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pin = $request->input('pin');
        $payment_option = $request->input('payment_option');        

        
            
        $product = Order::create([
            'user_id' => $user_id,
            'total_price' => $total_price,
            'order_date' => date('Y-m-d')
        ]);
        $insertedId = $product->id;
        DB::table('orders')->where('id', $insertedId)->update([
                                        'orderid' => 'ORD00'.$insertedId        
                                        ]);

        $shipping = OrderShipping::create([
                    'order_id' => $insertedId,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'pin' => $pin
                ]);

        $carts = DB::table('carts')
                  ->join('seller_products','carts.product_id','=','seller_products.product_id')
                  ->select('seller_products.price', 'carts.*', DB::raw('sum(quantiety) as total_qua'))
                  ->where('carts.user_id', $user_id)->groupBy('product_id')->get();
                 
        foreach ($carts as $cart) {
                    $orders = OrderItem::create([
                            'order_id' => $insertedId,
                            'product_id' => $cart->product_id,
                            'seller_id' => $cart->seller_id,
                            'quantity' => $cart->total_qua,
                            'price' => $cart->price                            
                        ]);  
                  }          
        $cart = DB::table('carts')->where('user_id', $user_id)->delete(); 
        if($payment_option == 'paypal'){
            return  redirect()->action('OrdersController@paypal',['order_id' => $insertedId]);
        }else{
          return  redirect()->action('OrdersController@payment',['order_id' => $insertedId]);  
        }
              
    }

    public function my_order(){
        $user = Auth::user();  
        $user_id = $user->id;

        $orders = DB::table('orders')
                  ->join('order_shipping','order_shipping.order_id','=','orders.id')
                  ->select('orders.*', 'order_shipping.*')
                  ->where('orders.user_id', $user_id)->orderBy('orders.id')->get();
             
        return view('Orders/list', ['orders' => $orders]); 
    }

    public function payment($order_id){
        $user = Auth::user();  
        $user_id = $user->id;

        $orders = DB::table('orders')                  
                  ->select('orders.id', 'orders.total_price')
                  ->where('orders.id', $order_id)->first();
                
        return view('Orders/payment', ['orders' => $orders]); 
    }

    public function stripe_payment(Request $request){
            $user=Auth::user();  
            $user_id = $user->id;       
                
            if(isset($request)){                
              $currency = $request->input('currency_code');
              $amount = $request->input('amount');
              $custom = $request->input('custom');
              $order_id = $request->input('id');
              $strip_token = $request->input('strip_token');

                $total=$amount*100;
                $stripe_api_sk_key="sk_test_qNLuxfQNwLic4AyewIcqLhmo";
                //$stripe_api_sk_key=Configure::read('STRIPE_SECRECT_KEY');
                $url = 'https://api.stripe.com/v1/charges';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . $stripe_api_sk_key));
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=' . $total. '&currency='. $currency .'&source=' . $strip_token . '&description= Payment for Purchase');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data_all = curl_exec($ch);
                curl_close($ch);
                $charge_data = json_decode($data_all);
               
                if($charge_data->status=="succeeded"){                    
                   
                   DB::table('orders')->where('id', $request->input('id'))->update([
                                        'payment_status' => 1,            
                                        'payment_type' => 'Stripe'        
                                        ]);

                $email_tpl = DB::table('email_templates')->where("id","=",9)->first();
                $order = DB::table('orders')->where("id","=",$order_id)->first();
                $user = DB::table('users')->where("id","=",$user_id)->first();
               $site_setting = DB::table('site_settings')->where("id","=",1)->first();        
               
               $msg= str_replace(array('[NAME]','[ORDERID]'),array($user->first_name,$order->orderid),$email_tpl->content); 
               $html = array('from' => $site_setting->admin_email, 'to' => $user->email,'subject'=>$email_tpl->subject,'content'=>$msg);
               Mail::send(array(),array(), function ($message) use ($html){
                $message->to($html['to'])
                  ->subject($html['subject'])
                  ->from($html['from'])
                  ->setBody($html['content'], 'text/html');
              });

            return  redirect()->action('OrdersController@success', ['id' => $request->input('id')])->withMessage("Order payment successfully.");
            
                 
                }else{
                   // $this->Session->setFlash(__('Payment is not done.'));
                    //$this->redirect(array('controller' => 'services', 'action' => 'cart'));
                }

            }
            return view('Orders/payment');
    }

     public function success($id){
            $user = Auth::user();  
            $user_id = $user->id;

            $orders = DB::table('orders')                  
                      ->select('orders.id', 'orders.total_price')
                      ->where('orders.id', $id)->first();

            return view('Orders/success', ['orders' => $orders]); 
      }

    public function paypal($order_id){
        $user = Auth::user();  
        $user_id = $user->id;

        $orders = DB::table('orders')                  
                  ->select('orders.id', 'orders.total_price')
                  ->where('orders.id', $order_id)->first();

        return view('Orders/paypal', ['orders' => $orders]); 
    }

    public function paypal_payment(){
        $html = array('from' => 'nits.santanupatra@gmail.com', 'to' => 'santanu@natitsolved.com','subject'=>'oredr','content'=>$msg);
               Mail::send(array(),array(), function ($message) use ($html){
                $message->to($html['to'])
                  ->subject($html['subject'])
                  ->from($html['from'])
                  ->setBody('dsfdsfdf', 'text/html');
              });

        //if($charge_data->status=="succeeded"){                    
                   
           DB::table('orders')->where('id', $request->input('custom'))->update([
                                'payment_status' => 1,            
                                'payment_type' => 'Paypal'        
                                ]);
       // }
    }


    public function service_stripe_payment(Request $request){
            $user=Auth::user();  
            $user_id = $user->id;       
                
            if(isset($request)){                
              $currency = $request->input('currency_code');
              $amount = $request->input('amount');
              $custom = $request->input('custom');              
              $strip_token = $request->input('strip_token');
              $seller_service_id = $request->input('id');
              $cat_name = $request->input('cat_name');
              $hashrate = $request->input('hashrate');

                $total=$amount*100;
                $stripe_api_sk_key="sk_test_qNLuxfQNwLic4AyewIcqLhmo";
                //$stripe_api_sk_key=Configure::read('STRIPE_SECRECT_KEY');
                $url = 'https://api.stripe.com/v1/charges';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . $stripe_api_sk_key));
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=' . $total. '&currency='. $currency .'&source=' . $strip_token . '&description= Payment for Purchase');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data_all = curl_exec($ch);
                curl_close($ch);
                $charge_data = json_decode($data_all);
              
                if($charge_data->status=="succeeded"){                    
                   
                  /* DB::table('orders')->where('id', $request->input('id'))->update([
                                        'payment_status' => 1,            
                                        'payment_type' => 'Stripe'        
                                        ]);*/
                    $product = Order::create([
                        'user_id' => $user_id,
                        'total_price' => $amount,
                        'order_date' => date('Y-m-d'),
                        'type' => 'S'
                    ]);
                    $insertedId = $product->id;
                    DB::table('orders')->where('id', $insertedId)->update([
                                                'orderid' => 'ORD00'.$insertedId,
                                                'payment_status' => 1,            
                                                'payment_type' => 'Stripe'        
                                                ]);
                     $order = OrderService::create([
                          'order_id' => $insertedId,
                          'seller_service_id' => $seller_service_id
                      ]); 
                     if($cat_name == 'Bitcoin'){
                      DB::table('users')->where('id', $user_id)->update([
                                                'bitcoin' => 'bitcoin' + $hashrate                                                    
                                                ]);
                     }                      
                    elseif($cat_name == 'Litecoin'){
                     DB::table('users')->where('id', $user_id)->update([
                                                'litecoin' => 'litecoin' + $hashrate                                                     
                                                ]);
                    }
                    else{
                      DB::table('users')->where('id', $user_id)->update([
                                                'ethereum' => 'ethereum' + $hashrate 
                                                       
                                                ]);
                    }

                $email_tpl = DB::table('email_templates')->where("id","=",9)->first();
                //$order = DB::table('orders')->where("id","=",$order_id)->first();
                $user = DB::table('users')->where("id","=",$user_id)->first();
               $site_setting = DB::table('site_settings')->where("id","=",1)->first();        
               
               $msg= str_replace(array('[NAME]','[ORDERID]'),array($user->first_name, 'ORD00'.$insertedId),$email_tpl->content); 
               $html = array('from' => $site_setting->admin_email, 'to' => $user->email,'subject'=>$email_tpl->subject,'content'=>$msg);
               Mail::send(array(),array(), function ($message) use ($html){
                $message->to($html['to'])
                  ->subject($html['subject'])
                  ->from($html['from'])
                  ->setBody($html['content'], 'text/html');
              });

            return  redirect()->action('OrdersController@success', ['id' => $insertedId])->withMessage("Order payment successfully.");
            
                 
                }else{
                   // $this->Session->setFlash(__('Payment is not done.'));
                    //$this->redirect(array('controller' => 'services', 'action' => 'cart'));
                }

            }
            return view('Orders/payment');
    }
    
}
