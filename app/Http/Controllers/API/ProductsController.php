<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Hash;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\User;
use App\Models\Country;
use App\Models\Product;
use App\Models\Cart;
//use App\Models\Order;
//use App\Models\User;
use App\Models\Seller_Product;
use Session;
use Config;

class ProductsController extends Controller
{
    public $show_action = true;
   
    public function __construct() {
        // Field Access of Listing Columns
        
    }
       
    public function productCategory(){
        $categories = DB::table('categories')->where(['active' => 'yes'])->select('id', 'name')->get();
        if(count($categories) > 0){
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $categories,
                'message' => '',
            );  
        }
        else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'No Category',
            );
        }     
        return Response()->json($response);    
    }

    public function productList(Request $request){
        $cat_id = $request->input('cat_id');

        if($cat_id)
        {
            $products = DB::table('seller_products')->select('seller_products.*', 'products.*')->join('products','seller_products.product_id','=','products.id')->where(['seller_products.category_id' => $cat_id])->get();
        }
        else
        {
           $products = DB::table('seller_products')->select('seller_products.*', 'products.*')->join('products','seller_products.product_id','=','products.id')->get();
        }
        
        if(count($products) > 0){

            foreach($products as $key=>$prd)
            { //print_r($prd);exit;
                if($prd->image)
                {
                    $products[$key]->image =Config::get('constants.IMGPATH').'product/'.$prd->image;
                }
            }

          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $products,
                'message' => '',
            );  
        }
        else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'No Category',
            );
        }     
        return Response()->json($response);    
    }
   

 public function productDetails(Request $request){

    $product_id = $request->input('product_id');

 $productdetails = DB::table('seller_products')->select('seller_products.*', 'products.*')->join('products','seller_products.product_id','=','products.id')->where(['seller_products.product_id' => $product_id])->get();
       
       // print_r($orderdetails);exit;

        if(count($productdetails) > 0) {
            foreach($productdetails as $key=>$prd)
            { //print_r($prd);exit;
                if($prd->image)
                {
                    $productdetails[$key]->image =Config::get('constants.IMGPATH').'product/'.$prd->image;
                }
            }
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $productdetails[0],
                'message' => '',
            );  
        }
        else{
             $response = array(
                'status' => 'failed',
                'status_code' => 200,
                'data' => '',
                'message' => 'No Order Available',
            );
        }     
        return Response()->json($response); 

 }
 public function productAddCart(Request $request){

     $product_id = $request->input('product_id');
            $quantiety = $request->input('quantity');
            $seller_id = $request->input('seller_id');
            $user_id = $request->input('user_id');
        
       
           $data['user_id'] = $user_id;
           $data['product_id'] = $product_id;
           $data['quantiety'] = $quantiety;
           $data['seller_id'] = $seller_id;
           $data['updated_at'] = 

$cartexist = DB::table('carts')->select('carts.*')->where(['carts.product_id' => $product_id,'carts.user_id'=>$user_id,'carts.seller_id'=>$seller_id])->get();

if(count($cartexist) == 0 )
{ 
 $cart=Cart::create($data);
           $insertedId = $cart->id; 
           if($insertedId)
           {
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $insertedId,
                'message' => '',
            );
           }
           else
           {
            $response = array(
                'status' => 'failed',
                'status_code' => 200,
                'data' => '',
                'message' => 'No Order Available',
            );
           }
}
else
{  


                 DB::table('carts')
                    ->where('id', $cartexist[0]->id)
                    ->update(['quantiety' => $quantiety]);



    $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $cartexist[0]->id,
                'message' => '',
            );
}

          

           return Response()->json($response);
 }


 public function productCart(Request $request){

            $user_id = $request->input('user_id');
        
        $user = DB::table('users')->select('users.*')->where(['id' => $user_id])->get();

         $products = DB::table('carts')->select('carts.*','carts.id as crid','carts.quantiety as crtQuantity','carts.user_id as uid', 'products.*','seller_products.*')->join('seller_products','carts.product_id','=','seller_products.product_id')->join('products','carts.product_id','=','products.id')->where(['carts.user_id' => $user_id])->get();
        
        
        if(count($products) > 0){

            foreach($products as $key=>$prd)
            { //print_r($prd);exit;
                if($prd->image)
                {
                    $products[$key]->image =Config::get('constants.IMGPATH').'product/'.$prd->image;
                }
            }

          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $products,
                'user' =>$user[0],
                'message' => '',
            );  
        }
        else{

             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'user' => '',
                'message' => 'No Category',
            );
        }     
        return Response()->json($response); 
           
 }


public function addressupdate(Request $request){

     $id = $request->input('id');
            $street_address = $request->input('street_address');
            $zip = $request->input('zip');
            $city = $request->input('city');
        $state = $request->input('state');
       
          
 $user = DB::table('users')
                ->where('id', $id)
                    ->update(['address' => $street_address,
                             'zip' => $zip,
                            'city' => $city,
                            'state' => $state,
                            ]);




           if($user)
           {
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => '',
                'message' => '',
            );
           }
           else
           {
            $response = array(
                'status' => 'failed',
                'status_code' => 200,
                'data' => '',
                'message' => 'Address not updated',
            );
           }


          

           return Response()->json($response);
 }


public function productCartRemove(Request $request){

     $id = $request->input('id');
            
       
          
 $cart = DB::table('carts')->where('id', $id)->delete();




           if($cart)
           {
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => '',
                'message' => '',
            );
           }
           else
           {
            $response = array(
                'status' => 'failed',
                'status_code' => 200,
                'data' => '',
                'message' => 'Cart not deleted',
            );
           }


          

           return Response()->json($response);
 }


public function order(Request $request){

     $user_id = $request->input('user_id');
            
$users = DB::table('users')->select('users.*')->where(['id'=>$user_id])->get();
//print_r($users);exit;
$address = $users[0]->address.','.$users[0]->city.','.$users[0]->state.','.$users[0]->zip;
$cartexist = DB::table('carts')->select('carts.*','carts.id as crid','carts.quantiety as cqt','seller_products.*')->join('seller_products','carts.product_id','=','seller_products.product_id')->where(['carts.user_id'=>$user_id])->get();
//print_r($cartexist);exit;
if(count($cartexist) > 0 )
{ 


$order_insert = DB::table('orders')->insert(
    ['user_id' =>$user_id , 'order_date' =>date('Y-m-d'),'order_time'=>date('H:i:s'),'address'=>$address]
);
  $insertedId = DB::getPdo()->lastInsertId();
  $total_price = 0;
//print_r($order_insert);exit;
    foreach($cartexist as $crtx)
    {  // print_r($crtx);exit;
        $price = ($crtx->cqt * $crtx->price);
        $total_price = $total_price + $price;
        $order_details_insert = DB::table('orderitems')->insert(
    ['order_id' => $insertedId , 'product_id' => $crtx->product_id,'seller_id'=>$crtx->seller_id , 'quantity'=> $crtx->cqt,'price'=>$price]
);

$cart = DB::table('carts')->where('id', $crtx->crid)->delete();
//print_r($cart);exit;
    }
  $user = DB::table('orders')
                ->where('id', $insertedId)
                    ->update(['total_price' => $total_price ,
                             'orderid' => 'ORD00'.$insertedId
                            ]);
          
           if($insertedId)
           {
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $insertedId,
                'message' => '',
            );
           }
           else
           {
            $response = array(
                'status' => 'failed',
                'status_code' => 200,
                'data' => '',
                'message' => 'No Order Available',
            );
           }
}
else
{  


                 DB::table('carts')
                    ->where('id', $cartexist[0]->id)
                    ->update(['quantiety' => $quantiety]);



    $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $cartexist[0]->id,
                'message' => '',
            );
}

          

           return Response()->json($response);
 }


public function serviceList(Request $request){
        $cat_id = $request->input('cat_id');

        if($cat_id)
        {
            $services = DB::table('seller_services')->select('seller_services.*', 'services.*')->join('services','seller_products.product_id','=','products.id')->where(['seller_products.category_id' => $cat_id])->get();
        }
        else
        {
           $services = DB::table('seller_services')->select('seller_services.*', 'services.*','seller_services.price as ssp','services.name as servicename','users.name as username')->join('services','seller_services.service_id','=','services.id')->join('users','seller_services.user_id','=','users.id')->get();
        }
        
        if(count($services) > 0){

            // foreach($products as $key=>$prd)
            // { //print_r($prd);exit;
            //     if($prd->image)
            //     {
            //         $products[$key]->image =Config::get('constants.IMGPATH').'product/'.$prd->image;
            //     }
            // }

          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $services,
                'message' => '',
            );  
        }
        else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'No Serice Found',
            );
        }     
        return Response()->json($response);    
    }




}
