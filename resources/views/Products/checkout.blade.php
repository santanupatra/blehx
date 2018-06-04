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


<section class="addcart-section">
{!! Form::open(['url' => 'order/store', 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Add To Cart</a></li>
            <li>Shipping</li>
        </ul>      
      </div>
    </div>
  </div> 

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="checkout-section">
          <h1>Shipping Details</h1>          
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="n">Name</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="name" id="name" placeholder="Enter Name ..." class="form-control" required="required" value="{{$user_details->name}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="em">Email</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..." value="{{$user_details->email}}">
                  </div>                  
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="ct">Telephone</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone-square"></i>
                    </div>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Contacts...." value="{{$user_details->phone_no}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="ad">Address</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book"></i>
                    </div>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Mail...." value="{{$user_details->address}}">
                  </div>                  
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="ct">City</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book"></i>
                    </div>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter City..." value="{{$user_details->city}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="ad">State</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book"></i>
                    </div>
                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter State...." value="{{$user_details->state}}">
                  </div>                  
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="ct">Country</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book"></i>
                    </div>
                    <input type="tel" name="country" id="country" class="form-control" placeholder="Enter Country...." value="{{$user_details->country}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="ad">Pin</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book"></i>
                    </div>
                    <input type="text" name="pin" id="pin" class="form-control" placeholder="Enter Pin...." value="{{$user_details->zip}}">
                  </div>                  
                </div>
              </div>
            </div>

            
         

        </div>
      </div>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="checkout-section">
          <h1>Payment Option</h1>          
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                    <input type="radio" name="payment_option" value="paypal" checked="checked"> <img src="{{ URL::asset('../public/assets/img') }}/paypal.png" width="150" alt="Paypal">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <input type="radio" name="payment_option" value="stripe"> <img src="{{ URL::asset('../public/assets/img') }}/stripe.png" width="100" alt="Stripe">
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="box">
              <h1>Cart <DETAILS></DETAILS></h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th colspan="2">Product</th>
                              <th>Quantity</th>
                              <th>Unit price</th>
                              <th>Discount</th>
                              <th colspan="2">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                          $total = 0; 
                        ?>
                        @foreach( $carts as $cart )
                          <?php
                            $total = $total + ($cart->price*$cart->total_qua);
                          ?>                          
                          <tr>
                              <td>
                                  <a href="#">
                                      <img src="{{ URL::asset('../storage/uploads/product') }}/{{ $cart->image }}" alt="White Blouse Armani">
                                  </a>
                              </td>
                              <td><a href="#">{{$cart->name}}</a></td>
                              <td>{{$cart->total_qua}}</td>
                              <td>${{$cart->price}}</td>
                              <td>$0.00</td>
                              <td>$<?php echo $cart->price*$cart->total_qua;?></td>                       
                          </tr>
                          @endforeach                          
                      </tbody>
                      <tfoot>
                          <tr>
                              <th colspan="5">Total</th>
                              <th colspan="2">$<?php echo number_format($total, 2);?></th>
                          </tr>
                      </tfoot>
                  </table>

              </div>
              <!-- /.table-responsive -->

              <div class="box-footer">
                  <div class="cs-div">
                      <a href="product.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                  </div>
                  <div class="up-div pull-right">
                      <button type="submit" class="btn btn-danger">
                            <i class="fa fa-send"></i>
                            Payment</button>
                  </div>  
              </div>
        </div>          
       </div> 

       <div class="col-md-3">
        <div class="box" id="order-summary">
            <div class="box-header">
                <h3>Order summary</h3>
            </div>
            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order subtotal</td>
                            <th>$<?php echo number_format($total, 2);?></th>
                        </tr>
                        <tr>
                            <td>Shipping and handling</td>
                            <th>$0.00</th>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <th>$0.00</th>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <th>$<?php echo number_format($total, 2);?></th>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>
       </div>
    </div>
  </div>
    <input type="hidden" name="total_price" id="total_price" value="{{$total}}">
   {!! Form::close() !!}
</section>
<!-- <section class="new_product-section">
      <div class="container">
    <div class="row">
          <div class="col-md-12">
        <div class="page-header">
              <h2 class="text-uppercase h2">Checkout</h2>
              <div class="cart-div pull-right"> </div>
            </div>
      </div>
        </div>
    <div class="new_product-div">
         
          <div class="row">
          @foreach( $carts as $cart )
            <div class="col-md-12">
              <div class="col-md-3"><img src="{{ URL::asset('../storage/uploads/product') }}/{{ $cart->image }}" alt="" width="150"></div>
              <div class="col-md-3">{{$cart->name}}</div>
              <div class="col-md-3">{{$cart->price}}</div>
              <div class="col-md-3">{{$cart->total_qua}}</div>
              <div class="col-md-3"><?php echo $cart->price*$cart->total_qua;?></div>             
          </div>
          @endforeach       
          
          <a href="{{URL::to('')}}/product/payment">Payment</a>
        <div class="col-md-3 col-sm-12 col-xs-12"></div>
      </div>
        </div>
  </div>
    </section> -->
@stop
