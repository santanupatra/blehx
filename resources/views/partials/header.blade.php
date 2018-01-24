<header>
  <div class="loader"></div>

  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="call-div">
          <h5>
            <i class="fa fa-volume-control-phone"></i>  
            <a href="tel:0000000000">112-123456789</a>
            /
            <i class="fa fa-mobile-phone"></i>
            <a href="tel:0000000000">112-123456789</a>              
          </h5>       
        </div> <!-- call-div -->
      </div>

      <div class="col-md-3 hidden-xs hidden-sm"></div>

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="overlay1-div">
          <div class="social-div">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="vk"><i class="fa fa-vk"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="medium"><i class="fa fa-medium"></i></a>
          </div>  

          <div class="login-div">
            <button type="button" class="btn new-btn1 btn-sm" data-toggle="modal" data-target="#myModal">LOGIN</button>
            <i class="fa fa-link"></i>
            <button type="button" class="btn btn-sm new-btn" data-toggle="modal" data-target="#myModal1">SIGN UP</button>
          </div>            
        </div>
      </div>
    </div>
  </div>
</header>
<div class="progress-div progress"></div>
<div class="clearfix"></div>
<section class="nav-div" id="myHeader">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-12">
        <div class="logo-div">
          <a href="{{URL::to('')}}/home"><img src="{{ URL::asset('assets/img/logo.png') }}" alt="" class="img-responsive"></a>
        </div>
      </div>

      <div class="col-md-9 col-xs-12 col-sm-12">
        <div class="menu-div">
           <nav class="navbar navbar-default">
            <div class="container-fluid">
             <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collaspe-1" aria-expended="false">
                <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>   
             </div><!--navbar-header -->
             
             <div class="collapse navbar-collapse" id="bs-example-navbar-collaspe-1">
              <ul class="nav navbar-nav">
                <li class="active_new"><a href="{{URL::to('')}}/home">home</a></li>
                <li><a href="#">blog</a></li>
                <li><a href="{{URL::to('')}}/prising">prising</a></li>
                <li><a href="#">our offer</a></li>
                <li><a href="#">about us</a></li>            
                <li><a href="#">press</a></li>
                <li><a href="#">services</a></li>
                <li><a href="#">datacenters</a></li>
                <li><a href="{{URL::to('')}}/contactus">contact us</a></li>
              </ul>
             </div>
            </div>
           </nav>
          </div>          
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
