@extends('layouts.default')
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
<script>
    $(document).ready(function(){
    $("#charity_confirmation").modal("show");
    });
</script>
@endif
<section class="bg-white">
<section class="pt-5 border-bottom">
  <div class="container myContainer">
    <h1 class="zilla_slablight pb-2"><strong>Settings</strong></h1>
    <ul class="nav nav-tabs setting-nav-tabs border-none" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab" aria-expanded="true">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile">Edit profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="profile">Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-controls="profile">Payment methods</a>
      </li>
    </ul>
    </div>
  </div>
</section>
<section class="pt-5 pb-5">
   <div class="container myContainer">
     <div class="tab-content">
       <div class="tab-pane fade show active" id="tab1" role="tabpanel">
        <div class="row">
          <div class="col-md-6 charityprofile">
            <div  class="mw370">
              <label for="validationDefault02" class="zilla_slablight">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" required>
              <!-- <p class="small font-12"><span>Unverified</span> <a href="#">Re-send verification email</a></p> -->
            </div>
            <div  class="mw370">
              <div class="mt-3 mb-2">
                  <button type="button" name="button" class="btn btn-danger btn-red font-14" id="passwordChange" style="cursor:pointer;" onclick="$('#password_container').toggle();">Change Password</button>
              </div>
                <div id="password_container" style=" display:none;">
                    <div class="mb-2">
                        <label for="validationDefault02" class="zilla_slablight">New Password</label>
                        <input type="password" class="form-control" placeholder="Password"  minlength="6">
                        <p class="small font-12">Minimum 6 characters</p>
                    </div>                                                                                                                                                                    
                    <div class="mb-2">
                      <label for="validationDefault02" class="zilla_slablight">Confirm Password</label>
                      <input type="password" class="form-control" placeholder="Conform Password" >
                      <p class="small font-12">Make sure they match!</p>
                    </div>   
                    
                </div>   
              
            </div>
            <div  class="mw370">
              <label for="validationDefault02" class="zilla_slablight">Current Password</label>
              <input type="password" class="form-control" name="email" value="password" required="">
              <p class="small font-12">Enter your current password to save these changes.</p>
            </div>
            <div class="mt-3">
                <button type="submit" style=" cursor: pointer;" name="button" class="btn btn-danger btn-red font-14 w150">Save Setting</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="font-14 mb-4 mw370 zilla_slablight">
              <div><strong>Following</strong></div>
              <a href="#">Opt out of Following</a>
            </div>
            <div class="font-14 mb-4 mw370 zilla_slablight">
              <div><strong>Facebook</strong></div>
              <a href="javascript:void(0)" class="btn btn-primary faceBookBtn btn-block"><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
            </div>
            <div class="font-14 mb-4 mw370 zilla_slablight">
              <div><strong>Security</strong></div>
              <a href="#">Verify your email to enable two-factor authentication
Log me out on all other devices</a>
            </div>
            <div class="font-14 mb-4 mw370 zilla_slablight">
              <div><strong>Delete Account</strong></div>
              <a href="#">Delete my Kickstarter account</a>
            </div>
          </div>
        </div>
        <hr class="mt-5 mb-5">
        <div class="">
          <h3 class="zilla_slablight">Login History</h3>
          <p class="font-14">This feature provides information about your account usage and other related changes. If you see any suspicious activity, change your password immediately.</p>
          <p class="font-14">No security events found.</p>
        </div>
       </div>
       <div class="tab-pane fade" id="tab2" role="tabpanel">
         <section class="charityprofile">
            {!! Form::open(['url' => 'user/charityupdate/'.$user->id,'method'=>'put','files'=>true]) !!}
             <div class="row">
               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">First Name</label>
                   <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{$user->first_name}}" required>
                   <p class="small font-12 mb-0">Your name is displayed on your profile.</p>
                 </div>
               </div>

                <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">Last Name</label>
                   <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{$user->last_name}}" required>
                   <p class="small font-12 mb-0">Your name is displayed on your profile.</p>
                 </div>
               </div>

               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" required>
                 </div>
               </div>

               <div class="col-md-6 mb-3">
                  <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">Change Images</label>
                   <div class="pos-relative file-input form-control">
                     <input type="file" name="file">
                     <span class="font-12">Choose an image from your computer</span>
                   </div>
                   <p class="small font-12 mb-0">Images is displayed on your profile.</p>
                 </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">Full street address line 1</label>
                   <input type="text" class="form-control" name="street_address_1" placeholder="Full street address line 1" value="{{$user->street_address_1}}" required>
                 </div>
               </div>
               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault02" class="zilla_slablight">Full street address line 2</label>
                   <input type="text" class="form-control" name="street_address_2" placeholder="Full street address line 2" value="{{$user->street_address_2}}" >
                 </div>
               </div>
               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">Full street address line 3</label>
                   <input type="text" class="form-control" name="street_address_3" placeholder="Full street address line 3" value="{{$user->street_address_3}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault02" class="zilla_slablight">Country</label>
                   <input type="text" class="form-control" name="country" placeholder="Country" value="{{$user->country}}" required>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">State</label>
                   <input type="text" class="form-control" name="state" placeholder="State" value="{{$user->state}}" required>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                <div class="mw370">
                 <label for="validationDefault02" class="zilla_slablight">City</label>
                 <input type="text" class="form-control" name="city" placeholder="City" value="{{$user->city}}" required>
                </div>
               </div>
                <div class="col-md-6 mb-3">
                <div class="mw370">
                 <label for="validationDefault02" class="zilla_slablight">Zip</label>
                 <input type="text" class="form-control" name="zip" placeholder="Zip" value="{{$user->zip}}" required>
                </div>
               </div>
                <div class="col-md-6 mb-3">
                  <div class="mw370">
                   <label for="validationDefault02" class="zilla_slablight">Phone</label>
                   <input type="text" class="form-control" name="phone_no" placeholder="Phone" value="{{$user->phone_no}}" required>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                <div class="mw370">
                   <label for="validationDefault02" class="zilla_slablight">Website link</label>
                   <input type="text" class="form-control" name="website" placeholder="Website link" value="{{$user->website}}" required>
                 </div>
               </div>
               <div class="col-md-6 mb-3">
                 <div class="mw370">
                   <label for="validationDefault02" class="zilla_slablight">Charity registration number/ID</label>
                   <input type="text" class="form-control" name="charity_reg" placeholder="Charity registration " value="{{$user->charity_reg}}" required>
                  </div>
               </div>
             </div>
             <div class="mt-4">
               <button class="btn btn-danger btn-red mx-auto w150" type="submit">Save Setting</button>
             </div>
            {!! Form::close() !!}
         </section>
       </div>
       <div class="tab-pane fade" id="tab3" role="tabpanel">
         <div class="row relative mb2">
           <div class="col col-8">
              <h4 class="font-20">Manage payment options</h4>
              <p class="font-12 mb0">
                 Any payment methods you save to Kickstarter will be listed here (securely) for your convenience. To save a card for future pledges, just click "Add a new card."
              </p>
              <div class="">
                <div class="payment_form">
                  <div class="row mb-3">
                    <h4 class="col-md-6 font-18">Add card information <span class="ml-2 font-12"><i class="ion-android-lock mr-1"></i>Secure</span></h4>
                    <span class="col-md-6 font-12 text-right d-flex align-items-center">Visa, MasterCard, American Express, or JCB</span>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-8">
                      <div class="payment_form-max">
                        <label class="zilla_slablight font-12"><strong>Card number</strong></label>
                        <input type="text" class="form-control font-12" placeholder="Card number">
                      </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                      <div class="">
                        <img src="https://www.paturnpike.com/images/toll_info/creditcards.png" alt="" class="w-100">
                      </div>
                    </div>
                  </div>
                  <div class="payment_form-max">
                    <label class="zilla_slablight font-12"><strong>Name</strong></label>
                    <input type="text" class="form-control font-12" placeholder="Name">
                  </div>
                  <div class="d-flex pt-2">
                    <div class="">
                      <label class="zilla_slablight font-12"><strong>Name</strong></label>
                      <div class="d-flex">
                        <select class="form-control mr-2 font-12">
                          <option>1</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                        </select>
                        <select class="form-control font-12">
                          <option>1000</option>
                          <option>1200</option>
                          <option>1300</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                        </select>
                      </div>

                    </div>
                    <div class="ml-2">
                      <label class="zilla_slablight font-12"><strong>Security code</strong></label>
                      <input type="text" class="form-control font-12" style="width: 100px;">
                    </div>
                  </div>
                </div>
              </div>
           </div>
           <div class="text-right col">
              <a class="btn btn-red btn-danger" href="#">Add a new card</a>
           </div>
        </div>
       </div>
       <div class="tab-pane fade" id="tab4" role="tabpanel">
         <div class="pt-5 pb-5 row">
           <div class="col-md-3">
              <h5> Newsletters</h5>
                <p class="font-14">Stay up to date with our favorite projects, and any news and events that are on our radar.</p>
                <button class="btn btn-block btn-danger btn-red font-12">Subscribe to all</button>
            </div>
           <div class="col-md-9">
              <div class="row">
                <div class="col col-6 mb-3">
                  <div class="edit-notifications-block">
                  <div class="">
                    <img class="w-100" alt="" src="https://d3mlfyygrfdi2i.cloudfront.net/2892/projects-we-love-newsletter.jpg">
                  </div>
                  <div class="p-2">
                     <div class="font-14">Projects We Love</div>
                     <div class="font-12">A few projects, delivered once a week — handpicked by our team.</div>
                  </div>
                  <hr class="mt-4 mb-4">
                  <div class="media-block_footer"><button class="btn btn-block btn-danger btn-red" data-ember-action="451">Subscribed</button>
                  </div>
                </div>
                </div>
                <div class="col col-6 mb-3">
                  <div class="edit-notifications-block">
                  <div class="">
                    <img class="w-100" alt="" src="https://d3mlfyygrfdi2i.cloudfront.net/2892/projects-we-love-newsletter.jpg">
                  </div>
                  <div class="p-2">
                     <div class="font-14">Projects We Love</div>
                     <div class="font-12">A few projects, delivered once a week — handpicked by our team.</div>
                  </div>
                  <hr class="mt-4 mb-4">
                  <div class="media-block_footer"><button class="btn btn-block btn-danger btn-red" data-ember-action="451">Subscribed</button>
                  </div>
                </div>
                </div>
                <div class="col col-6 mb-3">
                  <div class="edit-notifications-block">
                  <div class="">
                    <img class="w-100" alt="" src="https://d3mlfyygrfdi2i.cloudfront.net/2892/projects-we-love-newsletter.jpg">
                  </div>
                  <div class="p-2">
                     <div class="font-14">Projects We Love</div>
                     <div class="font-12">A few projects, delivered once a week — handpicked by our team.</div>
                  </div>
                  <hr class="mt-4 mb-4">
                  <div class="media-block_footer"><button class="btn btn-block btn-danger btn-red" data-ember-action="451">Subscribed</button>
                  </div>
                </div>
                </div>
                <div class="col col-6 mb-3">
                  <div class="edit-notifications-block">
                  <div class="">
                    <img class="w-100" alt="" src="https://d3mlfyygrfdi2i.cloudfront.net/2892/projects-we-love-newsletter.jpg">
                  </div>
                  <div class="p-2">
                     <div class="font-14">Projects We Love</div>
                     <div class="font-12">A few projects, delivered once a week — handpicked by our team.</div>
                  </div>
                  <hr class="mt-4 mb-4">
                  <div class="media-block_footer"><button class="btn btn-block btn-danger btn-red" data-ember-action="451">Subscribed</button>
                  </div>
                </div>
                </div>
                <div class="col col-6 mb-3">
                  <div class="edit-notifications-block">
                  <div class="">
                    <img class="w-100" alt="" src="https://d3mlfyygrfdi2i.cloudfront.net/2892/projects-we-love-newsletter.jpg">
                  </div>
                  <div class="p-2">
                     <div class="font-14">Projects We Love</div>
                     <div class="font-12">A few projects, delivered once a week — handpicked by our team.</div>
                  </div>
                  <hr class="mt-4 mb-4">
                  <div class="media-block_footer"><button class="btn btn-block btn-danger btn-red" data-ember-action="451">Subscribed</button>
                  </div>
                </div>
                </div>
                <div class="col col-6 mb-3">
                  <div class="edit-notifications-block">
                  <div class="">
                    <img class="w-100" alt="" src="https://d3mlfyygrfdi2i.cloudfront.net/2892/projects-we-love-newsletter.jpg">
                  </div>
                  <div class="p-2">
                     <div class="font-14">Projects We Love</div>
                     <div class="font-12">A few projects, delivered once a week — handpicked by our team.</div>
                  </div>
                  <hr class="mt-4 mb-4">
                  <div class="media-block_footer"><button class="btn btn-block btn-danger btn-red" data-ember-action="451">Subscribed</button>
                  </div>
                </div>
                </div>
              </div>
           </div>
           <div class="col-md-12 mt-4">
             <div class="">
               <div class="row">
                 <div class="col-md-6">
                   <h4 class="text-right">Account Notifications</h4>
                 </div>
                 <div class="col-md-6">
                   <div class="text-black ">Projects you've backed</div>
                   <ul class="list-item-ul-new" style="list-style-type: none; ">
                     <li class="d-flex align-items-center">
                       <button type="button" class="btn btn-link"><i class="ion-android-mail"></i></button>
                       <button type="button" class="btn btn-link"><i class="ion-android-phone-portrait"></i></button>
                       <span class="flex-1 font-12">Project updates</span>
                     </li>
                     <li class="d-flex align-items-center">
                       <button type="button" class="btn btn-link"><i class="ion-android-mail"></i></button>
                       <button type="button" class="btn btn-link"><i class="ion-android-phone-portrait"></i></button>
                       <span class="flex-1 font-12">Project updates</span>
                     </li>
                   </ul>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   </div>
</section>
</section>
@stop
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="charity_confirmation" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Charity Signup</h4>
        </div>
        <div class="modal-body">
            <p>

                Thanks for submitting your information.We will review this information	as quickly as possible.	Lookout
for a Welcome email soon after which you can start launching campaigns

            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
