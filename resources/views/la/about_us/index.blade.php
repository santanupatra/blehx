@extends("la.layouts.app")
@section("contentheader_title")
	<a href="#">About Us</a>
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
				{!! Form::open(['url' => [config('laraadmin.adminRoute') .'/'. 'aboutus_update', $about_content->id ],'method'=>'post', 'method'=>'put','files'=>'true']) !!}

                    <div class="form-group">
						<label for="title1">Description* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="description" type="text" value="{{$about_content->description}}">
					</div>

					<div class="form-group">
						<label for="title1">Small Title* :</label>
						<input class="form-control" placeholder="Small Title1" data-rule-maxlength="256" required="1" name="small_title" type="text" value="{{$about_content->small_title}}">
					</div>

					<div class="form-group">
						<label for="title1">Title1* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="title1" type="text" value="{{$about_content->title1}}">
					</div>


					<div class="form-group">
						<label for="title1">Description1* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="description1" type="text" value="{{$about_content->description1}}">
					</div>

					<div class="form-group">
						<label for="title1">Description2* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="description2" type="text" value="{{$about_content->description2}}">
					</div>

					<div class="form-group">
						<label for="title1">Title2* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="title2" type="text" value="{{$about_content->title2}}">
					</div>

					<div class="form-group">
						<label for="title1">Description3* :</label>
						<input class="form-control" placeholder="Enter Title1" data-rule-maxlength="256" required="1" name="description3" type="text" value="{{$about_content->description3}}">
					</div>

					<div class="form-group">
						<label for="title1">Banner Image* :</label>
						<input type="file" name="bnr_img" />
					</div>

					<div class="form-group">
						<img src="{{$about_content->banner_img}}" height="150" width="200" />
					</div>

					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!}
						<button class="btn btn-default pull-right">
						<a href="#">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection