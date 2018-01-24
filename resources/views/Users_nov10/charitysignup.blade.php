@extends('layouts.default')
@section('content')
 <!-- <section class="login-bnr">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white">Sign Up</h2>
            <p class="text-white">Register for free account</p>
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
    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-lg-4 ">
            <div class="login-content">
              <div class="text-center font-12">
                <p class="m-0 font-theme">Have an account? <a href="{{URL::asset('/')}}user/signin" class="font-theme">Log in</a></p>
                <hr class="mb-3 mt-3">
              </div>
              <h6 class="mb-3 font-weight-bold">Register for free account</h6>
              {!! Form::open(['url' => 'user/storecharity','method'=>'post','onsubmit'=>'return validation();']) !!}
              <input type="hidden" id="hide_nameerror"  value="0">
              <input type="hidden" id="hide_emailerror" value="0">
              <input type="hidden" id="hide_emailmatcherror" value="0">
              <input type="hidden" id="hide_passwordmatcherror" value="0">
              <input type="hidden"  name="type" value="C">
                <div class="form-row">
                  <div class="col-12 mb-4">
                      <input type="text" class="form-control" placeholder="Name of the Charity" required name="first_name" id="first_name">
                      <small style="display:none;" id="name_error" class="text-danger">Charity name Already registered</small>

                  </div>

                  <div class="col-12  mb-4">
                      <input type="email" class="form-control" placeholder="Email" required name="email" id="emailinput">
                      <small class="text-danger" id="email_error" style=" display:none;">Email already exist</small>

                  </div>
                  <div class="col-12  mb-4">
                      <input type="email" class="form-control" placeholder="Re-enter email" required name="retytpeemail" id="retytpeemail">
                      <small style="display:none;" id="email_match_error" class="text-danger">Email does not match</small>

                  </div>
                  <div class="col-12  mb-4">
                      <input type="password" class="form-control" placeholder="Password" required name="password" id="password">
                  </div>
                  <div class="col-12  mb-4">
                      <input type="password" class="form-control" placeholder="Re-enter password" required name="retypepass" id="retypepass">
                      <small style="display:none;" id="password_match_error" class="text-danger">Password does not match</small>
                  </div>
                   <div class="col-12  mb-4">
                     <label class="d-flex align-items-center font-12">
                      <input type="checkbox"  name="newsletter" value="1" class="mr-2 MW16">
                        Receive our weekly newsletter and other occasional updates
                     </label>
                  </div>
                  <!-- <div class="col-12  mb-4">
                    <label class="d-flex align-items-center font-12">
                      <input type="checkbox" required name="privacy" value="1" class="mr-2 MW16">
                       By	signing	up,	you	agree	to	our	terms	of	use,	privacy	policy,	and
  cookie	policy.
                    </label>
                  </div> -->
                  <div class="col-12  mb-4">
                    <button class="btn btn-danger btn-block bg-red" type="submit" style=" cursor:pointer;">Create Account</button>
                  </div>
                  <div class="col-12 mb-4">
                    <div>
                      <div class="font-12">By signing up, you agree to our <a href="#">terms of use,</a> <a href="#">privacy policy,</a> and <a href="#">cookie policy</a>.</div>
                    </div>
                  </div>
                  <div class="col-12 mb-4">
                   <div class="row">
                     <div class="col-5">
                       <hr class="mt-2 mb-2">
                     </div>
                     <div class="col text-center font-12">
                       or
                     </div>
                     <div class="col-5">
                       <hr class="mt-2 mb-2">
                     </div>
                   </div>
                </div>
                <div class="col-12 mb-3">
                   <button class="g-signin btn btn-danger bg-red btn-block" type="button" data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email" data-requestvisibleactions="http://schemas.google.com/AddActivity" data-clientid="234452095110-0vktl9j31ficjt69qg5lvj1kmhbdqnsi.apps.googleusercontent.com" data-accesstype="offline" data-callback="mycoddeSignIn" data-theme="dark" data-cookiepolicy="single_host_origin" data-gapiscan="true" data-onload="true" data-gapiattached="true"><i class="icon ion-social-googleplus d-inline-block mr-2"></i>Login with Google Plus</button>
                </div>
                <div class="col-12 mb-2">
                   <a class="btn btn-primary faceBookBtn btn-block" href="javascript:void(0)" onclick="login();"><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
                   <p class="font-12 text-center">We'll never post anything on Facebook <br>
                      without your permission.
                    </p>
                </div>
              </div>
              {!! Form::close() !!}

            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
    $(document).ready(function(){
    $("#retytpeemail").keyup(function(){
    var retytpeemail=$(this).val();
    var email=$("#emailinput").val();
    if(validateEmail(retytpeemail))
    {
        if(email!=retytpeemail)
        {
            $("#hide_emailmatcherror").attr("value",1);
            $("#retytpeemail").addClass("is-invalid");
            $("#email_match_error").fadeIn();
        }
        else
        {
            $("#hide_emailmatcherror").attr("value",0);
            $("#retytpeemail").removeClass("is-invalid");
            $("#email_match_error").fadeOut();
        }
    }

    })  ;
    $("#retypepass").keyup(function(){
    var retypepass=$(this).val();
    var password=$("#password").val();

        if(retypepass!=password)
        {
            $("#hide_passwordmatcherror").attr("value",1);
            $("#retypepass").addClass("is-invalid");
            $("#password_match_error").fadeIn();
        }
        else
        {
            $("#hide_passwordmatcherror").attr("value",0);
            $("#retypepass").removeClass("is-invalid");
            $("#password_match_error").fadeOut();
        }

    })  ;

    });
    $("#emailinput").keyup(function(){
    var email=$(this).val();
    if(validateEmail(email))
    {
        $.get("{{URL::asset('/')}}checkemail/"+email,function(data){
        if(data.Ack==1)
        {
            $("#email_error").fadeOut();
            $("#emailinput").removeClass("is-invalid");
            $("#hide_emailerror").attr("value",0);
        }
        else
        {
            $("#emailinput").addClass("is-invalid");
            $("#email_error").fadeIn();
            $("#hide_emailerror").attr("value",1);
        }

        },"json");
    }

    })  ;
    $("#first_name").keyup(function(){
    var first_name=$(this).val();

        $.get("{{URL::asset('/')}}checkname/"+first_name,function(data){
        if(data.Ack==1)
        {
            $("#name_error").fadeOut();
            $("#hide_nameerror").attr("value",0);
            $("#first_name").removeClass("is-invalid");
        }
        else
        {
            $("#name_error").fadeIn();
            $("#hide_nameerror").attr("value",1);
            $("#first_name").addClass("is-invalid");
        }

        },"json");

    })  ;



    function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
    function validation()
    {
       hide_nameerror=$("#hide_nameerror").val();
       hide_emailerror=$("#hide_emailerror").val();
       hide_passwordmatcherror=$("#hide_passwordmatcherror").val();
       hide_emailmatcherror=$("#hide_emailmatcherror").val();
       if(hide_nameerror==0 && hide_emailerror==0 && hide_passwordmatcherror==0 && hide_emailmatcherror==0)
       {
           return true;
       }
       else
       {
           return false;

       }



    }
</script>

@stop
