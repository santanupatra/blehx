@extends('layouts.default')
@section('content')  
@if(session()->has('warning'))
<div class="alert alert-danger">
       {{ session()->get('warning') }}

    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <section class="pt-10 pb-10">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-lg-5 ">
            <h6 class="mb-3 font-weight-bold font-18">Get started</h6>
            {!! Form::open(['url' => 'campaignfirststep','method'=>'post']) !!}  
             <input type="hidden" value="1" name="step">
              <div class="form-row">
                <div class="col-12 mb-4">
                    <select name="category_id" required="" class="form-control" id="category_id">
                     <option value="">Select Category</option>   
                     @if($categories)   
                     @foreach($categories as $category)
                     <option value="{{$category->id}}" {{(!empty($selectcategory) and $selectcategory==$category->id)?'selected':''}}>{{$category->name}}</option>
                     @endforeach
                     @endif
                        
                    </select>
                </div>
<!--                <div class="col-12 mb-4">
                    <select name="sub_category_id" required="" class="form-control" id="sub_category_id">
                     <option value="">Sub Category Optional</option>                        
                    </select>
                </div>  -->
                <div class="col-12  mb-4">
                    <input type="text" class="form-control" placeholder="Give your project a title" required="" name="title">
                </div>
                <div class="col-12  mb-4">
                   <input type="text" class="form-control" placeholder="Select your country" required="" name="country">

                </div>  
                  
                <div class="col-5  mb-4">
                    <button class="btn btn-danger btn-block bg-red font-14 font-weight-bold" style=" cursor:pointer;" type="submit">Save and continue</button>
                </div>
                
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
    <script>
    $(document).ready(function(){
    $("#category_id").change(function(){
    $.get("{{URL::asset('/')}}category/child/"+$(this).val(),function(data){
    $("#sub_category_id").html(data);    
    });    
    });    
    });    
    </script>    

@stop


