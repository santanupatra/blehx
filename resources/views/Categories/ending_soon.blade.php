@extends('layouts.default')
@section('content')

<section class="login-bnr">
      <div class="container">
        <div class="d-flex align-items-center innr">
          <div>
            <h2 class="text-white zilla_slablight font-48">Search Results</h2>
            <p class="text-white font-18 latolight">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          </div>
        </div>
      </div>
    </section>
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


    <section class="mt-3">
      <div class="container">
        <div class="row">
          
         
        </div>
      </div>
    </section>
     <section class="dtls-tab mb-4">
     <h1>Explore {{number_format($total_live_project)}} live projects</h1>
      <div class="container infinite-scroll">
          
        <div class="row">

           @if ($campaigns)
           @foreach ($campaigns as $campaign)  
               <div class="col-md-4 col-sm-6 mb-3" onclick="gotoDetails('{{$campaign->slug}}')" style=" cursor:pointer;">
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
                  <div class="col-4 font-18 font-weight-bold text-left">{{$campaign->duration}} <span class="d-block font-545454 font-weight-normal">{{$campaign->duration_type}} ago</span></div>
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
    function sortby(params)
    {
        $("#sort_by").attr("value",params);
        $("#searchform").submit();
    }
    function submitform()
    {
        $("#searchform").submit();
    }
    function gotoDetails(slug)
    {
        location.href="{{URL::to('/campaign')}}/"+slug;
    }
</script>
@stop


