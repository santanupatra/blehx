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

    <!--  About Us  -->
	<section class="page-block page-block-image image1" style="background-image:url({{$about_us->banner_img}});"></section>
	<section class="page-block"> <?php //echo '<pre>'; print_r($about_us);?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="color-callout orange color-callout-pull-up mb-5">
						<div class="color-callout-content font-30 font-white">
							{{$about_us->description}}
							<div class="color-callout-attribution bottom font-14">
								&mdash; {{$about_us->small_title}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row page-block-content">
				<div class="col-md-5">
					<h2>{{$about_us->title1}}</h2>
				</div>
				<div class="col-md-6 ml-auto">
					<p class="type-base">{{$about_us->description1}}
					<a href="" class="linkout js-charter-link">
						<b>See our charter</b>
						<i class="ion-ios-arrow-forward linkout-arrow"></i>
					</a>
				</div>
			</div>
			<div class="row page-block-content">
				<div class="col-lg-12">
					<div class="color-callout pink text-center">
						<div class="color-callout-content font-30 font-white mb-5">{{$about_us->description2}}</div>
						<a href="" class="btn btn-border-white">See all our stats</a>
					</div>
				</div>
			</div>
			
			<div class="row page-block-content">
				<div class="col-md-5">
					<h2>{{$about_us->title2}}</h2>
				</div>
				<div class="col-md-6 ml-auto">
					<p class="type-base">{{$about_us->description3}}</p>
					<a href="" class="linkout js-charter-link">
						<b>Meet the team</b>
						<i class="ion-ios-arrow-forward linkout-arrow"></i>
					</a>
					<a href="" class="linkout js-charter-link">
						<b>Join us</b>
						<i class="ion-ios-arrow-forward linkout-arrow"></i>
					</a>
				</div>
			</div>
		</div>
	</section>
     


@stop
