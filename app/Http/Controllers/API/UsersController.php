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
use Session;

class UsersController extends Controller
{
    public $show_action = true;
   
    public function __construct() {
        // Field Access of Listing Columns
        
    }
       

    public function login(Request $request)
    {
       
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            $user = Auth::user();
            
             $response = array(
                    'status' => 'success',
                    'status_code' => 200,
                    'data' => $user,
                    'message' => 'Login successfully',
                );
                return Response()->json($response);
        }else{
            $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'Login failed',
            );
            //echo 'No';
            return Response()->json($response);
        }
    }

    public function signup(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');        
        $password = $request->input('password');
        $type = $request->input('type');   
        $id = $request->input('id');   
        //echo $name;exit;   
        try {

           $user = DB::table('users')
                ->where('id', $id)
                    ->update(['name' => $name,
                             'email' => $email,
                            'password' => bcrypt($password),
                            'api_token' => str_random(60),
                            'type' => $type]);

                   // print_r($user);exit;

            // $user = User::create([
            //     'name' => $name,
            //     'email' => $email,
            //     'password' => bcrypt($password),
            //     'api_token' => str_random(60),
            //     'type' => $type, 
            //     'id' => $id               
            // ]);
            //echo $user->id;
                    if($user)
                    {
                          if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            $user = Auth::user();
            
             $response = array(
                    'status' => 'success',
                    'status_code' => 200,
                    'data' => $user,
                    'message' => 'Login successfully',
                );
                return Response()->json($response);
        }
                        
                }else{
                $response = array(
                    'status' => 'failure',
                    'status_code' => 401,
                    'data' => '',
                    'message' => 'Registration failed',
                );
                //echo 'No';
                return Response()->json($response);
            }
        }catch(\Exception $exception){     
            //print_r($exception);exit;
           $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'Email already exist',
            );
            //echo 'No';
            return Response()->json($response);
        }
        
    }


public function signupOtp(Request $request)
    {
        

         $phone_no = $request->input('phone_no');
        $otp = '1234'; 
        //echo $phone_no;exit;       
        try {
            $user = User::create([
                'phone_no' => $phone_no,
                   'otp' =>$otp            
            ]);
            //echo $user->id;
            if(isset($user->id) && !empty($user->id)){
                $response = array(
                    'status' => 'success',
                    'status_code' => 200,
                    'data' => $user,
                    'message' => 'Successfully registered',
                );
                return Response()->json($response);
            }else{
                $response = array(
                    'status' => 'failure',
                    'status_code' => 401,
                    'data' => '',
                    'message' => 'Registration failed',
                );
                //echo 'No';
                return Response()->json($response);
            }
        }catch(\Exception $exception){     
            //print_r($exception);
           $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'phone no already exist',
            );
            //echo 'No';
            return Response()->json($response);
        }
        
    }

public function signupresendOtp(Request $request)
    {
        

         $phone_no = $request->input('phone_no');
        $otp = '4321'; 
        //echo $phone_no;exit;       
        try {

             $user = DB::table('users')
                ->where('phone_no', $phone_no)
                    ->update(['otp' => $otp
                             ]);



            // $user = User::create([
            //     'phone_no' => $phone_no,
            //        'otp' =>$otp            
            // ]);
            //echo $user->id;
            if(isset($user->id) && !empty($user->id)){
                $response = array(
                    'status' => 'success',
                    'status_code' => 200,
                    'data' => $user,
                    'message' => 'Successfully registered',
                );
                return Response()->json($response);
            }else{
                $response = array(
                    'status' => 'failure',
                    'status_code' => 401,
                    'data' => '',
                    'message' => 'Registration failed',
                );
                //echo 'No';
                return Response()->json($response);
            }
        }catch(\Exception $exception){     
            //print_r($exception);
           $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'phone no already exist',
            );
            //echo 'No';
            return Response()->json($response);
        }
        
    }


public function veriefyotp(Request $request)
    {
       
        $otp = $request->input('otp');
        $phone = $request->input('phone_no');
       // $password = $request->input('password');
        $user = DB::table('users')->where(['phone_no'=>$phone,'otp'=>$otp])->select('id')->get(); 
        //print_r($user);exit;
        if ($user) {
            // Authentication passed...
           
            
             $response = array(
                    'status' => 'success',
                    'status_code' => 200,
                    'data' => $user,
                    'message' => 'Login successfully',
                );
                return Response()->json($response);
        }else{
            $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'OTP not match',
            );
            //echo 'No';
            return Response()->json($response);
        }
    }

public function userdetails(Request $request)
{
    $user_id = $request->input('user_id');
            
$userdetails = DB::table('users')->select('users.*')->where(['users.id' => $user_id])->get();
       
       // print_r($orderdetails);exit;

        if(count($userdetails) > 0) {
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $userdetails,
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


public function orderhistory(Request $request){
       
           
             $user_id = $request->input('user_id');
            
$orderdetails = DB::table('orders')->select('orders.*')->where(['orders.user_id' => $user_id])->get();
       
       // print_r($orderdetails);exit;

        if(count($orderdetails) > 0) {
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $orderdetails,
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


public function orderdetails(Request $request){
       
           
             $order_id = $request->input('order_id');
            
$orderdetail = DB::table('orderitems')->select('orderitems.*', 'products.*')->join('products','orderitems.product_id','=','products.id')->where(['orderitems.order_id' => $order_id])->get();
       // $cartdetails = DB::table('carts')->select('carts.*', 'products.*','carts.id as crid','carts.user_id as uid','carts.quantiety as crtQuantity')->join('products','carts.product_id','=','products.id')->where(['carts.user_id' => $user_id])->get();
      // print_r($orderdetail);exit;

        if(count($orderdetail) > 0) {
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $orderdetail,
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


}
