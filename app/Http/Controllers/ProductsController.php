<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use Illuminate\Http\Event;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Seller_Product;

use Auth;
use DB;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $categories = DB::table('categories')->where('active','yes')->select('id', 'name')->get();
       // $products = DB::table('products')->where('status','Yes')->get();

        $products = DB::table('seller_products')
                            ->join('categories', 'categories.id', '=', 'seller_products.category_id')
                            ->join('products', 'products.id', '=', 'seller_products.product_id')
                            ->where('seller_products.active', 'Y')->select('products.*', 'seller_products.quantity','seller_products.price', 'categories.name as cat_name')->get();

        

        return view('Products/index',['categories' => $categories, 'products' => $products]);
    }

    public function details($id){
        /*$product_details = DB::table('products')
                                ->join('categories', 'categories.id', '=', 'products.category_id')
                                ->where('products.id', $id)
                                ->select('products.*', 'categories.name as cat_name')->first();
*/
        $product_details = DB::table('seller_products')
                            ->join('categories', 'categories.id', '=', 'seller_products.category_id')
                            ->join('products', 'products.id', '=', 'seller_products.product_id')
                            ->join('users', 'seller_products.user_id', '=', 'users.id')
                            ->where('products.id', $id)->select('products.*', 'seller_products.user_id', 'seller_products.quantity','seller_products.price', 'users.name as seller_name', 'categories.name as cat_name')->first();

        return view('Products/details', ['product_details' => $product_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->where('active', 'yes')->select('id', 'name')->get();       
        return view('Products/create', ['category' => $category]);   
    }

    public function productlist(Request $request){
         $category_id = $request->input('category_id');
        $products = DB::table('products')->where('category_id', $category_id)->select('id', 'name')->get();
          $html ="";
        if(count($products) > 0){
            foreach ($products as $product) {
              $html .= '<option value="'.$product->id.'">'.$product->name.'</option>';
            }
          $response = array('Ack' => 1, 'products' => $html);
        }
        else{
          $response = array('Ack' => 1);
        }
        echo json_encode($response);
        //return Response()->json($response); 
    }

    public function edit($id)
    {
        $product = DB::table('seller_products')
                        ->join('categories', 'categories.id', '=', 'seller_products.category_id')
                        ->join('products', 'products.id', '=', 'seller_products.product_id')
                        ->where('seller_products.id', $id)->select('categories.name as cat_name', 'products.name as pro_name', 'seller_products.*')->first();   
                       
        return view('Products/edit', ['product' => $product]);          
    }

    public function store(Request $request)
    {
        
        $user=Auth::user();  
        $user_id = $user->id;       
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $category_id = $request->input('category_id');
        $product_id = $request->input('product_id');        

        if(!empty($request->input('id'))){
            DB::table('seller_products')->where('id', $request->input('id'))->update([
                                        'price' => $price,            
                                        'quantity' => $quantity        
                                        ]);
            return  redirect()->action('ProductsController@list')->withMessage("Product edit successfully.");
        }
        else{
            
            $product = Seller_Product::create([
                'user_id' => $user_id,
                'category_id' => $category_id,
                'product_id' => $product_id,
                'price' => $price,            
                'quantity' => $quantity
            ]);
             return  redirect()->action('ProductsController@list')->withMessage("Product add successfully.");      
        }
    }

    public function list(){
        $user=Auth::user();  
        $user_id = $user->id;
        $lists = DB::table('seller_products')
                            ->join('categories', 'categories.id', '=', 'seller_products.category_id')
                            ->join('products', 'products.id', '=', 'seller_products.product_id')
                            ->join('users', 'seller_products.user_id', '=', 'users.id')    
                            ->where('user_id', $user_id)->select('products.*', 'seller_products.quantity','seller_products.price', 'seller_products.id as sp_id', 'users.name', 'categories.name as cat_name')->get();  
                            
        return view('Products/list', ['lists' => $lists]); 
    }

    public function delete($id){
        $user=Auth::user();  
        $user_id = $user->id;

        $lists = DB::table('seller_products')->where('id', $id)->delete();                            
        return  redirect()->action('ProductsController@list')->withMessage("Product delete successfully.");
    }

    public function delete_cart($id){     
        DB::table('carts')->where('id', $id)->delete();                            
        return  redirect()->action('ProductsController@cartlist')->withMessage("Product delete successfully.");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
            $events = DB::table('events')->where('events.id', $id)->join('users', 'users.id', '=', 'events.user_id')->select('events.*', 'users.name as user_name')->first(); 
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $events,
                'message' => '',
            );
        }else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => [],
                'message' => 'Token mismatch',
            );
        }
        return Response()->json($response); 
    }

    public function addtocart(Request $request){  
            $user=Auth::user();      
            $product_id = $request->input('product_id');
            $quantiety = $request->input('quantiety');
            $seller_id = $request->input('seller_id');
            $user_id = $user->id;
        
       
           $data['user_id'] = $user_id;
           $data['product_id'] = $product_id;
           $data['quantiety'] = $quantiety;
           $data['seller_id'] = $seller_id;
           $data['updated_at'] = 
           $cart=Cart::create($data);
           $insertedId = $cart->id; 

           return  redirect()->action('ProductsController@cartlist')->withMessage("Product add successfully.");  


    }
    public function cartlist(){
        $user=Auth::user();
        $user_id = $user->id;
        $carts = DB::table('carts')
                ->join('products','products.id','=','carts.product_id')
                ->join('seller_products','products.id','=','seller_products.product_id')
                ->select('products.name', 'products.image', 'seller_products.user_id', 'seller_products.price', 'carts.*', DB::raw('sum(quantiety) as total_qua'))->where('carts.user_id', $user_id)->groupBy('carts.product_id')->get();
        
        return view('Products/cartlist', ['carts' => $carts]);

    }

    public function checkout(){
       $user=Auth::user();
       $user_id = $user->id;

       $user_details = DB::table('users')->where('id', $user_id)->first();
       
        $carts = DB::table('carts')
                  ->join('products','products.id','=','carts.product_id')
                  ->join('seller_products','products.id','=','seller_products.product_id')
                  ->select('products.*', 'seller_products.user_id', 'seller_products.price', 'carts.*', DB::raw('sum(quantiety) as total_qua'))
                  ->where('carts.user_id', $user_id)->groupBy('product_id')->get();
        
        return view('Products/checkout', ['carts' => $carts, 'user_details' => $user_details]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = $userDetails->id;
        //echo $user_id;
        $description = $request->input('description');
        $start_time = $request->input('start_time');
          $start_time = date('Y-m-d',strtotime($start_time));
        $end_time = $request->input('end_time');
          $end_time = date('Y-m-d',strtotime($end_time));
        //$type = $request->input('type');
       $is_full_day = $request->input('is_full_day');
        $subscribers_count = $request->input('subscribers_count');
        $is_deleted = $request->input('is_deleted');
        $is_blocked = $request->input('is_blocked');
        $title = $request->input('title');
        $event = Event::whereId($id)->update([
            'user_id' => $user_id,
            'description' => $description,
            'start_time' => $start_time,
            'end_time' => $end_time,            
            'is_full_day' => $is_full_day,            
            'subscribers_count' => $subscribers_count,
            'is_deleted' => $is_deleted,            
            'is_blocked' => $is_blocked,            
            'title' => $title            
        ]);
   
       if($event){
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => '',
                'message' => 'Successfully updated',
            );
            return Response()->json($response);
        }else{
            $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'failed',
            );
            //echo 'No';
            return Response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
            $events = DB::table('events')->where('events.id', $id)->delete(); 
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $events,
                'message' => '',
            );
        }else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => [],
                'message' => 'Token mismatch',
            );
        }
        return Response()->json($response); 
    }
    /*public function search_events(Request $request){
         $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
                    $input=$request->input('input');
            $response1=DB::table('events')->join('users','events.user_id','=','users.id')->select('events.*', 'events.title as events_title')->where('events.title','LIKE','%'.$input.'%')->get();
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $response1,
                'message' => '',
            );
        }else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => [],
                'message' => 'Token mismatch',
            );
        }

        return $response;

    }*/
}
