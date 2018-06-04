@extends('layouts.dashboard')
@section('content')
<div id="main-container">
  <div class="container">
    <section class="addcart-section">
  <div class="container">   

    <div class="row" style="padding:10px">
      <div class="col-md-12">
        <div class="box">
          <form method="post" action="#">
              <h1>My Order</h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>                       
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>Status</th>                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $list)
                          <tr>
                              
                              <td><a href="#">{{$list->orderid}}</a>
                              </td>
                              <td>
                                  {{$list->name}}
                              </td>
                              <td>${{$list->total_price}}</td>
                              <td>{{$list->order_date}}</td>
                              <td>{{$list->is_deliver}}</td>
                              
                          </tr>
                          @endforeach
                          
                      </tbody>
                     
                  </table>

              </div>
              <!-- /.table-responsive -->

             
          </form>
        </div>          
       </div> 

      
    </div>
  </div>
</section>

  </div>
</div>
@stop
