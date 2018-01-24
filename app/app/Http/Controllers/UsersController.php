<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Species;
use App\Models\Organization;
use App\Models\Post;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use DB;

use App\Http\Requests;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        //$user1 = Auth::user();
        //print_r($user1);
        return $users;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);

      return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        $dob = $request->input('dob');
        $dob = date('Y-m-d',strtotime($dob));
        $gender = $request->input('gender');
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'api_token' => str_random(60),
                'context_id' => 2,
                'type' => $type,
                'dob' => $dob,
                'gender' => $gender,
            ]);
            //echo $user->id;
            if(isset($user->id) && !empty($user->id)){
                $response = array(
                    'status' => 'success',
                    'status_code' => 200,
                    'data' => '',
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
                'message' => 'Email already exist',
            );
            //echo 'No';
            return Response()->json($response);
        }
        
    }
    public function speciesList(Request $request)
    {        
        
        $species = DB::table('species')->select('id','name')->get();        
        return $species;
    }
    public function breedList($id)
    {        
        $breeds = DB::table('breeds')->where('species_id', $id)->select('id','species_id','name')->get();        
        return $breeds;
    }
    public function categoryList()
    {        
        $categories = DB::table('categories')->select('id','name')->get();        
        return $categories;
    }
    public function petAdd(Request $request)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = $userDetails->id;
        //echo $user_id;
        $name = $request->input('name');
        $species_id = $request->input('species_id');
        $breed_id = $request->input('breed_id');
        //$type = $request->input('type');
       $date_of_birth = $request->input('date_of_birth');
        $date_of_birth = date('Y-m-d',strtotime($date_of_birth));
        $gender = $request->input('gender');
        $pet = Pet::create([
            'name' => $name,
            'species_id' => $species_id,
            'breed_id' => $breed_id,            
            'gender' => $gender,
            'user_id' => $user_id,
            'date_of_birth' => $date_of_birth            
        ]);
        //echo $user->id;
       if(isset($pet->id) && !empty($pet->id)){
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
    
    public function businessAdd(Request $request)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = $userDetails->id;
        //echo $user_id;
        $business_known_as = $request->input('business_known_as');
        $short_description = $request->input('short_description');
        $phone_no = $request->input('phone_no');
        $business_email = $request->input('business_email');
        $website = $request->input('website');
        //$date_of_birth = date('Y-m-d',strtotime($date_of_birth));
        $location = $request->input('location');
        $category_id = $request->input('available_service');
        $organization = Organization::create([
            'name' => $business_known_as,
            'description' => $short_description,
            'phone_no' => $phone_no,            
            'email' => $business_email,
            'website' => $website,
            'address' => $location,
            'category_id' => $category_id,
            'user_id' => $user_id
        ]);
        //echo $user->id;
       if(isset($organization->id) && !empty($organization->id)){
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
    
    public function postAdd(Request $request)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = $userDetails->id;
        //echo $user_id;
        $content = $request->input('content');        
        $posts = Post::create([
            'content' => $content,            
            'user_id' => $user_id
        ]);        
       if(isset($posts->id) && !empty($posts->id)){
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => '',
                'message' => 'Post added successfully',
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
    
    public function postList(Request $request)
    {        
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        
        if($user_id != ''){
            $posts = DB::table('posts')->get();
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $posts,
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
    
}
