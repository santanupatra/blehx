<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Http\Response;
use Auth;
use DB;

use App\Http\Requests;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
            $organization = DB::table('organizations')->where('user_id', $user_id)->join('categories', 'categories.id', '=', 'organizations.category_id')->select('organizations.*', 'categories.name as category_name')->get(); 
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $organization,
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
    public function show(Request $request,$id)
    {
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
            $organization = DB::table('organizations')->where('organizations.id', $id)->join('categories', 'categories.id', '=', 'organizations.category_id')->select('organizations.*', 'categories.name as category_name')->first(); 
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $organization,
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
    public function search_business(Request $request){
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
                    $input=$request->input('input');
            $response1=DB::table('organizations')->join('categories','organizations.category_id','=','categories.id')->select('categories.*', 'categories.name as categories_name')->where('categories.name','LIKE','%'.$input.'%')
                            ->orWhere('organizations.name','LIKE','%'.$input.'%')
                            ->orWhere('email','LIKE','%'.$input.'%')
                            ->orWhere('phone_no','LIKE','%'.$input.'%')
                            ->orWhere('website','LIKE','%'.$input.'%')
                            ->orWhere('address','LIKE','%'.$input.'%')->get();
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
