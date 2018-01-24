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
<a class="nav--subnav__item__link nav--subnav__item__link--gray current" href="#">News</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">Profiles</a>
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
								<div class="col-lg-9">
									<h1 class="font-18 mb-4">
<a href="#">Introducing the New Drip</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__byline-user">
<a href="/profile/perry"><img class="blog-post__byline-avatar" alt="" style="height: auto;" src="https://ksr-ugc.imgix.net/assets/005/760/139/e301cbd260d40057dfe38bd2927020e4_original.jpeg?w=40&amp;h=40&amp;fit=crop&amp;v=1461076651&amp;auto=format&amp;q=92&amp;s=8a7fb49bdedcef1afdbf11af0c1668bb" width="40" height="40">
<div class="blog-post__byline-name">
Perry Chen
</div>
</a></div>
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/news?ref=blog">News</a>
</div>
<div class="blog-post__byline-date">
<p>Nov 15 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
									<div class="postImage"><img alt="" src="https://ksr-ugc.imgix.net/assets/019/226/819/d24b52798247f89291ca8aecc513ab98_original.jpg?w=100&amp;h=100&amp;fit=crop&amp;v=1510697368&amp;auto=format&amp;q=92&amp;s=e97feb7c092762dd1065d3340f4f919b"></div>
								</div>
							</div>
						</article>
						
						<article class="award mb-3 pb-3">
							<div class="row">
								<div class="col-lg-9">
									<h1 class="font-18 mb-4">
<a href="#">Five New Orleans Filmmakers Launch Kickstarter Projects to Mark the City’s Tricentennial</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__byline-user">
<a href="/profile/mccave"><img class="blog-post__byline-avatar" alt="" style="height: auto;" src="https://ksr-ugc.imgix.net/assets/005/863/934/c9c9cd30b6406fd6699a04d09f1cb3e3_original.jpg?w=40&amp;h=40&amp;fit=crop&amp;v=1461090460&amp;auto=format&amp;q=92&amp;s=5167cf31e3684504db977c58bfe5dc10" width="40" height="40">
<div class="blog-post__byline-name">
Elise McCave
</div>
</a></div>
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/news?ref=blog">News</a>
</div>
<div class="blog-post__byline-date">
<p>Nov 3 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
									<div class="postImage"><img alt="Sunni Patterson from Artist in Exile" src="https://ksr-ugc.imgix.net/assets/019/028/330/e9debad55d3276c3c63dffe8d8cebe38_original.png?w=100&amp;h=100&amp;fit=crop&amp;v=1509600594&amp;auto=format&amp;q=92&amp;s=c62fcad14e869bbe1ed524e9df18f8f4"></div>
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
