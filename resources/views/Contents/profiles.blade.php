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

    <!--  Awards  -->
<section class="blogPart font-32">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
						<h2>The Kickstarter Blog</h2>
				</div>
			</div>
		</div>
</section>
<section class="navigationPart">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav--subnav__list text-center">
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray " href="#">Awards</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray " href="#">Guest Posts</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray " href="#">News</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray current" href="#">Profiles</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">Tips</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">Video</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">Community</a>
</li>
</ul>
			</div>
		</div>
	</div>
</section>
<section class="blogPost">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<ul class="mobius">
					<li class="page">
						<article class="award mb-3 pb-3">
							<div class="row">
								<div class="col-lg-12">
									<h1 class="font-18 mb-4">
<a href="#">‘Spa Night,’ the Award-Winning Film that Almost Didn’t Get Made</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/profiles?ref=blog">Profiles</a>
</div>
<div class="blog-post__byline-date">
<p>Jun 7 2017</p>
</div>
</div>
								</div>
							</div>
						</article>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
@stop
