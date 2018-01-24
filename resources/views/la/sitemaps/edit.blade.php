@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/sitemaps') }}">Sitemap</a> :
@endsection
@section("contentheader_description", $sitemap->$view_col)
@section("section", "Sitemaps")
@section("section_url", url(config('laraadmin.adminRoute') . '/sitemaps'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Sitemaps Edit : ".$sitemap->$view_col)

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
				{!! Form::model($sitemap, ['route' => [config('laraadmin.adminRoute') . '.sitemaps.update', $sitemap->id ], 'method'=>'PUT', 'id' => 'sitemap-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'description')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/sitemaps') }}">Cancel</a></button>
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
	$("#sitemap-edit-form").validate({
		
	});
});
</script>
@endpush
