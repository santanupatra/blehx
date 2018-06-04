@extends('layouts.dashboard')
@section('content')
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
<div id="main-container">
  <div class="container">  
    
    <!-- hash power -->
    <div id="current-mining" class="mma mma-bc1">
      <div><h1>Edit Service</h1></div>
      <div class="row">
      {!! Form::open(['url' => 'service/store', 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
          <input type="hidden" name="id" value="{{$service->id}}">
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Category :</div>              
              <div class="col-md-6">{{$service->cat_name}}</div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Service Name :</div>              
              <div class="col-md-6">{{$service->pro_name}}</div>
          </div>
           <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Hashrate :</div>              
              <div class="col-md-6"><span id="rate">{{$service->hashrate}}</span> <span id="desit">{{$service->hashrate_type}}</span></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Price :</div>              
              <div class="col-md-6"><input type="text" name="price" id="price" placeholder="Product Price ..." class="form-control" required="required" value="{{$service->price}}"></div>
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
