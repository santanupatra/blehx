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
<div class="alert alert-success">
   {{ session()->get('message') }}
</div>
@endif
<section class="pt-4 pb-4">
   <div class="container">
      <div class="row">
      <div class="col-lg-4">
          <div class="imagePart text-center">
          <img src="{{$logged_user->image}}" class="rounded-circle w-100">
          </div>
           <h4 class="text-center mt-3 zilla_slablight mb-4">{{$logged_user->first_name}}&nbsp;
              {{$logged_user->last_name}}
           </h4>
      </div>

         <div class="col-lg-9 col-xl-10">
            <section>
               {!! Form::open(['url' => 'user/update/'.$user->id,'method'=>'put','files'=>true]) !!}
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault01">First name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{$user->first_name}}" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Last name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{$user-> last_name}}" required>
                  </div>
                </div>
                <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="image">
                  <span class="custom-file-control"></span>
                </label>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault03">Email</label>
                    <input type="email" class="form-control" id="validationDefault03" placeholder="Email" required name="email" value="{{$user->email}}">
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                   <div class="col-md-6 mb-3">
                    <label for="validationDefault03">Paypal Email</label>
                    <input type="email" class="form-control" placeholder="Paypal Email" required name="paypal_email" value="{{$user->paypal_email}}">
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                  <label for="validationDefault03">Full street address line 1</label>
                   <input type="text" class="form-control" name="street_address_1" placeholder="Full street address line 1" value="{{$user->street_address_1}}">
                 </div>

                 <div class="col-md-6 mb-3">
                  <label for="validationDefault03">Full street address line 2</label>
                   <input type="text" class="form-control" name="street_address_2" placeholder="Full street address line 2" value="{{$user->street_address_2}}">
                 </div>
               
                <div class="col-md-6 mb-3">
                  <label for="validationDefault03">Full street address line 3</label>
                   <input type="text" class="form-control" name="street_address_3" placeholder="Full street address line 3" value="{{$user->street_address_3}}">
                 </div>


                  <div class="col-md-3 mb-3">
                    <label for="validationDefault04">City</label>
                      <input type="text" class="form-control" name="city" placeholder="City" value="{{$user->city}}" required>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
                  </div>
 
                  <div class="col-md-3 mb-3">
                 <div class="mw370">
                   <label for="validationDefault02" class="zilla_slablight">Country</label>
                   <input type="text" class="form-control" name="country" placeholder="Country" value="{{$user->country}}" required>
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                 <div class="mw370">
                   <label for="validationDefault01" class="zilla_slablight">State</label>
                   <input type="text" class="form-control" name="state" placeholder="State" value="{{$user->state}}" required>
                  </div>
               </div>
               
                <div class="col-md-3 mb-3">
                <div class="mw370">
                 <label for="validationDefault02" class="zilla_slablight">Zip</label>
                 <input type="text" class="form-control" name="zip" placeholder="Zip" value="{{$user->zip}}">
                </div>
               </div>

               <div class="col-md-3 mb-3">
                    <label for="validationDefault04">Phone</label>
                    <input type="text" class="form-control" id="validationDefault04" placeholder="Phone No" required name="phone_no" value="{{$user->phone_no}}">
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
                  </div>

                </div>
                <button class="btn btn-primary" type="submit">Save</button>
               {!! Form::close() !!}
            </section>
         </div>
      </div>
    </div>
</section>
@stop