@extends('layouts.default')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('warning'))
<div class="alert alert-danger">
       {{ session()->get('warning') }}

    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--  How it works  -->
<section class="how-it-block-image" style="background-image:url({{$how_it_work->banner_img}});"></section>
	<section class="page-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="color-callout white color-callout-pull-up mb-5">
						<h1 class="text-center mb-3">{{$how_it_work->title1}}</h1>
						<h5 class="text-center mb-3">{{$how_it_work->description1}}</h5>
						<ul class="how-list mt-5 d-flex">
							<li class="text-center">
								<div class="icon mb-4">
									<img src="{{$how_it_work->image2}}" alt="">
								</div>
								<h5 class="mb-3">{{$how_it_work->title2}}</h5>
								<p class="mb-3">{{$how_it_work->description2}}</p>
								<a href="">Learn more <i class="ion-ios-arrow-thin-right"></i></a>
							</li>
							<li class="text-center">
								<div class="icon mb-4">
									<img src="{{$how_it_work->image3}}" alt="">
								</div>
								<h5 class="mb-3">{{$how_it_work->title3}}</h5>
								<p class="mb-3">{{$how_it_work->description3}}</p>
								<a href="">Learn more <i class="ion-ios-arrow-thin-right"></i></a>
							</li>
							<li class="text-center">
								<div class="icon mb-4">
									<img src="{{$how_it_work->image4}}" alt="">
								</div>
								<h5 class="mb-3">{{$how_it_work->title4}}</h5>
								<p class="mb-3">{{$how_it_work->description4}}</p>
								<a href="">Learn more <i class="ion-ios-arrow-thin-right"></i></a>
							</li>
							<li class="text-center">
								<div class="icon mb-4">
									<img src="{{$how_it_work->image5}}" alt="">
								</div>
								<h5 class="mb-3">{{$how_it_work->title5}}</h5>
								<p class="mb-3">{{$how_it_work->description5}}</p>
								<a href="">Learn more <i class="ion-ios-arrow-thin-right"></i></a>
							</li>
							<li class="text-center">
								<div class="icon mb-4">
									<img src="{{$how_it_work->image6}}" alt="">
								</div>
								<h5 class="mb-3">{{$how_it_work->title6}}</h5>
								<p class="mb-3">{{$how_it_work->description6}}</p>
								<a href="">Learn more <i class="ion-ios-arrow-thin-right"></i></a>
							</li>
							<li class="text-center">
								<div class="icon mb-4">
									<img src="{{$how_it_work->image7}}" alt="">
								</div>
								<h5 class="mb-3">{{$how_it_work->title7}}</h5>
								<p class="mb-3">{{$how_it_work->description7}}</p>
								<a href="">Learn more <i class="ion-ios-arrow-thin-right"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row page-block-content">
				<div class="col-md-5">
					<h2>{{$how_it_work->title8}}</h2>
				</div>
				<div class="col-md-6 ml-auto">
					<p class="type-base">{{$how_it_work->description8}}</p>
				</div>
			</div>
			
			<div class="row page-block-content">
				<div class="col-lg-12">
					<div class="color-callout green text-center">
						<div class="color-callout-content font-30 font-white mb-5">{{$how_it_work->description9}}
						</div>
					</div>
				</div>
			</div>
			
			<div class="row page-block-content">
				<div class="col-md-5">
					<h2>{{$how_it_work->title9}}</h2>
				</div>
				<div class="col-md-6 ml-auto">
					<p class="type-base">{{$how_it_work->description10}}</p>
					
				</div>
			</div>
			
			<div class="row page-block-content">
				<div class="col-lg-12">
					<div class="color-callout pink text-center">
						<div class="color-callout-content font-30 font-white mb-5">
							{{$how_it_work->description11}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop