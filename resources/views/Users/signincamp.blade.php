@extends('layouts.default')
@section('content')
 <section class="login-bnr">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white zilla_slablight font-48">Log In</h2>
            <p class="text-white font-18 latolight">Login with register member</p>
          </div>
        </div>
      </div>
    </section>
   
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
            <h6 class="mb-3 font-weight-bold font-18">Log in with your account</h6>
            {!! Form::open(['url' => 'user/actionsignincamp','method'=>'post']) !!}           
              <div class="form-row">
                <div class="col-12 mb-4">
                    <input type="email" class="form-control" placeholder="E-mail Address" required="" name="email">
                </div>
                <div class="col-12  mb-4">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <div class="col-5  mb-4">
                    <button class="btn btn-danger btn-block bg-red font-14 font-weight-bold" style=" cursor:pointer;">Signin Account</button>
                </div>
                <div class="col-7  mb-4 d-flex align-items-center justify-content-end">
                  <p class="m-0 font-theme font-15 latolight">Not a member yet? <a href="#" class="font-theme">Register now</a></p>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>

@stop


