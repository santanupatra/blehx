@extends("la.layouts.app")

@section("contentheader_title", "Users")
@section("contentheader_description", "Add User")
@section("section", "Users")
@section("sub_section", "Listing")
@section("htmlheader_title", "Add User")
@section("headerElems")

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
				@if (Session::has('message'))
	               <div class="alert alert-success" style="margin-top: 18px;"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
	            @endif
				{!! Form::open(['url' => [config('laraadmin.adminRoute') .'/'. 'submit_user'],'method'=>'post']) !!}
                    <div class="form-group">
						<label for="title1">Name* :</label>
						<input class="form-control" placeholder="Enter user name" data-rule-maxlength="256" required="1" name="name" type="text">
					</div>

					<!-- <div class="form-group">
						<label for="title1">Last Name* :</label>
						<input class="form-control" placeholder="Enter user last name" data-rule-maxlength="256" required="1" name="last_name" type="text">
					</div> -->

					<div class="form-group">
						<label for="title1">Email* :</label>
						<input class="form-control" placeholder="Enter user email" data-rule-maxlength="256" required="1" name="email" type="text">
					</div>

					<div class="form-group">
						<label for="title1">Password* :</label>
						<input class="form-control" placeholder="Enter user Password" data-rule-maxlength="256" required="1" name="password" type="password">
					</div>

					<!-- <div class="form-group">
						<label for="title1">Country* :</label>
						<select name="type" id="type" class="form-control">
							<option value="">- Select -</option>
							<?php foreach($countries as $ckey=>$value){?>
									<option value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>
							<?php }?>
						</select>
					</div> -->

					<div class="form-group">
						<label for="title1">User Type* :</label>
						<select name="type" id="type" class="form-control">
							<option value="">- Select -</option>
							<option value="B">Buyer</option>
							<option value="S">Seller</option>
						</select>
					</div>

					<!-- <div class="form-group">
						<label for="title1">Status* :</label>
						<select name="is_active" id="is_active" class="form-control">
							<option value="">- Select -</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div> -->

					<div class="form-group">
						{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
						<button class="btn btn-default pull-right">
						<a href="#">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection