<?php $__env->startSection('content'); ?>
<div id="main-container">
  <div class="container">
    <div id="mma-flash" class="mma">
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-warning fade in" style="margin-bottom:35px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
            <h4>Update: 01/09/2018</h4>
            <p>Due to growing fees on various networks and some exchanges raising their minimum deposit thresholds we have raised the minimum payout threshold for Bitcoin, Litecoin and Zcash. Click <a href="#" data-toggle="modal" data-target="#ModalPayoutTreshold" title="here">here</a> for a complete list, but for easy reference the changed values are:</p>
            <ul style="margin-top:10px;">
              <li>Bitcoin 0.005 BTC (was 0.003)</li>
              <li>Ethereum 0.075 ETH (was 0.05)</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12"></div>
      </div>
    </div>
    
    <!-- hash power -->
    <div id="current-mining" class="mma mma-bc1">
      <div class="row">
        <div class="col-sm-2">
          <div class="cmg cmg-1"> <span class="fa fa-btc fa-3x"></span>
            <div class="cmc"> <b>0.0000 TH/s</b>
              <p>Bitcoin <small>Hashrate</small> </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="cmg cmg-2"> <span class="fa fa-cab fa-3x"></span>
            <div class="cmc"> <b>0.0000 MH/s</b>
              <p>Litecoin <small>Hashrate</small> </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="cmg cmg-3"> <span class="fa fa-dashcube fa-3x"></span>
            <div class="cmc"> <b>0.0000 MH/s</b>
              <p>Dash (X11) <small>Hashrate</small> </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="cmg cmg-4"> <span class="fa fa-flash fa-3x"></span>
            <div class="cmc"> <b>0.0000 MH/s</b>
              <p>Ether <small>Hashrate</small> </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="cmg cmg-5"> <span class="fa fa-dollar fa-3x"></span>
            <div class="cmc"> <b>0.0000 H/s</b>
              <p>Zcash <small>Hashrate</small> </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="cmg cmg-5"> <span class="fa fa-btc fa-3x"></span>
            <div class="cmc"> <b>0.0000 H/s</b>
              <p>Monero <small>Hashrate</small> </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">&nbsp;</div>
      </div>
    </div>
    <!-- hashing power --> 
    
    <!-- button boxes -->
    <div id="current-mining-boxes" class="mma mma-bc1">
      <div class="row">
        <div class="col-sm-6">
          <div class="cmb-allocate">
            <h3>Mining Allocation</h3>
            <p>Allocate your hashpower</p>
            <a href="#" role="button" class="btn btn-primary mining-hp-allocation pull-right">
              <span class="fa fa-tag"></span>Configure miners</a>
              <i class="fa  fa-bar-chart-o fa-3x icon gm-icon-dashboard-mining-allocation"></i>
            </div>
        </div>
        <div class="col-sm-6">
          <div class="cmb-upgrade">
            <h3>Buy Hashpower</h3>
            <p>Purchase more hashpower</p>
            <a href="#" role="button" class="btn btn-warning order-hp-dash pull-right"><span class="fa fa-bolt"></span>Buy Hashpower</a>
            <i class="fa fa-line-chart fa-3x icon gm-icon-dashboard-upgrade-hashpower"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- button boxes -->
    
    <div id="my-earnings-sha256" class="mma mma-bc1">
      <div class="row">
        <h2 class="col-sm-12"><span></span>Earnings chart - Bitcoin</h2>
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-6">
                  <p>Earnings in USD</p>
                </div>
                <div class="col-sm-6">
                  <div class="pull-right panel-btns"></div>
                </div>
              </div>
            </div>
            <div class="panel-body">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="my-earnings-scrypt" class="mma mma-bc1">
      <div class="row">
        <h2 class="col-sm-12"><span></span>Earnings chart - Litecoin</h2>
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-6">
                  <p>Earnings in USD</p>
                </div>
                <div class="col-sm-6">
                  <div class="pull-right panel-btns"></div>
                </div>
              </div>
            </div>
            <div class="panel-body">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>