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
              <h1>List product</h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>                       
                          <tr>
                              <th>Product</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>price</th>
                              <th>Category</th>
                              <th colspan="2">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($lists as $list)
                          <tr>
                              <td>
                                  <a href="#">
                                      <img src="{{ URL::asset('../storage/uploads/product') }}/{{ $list->image }}" width="150" alt="White Blouse Armani">
                                  </a>
                              </td>
                              <td><a href="#">{{$list->name}}</a>
                              </td>
                              <td>
                                  {{$list->quantity}}
                              </td>
                              <td>${{$list->price}}</td>
                              <td>{{$list->cat_name}}</td>
                              <td>
                                  <a href="{{URL::to('')}}/product/edit/{{$list->sp_id}}" class="btn btn-info" role="button">Edit</a>
                                  <a href="{{URL::to('')}}/product/delete/{{$list->sp_id}}" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-info" role="button">Delete</a>
                                 
                              </td>
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
