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
            {!! Form::open(['url' => 'user/store','method'=>'post','onsubmit'=>'return validation();']) !!}
            <input type="hidden" id="hide_emailerror" value="0">
            <input type="hidden" id="hide_emailmatcherror" value="0">
            <input type="hidden" id="hide_passwordmatcherror" value="0">
            <input type="hidden"  name="type" value="U">
              <div class="form-row">
                <div class="col-12 mb-4">
                  <input type="text" class="form-control" placeholder="Name" required name="first_name">
                </div>
                <div class="col-12  mb-4">
                  <input type="email" class="form-control" placeholder="Email" required name="email" id="emailinput">
                  <small class="text-danger" id="email_error" style=" display:none;">Email already exist</small>

                </div>
                <div class="col-12  mb-4">
                  <input type="email" class="form-control" placeholder="Re-enter email" required name="email" id="retytpeemail">
                    <small style="display:none;" id="email_match_error" class="text-danger">Email does not match</small>
                </div>
                <div class="col-12  mb-4">
                  <input type="password" class="form-control" placeholder="Password" required name="password" id="password">
                </div>
                <div class="col-12  mb-4">
                  <input type="password" class="form-control" placeholder="Re-enter password" required name="password" id="retypepass">
                  <small style="display:none;" id="password_match_error" class="text-danger">Password does not match</small>
                </div>
                 <!-- <div class="col-12  mb-4">
					  <div class="form-check form-check-inline">
						<label class="form-check-label">
              <input class="form-check-input mr-2" type="radio" name="type" id="inlineRadio1" value="U" required="">User
						</label>
					  </div>

						<div class="form-check form-check-inline">
							<label class="form-check-label">
                <input class="form-check-input mr-2" type="radio" name="type" id="inlineRadio2" value="C" required="">Charity
							</label>
						</div>
                </div> -->
              <div class="col-12  mb-4">
                <label class="d-flex align-items-center font-12">
                 <input type="checkbox"  name="newsletter" value="1" class="mr-2 MW16">
                   Receive our weekly newsletter and other occasional updates
                </label>
               </div>
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
                 <div class="col-12  mb-3">
                   <button class="g-signin btn btn-danger bg-red btn-block" type="button" 
                    data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"
                       data-requestvisibleactions="http://schemas.google.com/AddActivity"
                       data-clientId="234452095110-0vktl9j31ficjt69qg5lvj1kmhbdqnsi.apps.googleusercontent.com"
                       data-accesstype="offline"
                       data-callback="mycoddeSignIn"
                       data-theme="dark"
                       data-cookiepolicy="single_host_origin"       
                   >
                   <i class="icon ion-social-googleplus d-inline-block mr-2"></i>Login with Google Plus</button>
                  <!-- <button class="g-signin btn btn-danger bg-red btn-block"
                       data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"
                       data-requestvisibleactions="http://schemas.google.com/AddActivity"
                       data-clientId="234452095110-0vktl9j31ficjt69qg5lvj1kmhbdqnsi.apps.googleusercontent.com"
                       data-accesstype="offline"
                       data-callback="mycoddeSignIn"
                       data-theme="dark"
                       data-cookiepolicy="single_host_origin">
                    </button> -->
                 </div>
                 <div class="col-12  mb-2">
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
   window.fbAsyncInit = function() {
   FB.init({
   appId: '192920864584099',
   status: true,
   cookie: true,
   xfbml: true
   });
   };
   // Load the SDK asynchronously
   (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
   }(document));
   function login() {
   FB.login(function (response) {
                //console.log(response);
                if (!response || response.status !== 'connected') {
                    alert('Failed');
                } else {
                    FB.api('/me', {fields: 'first_name,last_name,email'}, function (response) {
                        if(response.email=='')
                        {
                        	alert("Sorry you cannot register or login as your fb email is not public.");
                        }
                        else{
                            var fbdata={
                            email:response.email,
                            social_id:response.id,
                            first_name:response.first_name,
                            last_name:response.last_name,
                            social_type:'fb',
                            type:"U",
                            _token: "{{ csrf_token() }}",
                            };
                            $.post("{{URL::asset('/')}}user/sociallogin",fbdata,function(data){
                              if(data.Ack==1)
                              {

                               location.href="{{URL::asset('/')}}profile"  ;
                             }
                            },"json");



                        }
                    });
                }
            }, {scope: 'email'});






   }

   (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
   })();




</script>
<script type="text/javascript">
   var gpclass = (function(){

   //Defining Class Variables here
   var response = undefined;
   return {
       //Class functions / Objects

       mycoddeSignIn:function(response){
           // The user is signed in
           if (response['access_token']) {

               //Get User Info from Google Plus API
               gapi.client.load('plus','v1',this.getUserInformation);

           } else if (response['error']) {
               // There was an error, which means the user is not signed in.
               //alert('There was an error: ' + authResult['error']);
           }
       },

       getUserInformation: function(){
           var request = gapi.client.plus.people.get( {'userId' : 'me'} );
           request.execute( function(profile) {
               var email = profile['emails'].filter(function(v) {
                   return v.type === 'account'; // Filter out the primary email
               })[0].value;
               if(email!='')
               {
                var fbdata={
                           email:email,
                           social_id:profile.id,
                           first_name:profile.name.givenName,
                           last_name:profile.name.familyName,
                           type:"U",
                           social_type:'g',
                           _token: "{{ csrf_token() }}",
                           };
                          console.log(fbdata);
                          $.post("{{URL::asset('/')}}user/sociallogin",fbdata,function(data){
                             if(data.Ack==1)
                             {
                                location.href="{{URL::asset('/')}}profile"
                             }
                           },"json");

               }
               else
               {
                 alert("Sorry you cannot register or login as your G+ email is not public.");


               }





           });
       }

   }; //End of Return
   })();

   function mycoddeSignIn(gpSignInResponse){
       gpclass.mycoddeSignIn(gpSignInResponse);
   }
   $(document).ready(function(){
   $("#emailinput").keyup(function(){
    var email=$(this).val();
    var retytpeemail=$("#retytpeemail").val();
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
        if(retytpeemail!='' && email!=retytpeemail)
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
    $("#password").keyup(function(){
    var retypepass=$("#retypepass").val();
    var password=$("#password").val();
     if(retypepass!='')
     {
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
     }    
        
    })  ;
   
   
   });    
    function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
    function validation()
    {
       hide_emailerror=$("#hide_emailerror").val();
       hide_passwordmatcherror=$("#hide_passwordmatcherror").val();
       hide_emailmatcherror=$("#hide_emailmatcherror").val();
       if(hide_emailerror==0 && hide_passwordmatcherror==0 && hide_emailmatcherror==0)
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
