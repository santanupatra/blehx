<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;

class MailController extends Controller
{
    public function mail(){
    	Mail::send(['text'=>'mail'],['name','santanu'],function($message){
                $message->to('nits.santanu@gmail.com','To user')->subject('Registration Confirmation');
                $message->from('mail@natitsolved.com','Blehx');
                return view('mail');
            });
}
}