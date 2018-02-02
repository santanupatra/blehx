<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use Illuminate\Http\Event;
use App\Models\Event;
use Auth;
use DB;

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
        $products = DB::table('products')->where('status','Yes')->get();
        //print_r($products);
        /*$api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
            $events = DB::table('events')->where('user_id', $user_id)->join('users', 'users.id', '=', 'events.user_id')->select('events.*', 'users.name as users_name')->get(); 
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
        return Response()->json($response); */

        return view('Products/index',['categories' => $categories, 'products' => $products]);
    }

    public function details($id){
        $product_details = DB::table('products')
                                ->join('categories', 'categories.id', '=', 'products.category_id')
                                ->where('products.id', $id)
                                ->select('products.*', 'categories.name as cat_name')->first();
        return view('Products/details', ['product_details' => $product_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $event = Event::create([
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
        //echo $user->id;
       if(isset($event->id) && !empty($event->id)){
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => '',
                'message' => 'Successfully inserted',
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
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
    public function search_events(Request $request){
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

    }
}
