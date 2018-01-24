@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/analytics') }}">Analytic</a> :
@endsection
@section("contentheader_description", $analytic->$view_col)
@section("section", "Analytics")
@section("section_url", url(config('laraadmin.adminRoute') . '/analytics'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Analytics Edit : ".$analytic->$view_col)

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
				{!! Form::model($analytic, ['route' => [config('laraadmin.adminRoute') . '.analytics.update', $analytic->id ], 'method'=>'PUT', 'id' => 'analytic-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'description')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/analytics') }}">Cancel</a></button>
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
	$("#analytic-edit-form").validate({
		
	});
});
</script>
@endpush
