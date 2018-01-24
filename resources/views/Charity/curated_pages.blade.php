@extends('layouts.default')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
   {{ session()->get('message') }}
</div>
@endif
<section class="mt-3">
	<div class="container">
		<div class="discover-header">
					<h1><a href="#">Discover</a>
						<span class="divider">/</span>
						Curated Pages
					</h1>
					<p class="blurb pt-2">Discover projects curated by some of the world’s foremost creative communities</p>
				</div>
		<div class="row">
			<div class="col-lg-9 mb-2">
				
				<div class="discoverContent mt-4">
					<h2>Featured</h2>
					<div class="row">
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="discoverContent mt-4">
					<h2 class="pt-3">Recently Updates</h2>
					<div class="row">
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
						<div class="col-lg-4 col-12 col-md-4">
							<div class="rounded-border p-2 pages-part mb-4">
								<a href="#"><img src="../public/assets/img/image1.jpg" class="img-fluid"></a>
								<div class="name font-weight-bold text-center"><a href="#">Creative Capital</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 mb-2">
				<div class="sidebar-wrap mt-4">
					<div class="sidebar">
						<h3><span class="icon ion-android-star"></span> Featured</h3>
						<ul class="sidebarNav mb-5">
							<li><a href="#">Recommended for you</a></li>
						    <li><a href="#">Projects We Love</a></li>
						    <li><a href="#">Popular</a></li>
						    <li><a href="#">Newest</a></li>
						    <li><a href="#">Ending Soon</a></li>
						    <li><a href="#">Most Funded</a></li>
						    <li><a href="#">Most Backed</a></li>
						    <li><a href="#">Curated Pages</a></li>
						</ul>
						<h3><span class="icon ion-pricetag"></span> Categories</h3>
						<ul class="sidebarNav mb-5">
							<li><a href="#">Art</a></li>
						    <li><a href="#">Comics</a></li>
						    <li><a href="#">Crafts</a></li>
						    <li><a href="#">Dance</a></li>
						    <li><a href="#">Design</a></li>
						    <li><a href="#">Fashion</a></li>
						    <li><a href="#">Film & Video</a></li>
						    <li><a href="#">Food</a></li>
						    <li><a href="#">Games</a></li>
						    <li><a href="#">Journalism</a></li>
						    <li><a href="#">Music</a></li>
						    <li><a href="#">Photography</a></li>
						    <li><a href="#">Publishing</a></li>
						    <li><a href="#">Technology</a></li>
						    <li><a href="#">Theater</a></li>
						</ul>
						<h3># Tags</h3>
						<ul class="sidebarNav mb-5">
							<li><a href="#">Art</a></li>
						    <li><a href="#">Comics</a></li>
						    <li><a href="#">Crafts</a></li>
						    <li><a href="#">Dance</a></li>
						    <li><a href="#">Design</a></li>
						    <li><a href="#">Fashion</a></li>
						    <li><a href="#">Film & Video</a></li>
						    <li><a href="#">Food</a></li>
						    <li><a href="#">Games</a></li>
						    <li><a href="#">Journalism</a></li>
						    <li><a href="#">Music</a></li>
						    <li><a href="#">Photography</a></li>
						    <li><a href="#">Publishing</a></li>
						    <li><a href="#">Technology</a></li>
						    <li><a href="#">Theater</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop

