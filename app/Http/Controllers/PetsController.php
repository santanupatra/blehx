<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Http\Response;
use Auth;
use DB;

use App\Http\Requests;

class PetsController extends Controller
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
            $pets = DB::table('pets')->where('user_id', $user_id)->join('breeds', 'breeds.id', '=', 'pets.breed_id')->join('species', 'species.id', '=', 'pets.species_id')->select('pets.*', 'breeds.name as breed_name','species.name as species_name')->get(); 
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $pets,
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
            $pets = DB::table('pets')->where('pets.id', $id)->join('breeds', 'breeds.id', '=', 'pets.breed_id')->join('species', 'species.id', '=', 'pets.species_id')->select('pets.*', 'breeds.name as breed_name','species.name as species_name')->first(); 
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $pets,
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
    public function search_pets(Request $request){
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        if($user_id != ''){
                    $input=$request->input('input');
            $response1=DB::table('pets')->join('breeds', 'breeds.id', '=', 'pets.breed_id')->join('species', 'species.id', '=', 'pets.species_id')->select('pets.*', 'breeds.name as breed_name','species.name as species_name')->where('pets.name','LIKE','%'.$input.'%')
                            ->orWhere('gender','LIKE','%'.$input.'%')
                            ->orWhere('breeds.name','LIKE','%'.$input.'%')
                            ->orWhere('species.name','LIKE','%'.$input.'%')->get();
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
        //Model::where('column', 'LIKE', '%value%')->get();

    }
}
