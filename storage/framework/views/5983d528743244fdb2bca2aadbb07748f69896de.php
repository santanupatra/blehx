


<?php $__env->startSection('content'); ?>
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
<?php if(session()->has('warning')): ?>
<div class="alert alert-danger">
   <?php echo e(session()->get('warning')); ?>

</div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
<div class="alert alert-success">
   <?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>
<section class="pt-5 pb-5">
   <div class="container">
      <div class="row justify-content-md-center">
         <div class="col-lg-4">
           <div class="login-content">
             <h6 class="mb-3 font-weight-bold font-18">Log in with your account</h6>
             <?php echo Form::open(['url' => 'user/actionsignin','method'=>'post']); ?>

             <div class="form-row">
                <div class="col-12 mb-4">
                   <input type="email" class="form-control" placeholder="E-mail Address" required="" name="email">
                </div>
                <div class="col-12  mb-2">
                   <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <div class="col-12  mb-2">
                  <a href="#" class="font-12"> Forgot your password? </a>
                </div>
                <div class="col-12  mb-2">
                   <button class="btn btn-danger btn-block bg-red font-14 font-weight-bold" style=" cursor:pointer;">Log me in!</button>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-check">
                    <label class="form-check-label font-12 d-flex">
                      <input type="checkbox" class="form-check-input mr-2">
                      Remember me
                    </label>
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
                   <button class="g-signin btn btn-danger bg-red btn-block"
                     type="button"      
                     data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"
                     data-requestvisibleactions="http://schemas.google.com/AddActivity"
                     data-clientId="234452095110-0vktl9j31ficjt69qg5lvj1kmhbdqnsi.apps.googleusercontent.com"
                     data-accesstype="offline"
                     data-callback="mycoddeSignIn"
                     data-theme="dark"
                     data-cookiepolicy="single_host_origin" 
                     ><i class="icon ion-social-googleplus d-inline-block mr-2"></i>Login with Google Plus</button>
                </div>
                <div class="col-12 mb-2">
                   <a class="btn btn-primary faceBookBtn btn-block" href="javascript:void(0)" onclick="login();"><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
                   <p class="font-12 text-center">We'll never post anything on Facebook <br>
                      without your permission.
                    </p>
                </div>
                <div class="col-12  mb-4 text-center">
                  <hr class="mt-2 mb-3">
                   <p class="m-0 font-theme font-15 latolight">Not a member yet? <a href="<?php echo e(URL::asset("/")); ?>signup" class="font-theme">Register now</a></p>
                </div>
             </div>
             <?php echo Form::close(); ?>

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
                            _token: "<?php echo e(csrf_token()); ?>",
                            };
                            $.post("<?php echo e(URL::asset('/')); ?>user/sociallogin",fbdata,function(data){
                              if(data.Ack==1)
                              {

                               $("#user_id").attr("value",data.user_id);
                               if(data.ShowModal==1)
                               {
                                   $("#usertype").modal("show");
                               }
                               else
                               {
                                  if(data.type=='U')
                                  {
                                    location.href="<?php echo e(URL::asset('/')); ?>profile"
                                  }
                                  else
                                  {
                                    location.href="<?php echo e(URL::asset('/')); ?>charityprofile"
                                  }
                               }

                             }
                            },"json");



                        }
                    });
                }
            }, {scope: 'email'});






   }

   $(document).ready(function(){
   $("#usertypeform").submit(function(event){
   event.preventDefault();
   $.post("<?php echo e(URL::asset('/')); ?>settype",$(this).serialize(),function(out){
   if(out.Ack==1)
   {

       if(out.usertype=='U')
       {
             location.href="<?php echo e(URL::asset('/')); ?>profile"
       }
       else
       {
            location.href="<?php echo e(URL::asset('/')); ?>charityprofile"
       }

   }
   },"json");

   });

   });


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
                           social_type:'g',
                           _token: "<?php echo e(csrf_token()); ?>",
                           };
                console.log(fbdata);
                            $.post("<?php echo e(URL::asset('/')); ?>user/sociallogin",fbdata,function(data){
                             if(data.Ack==1)
                             {

                              $("#user_id").attr("value",data.user_id);
                              if(data.ShowModal==1)
                              {
                                  $("#usertype").modal("show");
                              }
                              else
                              {
                                 if(data.type=='U')
                                 {
                                   location.href="<?php echo e(URL::asset('/')); ?>profile"
                                 }
                                 else
                                 {
                                   location.href="<?php echo e(URL::asset('/')); ?>charityprofile"
                                 }
                              }

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
</script>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div class="modal fade" id="usertype" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Signup Modal</h4>
         </div>
         <form method="post" id="usertypeform">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id"  id="user_id">
            <div class="modal-body">
               <div class="radio-inline">
                  <label><input type="radio" value="C" name="type" required=""> Signup as Charity</label>
               </div>
               <div class="radio-inline">
                  <label><input type="radio" value="U" name="type" required=""> Signup as Doner</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-danger btn-block bg-red font-14 font-weight-bold" style=" cursor:pointer;width:10%;">Go</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>