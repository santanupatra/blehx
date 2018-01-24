<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title> Blehx Product & Service </title>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url"           content="{{!empty($campaign->site_url)?$campaign->site_url:''}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{!empty($campaign->title)?$campaign->title:''}}" />
    <meta property="og:description"   content="{{!empty($campaign->short_description)?$campaign->short_description:''}}" />
    <meta property="og:image"         content="{{!empty($campaign->shareimg)?$campaign->shareimg:''}}" /> -->
    
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/slider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}" type="text/css">
    <link rel="icon" href="{{ URL::asset('assets/img/fav-icon.png') }}" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}" type="text/css">

    <style type="text/css">
      .scrollup{
          width:40px;
          height:40px;      
          text-indent:-9999px;
          opacity:0.3;
          position:fixed;
          bottom:50px;
          right:50px;
          display:none;     
          background: url('{{ URL::asset('assets/img/icon_top.png') }}') no-repeat;
        }

      .loader {
          position: fixed;
          left: 0px;
          top: 0px;
          width: 100%;
          height: 100%;
          z-index: 9999;
          background: url('{{ URL::asset('assets/img/pageLoader.gif') }}') 50% 50% no-repeat rgb(255,255,255);
          opacity: 1;
      }       
  </style>
  </head>
  <body>
  <!-- header Part -->
   @include('partials.header')
   
   @yield('content')
   <div class="clearfix"></div>
 <!-- footer -->
   @include('partials.footer')

   <a href="#" class="scrollup" style="display: none;">Scroll</a>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.10.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/script.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    </script>
    <script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut(10000);
        $(".loader").delay(100);

    });
    </script>
    <script type='text/javascript'> 
    msg = "";
    msg = " BLEHX PRODUCT & SERVICE " + msg;position = 0;
    function scrolltitle() {
    document.title = msg.substring(position, msg.length) + msg.substring(0, position); position++;
    if (position > msg.length) position = 0
    window.setTimeout("scrolltitle()",170);
    }
    scrolltitle();
    </script> 

    <script>// stiky header
    window.onscroll = function() {myFunction()};
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        header.classList.add("sticky");
      } 
      else {
        header.classList.remove("sticky");
      }
    }
    </script>

    <script type="text/javascript">
      $(document).ready(function(){ 
      
      $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
          $('.scrollup').fadeIn();
        } else {
          $('.scrollup').fadeOut();
        }
      }); 
      
      $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
      });
    });
    </script>
  </body>     
</html>
