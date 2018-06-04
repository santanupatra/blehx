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
      <div><h1>Create product</h1></div>
      <div class="row">
      {!! Form::open(['url' => 'product/store', 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Category :</div>              
              <div class="col-md-6">
                <select name="category_id" id="category_id">
                  @foreach($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Products :</div>              
              <div class="col-md-6">
                <select name="product_id" id="product_id">
                  <option value="0">Select Product</option>
                </select>
              </div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Price :</div>              
              <div class="col-md-6"><input type="text" name="price" id="price" placeholder="Product Price ..." class="form-control" required="required"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Quantity :</div>              
              <div class="col-md-6"><input type="text" name="quantity" id="quantity" placeholder="Quantity ..." class="form-control" required="required"></div>
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
<script>
$(function(){
  $('#category_id').change(function(){
    category_id = $('#category_id').val();
      $.ajax({
            method: "GET",
            url: '{{URL::to('')}}/product/productlist',
            data: { category_id: category_id}
          })
          .done(function( data ) {

           var obj = jQuery.parseJSON( data );
            if(obj.Ack  == 1){                   
              $('#product_id').html(obj.products);
            }
            else{
               alert('No product avilable in this category.');  
            }
          });
  })
});
</script>
@stop
