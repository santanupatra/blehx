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
@if(session()->has('warning'))
<div class="alert alert-danger">
       {{ session()->get('warning') }}

    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <section class="login-bnr" style="background-image: url('{{ URL::asset('assets/img/bg/3.png') }}')">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white zilla_slablight font-48">Slice of Life</h2>
            <p class="text-white font-18 latolight">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          </div>
        </div>
      </div>
    </section>


    <section class="pt-5 pb-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="slider">
			        <div id="slider" class="flexslider">
                                  @if($campaign->photos)  
			          <ul class="slides">
                                  @foreach($campaign->photos as $photo)    
                                      
			            <li>
                                        <img src="{{$photo}}" class="img-fluid" />
			  	    		</li>
                                  @endforeach
             
			  	    		
			          </ul>
                                  @endif
			        </div>
			        <div id="carousel" class="flexslider">
                                  @if($campaign->photos)  
   
			          <ul class="slides">
                                   @foreach($campaign->photos as $photo)    

			            <li>
                                        <img src="{{$photo}}" class="img-fluid" />
			  	    </li>
                                    @endforeach
			  	    		
			          </ul>
                                   @endif
			        </div>
			      </div>
            </div>
          <div class="col-lg-6">
            <div>
              <span class="font-gray font-14">{{$campaign->category->name}}</span>
              <h2 class="font-weight-bold font-24">{{$campaign->title}}</h2>
              <p class="font-gray font-14">{{substr($campaign->short_description,0,200)}} </p>
              <div class="d-flex mt-3 mb-3">
                <div class="flex-1 d-flex align-items-center">
                    <img src="{{$campaign->profile_image}}" alt="" height="45px" width="45px" style=" border-radius:52px;">
                  <p class="font-14 mb-0 ml-2 font-theme">by {{$campaign->username}}</p>
                </div>
                <div class="flex-1 d-flex align-items-center justify-content-end  font-theme font-14">
                  <span class="ion-ios-location"></span>  {{$campaign->location}}
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="progress br20 mb-3">
                    <div class="progress-bar bg-red br20" role="progressbar" style="width: {{$campaign->funded}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$campaign->funded}}%</div>
                  </div>
                </div>
                <div class="col-3 dtl-prg-dwn font-18 font-weight-bold">${{number_format($campaign->goal)}} <span class="d-block font-545454 font-weight-normal font-16">pledged</span></div>
                <div class="col-3 font-18 font-weight-bold">{{$campaign->funded}}% <span class="d-block font-545454 font-weight-normal font-16">funded</span></div>
                <div class="col-3 font-18 font-weight-bold">{{$campaign->total_donate_user}} <span class="d-block font-545454 font-weight-normal font-16">backers</span></div>
                <div class="col-3 font-18 font-weight-bold">{{$campaign->duration}} <span class="d-block font-545454 font-weight-normal font-16">{{$campaign->duration_type}} ago</span></div>
              </div>
              <div class="mt-3">
                <form>
                  <div class="form-row align-items-center">
                    <div class="col-sm-3">
                      <select class="custom-select mb-3 w-100">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    @if(Auth::User())
                      <div class="col-sm-4">
                        <button class="btn btn-danger bg-red btn-block  mb-3">Back this Campaign</button>
                      </div>
                    @endif
                    <div class="col-auto">
                    @if(Auth::User())
                      @if($favourite==0)
                          <a class="btn btn-outline-danger font-red mb-3 btn-sm-block" href="javascript:void(0)" onclick="favorite({{$campaign->id}})"><span class="ion-android-favorite"></span> Save</a>
                      @else
                      <a class="btn btn-outline-danger font-red mb-3 btn-sm-block" href="javascript:void(0)" onclick="favorite({{$campaign->id}})"><span class="ion-android-favorite"></span> Saved </a>
                      @endif
                    @endif

                      @if(Auth::User())
                      @php $user=Auth::User() @endphp
                        @if($campaign->user->id != $user->id)
                          @if($follow!='')
                            @if($follow==0)
                            <a class="btn btn-outline-danger font-red mb-3 btn-sm-block follow" href="javascript:void(0)" onclick="follow({{$campaign->id}})" data-id="0"><span class="ion-android-favorite"></span>Follow</a>
                            @else
                            <a class="btn btn-outline-danger font-red mb-3 btn-sm-block follow" href="javascript:void(0)" onclick="follow({{$campaign->id}})" data-id="1"><span class="ion-android-favorite"></span>Following</a>
                            @endif
                          @endif
                        @endif
                      @endif
                    </div>
                  </div>
                </form>
              </div>
              <p class="font-14 mb-2 mt-2 font-weight-bold font-545454">Share this project</p>
              <ul class=" font-weight-light ft-social-link details-social-link p-0">
                  <li class="d-inline-block m-1 ml-0"><a class="d-flex justify-content-center align-items-center" href="javascript:void(0)" onclick="fbShare()" style="color: #3c5899"><i class="ion-social-facebook"></i></a></li>
                <li class="d-inline-block m-1 ml-0"><a class="d-flex justify-content-center align-items-center"   href="javascript:void(0)" onclick="twittShare()"style="color: #1e9ff3"><i class="ion-social-twitter"></i></a></li>
                <li class="d-inline-block m-1 ml-0"><a class="d-flex justify-content-center align-items-center"   href="javascript:void(0)" onclick="googleShare()"style="color: #dd4a3a"><i class="ion-social-googleplus"></i></a></li>
                <li class="d-inline-block m-1 ml-0"><a class="d-flex justify-content-center align-items-center"   href="javascript:void(0)" onclick="linkdinShare()"style="color: #0078b7"><i class="ion-social-linkedin"></i></a></li>
<!--                <li class="d-inline-block m-1 ml-0"><a class="d-flex justify-content-center align-items-center" href="#" style="color: #555555"><i class="ion-social-youtube"></i></a></li>-->
              </ul>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dtls-tab mb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8 myTabview">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active font-18 font-weight-bold" id="home-tab" data-toggle="tab" href="#menu0" role="tab" aria-controls="home" aria-expanded="true">Campaign Story</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-18 font-weight-bold" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-18 font-weight-bold" id="profile-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="profile">Updates</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-18 font-weight-bold" id="profile-tab" data-toggle="tab" href="#menu3" role="tab" aria-controls="profile">Comments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-18 font-weight-bold" id="profile-tab" data-toggle="tab" href="#menu3" role="tab" aria-controls="profile">Community</a>
              </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
              <div class="tab-pane fade show active" id="menu0" role="tabpanel" aria-labelledby="home-tab">
                  {!! $campaign->description !!}
              </div>
              <div class="tab-pane fade" id="menu1" role="tabpanel" aria-labelledby="profile-tab">b</div>
              <div class="tab-pane fade" id="menu2" role="tabpanel" aria-labelledby="dropdown1-tab">c</div>
              <div class="tab-pane fade" id="menu3" role="tabpanel" aria-labelledby="dropdown2-tab">d</div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-gray br4 p-3 mb-4">
              <h3 class="mt-3 font-24 latosemibold">Support This Project</h3>
              <p class="mb-0 font-18 font-gray">Make a pledge without a reward</p>
                {!! Form::open(['url' => 'donate','method'=>'post','onsubmit'=>"return checklogin()"]) !!}           
                  <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                  <input type="hidden" name="paypal_email" value="{{$campaign->paypal_email}}">

                <div class="form-row align-items-center">
                  <div class="col-12 mt-3">
                    <div class="input-group mb-2 mb-sm-0 rounded-0">
                      <div class="input-group-addon">MX$</div>
                        <input type="text" class="form-control" placeholder="Pledge any amount" name="amount" required="">
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                    <button class="btn btn-block btn-danger bg-red rounded-0 font-weight-bold" type="submit" style=" cursor:pointer;">Continue</button>
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="bg-gray p-3 mb-4 br4">
              <h3 class="mt-3 font-24">Pledge MX$ 100 or more</h3>
              <p>Un granito de arena. A grain of sand.
              Cada peso suma. Te agradeceremos a gritos en
              nuestras redes sociales y pagina web. Gracias
              totales!</p>
              <p class="mb-1 latosemibold">INCLUDES:</p>
              <p class="mb-1">Gracias totales en redes sociales y sitio web.</p>
              <p class=" mb-1 latosemibold">ESTIMATED DELIVERY</p>
              <p class="mb-1">Oct 2017</p>
              <p  class="font-18 mb-0">3 backers</p>
            </div>
          </div>
        </div>
      </div>
    </section>
<link rel="stylesheet" href="{{ URL::asset('assets/css/flexslider.css') }}">
<script type="text/javascript" src="{{URL::asset('/')}}assets/js/jquery.flexslider.js"></script>
<script type="text/javascript">


$(window).on('load', function () {
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: true,
    itemWidth: 100,
    itemMargin: 5,
    asNavFor: '#slider'
  });

  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: true,
    sync: "#carousel"
  });
});
function fbShare()
{
    window.open("https://www.facebook.com/sharer/sharer.php?u={{$campaign->site_url}}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}
function twittShare()
{
    var url="{{$campaign->site_url}}";
    var title="{{$campaign->title}}";
    var descr="{{$campaign->short_description}}";
    var winHeight=600;
    var winWidth=600;
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);
    window.open('//twitter.com/share?url=' + encodeURI(url) + '&text=' + encodeURI(title) + '&via=crowdfund' +'&hashtags=' +encodeURI(descr) , 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
}

function googleShare()
{
        window.open("https://plus.google.com/share?url={{$campaign->site_url}}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}
function linkdinShare()
{
        window.open("https://www.linkedin.com/shareArticle?mini=true&url={{$campaign->site_url}}&title={{$campaign->title}}&summary={{$campaign->short_description}}&source=LinkedIn", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}

function favorite(camp)
{
    var userid="{{!empty($logged_user->id)?$logged_user->id:''}}";
    if(userid=="")
    {
        $("#withoutloginmodal").modal("show");
    }
    else
    {
        $.get("{{URL::to('')}}/campaign/favorite/"+userid+"/"+camp,function(data){
        if(data.Ack==1)
        {
          $('.font-red').html('<span class="ion-android-favorite"></span> Saved');
            alert("You have been favorite successfully");
        }
        else
        {
             alert("You have already favorited this campaign");
        }
            
        },"json");
        
    }
    
}

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

function checklogin()
{
    var userid="{{!empty($logged_user->id)?$logged_user->id:''}}";
    if(userid=="")
    {
        $("#withoutloginmodal").modal("show");
        return false;
    }
}


</script>

  <!-- Modal -->
  <div class="modal fade" id="withoutloginmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Log In</h4>
        </div>
        <div class="modal-body">
          <p>Please Log in first.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
@stop