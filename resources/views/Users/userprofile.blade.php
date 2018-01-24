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
<section class="pt-5 pb-5"> <?php //echo '<pre>'; print_r($user);?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="imagePart text-center mt-3">
            <img src="{{$user->profile_photo}}" class="rounded-circle">
          </div>
           <p class="text-center zilla_slablight imagePart-bnfnt m-0 b-0">
            <strong>{{$user->first_name}} &nbsp; {{$user->last_name}}</strong>
           </p>
           <div class="text-center">
             <span class="mr-2">{{$user->email}}</span>
             <span class="mr-2"><a href="#">{{$user->state}} {{$user->country}}</a></span>
             <span>Joined On, 
               <?php echo date("M",strtotime($user->user_join));?>
               <?php echo date("Y",strtotime($user->user_join));?>
             </span>
           </div>
        </div>
        <div class="col-lg-12 text-center mt-3">
          <button type="button" name="button" class="btn btn-success">Unfollow</button>
        </div>
      </div>
  </div>
</section>
<section class="bg-white">
  <section class="pt-5">
      <div class="border-bottom">
        <div class="container myContainer myContainer-new">

        <ul role="tablist" class="nav nav-tabs setting-nav-tabs border-none">
          <li class="nav-item">
            <a href="#" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Created <span>{{count($user_campaigns)}}</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Backed</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Comments <span>0</span> </a>
          </li>
        </ul>
        </div>
      </div>
    </section>
</section>
<section class="bg-white py-5">
  <div class="container">
    <div class="row">
    @if($user_campaigns)
        @foreach($user_campaigns as $campaign)
           <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
              <div class="nearlyFunded-item">
                 <div class="pos-relative">
                    <a class="d-block" onclick="gotoDetails('{{$campaign->slug}}')">
                    <img style=" height:auto;" alt="" src="{{$campaign->photo}}" class="w-100">
                    </a>
                    <a style=" text-decoration:none;" onclick="gotoDetails('{{$campaign->slug}}')" class="besttag bg-red text-white">Support This Project</a>
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
                    <!-- <p class="font-14 latolight my-3">Demo Description ...</p>
                       <a class="btn btn-outline-secondary font-15" href="http://111.93.169.90/team4/crowdfund_new/public/campaign/demo-food-campaign">+ Read More</a> -->
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
        @endforeach
      @endif
  </div>
  </div>
</section>
<script>
function follow(camp)
  {
      var userid="{{!empty($logged_user->id)?$logged_user->id:''}}";
      if(userid=="")
      {
          $("#withoutloginmodal").modal("show");
      }
      else
      {
        var st=$('.follow').attr('data-id');
        $.get("{{URL::to('')}}/follow/"+userid+"/"+camp+"/"+st,function(data){
        if(data.Ack==1)
        {
          $('.follow').html('<span class="ion-android-favorite"></span> Following');
          $('.follow').attr('data-id',1);
          alert("You have been following");
          location.reload();
        }
        else
        {
            $('.follow').html('<span class="ion-android-favorite"></span> Follow');
            $('.follow').attr('data-id',0);
            alert("Removed form following");
            location.reload();
        }
        },"json");
      }
  }

  function gotoDetails(slug)
    {
        location.href="{{URL::to('/campaign')}}/"+slug;
    }
</script>
@stop
