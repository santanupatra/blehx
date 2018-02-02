@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/products') }}">Product</a> :
@endsection
@section("contentheader_description", $product->$view_col)
@section("section", "Products")
@section("section_url", url(config('laraadmin.adminRoute') . '/products'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Products Edit : ".$product->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($product, ['route' => [config('laraadmin.adminRoute') . '.products.update', $product->id ], 'method'=>'PUT', 'id' => 'product-edit-form', 'enctype' => 'multipart/form-data']) !!}
					@la_form($module)					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'sku')
					@la_input($module, 'weight')
					@la_input($module, 'price')
					@la_input($module, 'quantity')
					@la_input($module, 'category_id')
					@la_input($module, 'status')					
					--}}
					<div class="form-group"><label for="image" style="display:block;">Image* :</label>
					 <input type="file" name="image" id="image">
					 <div style="padding-top: 10px"></div>
					 <img src="{{ URL::asset('../storage/uploads/product/') }}/{{$product->image}}" alt="" width="150">	
					</div>
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/products') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#product-edit-form").validate({
		
	});
});
</script>
@endpush
