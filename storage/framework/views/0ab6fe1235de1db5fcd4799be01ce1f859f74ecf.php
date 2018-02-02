<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Blehx Product & Service</title>
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/bootstrap.min.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/bootstrap-theme.min.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" type="text/css">
<link rel="icon" href="<?php echo e(URL::asset('assets/img/fav-icon.png')); ?>" type="image/png" sizes="32x32">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/custom.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/style_dash.min.css')); ?>" type="text/css">
<style type="text/css">
.scrollup {
  width: 40px;
  height: 40px;
  text-indent: -9999px;
  opacity: 0.3;
  position: fixed;
  bottom: 50px;
  right: 50px;
  display: none;
  background: url('<?php echo e(URL::asset('assets/img/icon_top.png')); ?>') no-repeat;
}
</style>
</head>

<body>
<header class="dashboard-section">
  <div class="loader"></div>
  <nav class="navbar navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo e(URL::to('')); ?>/home"> <img src="<?php echo e(URL::asset('assets/img/d-logo.png')); ?>" alt="" class="img-responsive center-block" /> </a> </div>
    <div class="navbar-header-container">
      <div class="container">
        <div class="mma">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
              <h1>DASHBOARD</h1>
              <p>Check the overview of the most recent data</p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
              <div class="limiter">
                <p> <a class="nav-notification disabled" href="#"> <i class="fa fa-bell-o"></i> </a> <a class="nav-logout" href="<?php echo e(URL::to('')); ?>/user/logout" title="Logout"> <i class="fa fa-circle-o-notch"></i> </a> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="main-menu">
      <div class="nav-user-info">
        <h2>Welcome Back </h2>
        <span class="fa fa-user"></span> </div>
      <ul class="nav navbar-nav">
        <li class="active"> <a class="navbar-link" href="#"><span class="fa fa-dashboard"></span>Dashboard</a> </li>
        <li> <a class="navbar-link" href="#"><span class="fa fa-sliders"></span>Mining Allocation</a> </li>
        <li> <a class="navbar-link" href="#"><span class="fa fa-download"></span>Payouts</a> </li>
        <li> <a class="navbar-link" href="#"> <span class="fa fa-th-list"></span>Bonus Payouts</a> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="fa fa-address-book"></span> My Account <i class="caret"></i></a>
          <ul class="dropdown-menu">
            <li> <a href="#"><span class="fa fa-cogs"></span> Settings</a> </li>
            <li> <a href="#"><span class="fa fa-star"></span> Affiliate</a> </li>
            <li> <a href="#"><span class="fa fa-comments"></span> Contact Customer Service</a> </li>
          </ul>
        </li>
        <li> <a class="navbar-link" href="#"><span class="fa fa-th-list"></span> My orders</a> </li>
        <li> <a class="navbar-link" href="#"><span class="fa fa-flash"></span> Buy Hashpower</a> </li>
        <li class="emptys">&nbsp;</li>
      </ul>
    </div>
  </nav>
</header>
<div class="clearfix"></div>

<?php echo $__env->yieldContent('content'); ?>

<a href="#" class="scrollup" style="display: none;">Scroll</a> 
<script src="<?php echo e(URL::asset('assets/js/jquery-1.10.1.min.js')); ?>"></script> 
<script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>"></script> 
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script> 
<script type='text/javascript'>
msg = "";
msg = " Blehx Product & Service " + msg;position = 0;
function scrolltitle() {
document.title = msg.substring(position, msg.length) + msg.substring(0, position); position++;
if (position > msg.length) position = 0
window.setTimeout("scrolltitle()",170);
}
scrolltitle();
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
