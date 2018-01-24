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
          <div class="col-lg-6 mb-2">
            <div class="d-flex align-items-center">
              <a class="mr-2 font-16 latosemibold">Sort by: </a>
              <a class="mr-2 font-theme font-16 latosemibold" href="javascript:void(0)" onclick="sortby('id')">Newest </a>
              <a class="mr-2 font-red font-16 latosemibold" href="javascript:void(0)" onclick="sortby('avg_rateing')">Popularity</a>
              <a class="mr-2 font-red font-16 latosemibold" href="javascript:void(0)" onclick="sortby('end_date')">End Date</a>
              <a class="mr-2 font-red font-16 latosemibold" href="javascript:void(0)" onclick="sortby('total_donation')">Most Funded</a>
              <a class="mr-2 font-red font-16 latosemibold" href="javascript:void(0)" onclick="sortby('total_bakers')">Most Backed</a>
            </div>
          </div>
          <div class="col-lg-6">
              <form method="get" id="searchform">
                  <input type="hidden" id="sort_by" name="sort">
                  <input type="hidden" name="title" value="{{!empty($query['title'])?$query['title']:''}}">
                    <div class="d-flex align-items-center justify-content-end">
                      <span class="mr-2 font-16 latosemibold">Filter By: </span>
                      <select class="form-control form-control-sm w145 mr-2 latosemibold" name="category_id" onchange="submitform()">
                        <option value="">All Categories</option>
                        @foreach($categories as $key=> $category)
                        <option  value="{{$key}}" {{(!empty($query['category_id']) and $query['category_id']==$key)?'selected':''}}>{{$category}}</option>
                        @endforeach
                      </select>
                    </div>
              </form>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-4 pb-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
          {{$count_current_campaign}} Project's Live
            <div class="slider">
			        <div id="slider" class="flexslider">
                <img src="{{$heighest_donated_campaign->campaign_photo}}" onclick="gotoDetails('{{$heighest_donated_campaign->slug}}')" class="mw-100" style="cursor:pointer;" />
			        </div>
			      </div>
            </div>
          <div class="col-lg-6">
            <div>
              <span class="font-gray font-14">{{$heighest_donated_campaign->category->name}}</span>
              <h2 class="font-weight-bold font-24">{{$heighest_donated_campaign->title}}</h2>
              <p class="font-gray font-14">{{$heighest_donated_campaign->short_description}}</p>
              <div class="d-flex mt-3 mb-3">
                <div class="flex-1 d-flex align-items-center">
                  <img src="{{$heighest_donated_campaign->profile_photo}}" alt="" height="45px" width="45px">
                  <p class="font-14 mb-0 ml-2 font-theme">by {{$heighest_donated_campaign->username}}</p>
                </div>
                <div class="flex-1 d-flex align-items-center justify-content-end  font-theme font-14">
                  <span class="ion-ios-location"></span>  {{$heighest_donated_campaign->location}}
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="progress br20 mb-3">
                    <div class="progress-bar bg-red br20" role="progressbar" style="width: {{$heighest_donated_campaign->total_funded.'%'}}" aria-valuenow="{{$heighest_donated_campaign->total_funded}}" aria-valuemin="0" aria-valuemax="100">{{$heighest_donated_campaign->total_funded}}%</div>
                  </div>
                </div>
                <div class="col-3 dtl-prg-dwn font-18 font-weight-bold">${{$heighest_donated_campaign->goal}}
                 <span class="d-block font-545454 font-weight-normal font-16">pledged</span></div>
                <div class="col-3 font-18 font-weight-bold">{{$heighest_donated_campaign->total_funded}}% <span class="d-block font-545454 font-weight-normal font-16">funded</span></div>
                <div class="col-3 font-18 font-weight-bold">{{$heighest_donated_campaign->total_bakers}} <span class="d-block font-545454 font-weight-normal font-16">backers</span></div>
                <div class="col-3 font-18 font-weight-bold">{{$heighest_donated_campaign->duration}} <span class="d-block font-545454 font-weight-normal font-16">{{$heighest_donated_campaign->duration_type}} ago</span></div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dtls-tab mb-4">
      <div class="container infinite-scroll">
        <div class="row">
           @if($count_current_campaign==0)
            <h4>No Project Available</h4>
            @else
           @foreach($campaigns as $campaign)  
               <div class="col-md-4 col-sm-6 mb-3" onclick="gotoDetails('{{$campaign->slug}}')" style="cursor:pointer;">
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


