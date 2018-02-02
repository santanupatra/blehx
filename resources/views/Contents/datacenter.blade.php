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


<section class="datamine-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h2 class="text-uppercase h2">Our Bitcoin Farms</h2>
        </div>
      </div>
    </div>
    
    <div class="datamine-div">
      <div class="row">
        <div class="col-md-6">
          <div class="datamine-txtdiv">
            <h4>
              <img src="{{ URL::asset('assets/img/ethe.png') }}" alt="" class="img-responsive"> 
               Enigma Ethereum Mine 
            </h4>

            <p class="h5">
              The world’s largest Ethererum Mining farmis specifically built to support the Ethereum Project: A decentralized network that runs smart contracts. Ethereum is mined via GPUs (graphics cards) which requires us to build mining rigs to meet specifications. Our Scrypt mining Cryptocurrency applications run exactly as programmed without any possibility of downtime, censorship, fraud or third party interference.
              
              <a href="#" class="btn btn-primary2 btn-mine" title="Start mining Ethereum" data-toggle="modal"
              data-target="#myModal2">Start mining Ethereum</a>
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="datamine-vediodiv">
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/_ZhuCGyd_xs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>           
          </div>          
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="datamine-vediodiv">
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/_ZhuCGyd_xs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>           
          </div>          
        </div>

        <div class="col-md-6">
          <div class="datamine-txtdiv">
            <h4>
              <i class="fa fa-btc"></i> 
               Bitcoin Mining Facility  
            </h4>

            <p class="h5">
              This is one of our farms for the primary mining effort: Bitcoin. Most cryptocurrencies work with algorithms that need specially designed hardware for optimal mining performance. In the case of Bitcoin mining, modern technology is constantly in development. This farm is built with bitcoin farming hardware from our partners, high-performance computing experts Spondoolies Tech.
              
              <a href="#" class="btn btn-primary2 btn-mine" title="Start mining Ethereum" data-toggle="modal"
              data-target="#myModal3">Start mining Bitcoin</a>
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="datamine-txtdiv">
            <h4>
              <img src="images/dash.png" alt="" class="img-responsive"> 
               Dash Mining Facility 
            </h4>

            <p class="h5">
              A bitcoin mining data center that is processing the X11 algorithm was fundamentally different from other build outs as it was primarily utilizing GPU (Graphics Processing Unit) bitcoin mining hardware rather than ASIC (Application-Specific Integrated Circuit) devices that are used today. Cryptocurrencies that are utilizing the X11 algorithm are for Dash and other similar virtual currencies.
              
              <a href="#" class="btn btn-primary2 btn-mine" title="Start mining Ethereum" data-toggle="modal"
              data-target="#myModal3">Start mining Dash</a>
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="datamine-vediodiv">
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/_ZhuCGyd_xs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>           
          </div>          
        </div>
      </div>


    </div>
  </div>
</section>
<div class="clearfix"></div>

@stop
