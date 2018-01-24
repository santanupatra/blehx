@extends('layouts.default')
@section('content')

<!-- <section class="login-bnr">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white zilla_slablight font-48">Search Results</h2>
            <p class="text-white font-18 latolight">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          </div>
        </div>
      </div>
    </section> -->
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
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="p-4">
          <h2 class="zilla_slablight">Following</h2>
          <p>Follow creators and Facebook friends and we'll notify you whenever they launch or
            <br>
             back a new project. <a href="#">Learn more</a>.</p>
          <!-- <div class="">
            <a class="btn btn-primary faceBookBtn" href="javascript:void(0)" style=" width:270px; "><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
          </div>
          <p class="small">We'll never post anything on Facebook without your permission.</p> -->
        </div>
      </div>
    </div>
  </div>
</section>
<section class="bg-white">
  <section class="pt-5">
      <div class="border-bottom">
        <div class="container myContainer myContainer-new">
        <ul role="tablist" class="nav nav-tabs setting-nav-tabs border-none">
          <li class="nav-item">
            <a href="#" class="nav-link ">Find Facebook friends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Find creators</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::asset('/')}}following_details">Following <span>{{$is_follow}}</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Blocked <span>0</span> </a>
          </li>
        </ul>
        </div>
      </div>
      <div class="container">
        <div class="text-center">
          <a class="btn btn-success mt-5 mb-5 btn-lg" href="{{URL::asset('/')}}campaign">Explore Projects</a>
        </div>
      </div>
    </section>
</section>
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="followers-div">
          <a href="{{URL::asset('/')}}following_details">Following</a>
          <b>{{$is_follow}}</b>
        </div>
      </div>
      <div class="col-md-3">
        <div class="followers-div">
          <a href="{{URL::asset('/')}}following_details">Followers</a>
          <b>{{$followers}}</b>
        </div>
      </div>
      <div class="col-md-3">
        <div class="followers-div">
          <a>Total projects backed</a>
          <b>{{$backed}}</b>
        </div>
      </div>
      <div class="col-md-3">
        <a href="{{URL::asset('/')}}campaign" class="btn btn-block btn-success">Check out some projects! </a>
      </div>
    </div>
  </div>
</section>
@stop
