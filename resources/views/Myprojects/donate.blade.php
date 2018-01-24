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
      <h1 class="mb-0">Backed projects</h1>
   </div>
</section>
<!-- <section class="pt-4 pb-4">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-xl-10">
            <div><h4>A place to keep track of all your backed projects</h4></div>
            <section class="dtls-tab mb-4">
               <div class="container infinite-scroll">
                  <div class="row">
                     @if($donations)
                     @if($count_current_donations==0)
                     <h3>You haven't backed any projects! Check out our <a href="{{URL::asset('/')}}campaign">Other Project's</a>. We like it and think you might too.</h3>
                     @else

                     @foreach ($donations as $campaign)
                     <div class="col-md-4 col-sm-6 mb-3"  style=" cursor:pointer;">
                        <div class="nearlyFunded-item bg-gray">
                           <div>
                              <img class="w-100" src="{{$campaign->photo}}" alt="" style=" height:236px;">
                           </div>
                           <div class="text-center p-3">
                              <span class="text-uppercase font-gray text-left d-block mb-1 font-14 latolight">{{$campaign->category}}</span>
                              <h5 class="text-left mb-2 latosemibold font-20">{{substr($campaign->title,0,31)}}</h5>
                              <p class="font-14 my-3 text-left latosemibold font-14">{{substr($campaign->short_description,0,50)}}. </p>
                              <div class="d-flex align-items-center mb-3">
                                 <img  alt="" src="{{$campaign->profile_image}}" style=" border-radius:52px; height:90px; width:90px">
                                 <p class="font-14 mb-0 ml-2 font-theme">by {{$campaign->username}}</p>
                              </div>
                              <div class="row">
                                 <div class="col-12">
                                    <div class="progress br20 mb-3">
                                       <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$campaign->funded}}" style="width: {{$campaign->funded.'%'}}" role="progressbar" class="progress-bar bg-red br20">{{$campaign->funded}}%</div>
                                    </div>
                                 </div>
                                 <div class="col-4 dtl-prg-dwn font-18 font-weight-bold text-left">${{number_format((float)$campaign->goal, 2, '.', '')}} <span class="d-block font-545454 font-weight-normal">pledged</span></div>
                                 <div class="col-4 font-18 font-weight-bold  text-left">{{$campaign->funded}}% <span class="d-block font-545454 font-weight-normal">funded</span></div>
                                 <div class="col-4 font-18 font-weight-bold text-left">{{$campaign->duration}} <span class="d-block font-545454 font-weight-normal" style="font-size:13px;">{{$campaign->duration_type}} ago</span></div>
                              </div>
                           </div>
                           <div class="row d-flex justify-content-center align-items-center">
                              <div class="mb-3">
                                     <a href="" class="btn btn-primary bg-red">${{number_format((float)$campaign->amount, 2, '.', '')}}</a>
                                     <a href="{{URL::asset('/campaign/'.$campaign->slug)}}" class="btn btn-primary d-inline-block mr-2">View</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @endif

                     @if(!empty($query))
                     {{ $donations->appends($query)->links() }}
                     @else
                     {{ $donations->links() }}
                     @endif
                     @endif
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   </div>
</section> -->
<section class="pt-5 pb-5 bg-white">
  <div class="container">
    <p class="text-center">A place to keep track of all your backed projects</p>
    <div class="text-center font-20">You haven't backed any projects! Check out our <a href="{{URL::asset('/')}}campaign"> Other Project's </a>. <br> We like it and think you might too.</div>
  </div>
</section>
<script src="{{ URL::asset('assets/js/jquery.jscroll.js') }}"></script>
<script type="text/javascript">
   $(function() {
           $('ul.pagination').hide();
           $('.infinite-scroll').jscroll({
           autoTrigger: true,
           loadingHtml: "<img class='center-block' src='' alt='Loading...' />",
           padding: 0,
           nextSelector: '.pagination li.active + li a',
           contentSelector: 'div.infinite-scroll',
           callback: function() {
               $('ul.pagination').remove();
           }
       });



   });
</script>
@stop
