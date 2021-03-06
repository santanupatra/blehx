@extends('layouts.default')
@section('content')
<section class="prisng-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="prisng-div">
          <div class="page-header">
            <h3 class="h2">Why is it more profitable to mine with <span><strong>BELEHX ?</strong></span></h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="prctxt-div">
          <blockquote class="h5"><strong>Thanks to some great partnerships we have established with hardware producers,</strong> as well as to our large scale purchases, we get better mining prices on our employed technology. This means we buy the hardware cheaper than the market price. What also bears great importance, considering the maintenance costs, is the storage of the miners: we have several farms around the globe, and each location was chosen to fulfill two important criteria: cheap electricity supply and little or no need for cooling.  <br>
          There is much beauty in purchasing and setting up your own hardware, we know that. But it’s for those who are technically very skilled, can solve tricky complications, and generally see the fun in maintaining a complex construction rather than in earning profit with it. For most people these are annoying, unnecessary difficulties, and our solution is targeted exactly at them. To put it simple, our service is providing a better mining experience at a lower bitcoin mining cost. <br><br>
          There are many who tell us that they can mine cheaper by themselves according to their calculations. However, it always turned out that they forgot about one or more of the above listed costs. We did our calculations, and we think it's impossible to mine more profitably on a smaller scale, at home and by yourself.           
          </blockquote> 
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<section class="ptab-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ptab-div">


    <section id="tabbed">
      <!-- First tab input and label -->
      <input id="t-1" name="tabbed-tabs" type="radio" checked="checked" />
      <label for="t-1" class="tabs shadow"><i class="fa fa-btc"></i> Bitcoin</label>
      <!-- Second tab input and label -->
      <input id="t-2" name="tabbed-tabs" type="radio" />
      <label for="t-2" class="tabs shadow"><i class="fa fa-cab"></i> Litecoin</label>
      <!-- Third tab input and label -->
      <input id="t-3" name="tabbed-tabs" type="radio" />
      <label for="t-3" class="tabs shadow"><i class="fa fa-flash"></i> Ethereum </label>
      <!-- Tabs wrapper -->
      <div class="wrapper shadow">

        <!-- Tab 1 content -->
        <div class="tab-1">
          <div class="inner-tabsection">
            <div class="row">
              @foreach($bitcoins as $bitcoin)
              <div class="col-md-3">
                <div class="inner-tabdiv">
                  <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h5 class="text-uppercase text-center">
                          <strong><i class="fa fa-hand-o-right"></i> In stock</strong>
                        </h5>
                      </div>
                    <div class="panel-body">
                      <h3 class="text-center text-uppercase">{{$bitcoin->name}}
                        <small>{{$bitcoin->uname}}</small>  
                      </h3>

                      <h1 class="text-center">
                      <strong><sub>$</sub>{{$bitcoin->price}}</strong>                         
                      </h1>

                      <h2 class="text-center">
                      {{$bitcoin->hashrate}} {{$bitcoin->hashrate_type}}                        
                      </h2>
                    <p class="text-center">{{$bitcoin->description}}</p>
                    <a href="{{URL::to('/service/details/')}}/{{$bitcoin->sp_id}}" class="btn btn-block btn-primary text-uppercase">Buy plan</a>                   
                    </div>
                  </div>
                </div>
              </div>
              @endforeach                
            </div>  
          </div>
        </div><!-- / Tab 1 content -->

        <!-- Tab 2 content -->
        <div class="tab-2">
          <div class="inner-tabsection">
            <div class="row">
              @foreach($litecoins as $litecoin)
                <div class="col-md-3">
                  <div class="inner-tabdiv">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                          <h5 class="text-uppercase text-center">
                            <strong><i class="fa fa-hand-o-right"></i> In stock</strong>
                          </h5>
                        </div>
                      <div class="panel-body">
                        <h3 class="text-center text-uppercase">{{$litecoin->name}}
                          <small>{{$litecoin->uname}}</small>  
                        </h3>

                        <h1 class="text-center">
                        <strong><sub>$</sub>{{$litecoin->price}}</strong>                         
                        </h1>

                        <h2 class="text-center">
                        {{$litecoin->hashrate}} {{$litecoin->hashrate_type}}                        
                        </h2>

                      <p class="text-center">{{$litecoin->description}}</p>
                      <a href="{{URL::to('/service/details/')}}/{{$litecoin->sp_id}}" class="btn btn-block btn-primary text-uppercase">
                        Buy plan</a>
                      
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach                      
            </div>  
          </div>
        </div><!-- / Tab 2 content -->

        <!-- Tab 3 content -->
        <div class="tab-3">
          <div class="inner-tabsection">
            <div class="row">
              @foreach($ethereums as $ethereum)
                <div class="col-md-3">
                  <div class="inner-tabdiv">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                          <h5 class="text-uppercase text-center">
                            <strong><i class="fa fa-hand-o-right"></i>In stock</strong>
                          </h5>
                        </div>
                      <div class="panel-body">
                        <h3 class="text-center text-uppercase">{{$ethereum->name}}
                          <small>{{$ethereum->uname}}</small>  
                        </h3>

                        <h1 class="text-center">
                        <strong><sub>$</sub>{{$ethereum->price}}</strong>                         
                        </h1>

                        <h2 class="text-center">
                        {{$ethereum->hashrate}} {{$ethereum->hashrate_type}}                        
                        </h2>

                      <p class="text-center">{{$ethereum->description}}</p>
                      <a href="{{URL::to('/service/details/')}}/{{$ethereum->sp_id}}" class="btn btn-block btn-primary text-uppercase">
                        Buy plan</a>                      
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                  
            </div>  
          </div>
        </div><!-- / Tab 3 content -->

      </div><!-- / Tabs wrapper -->
    </section>


        </div> <!-- ptab-div -->
      </div>
    </div>
  </div>
</section>
@stop