<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;

class MailController extends Controller
{
    public function mail(){
    	Mail::send(['text'=>'mail'],['name','palash'],function($message){
                $message->to('palashsaha@natitsolved.com','To user')->subject('Registration Confirmation');
                $message->from('mail@natitsolved.com','petizen');
                return view('mail');
            });
}
}