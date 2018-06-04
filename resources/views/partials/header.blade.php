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

          @if(!empty($logged_user) && $logged_user->id != "")
            <div class="login-div">
            <a href="{{URL::to('')}}/user/logout" class="btn new-btn1 btn-sm">LOGOUT</a>            
            <i class="fa fa-link"></i>
            <a href="{{URL::to('')}}/user/dashboard" class="btn btn-sm new-btn">Dashboard</a>            
          </div>

          @else
          <div class="login-div">
            <button type="button" class="btn new-btn1 btn-sm" data-toggle="modal" data-target="#myModal">LOGIN</button>
            <i class="fa fa-link"></i>
            <button type="button" class="btn btn-sm new-btn" data-toggle="modal" data-target="#myModal1">SIGN UP</button>
          </div>
          @endif

          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Login
                    <span>Please enter your login data</span>
                  </h2>
                </div>
                {!! Form::open(['url' => 'user/actionsignin','method'=>'post', 'class' => 'form-horizontal']) !!}  
                <div class="modal-body">
                  <div class="modal-formdiv">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group-sm">
                            <label for="e">Email</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                              </div>
                              <input type="email" name="email" id="email" placeholder="Email-id..."
                              class="form-control" required="required">
                            </div>
                          </div>
                        </div>

                    <div class="col-md-6">
                          <div class="form-group-sm">
                            <label for="p">Password</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                              </div>
                              <input type="Password" name="password" id="password" placeholder="Type Password..." class="form-control" required="required">
                            </div>
                          </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group-sm">
                        <button type="submit" class="btn new-btn1 btn-sm" data-toggle="modal" >Submit</button>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group-sm">
                        <h5 class="h5"><a href="#">
                        <i class="fa fa-hand-o-right"></i> Lost your password? | <u><a href="#" data-toggle="modal" data-target="#myModal1"> Sign Up</a></u></a></h5>
                      </div>
                    </div>

                    <div class="col-md-2 hidden-xs hidden-sm hidden-lg"></div>
                  </div>
                  </div>
                </div>
                {!! Form::close() !!}
                <div class="modal-footer">
                  <!--<a href="#" class="btn btn-primary text-uppercase text-center">sign in</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
          </div><!-- Modal -->

          <!-- Modal1 -->
          <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Sign up
                    <span>Please enter your personal information</span>
                  </h2>
                </div>
                {!! Form::open(['url' => 'user/store','method'=>'post','onsubmit'=>'return validation();']) !!}
                <div class="modal-body">
                  <div class="modal-formdiv">
                    <form action="#" method="get" class="form-horizontal">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group-sm">
                            <label for="e1">User Type</label>
                            <div class="input-group">
                              <input type="radio" name="type" value="B" checked="checked"> Buyer
                              <input type="radio" name="type" value="S"> Seller
                            </div>
                          </div>
                        </div>

                    <div class="col-md-6">
                      <div class="form-group-sm">
                        <label for="e1">Email</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                          </div>                              
                          <input type="email" class="form-control" placeholder="Email-id..." required name="email" id="email">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                          <div class="form-group-sm">
                            <label for="p1">Password</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                              </div>                             
                              <input type="password" class="form-control" placeholder="Type Password..." required name="password" id="password">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6">
                          <div class="form-group-sm">
                            <label for="rp1">Repeat Password</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                              </div>                              
                                <input type="password" class="form-control" placeholder="Re-enter password" required name="confpassword" id="confpassword">
                            </div>
                          </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group-sm">
                        <button type="submit" class="btn new-btn1 btn-sm" data-toggle="modal" >Submit</button>
                      </div>
                    </div>

                    <div class="col-md-2 hidden-xs hidden-sm hidden-lg"></div>
                  </div>
                    </form>
                  </div>
                </div>
                {!! Form::close() !!}
                <div class="modal-footer">
                  <!--<a href="#" class="btn btn-primary text-uppercase text-center">sign in</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
          </div><!-- Modal1 -->

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
                <li><a href="{{URL::to('')}}/allservice">prising</a></li>
                <li><a href="{{URL::to('')}}/our_offer">our offer</a></li>
                <li><a href="{{URL::to('')}}/products">Products</a></li>            
                <li><a href="#">press</a></li>
                <li><a href="{{URL::to('')}}/services">services</a></li>
                <li><a href="{{URL::to('')}}/datacenters">datacenters</a></li>
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
