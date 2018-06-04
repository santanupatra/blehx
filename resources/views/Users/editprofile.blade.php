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
      <div><h1>Edit Profile</h1></div>
      <div class="row">
      {!! Form::open(['url' => 'user/submitprofile', 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Name :</div>              
              <div class="col-md-6"><input type="text" name="name" id="name" placeholder="Name ..." class="form-control" required="required" value="{{$userinfo->name}}"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Phone :</div>              
              <div class="col-md-6"><input type="text" name="phone_no" id="phone_no" placeholder="Phone" class="form-control" required="required" value="{{$userinfo->phone_no}}"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Email :</div>              
              <div class="col-md-6"><input type="text" name="email" id="email" placeholder="Weight ..." class="form-control" value="{{$userinfo->email}}" readonly="readonly"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">D.O.B :</div>              
              <div class="col-md-6"><input type="text" name="dob" id="dob" placeholder="Date of birth" class="form-control" required="required" value="{{$userinfo->dob}}"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Address :</div>              
              <div class="col-md-6"><input type="text" name="address" id="address" placeholder="Quantity ..." class="form-control" required="required" value="{{$userinfo->address}}"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">City :</div>              
              <div class="col-md-6"><input type="text" name="city" id="city" placeholder="City" class="form-control" required="required" value="{{$userinfo->city}}"></div>
          </div>
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Country :</div>              
              <div class="col-md-6"><input type="text" name="country" id="country" placeholder="country" class="form-control" required="required" value="{{$userinfo->country}}"></div>
          </div>
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-md-12">
              <div class="col-md-2">Zip :</div>              
              <div class="col-md-6"><input type="text" name="zip" id="zip" placeholder="zip" class="form-control" required="required" value="{{$userinfo->zip}}"></div>
          </div>
        
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-md-12">
              <div class="col-md-2">Profile Image :</div>              
              <div class="col-md-6"><input type="file" name="image"></div>
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
