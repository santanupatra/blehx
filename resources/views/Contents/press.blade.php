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
<section class="page_block_color_lavender">
	<div class="container">
		<div class="row page_block_content_tall">
			<div class="col-lg-6 mx-auto">
				<h1 class="type_mega_sans text-center mb-3">Pressroom</h1>
				<p>Crowdfund is a funding platform for creative projects. Everything from films, games, and music to art, design, and technology. Crowdfund is full of ambitious, innovative, and imaginative ideas that are brought to life through the direct support of others.</p>

<p>Working on a Crowdfund story? 
If you have questions, we've got answers.</p>
<a class="btn btn-white btn-large" href="mailto:press@crowdfund.com">press@crowdfund.com</a>
			</div>
		</div>
	</div>
</section>
<section class="pageblock">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<div class="purpleColor pullUpCallOut">
					<div class="colorcallOutContent typeXl">
						Since our launch, on April 28, 2009, <span class="colorHighlight">14 million people</span> have backed a project, <span class="colorHighlight">$3.4 billion</span> has been pledged, and <span class="colorHighlight">134,784</span> projects have been successfully funded.
					</div>
					<a class="btn btn_border_white color_callout_btn" href="#">See all our stats</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="basics pageBlockContent">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<p class="typeXl">The basics</p>
			</div>
			<div class="col-lg-8">
				<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title mb-2">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="mb-0">How does Crowdfund work?
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <p>Thousands of creative projects are funding on Crowdfund at any given moment. Each project is independently created and crafted by the person behind it. The filmmakers, musicians, artists, and designers you see on Crowdfund have complete control and responsibility over their projects. They spend weeks building their project pages, shooting their videos, and brainstorming what rewards to offer backers. When they're ready, creators launch their project and share it with their community.</p>

<p>Every project creator sets their project's funding goal and deadline. If people like the project, they can pledge money to make it happen. If the project succeeds in reaching its funding goal, all backers' credit cards are charged when time expires. If the project falls short, no one is charged. Funding on Crowdfund is all-or-nothing.</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why do people back projects?
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <p>A lot of backers are rallying around their friends' projects. Some are supporting people they've long admired. Many are just inspired by a new idea. Others are inspired by a project's rewards — a copy of what's being made, a limited edition, or a custom experience related to the project.</p>

<p>Backing a project is more than just giving someone money. It's supporting their dream to create something that they want to see exist in the world.</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Do backers get ownership or equity in the projects they fund?
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <p>No. Project creators keep 100% ownership of their work. Crowdfund cannot be used to offer financial returns or equity, or to solicit loans.</p>

<p>Some projects that are funded on Crowdfund may go on to make money, but backers are supporting projects to help them come to life, not to financially profit.</p>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
Can Crowdfund be used to fund anything?
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <p>We allow creative projects in the worlds of Art, Comics, Crafts, Dance, Design, Fashion, Film & Video, Food, Games, Journalism, Music, Photography, Publishing, Technology, and Theater.</p>

<p>Everything on Crowdfund must be a project. A project has a clear goal, like making an album, a book, or a work of art. A project will eventually be completed, and something will be produced by it.</p>

<p>Crowdfund does not allow projects to fundraise for charity or offer financial incentives. Check out our rules for details.</p>
      </div>
    </div>
  </div>
  
  
  
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">

Who is responsible for completing a project as promised?
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
        <p>It's the project creator's responsibility to complete their project. Crowdfund is not involved in the development of the projects themselves.</p>

<p>Crowdfund does not guarantee projects or investigate a creator's ability to complete their project. On Crowdfund, backers ultimately decide the validity and worthiness of a project by whether they decide to fund it.</p>
      </div>
    </div>
  </div>
  
  
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">

How does Crowdfund make money?
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        <p>

If a project is successfully funded, Crowdfund applies a 5% fee to the funds collected. All pledges are processed securely by our third-party payments partner, Stripe. These payment processing fees work out to roughly 3-5%. View the fee breakdowns.</p>

<p>If the project does not reach its funding goal, there are no fees.</p>
      </div>
    </div>
  </div>
  
</div>
</div>
			</div>
		</div>
	</div>
</section>
<section class="ourStory">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blueColor">
					<div class="row">
						<div class="col-lg-10 mx-auto">
							<div class="color-callout-attribution top text-center">
								Our story, <br>
								as told by founder Perry Chen
							</div>
							<div class="typeXlSerif">
								"I was living in New Orleans in late 2001 and I wanted to bring a pair of DJs down to play a show during the 2002 Jazz Fest. I found a great venue and reached out to their management, but in the end the show never happened—it was just too much money..."
								<div><a class="btn btn_border_white color_callout_btn" href="javascript:void(0);">
Read the full story</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="my-4">
	<div class="page-block page-block--image founders"></div>
	<div class="container">
		<div class="row my-5">
			<div class="col-12 col-lg-6">
				<p class="font-32">Charles Adler</p>
			</div>
			<div class="col-12 col-lg-6">
				<p>Charles Adler is a co-founder of Crowdfund. Charles served as Crowdfund's Head of Design through fall 2013. He now serves as an advisor. Prior to Crowdfund, Charles co-founded the online art publication Subsystence as well as Source-ID, an independent interaction design studio.</p>
			</div>
			<div class="col-12 col-lg-6">
<p class="font-32">Perry Chen</p></div>
			<div class="col-12 col-lg-6">
				<p>Perry Chen is the Creator and Chairman of Crowdfund. He served as Crowdfund's CEO through 2013. Perry grew up in New York City and lived in New Orleans for eight years, where he worked on music and had the idea for Crowdfund. He also co-founded Southfirst gallery in Brooklyn, NY in 2001.</p>
			</div>
			<div class="col-12 col-lg-6"><p class="font-32">Yancey Strickler</p></div>
			<div class="col-12 col-lg-6"><p>Yancey Strickler is a co-founder of Crowdfund. Yancey served as Crowdfund's Head of Community, Head of Communications and CEO from 2014 through the summer of 2017. Prior to Crowdfund, he was a music journalist whose writing appeared in The Village Voice, New York magazine, Pitchfork, and other publications.</p></div>
		</div>
	</div>
</section>
<section class="py-2">
	<div class="page-block page-block--image yasmin"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="colorOrange pullUpCallOut">
					<p>"Crowdfund is a truly amazing platform. Not just for the funding, but for the creative connections, the confidence and drive it gives you as a creator, and the public space it provides to showcase something you feel passionately about."
<span class="mt-4 d-block font-14 text-center">— Yasmin Khan</span></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row my-3">
			<div class="col-12 col-lg-6">
				<p class="font-32">Highlights</p>
			</div>
			<div class="col-12 col-lg-6">
				<p>Thirteen Crowdfund-funded films have been nominated for Academy Awards. (One of them, Inocente, took home an Oscar in 2013.) Crowdfund-funded albums have topped Billboard charts, won Grammy Awards, and given music-industry legends newfound creative freedom. We’ve watched artworks go on to be exhibited at MoMA, the Whitney Biennial, the Kennedy Center, the Walker Art Center, the Smithsonian, and the American Folk Art Museum. We’ve seen comics nominated for Eisner Awards, dances performed by the Martha Graham Dance Company, new inventions adopted by tech giants, and at least a dozen items launched into space. One project even won the American Helicopter Society’s elusive Sikorsky Prize, unclaimed for thirty years.</p>

<p>Crowdfund projects come in all sizes — and from newsmaking creations to whole movements of small, personal projects, they’re building the culture of tomorrow.</p>
			</div>
		</div>
	</div>
</section>
<script>
	$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>

@stop
