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
<a class="nav--subnav__item__link nav--subnav__item__link--gray  current" href="#">Community</a>
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
<a href="#">Kickstarter Creators on the Future of Independent Journalism</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__byline-user">
<a href="/profile/guidetoglo"><img class="blog-post__byline-avatar" alt="" style="height: auto;" src="https://ksr-ugc.imgix.net/assets/006/452/669/f90d661a3bdd5a41d5c0bbdd0110c9db_original.jpg?w=40&amp;h=40&amp;fit=crop&amp;v=1510708926&amp;auto=format&amp;q=92&amp;s=e6ab7d1a62afc5f4e9370c8e602cb9a7" width="40" height="40">
<div class="blog-post__byline-name">
Glory Edim
</div>
</a></div>
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/community?ref=blog">Community</a>
</div>
<div class="blog-post__byline-date">
<p>Oct 17 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
									<div class="postImage"><img alt="A student reporter for Brooklyn Deep, a Kickstarter-funded investigative journalism platform" src="https://ksr-ugc.imgix.net/assets/018/587/748/88eee1f5e8fab19d5867a65e0e6b5662_original.jpeg?w=100&amp;h=100&amp;fit=crop&amp;v=1507041244&amp;auto=format&amp;q=92&amp;s=8c81960b8eacd9c52611f9353a2a1cbe"></div>
								</div>
							</div>
						</article>
						
						<article class="award mb-3 pb-3">
							<div class="row">
								<div class="col-lg-9">
									<h1 class="font-18 mb-4">
<a href="#">Splat! Kickstarter at the 2017 London Design Festival</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__byline-user">
<a href="/profile/2122630074"><img class="blog-post__byline-avatar" alt="" style="height: auto;" src="https://ksr-ugc.imgix.net/assets/005/888/735/8ed072e33b601cb24bcb4ac8edcac904_original.jpg?w=40&amp;h=40&amp;fit=crop&amp;v=1461095278&amp;auto=format&amp;q=92&amp;s=44b0809bd70ab81f8c80ae94bdc3243b" width="40" height="40">
<div class="blog-post__byline-name">
Nick Yulman
</div>
</a></div>
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/community?ref=blog">Community</a>
</div>
<div class="blog-post__byline-date">
<p>Sep 13 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
									<div class="postImage"><img alt="" src="https://ksr-ugc.imgix.net/assets/018/303/620/f029d3ed0dcf14c08b757897593327bc_original.jpg?w=100&amp;h=100&amp;fit=crop&amp;v=1505253884&amp;auto=format&amp;q=92&amp;s=dbc9ac740a9d693ce670204b7eca1aa4"></div>
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
