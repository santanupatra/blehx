@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/seo_keywords') }}">SEO Keyword</a> :
@endsection
@section("contentheader_description", $seo_keyword->$view_col)
@section("section", "SEO Keywords")
@section("section_url", url(config('laraadmin.adminRoute') . '/seo_keywords'))
@section("sub_section", "Edit")

@section("htmlheader_title", "SEO Keywords Edit : ".$seo_keyword->$view_col)

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
				{!! Form::model($seo_keyword, ['route' => [config('laraadmin.adminRoute') . '.seo_keywords.update', $seo_keyword->id ], 'method'=>'PUT', 'id' => 'seo_keyword-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'page_name')
					@la_input($module, 'meta_keyword')
					@la_input($module, 'meta_description')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/seo_keywords') }}">Cancel</a></button>
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
	$("#seo_keyword-edit-form").validate({
		
	});
});
</script>
@endpush
