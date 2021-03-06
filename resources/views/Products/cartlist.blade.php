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
<div class="clearfix"></div>
<section class="addcart-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Add To Cart</li>
        </ul>      
      </div>
    </div>

    <div class="row">
      <div class="col-md-9">
        <div class="box">
          <form method="post" action="#">
              <h1>Add To Cart</h1>
              <p class="text-muted">You currently have 3 item(s) in your cart.</p>
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
                                      <img src="{{ URL::asset('../storage/uploads/product') }}/{{ $cart->image }}" width="150" alt="White Blouse Armani">
                                  </a>
                              </td>
                              <td><a href="#">{{$cart->name}}</a>
                              </td>
                              <td>
                                  <input value="{{$cart->total_qua}}" class="form-control" type="number">
                              </td>
                              <td>${{$cart->price}}</td>
                              <td>$0.00</td>
                              <td>$<?php echo number_format($cart->price*$cart->total_qua, 2)?></td>
                              <td><a href="{{URL::to('')}}/product/delete_cart/{{$cart->id}}" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa fa-trash-o"></i></a>
                              </td>
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
                      <a href="{{URL::to('')}}/product/checkout" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                      </a>
                  </div>  
              </div>
          </form>
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
                            <th>$00.00</th>
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
</section>
<div class="clearfix"></div>

@stop
