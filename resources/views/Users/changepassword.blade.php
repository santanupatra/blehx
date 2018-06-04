@extends('layouts.dashboard')
@section('content')

<div id="main-container">
@if (count($errors) > 0)
<div class="alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
   {{ session()->get('message') }}
</div>
@endif
  <div class="container">  
    
    <!-- hash power -->
    <div id="current-mining" class="mma mma-bc1">
      <div><h1>Change Password</h1></div>
      <div class="row">
      {!! Form::open(['url' => 'user/submitpassword', 'method'=>'post']) !!}
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Old Password :</div>              
              <div class="col-md-6"><input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control" required="required"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">New Password :</div>              
              <div class="col-md-6"><input type="password" name="password" id="password" placeholder="New Password" class="form-control" required="required" ></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Conf Password :</div>              
              <div class="col-md-6"><input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password" class="form-control"></div>
          </div>
          
        
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-12" style="float: right;"><button type="submit" class="btn btn-warning"> Submit </button></div>
        
        {!! Form::close() !!}
      </div>
    </div>
    <!-- hashing power --> 
    
    
    
    
    </div>
    
    </div>
  </div>
</div>
@stop
