

@extends('layouts.default')
@section('content')
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
@if (count($errors) > 0)
<div class="alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
@php
static $index = 0
@endphp
<section>
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      </ol>
      <div class="carousel-inner">
         @if(!empty($banners))
         @foreach($banners as $key=> $banner)
         <div class="carousel-item {{$key==0?'active':''}}">
            <section class="homebanner" style=' background-image:url({{$banner->bannerpath->path}}) !important;'>
               <div class="container">
                  <div class="inner d-flex justify-content-center align-items-center">
                     <div class="d-inline-block homebannerText text-center">
                        <h1 class="text-white zilla_slablight font-60">{{$banner->title}}</h1>
                        <p class="text-white latolight font-18"> {{$banner->description}} </p>
                        <a class="btn btn-danger bg-red latosemibold font-18" href="{{URL::asset('/signup')}}">Get Started Now</a>
                     </div>
                  </div>
               </div>
            </section>
         </div>
         @endforeach
         @endif
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
   </div>
</section>
<section class="pt-5 pb-">
   <div class="container">
      <div class="d-flex justify-content-center mb-3">
         <h5 class="flex-1 mb-0 font-24">Nearly funded</h5>
         <a  class="btn btn-outline-secondary btn-sm" href="{{URL::asset('/campaign')}}">VIEW MORE</a>
      </div>
      <div class="row">
         @if (!empty($campaigns))
         @foreach ($campaigns as $campaign)
         <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
            <div class="nearlyFunded-item">
               <div class="pos-relative">
                  <a href="{{URL::asset('/')}}campaign/{{$campaign->slug}}" class="d-block">
                  <img class="w-100" src="{{$img_path.pathinfo($campaign->imgpath->path, PATHINFO_BASENAME)}}" alt="" style=" height:auto;">
                  </a>
                   <a class="besttag bg-red text-white" href="{{URL::asset('/')}}campaign/{{$campaign->slug}}" style=" text-decoration:none;">Support This Project</a>
               </div>
               <div class="p-3">
                  <p class="cat-post pt-2 mb-2">{{$campaign->cat_name}}</p>
                  <p class="font-14 latolight text-gray"><strong class="text-black">{{$campaign->title}}</strong>, {{substr($campaign->short_description,0,100)}}.</p>
                  <div class="d-flex pb-3">
                     <img src="{{$campaign->profile_image}}" alt="" class="rounded-circle mr-3" style=" height: 20px; ">
                     <div class="font-12">
                        <span class="text-gray">By</span>
                        <a href="#" class="text-black">{{$campaign->username}}</a>
                     </div>
                  </div>
                  <div class="progress">
                     <div class="progress-bar bg-red progress-bar-new" role="progressbar" style="width: {{$campaign->funded.'%'}}" aria-valuenow="{{$campaign->funded}}" aria-valuemin="0" aria-valuemax="100">{{$campaign->funded}}%</div>
                  </div>
                  <!-- <p class="font-14 latolight my-3">{{substr($campaign->short_description,0,50)}} ...</p>
                     <a class="btn btn-outline-secondary font-15" href="{{URL::to('/campaign/'.$campaign->slug)}}">+ Read More</a> -->
                  <ul class="list-unstyled mt-3 mb-0">
                     <li class="font-12">
                        <strong>${{number_format((float)$campaign->goal, 2, '.', '')}}</strong> <span class="ml-2 text-gray">pledged</span>
                     </li>
                     <li class="font-12">
                        <strong>{{$campaign->funded.'%'}}</strong><span class="ml-2 text-gray">pledged</span>
                     </li>
                     <li class="font-12">
                        <strong>{{$campaign->num_donation}}</strong> <span class="ml-2 text-gray">pledged</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         @endforeach
         @endif
      </div>
   </div>
</section>
<section class="py-5 text-center">
   <div class="container">
       <div class="d-flex justify-content-center mb-3" style=" text-align:left;">
         <h5 class="flex-1 mb-0 font-24">Discover Charities</h5>
      </div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
         </ol>
         <div class="carousel-inner">
            @for($i=0;$i<ceil($total_charity/4);$i++)
            <div class="carousel-item {{$i==0?'active':''}}">
               <div class="row">
                  @for($j=1;$j<=4;$j++)
                  @if(!empty($charities[$index]))
                  <div class="col-3">
                     <a href="{{URL::asset('/')}}allcampaigns/{{$charities[$index]->slug}}"><img src="{{$charities[$index]->campimg}}" class="img-fluid" style=" height:225px; width:225px;"></a>
                  </div>
                  @endif    
                  @php
                  $index =$index+1
                  @endphp    
                  @endfor
               </div>
            </div>
            @endfor                   
         </div>
         <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
         <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 
      </div>
   </div>
</section>
<!--  testimonials  -->
@if ($testimonials)
<section class="testimonials py-5 text-center">
   <div class="container">
      <div id="carouseltestimonials" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">
            @foreach ($testimonials as $key => $testimonial)
            <div class="carousel-item {{$key==1?'active':''}}">
               <div class="row justify-content-center">
                  <div class="col-lg-8 col-test">
                     <h1 class="mb-4 font-30">{{$testimonial['title']}}</h1>
                     <h5 class="font-18 font-theme line-hight-30">{{$testimonial['description']}}</h5>
                     <div class="test-pic my-3 mx-auto">
                        <img src="{{$testimonial['user_image']}}" alt="" class="img-responsive" style=" height:84px; width:84px; border-radius:52px;">
                     </div>
                     <h5 class="font-16 font-weight-bold">{{$testimonial['username']}}</h5>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <ol class="carousel-indicators mt-3">
            <li data-target="#carouseltestimonials" data-slide-to="0" class="active"></li>
            <li data-target="#carouseltestimonials" data-slide-to="1"></li>
            <li data-target="#carouseltestimonials" data-slide-to="2"></li>
         </ol>
      </div>
   </div>
</section>
@endif
<script>
   jQuery(document).ready(function() {
           
   	jQuery('#fruitscarousel[data-type="multi"] .item').each(function(){
   		var next = jQuery(this).next();
   		if (!next.length) {
   			next = jQuery(this).siblings(':first');
   		}
   		next.children(':first-child').clone().appendTo(jQuery(this));
   	  
   		for (var i=0;i<2;i++) {
   			next=next.next();
   			if (!next.length) {
   				next = jQuery(this).siblings(':first');
   			}
   			next.children(':first-child').clone().appendTo($(this));
   		}
   	});
           
   });
</script>
@stop

