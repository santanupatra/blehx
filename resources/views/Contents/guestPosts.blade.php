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
<a class="nav--subnav__item__link nav--subnav__item__link--gray current" href="#">Guest Posts</a>
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
<a href="#">Jesse Genet of Lumi Shares Three Practical Steps for Planning Your Packaging</a>
</h1>								
<div class="blog-post__byline">
<div class="blog-post__byline-user">
<a href="/profile/lumi"><img class="blog-post__byline-avatar" alt="" style="height: auto;" src="https://ksr-ugc.imgix.net/assets/005/772/060/85943d46b0231ab7c5c2e157b24af170_original.jpg?w=40&amp;h=40&amp;fit=crop&amp;v=1473784036&amp;auto=format&amp;q=92&amp;s=9f8995e2aa7eab0d75cedf8a4e9cef80" width="40" height="40">
<div class="blog-post__byline-name">
Lumi
</div>
</a></div>
<div class="blog-post__tags">
<a class="blog-post__tag" href="/blog/categories/guest%20posts?ref=blog">Guest Posts</a>
<a class="blog-post__tag" href="/blog/categories/tips?ref=blog">Tips</a>
<a class="blog-post__tag" href="/blog/categories/video?ref=blog">Video</a>
</div>
<div class="blog-post__byline-date">
<p>Oct 9 2017</p>
</div>
</div>
								</div>
								<div class="col-lg-3">
									<div class="postImage"><img alt="" src="https://ksr-ugc.imgix.net/assets/018/638/591/15d8a2ea33216cc0eeb7e4df26ba95f6_original.jpg?w=100&amp;h=100&amp;fit=crop&amp;v=1507317405&amp;auto=format&amp;q=92&amp;s=8047ab327b5a1c9d5b956d299ccbdb1a"></div>
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
