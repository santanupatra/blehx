@extends("la.layouts.app")

@section("contentheader_title")
	<a href="#">About Us</a> :
@endsection

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

				{!! Form::open(['url' => [config('laraadmin.adminRoute') . '.aboutus_update.', $how_it_work->id ],'method'=>'post', 'method'=>'put','files'=>true') !!}

					<div class="form-group">
						<label for="title1">Description* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="title1" type="text" value="Build Your Project">
					</div>


					<div class="form-group">
						<label for="title1">Title1* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="title1" type="text" value="Build Your Project">
					</div>


					<div class="form-group">
						<label for="title1">Description1* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="title1" type="text" value="Build Your Project">
					</div>



					
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="#">Cancel</a></button>
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
	$("#how_it_work-edit-form").validate({
		
	});
});
</script>
@endpush
