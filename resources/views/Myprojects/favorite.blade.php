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
@if(session()->has('warning'))
<div class="alert alert-danger">
       {{ session()->get('warning') }}
</div>
@endif

<section class="mt-5 mb-5">
   <div class="container">
      <h1 class="mb-0">Activity</h1>
      <p class="font-18 mt-2 mb-3">We’ll send you a reminder 48 hours before each project ends.</p>
   </div>
</section>

<section class="pt-4 pb-4">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-xl-10">
          <div>
            <h3 class="font-22 mb-5">Saved projects</h3>
          </div>
            <section class="dtls-tab mb-4">
               <div class="container infinite-scroll">
                  <div class="row">
                     @if($favorites)
                     @foreach($favorites as $campaign)
                       @php $end_date=strtotime($campaign->end_date);
                            $curr_date=time();
                            $date_diff=$end_date-$curr_date;
                            $count_day=floor($date_diff / (60 * 60 * 24))+1;
                       @endphp
                     <div class="col-lg-3 col-md-4 col-sm-6 mb-3" onclick="gotoDetails('{{$campaign->slug}}')" style=" cursor:pointer;">
                        <div class="nearlyFunded-item bg-gray nearlyFunded-item-rel">
                          <div class="cls-btn">
                            <i class="ion-android-close"></i>
                          </div>
                           <div>
                              <img class="w-100" src="{{$campaign->photo}}" alt="" style=" height:165px;">
                           </div>
                           <div class="text-center p-3">
                              <!-- <span class="text-uppercase font-gray text-left d-block mb-1 font-14 latolight">{{$campaign->category}}</span>
                              <h5 class="text-left mb-2 latosemibold font-20">{{substr($campaign->title,0,30)}}</h5> -->
                              <p class="font-14 mb-2 text-left latosemibold font-14">{{substr($campaign->short_description,0,50)}}. </p>
                              <!-- <div class="d-flex align-items-center mb-3">
                                 <img width="90px" height="90px" alt="" src="{{$campaign->profile_image}}" style=" border-radius:52px;">
                                 <p class="font-14 mb-0 ml-2 font-theme">by {{$campaign->username}}</p>
                              </div> -->
                              <div class="row">
                                 <div class="col-12">
                                    <div class="progress br20 mb-3">
                                       <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$campaign->funded}}" style="width: {{$campaign->funded.'%'}}" role="progressbar" class="progress-bar bg-red br20">{{$campaign->funded}}%</div>
                                    </div>
                                 </div>
                                 <div class="col-4 dtl-prg-dwn font-12 font-weight-bold text-left">${{number_format((float)$campaign->goal, 2, '.', '')}} <span class="d-block font-545454 font-weight-normal">pledged</span></div>
                                 <div class="col-4 font-12 font-weight-bold  text-left">{{$campaign->funded}}% <span class="d-block font-545454 font-weight-normal">funded</span></div>
                                 <div class="col-4 font-12 font-weight-bold text-left">{{$campaign->duration}} <span class="d-block font-545454 font-weight-normal">{{$campaign->duration_type}} ago</span></div>

                                 <!-- <?php if($count_day<0){?>
                                 <p>Ended</p>
                                 <?php } else if ($count_day<9 && $count_day>1) {?>
                                  <p>Ending On,<?php echo $count_day?> Day's Remaining </p>
                                  <?php }
                                  else if ($count_day==0) {?>
                                  <p>Ending On, Today</p>
                                  <?php } else{?>
                                 <p>Ending On, <?php echo date('l, jS F Y', $end_date);?></p>
                                 <?php }?> -->

                              </div>
                           </div>
                           <div class="row d-flex justify-content-center align-items-center">
                              <div class="mb-3">
<!--                                 <a href="javascript:void(0)" class="btn btn-primary d-inline-block mr-2">Edit</a>-->
<!--                                 <a href="{{URL::to('')}}/unfavorite/{{$campaign->campid}}" class="btn btn-primary bg-red" onclick="return confirm('Are you want to unfavorite this ?')">Unfavorite</a>-->
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @if(!empty($query))
                     {{ $favorites->appends($query)->links() }}
                     @else
                     {{ $favorites->links() }}
                     @endif
                     @endif
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
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

  function gotoDetails(slug)
    {
        location.href="{{URL::to('/campaign')}}/"+slug;
    }
</script>
@stop
