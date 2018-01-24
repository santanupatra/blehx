

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
            <a href="{{URL::asset('/')}}following" style="display: inline;" class="dropdown-item">Activity</a>
            <a href="{{URL::asset('/')}}mydonation" style="display: inline;" class="dropdown-item">Backed Projects</a>
            <a href="{{URL::asset('/')}}myproject" style="display: inline;" class="dropdown-item">Created Projects</a>
            <a href="{{URL::asset('/')}}charityprofile" style="display: inline;" class="dropdown-item">Settings</a>
         </p>
      </div>
      <h1 class="mb-2">Created projects</h1>
      <p class="">A place to keep track of all your created projects</p>
   </div>
</section>
<!-- <section class="pt-4 pb-4">
   <div class="container">
      <div class="row">

         <div class="col-lg-9 col-xl-10">
         <div><h3>Created projects</h3></div>
                <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}following">Activity</a>
                <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}mydonation">Backed Projects</a>
                @if($logged_user->type=='C')
                <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}myproject">Created Projects</a>
                  <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}charityprofile">Settings</a>
                @else
                <a class="dropdown-item" style="display: inline;" href="{{URL::asset('/')}}profile">Settings</a>
                @endif
                  <br/>
                  <div><h4>A place to keep track of all your created projects</h4></div>
            <section class="dtls-tab mb-4">
               <div class="container infinite-scroll">
                  <div class="row">
                     @if ($campaigns)
                     @foreach ($campaigns as $campaign)
                     <div class="col-md-4 col-sm-6 mb-3"  style=" cursor:pointer;">
                        <div class="nearlyFunded-item bg-gray">
                           <div>
                              <img class="w-100" src="{{$campaign->photo}}" alt="" style=" height:236px;">
                           </div>
                           <div class="text-center p-3">
                              <span class="text-uppercase font-gray text-left d-block mb-1 font-14 latolight">{{$campaign->category}}</span>
                              <h5 class="text-left mb-2 latosemibold font-20">{{$campaign->title}}</h5>
                              <p class="font-14 my-3 text-left latosemibold font-14">{{substr($campaign->short_description,0,50)}}. </p>
                              <div class="d-flex align-items-center mb-3">
                                 <img width="90px" height="90px" alt="" src="{{$campaign->profile_image}}" style=" border-radius:52px;">
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
                                 <div class="col-4 font-18 font-weight-bold text-left">{{$campaign->duration}} <span class="d-block font-545454 font-weight-normal" style=" font-size:13px;">{{$campaign->duration_type}} ago</span></div>
                              </div>
                           </div>
                           <div class="row d-flex justify-content-center align-items-center">
                              <div class="mb-3">
                                 <a href="{{URL::asset('/')}}campaign/edit/{{$campaign->slug}}" class="btn btn-primary d-inline-block mr-2">Edit</a>
                                 <a href="{{URL::to('')}}/deletecamp/{{$campaign->id}}" class="btn btn-primary bg-red" onclick="return confirm('Are you want to delete this ?')">Delete</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @if(!empty($query))
                     {{ $campaigns->appends($query)->links() }}
                     @else
                     {{ $campaigns->links() }}
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
<section class="pt-5 pb-1">
  <div class="container">
    <div class="d-flex justify-content-center mb-3">
       <h5 class="flex-1 mb-0 font-24">Started</h5>
    </div>
    <ul class="started-profect">
    @if ($campaigns)
      @foreach ($campaigns as $campaign)
        <li>
          <div class="img">
            <img src="{{$campaign->photo}}" alt="">
          </div>
          <div class="mdl">
            <strong>{{$campaign->title}}</strong>
          </div>
          <a href="{{URL::asset('/')}}campaign/edit/{{$campaign->slug}}"> Continue editing </a>
        </li>
        @endforeach
         @if(!empty($query))
         {{ $campaigns->appends($query)->links() }}
         @else
         {{ $campaigns->links() }}
         @endif
      @endif
    </ul>
  </div>
</section>
<!-- <section class="pt-5 pb-">
   <div class="container">
      <div class="d-flex justify-content-center mb-3">
         <h5 class="flex-1 mb-0 font-24">Nearly funded</h5>
         <a href="http://111.93.169.90/team4/crowdfund_new/public/campaign" class="btn btn-outline-secondary btn-sm">VIEW MORE</a>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
            <div class="nearlyFunded-item">
               <div class="pos-relative">
                  <a class="d-block" href="http://111.93.169.90/team4/crowdfund_new/public/campaign/demo-food-campaign">
                  <img style=" height:auto;" alt="" src="http://111.93.169.90/team4/crowdfund_new/storage/uploads/5a0bd9ef7acea.jpeg" class="w-100">
                  </a>
                  <a style=" text-decoration:none;" href="http://111.93.169.90/team4/crowdfund_new/public/campaign/demo-food-campaign" class="besttag bg-red text-white">Support This Project</a>
               </div>
               <div class="p-3">
                  <p class="cat-post pt-2 mb-2">Food</p>
                  <p class="font-14 latolight text-gray"><strong class="text-black">Demo Food Campaign</strong>, Demo Description.</p>
                  <div class="d-flex pb-3">
                     <img style=" height: 20px; " class="rounded-circle mr-3" alt="" src="http://111.93.169.90/team4/crowdfund_new/storage/uploads/5a00568bb890a.png">
                     <div class="font-12">
                        <span class="text-gray">By</span>
                        <a class="text-black" href="#">Charity Name</a>
                     </div>
                  </div>
                  <div class="progress">
                     <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" style="width: 50%" role="progressbar" class="progress-bar bg-red progress-bar-new">50%</div>
                  </div>
                  <ul class="list-unstyled mt-3 mb-0">
                     <li class="font-12">
                        <strong>$500.00</strong> <span class="ml-2 text-gray">pledged</span>
                     </li>
                     <li class="font-12">
                        <strong>50%</strong><span class="ml-2 text-gray">pledged</span>
                     </li>
                     <li class="font-12">
                        <strong>2</strong> <span class="ml-2 text-gray">pledged</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
            <div class="nearlyFunded-item">
               <div class="pos-relative">
                  <a class="d-block" href="http://111.93.169.90/team4/crowdfund_new/public/campaign/campaign-by-tanay">
                  <img style=" height:auto;" alt="" src="http://111.93.169.90/team4/crowdfund_new/storage/uploads/5a0bd9be1b403.jpeg" class="w-100">
                  </a>
                  <a style=" text-decoration:none;" href="http://111.93.169.90/team4/crowdfund_new/public/campaign/campaign-by-tanay" class="besttag bg-red text-white">Support This Project</a>
               </div>
               <div class="p-3">
                  <p class="cat-post pt-2 mb-2">Art</p>
                  <p class="font-14 latolight text-gray"><strong class="text-black">Campaign By Tanay</strong>, dfdfdfdfdfdf.</p>
                  <div class="d-flex pb-3">
                     <img style=" height: 20px; " class="rounded-circle mr-3" alt="" src="http://111.93.169.90/team4/crowdfund_new/storage/uploads/5a00568bb890a.png">
                     <div class="font-12">
                        <span class="text-gray">By</span>
                        <a class="text-black" href="#">Tanay Chatterjee</a>
                     </div>
                  </div>
                  <div class="progress">
                     <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="14" style="width: 14%" role="progressbar" class="progress-bar bg-red progress-bar-new">14%</div>
                  </div>
                  <ul class="list-unstyled mt-3 mb-0">
                     <li class="font-12">
                        <strong>$350.00</strong> <span class="ml-2 text-gray">pledged</span>
                     </li>
                     <li class="font-12">
                        <strong>14%</strong><span class="ml-2 text-gray">pledged</span>
                     </li>
                     <li class="font-12">
                        <strong>1</strong> <span class="ml-2 text-gray">pledged</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
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
