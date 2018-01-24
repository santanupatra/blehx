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
<a class="nav--subnav__item__link nav--subnav__item__link--gray current" href="#">Awards</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">Guest Posts</a>
</li>
<li class="nav--subnav__item">
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">News</a>
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
<a href="#">Lucky 7: For the seventh year in a row, Kickstarter-funded films are nominated for Oscars</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__byline-user">
<a href="/profile/768504866"><img class="blog-post__byline-avatar" alt="" style="height: auto;" src="https://ksr-ugc.imgix.net/assets/006/686/829/f408985650e0c165cc2a9f647d6fba53_original.jpg?w=40&amp;h=40&amp;fit=crop&amp;v=1493311812&amp;auto=format&amp;q=92&amp;s=92155f2cbf0beb3d2550c0e9f00502bb" width="40" height="40">
<div class="blog-post__byline-name">
David Ninh
</div>
</a></div>
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/awards?ref=blog">Awards</a>
</div>
<div class="blog-post__byline-date">
<p>Feb 24 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
									<div class="postImage"><img alt="A still from &quot;Joe's Violin&quot;" src="https://ksr-ugc.imgix.net/assets/015/606/563/d429011c6fde8c3d4f05539c5cf003eb_original.jpg?w=100&amp;h=100&amp;fit=crop&amp;v=1487805389&amp;auto=format&amp;q=92&amp;s=14baa4f9a7b0b6b64959e3a2472de5e4"></div>
								</div>
							</div>
						</article>
						
						<article class="award mb-3 pb-3">
							<div class="row">
								<div class="col-lg-9">
									<h1 class="font-18 mb-4">
<a href="#">Make Some Noise: Kickstarter Creators at the Grammys</a>
</h1>								
<div class="blog-post__byline">

<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/awards?ref=blog">Awards</a>
</div>
<div class="blog-post__byline-date">
<p>Feb 24 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
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
