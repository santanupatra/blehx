@extends('layouts.default')
@section('content')
<!-- <section class="login-bnr">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white zilla_slablight font-48">Activity</h2>

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
<section class="mt-5 mb-5">
  <div class="container">
    <div class="">
      <p class="font-18 latolight text-right active-list">
          <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}following">Activity</a>
          <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}mydonation">Backed Projects</a>
          @if($logged_user->type=='C')
          <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}myproject">Created Projects</a>
          <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}charityprofile">Settings</a>
          @else
          <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}profile">Settings</a>
          @endif
      </p>
    </div>
    <h1 class="mb-0">Activity</h1>
  </div>
</section>
    <div class="p-4">
      <!-- <h2 class="text-center zilla_slablight">
        @if($backed==0)
            <h4> You haven't backed any projects!
            Check out our <a href="{{URL::asset('/')}}campaign">Other Project's</a>. We like it and think you might too.
            </h4>
        @else
        <h4>{{$backed}} Project backed.</h4>
        @endif

        @if($follow!=0)
          <h4>{{$follow}} Following.</h4>
        @endif

        @if($followers!=0)
          <h4>{{$followers}} Followers.</h4>
        @endif
      </h2> -->

    </div>
  <!-- <div class="col-md-4 bg-white">
    <div class="p-4">
      <h3 class="zilla_slablight">Following</h3>
      <p class="font-12">
         When you follow creators and your Facebook friends on Kickstarter, you’ll be notified when they back or launch a project. And while you’re exploring, we’ll show you whom has backed each project you find. (You can manage your notification settings <a href="#">here</a>.)
      </p>
      <div class="font-12 mt-5">
            Heads up: We don’t display your pledge amount, just the fact that you’re a proud backer. You can opt out of this feature <a href="#">here</a>.
      </div>
    </div>
  </div> -->
<section class="pt-5 pb-5 bg-white">
  <div class="container">
    <div class="text-center font-20">You haven't backed any projects! Check out our <a href="{{URL::asset('/')}}campaign">Project of the Day</a>. <br>We like it and think you might too.</div>
  </div>
</section>
@stop
