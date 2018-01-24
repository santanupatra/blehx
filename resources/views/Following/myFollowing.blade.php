@extends('layouts.default')
@section('content')

<!-- <section class="login-bnr">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white zilla_slablight font-48">Search Results</h2>
            <p class="text-white font-18 latolight">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
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
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="p-4">
          <h2 class="zilla_slablight">Following</h2>
          <p>Follow creators and Facebook friends and we'll notify you whenever they launch or
            <br>
             back a new project. <a href="#">Learn more</a>.</p>
          <!-- <div class="">
            <a class="btn btn-primary faceBookBtn" href="javascript:void(0)" style=" width:270px; "><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
          </div>
          <p class="small">We'll never post anything on Facebook without your permission.</p> -->
        </div>
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
            <a href="#" class="nav-link">Find Facebook friends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Find creators</a>
          </li>
          <li class="nav-item" id="following">
          <a class="nav-link active" id="flwing">Following <span>{{count($following_list)}}</span> </a>
          </li>
          <li class="nav-item" id="followers">
          <a class="nav-link" id="flwrs">Followers <span>{{count($followers_list)}}</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Blocked <span>0</span> </a>
          </li>
        </ul>
        </div>
      </div>
    </section>
</section>
<section class="bg-white">
  <div class="container">
    <div class="row">
    <div class="col-md-12">
      <div class="p-4">
        <?php //echo '<pre>'; print_r($followers_list);?>
        <ul class="mobius">
        <div id="following_div">
          @foreach($following_list as $following)
            <li>
              <a class="navbar-brand m-0 p-0">
                <img src="{{$following->usr_image}}" onclick="gotoDetails('{{$following->id}}')" style=" cursor:pointer;" alt="" height="100" width="100" class="border: round">
              </a>
              <div class="txt">
                <div class="dta">
                  <strong>{{$following->first_name}} {{$following->last_name}}</strong>
                </div>
                <div class="dta">
                  @if($following->city && $following->state !="")
                  {{$following->city}}
                </div>
                <div class="dta">
                  {{$following->state}}
                </div>
              </div>
              @else
              Not Available
              @endif
            </li>
          @endforeach
        </div>
        <div id="followers_div"  style="display:none">
          @foreach($followers_list as $followers)
          <li>
          <a class="navbar-brand m-0 p-0"><img src="{{$followers->f_usr_image}}" onclick="gotoDetails('{{$followers->id}}')" alt="" style=" cursor:pointer;" height="100" width="100"></a>
          <div class="txt">
            <div class="dta">
              <strong>{{$followers->first_name}} {{$followers->last_name}}</strong>
            </div>
            <div class="dta">
              @if($followers->city && $followers->state !="")
              {{$followers->city}}
            </div>
            <div class="dta">
              {{$followers->state}}
            </div>
          </div>
          @else
          Not Available
          @endif
          </li>
          @endforeach
        </div>
        </ul>
      </div>
    </div>
    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="followers-div">
          <a href="#">Following</a>
          <b>{{count($following_list)}}</b>
        </div>
      </div>
      <div class="col-md-3">
        <div class="followers-div">
          <a href="#">Followers</a>
          <b>{{count($followers_list)}}</b>
        </div>
      </div>
      <div class="col-md-3">
        <div class="followers-div">
          <a>Total projects backed</a>
          <b>0</b>
        </div>
      </div>
      <div class="col-md-3">
        <a href="{{URL::asset('/')}}campaign" class="btn btn-block btn-success">Check out some projects! </a>
      </div>
    </div>
  </div>
</section>
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

  function gotoDetails(id)
    {
        location.href="{{URL::to('/userprofile')}}/"+id;
    }

    $('#following').click(function(){
        $('#flwrs').removeClass(' active');
        $('#flwing').addClass(' active');
        $('#following_div').show();
        $('#followers_div').hide();
    });

  $('#followers').click(function(){
        $('#following_div').hide();
        $('#flwing').removeClass(' active');
        $('#flwrs').addClass(' active');
        $('#followers_div').show();
    });

</script>
@stop