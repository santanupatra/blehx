@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/site_settings') }}">Site Setting</a> :
@endsection
@section("contentheader_description", $site_setting->$view_col)
@section("section", "Site Settings")
@section("section_url", url(config('laraadmin.adminRoute') . '/site_settings'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Site Settings Edit : ".$site_setting->$view_col)

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
				{!! Form::model($site_setting, ['route' => [config('laraadmin.adminRoute') . '.site_settings.update', $site_setting->id ], 'method'=>'PUT', 'id' => 'site_setting-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'logo')
					@la_input($module, 'fb_link')
					@la_input($module, 'twitter_link')
					@la_input($module, 'google_plus')
					@la_input($module, 'linkedin_link')
					@la_input($module, 'youtube_link')
					@la_input($module, 'admin_email')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/site_settings') }}">Cancel</a></button>
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
	$("#site_setting-edit-form").validate({
		
	});
});
</script>
@endpush
