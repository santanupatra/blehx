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
<section class="pt-4 pb-4">
   <div class="container">
      <div class="row">
         @include('partials.sidebar')
         <div class="col-lg-9 col-xl-10">
         <section class="content-header">
             <h1 style=" float:left;">
                     Dashboard         <small> Organisation Overview </small>
                </h1>
             <form method="get" id="searchform">
                 <select class="form-control" style=" width:30%; float:right;" name="id" onchange="$('#searchform').submit()">
                 <option value="">Filter By Campaign</option>
                 @if(!empty($campaigns))
                 @foreach($campaigns as $key=> $campaign)
                 <option value="{{$key}}" {{(!empty($query['id']) and $query['id']==$key)?'selected':''}}>{{$campaign}}</option>
                 @endforeach
                 @endif
             </select>
             </form>       
            </section>   
             <div class="clearfix"></div>
          <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{number_format((float)$donationamnt, 2, '.', '')}}</h3>
                  <p>Donations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
           <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$total_vistit}}</h3>
                  <p>Total View</p>
                </div>
                <div class="icon">
                  <i class="icon icon ion-ios-eye"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>   
            
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
<!--                  <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                  <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>-->
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Donations</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="area-chart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div>
              </div><!-- /.nav-tabs-custom -->
               <!-- /.box -->

              <!-- solid sales graph -->
              <div class="box box-solid bg-teal-gradient">
                <div class="box-header">
                  <i class="fa fa-th"></i>
                  <h3 class="box-title">Campaigns Visitors Graph</h3>
                  <div class="box-tools pull-right">
<!--                    <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div>
                <div class="box-body border-radius-none">
                  <div class="chart" id="user-chart" style="height: 250px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">

              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    Country wise Donations
                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div><!-- /.box-body-->
               
              </div>
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    Country wise Views
                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map-donate" style="height: 250px; width: 100%;"></div>
                </div><!-- /.box-body-->
               
              </div>
             
            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section>  
         </div>
      </div>
   </div>
   </div>
</section>
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.css') }}">
<link rel="stylesheet" href="{{ asset('la-assets/plugins/morris/morris.css') }}">
<link rel="stylesheet" href="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('la-assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- dashboard -->
<script>
(function($) {
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];  
var campign="{{!empty($query['id'])?$query['id']:''}}";
if(campign!='')
{
var ajaxurl="{{URL::asset('/')}}monthlyreport/"+campign;
}
else
{
    var ajaxurl="{{URL::asset('/')}}monthlyreport";
}
$.get(ajaxurl,function(result){
var data=result.donations;    
 config = {
      data: data,
      xkey: 'month',
      ykeys: ['a'],
      labels: ['Total Income'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      labels: ['2017'],
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
      var month = months[x.getMonth()];
      return month;
   },
  dateFormat: function(x) {
    var month = months[new Date(x).getMonth()];
    return month;
  },
  lineColors:['gray','red']
  };
config.element = 'area-chart';
Morris.Area(config);   

var data=result.visits;    
 config = {
      data: data,
      xkey: 'month',
      ykeys: ['a'],
      labels: ['Total View'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      labels: ['2017'],
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
      var month = months[x.getMonth()];
      return month;
   },
  dateFormat: function(x) {
    var month = months[new Date(x).getMonth()];
    return month;
  },
  lineColors:['gray','red']
  };
config.element = 'user-chart';
Morris.Area(config);
var countrydonations = result.country_donations;
$('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: "transparent",
    regionStyle: {
      initial: {
        fill: '#e4e4e4',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      }
    },
    series: {
      regions: [{
        values: countrydonations,
        scale: ["#92c1dc", "#ebf4f9"],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof countrydonations[code] != "undefined")
        el.html(el.html() + ': ' + countrydonations[code] + ' Donation');
    }
  });
var visitorsData=result.country_visits;  
$('#world-map-donate').vectorMap({
    map: 'world_mill_en',
    backgroundColor: "transparent",
    regionStyle: {
      initial: {
        fill: '#e4e4e4',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      }
    },
    series: {
      regions: [{
        values: visitorsData,
        scale: ["#92c1dc", "#ebf4f9"],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != "undefined")
        el.html(el.html() + ': ' + visitorsData[code] + ' View');
    }
  });  
  //World map by jvectormap
},"json");   

  
})(window.jQuery);
</script>
<style>
.jvectormap-zoomout{
        margin-left:-28px !important;
    }
    .box{
        margin-bottom:46px !important; 
    }    
</style>    
@stop

