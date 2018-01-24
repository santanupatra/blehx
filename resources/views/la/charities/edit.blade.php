@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/charities') }}">Charity</a> :
@endsection
@section("contentheader_description", $user->$view_col)
@section("section", "Charities")
@section("section_url", url(config('laraadmin.adminRoute') . '/charities'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Users Edit : ".$user->$view_col)

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
				{!! Form::model($user, ['route' => [config('laraadmin.adminRoute') . '.charities.update', $user->id ], 'method'=>'PUT', 'id' => 'user-edit-form', 'novalidate'=>true]) !!}
                                <div class="form-group">
                                    <label for="first_name">First Name* :</label>
                                    <input class="form-control" placeholder="Enter First Name" data-rule-minlength="5" data-rule-maxlength="250" required="1" name="first_name" value="{{$user->first_name}}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name* :</label>
                                    <input class="form-control" placeholder="Enter Last Name" data-rule-minlength="5" data-rule-maxlength="250" required="1" name="last_name" value="{{$user->last_name}}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email* :</label>
                                    <input class="form-control" placeholder="Enter Email" data-rule-minlength="5" data-rule-maxlength="250" required="1" name="email" value="{{$user->email}}" type="email">
                                </div>
                                 <div class="form-group">
                                    <label for="email">Password :</label>
                                    <input class="form-control" placeholder="Enter Password" data-rule-minlength="5" data-rule-maxlength="250"  name="password" value="" type="password">
                                </div>
					
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}">Cancel</a></button>
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
	$("#user-edit-form").validate({
		
	});
});
</script>
@endpush
