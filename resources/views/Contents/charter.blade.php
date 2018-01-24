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

    <!--  Charter  -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-10 col-center my-5">
					<h1 class="font-red text-center mb-3">Kickstarter is a<br> Benefit Corporation</h1>
					<p class="type-base">Kickstarter’s mission is to help bring creative projects to life. We measure our success as a company by how well we achieve that mission, not by the size of our profits. That’s why we <a href="">reincorporated Kickstarter</a> as a Benefit Corporation in 2015.</p>
					<p class="type-base">Benefit Corporations are for-profit companies that are obligated to consider the impact of their decisions on society, not only shareholders. Radically, positive impact on society becomes part of a Benefit Corporation’s legally defined goals. When a company becomes a Benefit Corporation, it can choose to make further commitments. In our new charter (shown below) we spell out our mission, our values, and the commitments we have made to pursue them. </p>
				</div>
			</div>
		</div>
	</section>
	<section class="page-block py-5">
		<div class="container">
			<div class="row mb-3">
				<div class="col-lg-12 col-md-12">
					<h5 class="font-red mb-4"><b>1</b></h5>
				</div>
				<div class="col-lg-5 col-md-5">
					<h3>Kickstarter’s mission is to help bring creative projects to life</h3>
				</div>
				<div class="col-lg-6 col-md-6 ml-auto">
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will create tools and resources that help people bring their creative projects to life, and that connect people around creative projects and the creative process.</p>
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will care for the health of its ecosystem and integrity of its systems.</p>
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will engage beyond its walls with the greater issues and conversations affecting artists and creators.</p>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-12 col-md-12">
					<h5 class="font-red mb-3"><b>2</b></h5>
				</div>
				<div class="col-lg-5 col-md-5">
					<h3>Kickstarter’s operations will reflect its values</h3>
				</div>
				<div class="col-lg-6 col-md-6 ml-auto">
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will never sell user data to third parties. It will zealously defend the privacy rights and personal data of the people who use its service, including in its dealings with government entities.</p>
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter’s terms of use and privacy policies will be clear, fair, and transparent. Kickstarter will not cover every possible future contingency, or claim rights and powers just because it can or because doing so is industry standard. </p>
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will not lobby or campaign for public policies unless they align with its mission and values, regardless of possible economic benefits to the company. </p>
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will not use loopholes or other esoteric but legal tax management strategies to reduce its tax burden. Kickstarter will be transparent in reporting the percentage of taxes it pays and explaining the many factors that affect its tax calculation. </p>
					<p class="counter-bullet counter-bullet-lettered type-base">Kickstarter will seek to limit environmental impact. It will invest in green infrastructure, support green commuting methods, and factor environmental impact when choosing vendors. Additionally, Kickstarter will provide recommendations and resources that help creators make environmentally conscious decisions on tasks, like shipping and packaging, that are common to the use of its services.</p>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-12 col-md-12">
					<h5 class="font-red mb-4"><b>3</b></h5>
				</div>
				<div class="col-lg-5 col-md-5">
					<h3>Kickstarter supports a more creative and equitable world</h3>
				</div>
				<div class="col-lg-6 col-md-6 ml-auto">
					<p class="type-base">Kickstarter will annually donate 5% of its after-tax profit towards arts and music education, and to organizations fighting to end systemic inequality as further defined in sections 4(c) and 5(c) below (the “5% pledge”). </p>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-12 col-md-12">
					<div class="color-callout bg-red">
						<div class="color-callout-content font-30 font-white">
							We will deliver a benefit statement annually that will measure the results of our efforts to promote these public benefits. 
							<div class="color-callout-attribution bottom font-14">
								<a href="" class="btn btn-border-white">Read our first annual Benefit Statement </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
     


@stop
