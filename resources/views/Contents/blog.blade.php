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

    <!--  blog -->
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
<a class="nav--subnav__item__link nav--subnav__item__link--gray" href="#">Awards</a>
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
				<article class="blogPart1 blogPostFull">
					<div class="blogPostHeader">
						<h1 class="blog_post_title">
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
					<div class="blogPostBody">
						<p class="font-18">In 2012, the record label Ghostly International launched Drip as a way for people to support musicians through subscriptions. Though niche, Drip was a pioneering service. You could see the potential. Almost two years ago, Drip became a part of Kickstarter instead of <a href="#" target="_blank" rel="noopener"><u>shutting down</u></a>.</p>					
						<div class="blogImage">
							<figure>
								<img alt="" class="fit" src="https://ksr-ugc.imgix.net/assets/019/227/657/e60c9b7be0ef3a8e121eab2d31b062a4_original.jpg?w=700&amp;fit=max&amp;v=1510700377&amp;auto=format&amp;q=92&amp;s=6292a270abe41cd09103a7fd626a68a9">
							</figure>
						</div>
						<h1 class="font-24 mb-4">Kickstarter is for projects, Drip is for people.</h1>
						<p class="font-18">Today we launch <a href="#" target="_blank" rel="noopener"><u>a new Drip</u></a> for artists and creators across the full spectrum of disciplines we support on Kickstarter. Just as artists, authors, game designers, musicians, and filmmakers use Kickstarter to fund and build community around their projects, Drip is a tool for people to fund and build community around their ongoing creative practice. 
</p>					<a class="btn btn--lighter-gray btn-block blog-post__read-more" href="#">Read more</a>
					</div>
				</article>
				
				<article class="blogPart1 blogPostFull">
					<div class="blogPostHeader">
						<h1 class="blog_post_title">
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
					<div class="blogPostBody">
						<p class="font-18">In 2012, the record label Ghostly International launched Drip as a way for people to support musicians through subscriptions. Though niche, Drip was a pioneering service. You could see the potential. Almost two years ago, Drip became a part of Kickstarter instead of <a href="#" target="_blank" rel="noopener"><u>shutting down</u></a>.</p>					
						<div class="blogImage">
							<figure>
								<img alt="" class="fit" src="https://ksr-ugc.imgix.net/assets/019/227/657/e60c9b7be0ef3a8e121eab2d31b062a4_original.jpg?w=700&amp;fit=max&amp;v=1510700377&amp;auto=format&amp;q=92&amp;s=6292a270abe41cd09103a7fd626a68a9">
							</figure>
						</div>
						<h1 class="font-24 mb-4">Kickstarter is for projects, Drip is for people.</h1>
						<p class="font-18">Today we launch <a href="#" target="_blank" rel="noopener"><u>a new Drip</u></a> for artists and creators across the full spectrum of disciplines we support on Kickstarter. Just as artists, authors, game designers, musicians, and filmmakers use Kickstarter to fund and build community around their projects, Drip is a tool for people to fund and build community around their ongoing creative practice. 
</p>					<a class="btn btn--lighter-gray btn-block blog-post__read-more" href="#">Read more</a>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
<section class="pagination my-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<ul class="pagination">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
			</div>
		</div>
	</div>
</section>
@stop
