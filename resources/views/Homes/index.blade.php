@extends('layouts.default')
@section('content')


<div class="clearfix"></div>

<div id="wowslider-container1">
  <div class="ws_images">
    <ul>
      <li><img src="{{ URL::asset('assets/img/s.jpg') }}"  id="wows1_0"/></li>
      <li><img src="{{ URL::asset('assets/img/s1.jpg') }}" id="wows1_1"/></li>
    </ul>
  </div>
</div>
<div class="clearfix"></div>

<section class="welcome-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="welcome-div">
          <div class="page-header">
            <h2 class="h2">Welcome To <span><strong>BELEHX</strong></span></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <div class="txt-div">
          <p class="text-left"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut saepe, perspiciatis, reiciendis facere consequuntur provident. </strong><br><br>
          Alias, non, blanditiis! Ex soluta in perspiciatis animi cupiditate aut ad debitis, excepturi, repudiandae accusantium quis atque minus ratione suscipit esse.<br>
          Alias, non, blanditiis! Ex soluta in perspiciatis animi cupiditate aut ad debitis, excepturi, repudiandae accusantium quis atque minus ratione suscipit esse eius laudantium temporibus voluptas eveniet nobis ab itaque laborum.Alias, non,blanditiis! <br><br>
          Ex soluta in perspiciatis animi cupiditate aut ad debitis, excepturi, repudiandae accusantium quis atque minus ratione suscipit esse eius laudantium temporibus voluptas eveniet nobis ab itaque laborum.
          </p>
        </div>
      </div>

      <div class="col-md-5">
        <div class="product-imgdiv">
          <img src="{{ URL::asset('assets/img/p1.png') }}" alt="" class="img-responsive center-block">
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<section class="offer-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="offer-div">
          <h3 class="text-left">The benefits of mining with us. <br>
            <span>We have many reasons to think that no other bitcoin mining system or 
            home built mining rig can top. </span>
          </h3>

          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object img-circle" src="{{ URL::asset('assets/img/m1.jpg') }}" alt="">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading h5 text-uppercase"><strong><i class="fa fa-star-half-full"></i> Smart and unique solution</strong></h4>
              <p>Until August 2014 we were specializing on special, unique, and smart Bitcoin mining techniques.[...]
                <a href="#" class="btn btn-sm text-uppercase">Click Here</a>
              </p>
            </div>
          </div>

          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object img-circle" src="{{ URL::asset('assets/img/m2.jpg') }}" alt="">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading h5 text-uppercase"><strong><i class="fa fa-star-half-full"></i> Cryptocurrency Mining Profitability</strong></h4>
              <p>No matter which package you choose, you are renting the latest technology, which guarantees profitability. [...]
                <a href="#" class="btn btn-sm text-uppercase">Click Here</a>
            </p>
            </div>
          </div>

          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object img-circle" src="{{ URL::asset('assets/img/m3.jpg') }}" alt="">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading h5 text-uppercase"><strong><i class="fa fa-star-half-full"></i> Mining becomes a pleasant experience</strong></h4>
              <p>First of all when you decide for a contract with us you can forget about the complicated set up. [...]
                <a href="#" class="btn btn-sm text-uppercase">Click Here</a>
            </p>
            </div>
          </div>


          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object img-circle" src="{{ URL::asset('assets/img/m4.jpg') }}" alt="">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading h5 text-uppercase"><strong><i class="fa fa-star-half-full"></i> Real company with real people working for it</strong></h4>
              <p>We see many other companies, even very well known ones with excessive advertisement that don't. [...]
                <a href="#" class="btn btn-sm text-uppercase">Click Here</a>
            </p>
            </div>
          </div>                        
        </div>
      </div>

      <div class="col-md-5">
        <div class="whychoose-div">
          <h3 class="text-left">Why Choose <strong>BELEHX</strong>?</h3>
          <p><strong class="text-danger">Belehx</strong> offers you a smart and easy way to invest your money. Our bitcoin mining system is suitable for those who are new to the world of crypto currencies, as well as for cryptocurrency experts and large-scale investors. <br><br>
          <strong class="text-danger">Belehx</strong> is the World’s first large scale multi-algorithm cloud mining service offering an alternative to those who would like to engage in Bitcoin and altcoin mining.</p>

          <div class="whyimg-div">
            <img src="{{ URL::asset('assets/img/blx.png') }}" alt="" class="img-responsive center-block img-circle">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<section class="service-section">
  <div class="container">
    <div class="row">
      <div class="page-header">
        <h3 class="text-left">Start Mining <strong>TODAY</strong>?</h3>
      </div>

      <div class="service-div">
        <div class="col-md-4">
          <div class="thumbnail">
              <img src="{{ URL::asset('assets/img/b1.jpg') }}" alt="" class="img-responsive center-block">
              <div class="caption">
                <h4 class="text-uppercase"><strong>Bitcoin</strong></h4>
                <p class="text-left h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis recusandae totam tempore esse cumque dolore temporibus!</p>
                <p class="text-left"><a href="pricing.html" class="btn bn" role="button">Click Here</a></p>
              </div>
          </div>          
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
              <img src="{{ URL::asset('assets/img/b2.jpg') }}" alt="" class="img-responsive center-block">
              <div class="caption">
                <h4 class="text-uppercase"><strong>Ethereum</strong></h4>
                <p class="text-left h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis recusandae totam tempore esse cumque dolore temporibus!</p>
                <p class="text-left"><a href="pricing.html" class="btn bn" role="button">Click Here</a></p>
              </div>
          </div>          
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
              <img src="{{ URL::asset('assets/img/b3.jpg') }}" alt="" class="img-responsive center-block">
              <div class="caption">
                <h4 class="text-uppercase"><strong>Litecoin</strong></h4>
                <p class="text-left h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis recusandae totam tempore esse cumque dolore temporibus!</p>
                <p class="text-left"><a href="pricing.html" class="btn bn" role="button">Click Here</a></p>
              </div>
          </div>            
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<section class="datacenter-section">
  <div class="container">
    <div class="row">
      <div class="page-header">
        <h2 class="h2">Our Bitcoin <span><strong>FARMS</strong></span></h2>
      </div>  
      <p>These bitcoin mining farms represent only a fraction of the farms we own. The other bitcoin mining farms are not shown because customer protection and security are a high priority for us. We can only set up video cameras at locations that are not critical and we do so without disclosing sensitive information or critical intellectual property.</p>
      <hr>    
      <div class="datacenter-div">
        <div class="col-md-4">
          <div class="alert alert-info">
            <h4 class="text-uppercase"><strong><i class="fa fa-btc"></i> Enigma Ethereum Mine </strong></h4> 
            <p>The world’s largest Ethererum Mining farm, which is specifically built to support the Ethereum Project: A decentralized platform that runs smart contracts. <br>
              <a href="datacenter.html" class="btn btn-danger btn-sm">Click Here</a>  
            </p>
          </div>

          <div class="alert alert-warning">
            <h4 class="text-uppercase"><strong><i class="fa fa-bitcoin"></i> Bitcoin Mining Facility  </strong></h4> 
            <p>This is one of our farms for the primary mining effort: Bitcoin. Most cryptocurrencies work with algorithms that need specially designed hardware for optimal mining performance. <br>
              <a href="datacenter.html" class="btn btn-danger btn-sm">Click Here</a>
            </p>
          </div>

          <div class="alert alert-danger">
            <h4 class="text-uppercase"><strong><i class="fa fa-bitcoin"></i> Dash Mining Facility  </strong></h4> 
            <p>A bitcoin mining data center that is processing the X11 algorithm was fundamentally different from other build outs as it was primarily utilizing GPU. <br>
              <a href="datacenter.html" class="btn btn-danger btn-sm">Click Here</a>
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="datacenter-imgdiv">
            <img src="{{ URL::asset('assets/img/Two-mobiles.png') }}" alt="" class="img-responsive center-block">
          </div>
        </div>

        <div class="col-md-4">
          <div class="datacenter-txtdiv">
            <h3>Managed and Maintained With Genesis Hive <br><br></h3> 
            <p><i class="fa fa-hand-o-right"></i> We have been quietly developing this system since the early start of our business and we are using it to build and maintain our own mining farms with great success. <br><br>

            <i class="fa fa-hand-o-right"></i> Our monitoring tool mining software is everything we hoped it would be. Hive is what enables us to run and expand our mining operation into more digital currency mining operations. <br><br>

            <i class="fa fa-hand-o-right"></i> We are constantly improving Genesis Hive to prepare today’s large scale miners for tomorrow’s needs in the world of mining. <br>
            <hr>
            Find out more about <a href="http://genesis-hive.com/"><i class="fa fa-external-link"></i> Genesis Hive</a>.  
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
