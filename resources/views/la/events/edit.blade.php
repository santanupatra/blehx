@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/events') }}">Event</a> :
@endsection
@section("contentheader_description", $event->$view_col)
@section("section", "Events")
@section("section_url", url(config('laraadmin.adminRoute') . '/events'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Events Edit : ".$event->$view_col)

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
				{!! Form::model($event, ['route' => [config('laraadmin.adminRoute') . '.events.update', $event->id ], 'method'=>'PUT', 'id' => 'event-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_id')
					@la_input($module, 'description')
					@la_input($module, 'start_time')
					@la_input($module, 'end_time')
					@la_input($module, 'is_full_day')
					@la_input($module, 'subscribers_count')
					@la_input($module, 'is_deleted')
					@la_input($module, 'is_blocked')
					@la_input($module, 'title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/events') }}">Cancel</a></button>
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
	$("#event-edit-form").validate({
		
	});
});
</script>
@endpush
