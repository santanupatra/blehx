@extends('layouts.default')
@section('content')
<section class="product-detailsection">
      <div class="container">
    <div class="row">
          <div class="col-md-7 center-div">
        <div class="product-detail-rightdiv">
                <div class="pay-area success">
                    <div class="success-pic"><img src="{{ URL::asset('assets/img/tick.png') }}"></div>
                    <h1>Thank You</h1>
                    <p> <strong>Order Id:</strong> 16</p>
                    <p> <strong>Transaction Id:</strong>  xyz123</p>
                    <p> <strong>Product Name:</strong>  xyz</p>
                    <p> <strong>Product Amount:</strong>  $223</p>
                    
                </div>
            </div>
      </div>
        </div>

  </div>
</section>
@stop
