@extends('layouts.default')
@section('content')
<!-- <section class="login-bnr">
   <div class="container">
      <div class="d-flex align-items-center innr">
         <div>
            <h2 class="text-white zilla_slablight font-48">Log In</h2>
            <p class="text-white font-18 latolight">Login with register member</p>
         </div>
      </div>
   </div>
</section> -->
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
<div class="container">  
    
    <!-- hash power -->
    <div id="current-mining" class="mma mma-bc1">
      <div style="height: 30px"></div>
      <div class="row">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Login
                <span>Please enter your login data</span>
              </h2>
            </div>
            {!! Form::open(['url' => 'user/actionsignin','method'=>'post', 'class' => 'form-horizontal']) !!}  
            <div class="modal-body">
              <div class="modal-formdiv">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group-sm">
                        <label for="e">Email</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                          </div>
                          <input type="email" name="email" id="email" placeholder="Email-id..."
                          class="form-control" required="required">
                        </div>
                      </div>
                    </div>

                <div class="col-md-6">
                      <div class="form-group-sm">
                        <label for="p">Password</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                          </div>
                          <input type="Password" name="password" id="password" placeholder="Type Password..." class="form-control" required="required">
                        </div>
                      </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group-sm">
                    <button type="submit" class="btn new-btn1 btn-sm" data-toggle="modal" >Submit</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group-sm">
                    <h5 class="h5"><a href="#">
                    <i class="fa fa-hand-o-right"></i> Lost your password? | <u><a href="#" data-toggle="modal" data-target="#myModal1"> Sign Up</a></u></a></h5>
                  </div>
                </div>

                <div class="col-md-2 hidden-xs hidden-sm hidden-lg"></div>
              </div>
              </div>
            </div>
            {!! Form::close() !!}
            <div class="modal-footer">
              <!--<a href="#" class="btn btn-primary text-uppercase text-center">sign in</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
          </div>
      </div>
      <div style="height: 30px"></div>
    </div>
</div>  
@stop
