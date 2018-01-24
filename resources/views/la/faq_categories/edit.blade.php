@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/faq_categories') }}">Faq Category</a> :
@endsection
@section("contentheader_description", $faq_category->$view_col)
@section("section", "Faq Categories")
@section("section_url", url(config('laraadmin.adminRoute') . '/faq_categories'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Faq Categories Edit : ".$faq_category->$view_col)

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
				{!! Form::model($faq_category, ['route' => [config('laraadmin.adminRoute') . '.faq_categories.update', $faq_category->id ], 'method'=>'PUT', 'id' => 'faq_category-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'description')
					@la_input($module, 'short_order')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/faq_categories') }}">Cancel</a></button>
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
	$("#faq_category-edit-form").validate({
		
	});
});
</script>
@endpush
