<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\Response;
use Auth;
use DB;

use App\Http\Requests;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $content = $request->input('content');
        $post_id = $request->input('post_id');       
        $comment = Comment::create([
            'user_id' => $user_id,
            'content' => $content,
            'post_id' => $post_id 
        ]);
        if(isset($comment->id) && !empty($comment->id)){
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => '',
                'message' => 'Comment saved successfully',
            );
            //return Response()->json($response);
        }else{
            $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'failed',
            );
        }
        $comments_count = DB::table('comments')->where('post_id',$post_id)->count();
        DB::table('posts')->where('id', $post_id)->update(['comments_count' => $comments_count]);
        return Response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    
    public function postRelatedCommentList(Request $request,$post_id)
    {        
        $api_token = $request->header('Authorization');
        $api_token = explode(' ',$api_token);
        $api_token = $api_token[1];
        $userDetails = DB::table('users')->where('api_token', $api_token)->first();
        $user_id = '';
        $user_id = $userDetails->id;
        
        if($user_id != ''){
            $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.user_id')->where('comments.post_id',$post_id)->select('comments.*', 'users.name as user_name')->orderBy('comments.id', 'asc')->get();
            
            $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $comments,
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
