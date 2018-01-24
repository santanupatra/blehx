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
<div class="row">
<div class="col-md-8">
  <div class="p-4 text-center">
    <h2 class="text-center zilla_slablight">Follow creators and Facebook friends to discover more projects.</h2>
    <button type="button" name="button" class="btn btn-success mt-3 mb-5">Find creators</button>
    <div class="">
      <a class="btn btn-primary faceBookBtn" href="javascript:void(0)" style=" width:270px; "><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
    </div>
    <p class="small">We'll never post anything on Facebook without your permission.</p>
  </div>
</div>
<div class="col-md-4 bg-white">
  <div class="p-4">
    <h3 class="zilla_slablight">Following</h3>
    <p class="font-12">
       When you follow creators and your Facebook friends on Kickstarter, you’ll be notified when they back or launch a project. And while you’re exploring, we’ll show you whom has backed each project you find. (You can manage your notification settings <a href="#">here</a>.)
    </p>
    <div class="font-12 mt-5">
          Heads up: We don’t display your pledge amount, just the fact that you’re a proud backer. You can opt out of this feature <a href="#">here</a>.
    </div>
  </div>
</div>
</div>
@stop
