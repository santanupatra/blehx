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
<section class="product-detailsection">
      <div class="container">
    <div class="row">
          <div class="col-md-12">
        <div class="page-header">
              <h2 class="text-uppercase h2">Details</h2>
            </div>
      </div>
        </div>
    <div class="row">
          <div class="col-md-6">
        <div class="product-detail-leftdiv"> <img src="{{ URL::asset('../storage/uploads/product') }}/{{ $product_details->image }}" alt="" class="img-responsive center-block" id="zoom_01" 
          data-zoom-image="{{ URL::asset('../storage/uploads/product') }}/{{ $product_details->image }}" /> </div>
      </div>
          <div class="col-md-6">
        <div class="product-detail-rightdiv">
              <h3 class="h4">{{ $product_details->name }}</h3>
              <h4><strong>For one S9 or one L3+ or one D3</strong></h4>
              <h4><strong>{{ $product_details->price }} USD ( 0.00923570 BTC; 0.06223083 BCH; 0.57322233 LTC; )</strong> </h4>
              <h4><strong>Weight: {{ $product_details->weight }} </strong></h4>
              <form class="form-inline">
            <div class="form-group">
                  <label for="q">
                  <h4><strong>Quantity</strong></h4>
                  </label>
                  <div id="1" class="input-group input-group-option quantity-wrapper"> <span  class="input-group-addon input-group-addon-remove quantity-remove btn"> <span class="glyphicon glyphicon-minus"></span> </span>
                <input  id="1inp" type="text" value="6" name="option[]" class="form-control quantity-count" placeholder="1">
                <span class="input-group-addon input-group-addon-remove quantity-add btn"> <span class="glyphicon glyphicon-plus"></span> </span> </div>
                </div>
            <button type="button" class="btn btn-warning quantity-delete"> <span class="glyphicon glyphicon-send"></span> Add to Cart </button>
            <p>{{ $product_details->description }}</p>
          </form>
            </div>
      </div>
        </div>
    <div class="product-detailtextdiv">
          <div class="row">
        <div class="col-md-12">
              <ol class="breadcrumb">
            <li><a href="#ov" class="actv">Overview</a></li>
            <li><a href="#pa"> Payment</a></li>
            <li><a href="#wa">Warranty</a></li>
          </ol>
              <div class="well well-sm" id="ov">
            <h4><strong>Overview</strong></h4>
            <p>{{ $product_details->overview }}</p>
          </div>
              <div class="well well-sm" id="pa">
            <h4><strong>Payment</strong></h4>
            <p>{{ $product_details->payment }}</p>
          </div>
              <div class="well well-sm" id="wa">
            <h4><strong>Warranty</strong></h4>
            <p>{{ $product_details->warranty }}</p>
          </div>
            </div>
      </div>
        </div>
  </div>
    </section>
    <script src="{{ URL::asset('assets/js/jquery.elevatezoom.js') }}"></script> 
<script>
        $('#zoom_01').elevateZoom({
        zoomType:"inner", 
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
       }); 
    </script> 
<script>
    $(document).ready(function(){

        $(".quantity-add").click(function(e){
            var count = 1;
            var newcount = 0;
            
            //Wert holen + Rechnen
            var elemID = $(this).parent().attr("id");
            var countField = $("#"+elemID+'inp');
            var count = $("#"+elemID+'inp').val();
            var newcount = parseInt(count) + 1;
            
            //Neuen Wert setzen
            $("#"+elemID+'inp').val(newcount);
        });

        //Remove
        $(".quantity-remove").click(function(e){
            //Vars
            var count = 1;
            var newcount = 0;
            
            //Wert holen + Rechnen
            var elemID = $(this).parent().attr("id");
            var countField = $("#"+elemID+'inp');
            var count = $("#"+elemID+'inp').val();
            var newcount = parseInt(count) - 1;
            
            //Neuen Wert setzen
            $("#"+elemID+'inp').val(newcount);
            
        });
        //Delete
        $(".quantity-delete").click(function(e){
            //Vars
            var count = 1;
            var newcount = 0;
            
            //Wert holen + Rechnen
            var elemID = $(this).parent().attr("id");
            var countField = $("#"+elemID+'inp');
            var count = $("#"+elemID+'inp').val();
            var newcount = parseInt(count) - 1;
            
            //Neuen Wert setzen
            //$('.item').html('');
            
           var row = $( ".row" );
            $(event.target).closest(row).html('');
        });
    });   
  </script> 
<script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script> 
<script type='text/javascript'>
    msg = "";
    msg = " Blehx Product & Service " + msg;
    position = 0;

    function scrolltitle() {
      document.title = msg.substring(position, msg.length) + msg.substring(0, position);
      position++;
      if (position > msg.length) position = 0
      window.setTimeout("scrolltitle()", 170);
    }
    scrolltitle();
  </script> 
<script>
    // stiky header
    window.onscroll = function() {
      myFunction()
    };
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset >= sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
  </script> 
<script type="text/javascript">
    $(document).ready(function() {

      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('.scrollup').fadeIn();
        } else {
          $('.scrollup').fadeOut();
        }
      });

      $('.scrollup').click(function() {
        $("html, body").animate({
          scrollTop: 0
        }, 600);
        return false;
      });
    });
  </script>
@stop