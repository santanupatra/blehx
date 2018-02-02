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


<section class="ourservice-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h2 class="text-uppercase h1">Our Services</h2>
				</div>
			</div>
		</div>
		

		<div class="ourservice-div">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-uppercase h4">Top questions</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="os-faq-div">
						<div id="main">
			                <a href="#" class='new'>
			                	<i class="fa fa-hand-o-right"></i>
			                 What is Blehx Mining &quest;</a>
			                <div class="open">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur at velit eos veniam incidunt dolore hic, a cum officiis, inventore id, mollitia vitae numquam officia adipisci explicabo, praesentium. Voluptate, recusandae!
			                </div>

			                <a href="#" class='new'><i class="fa fa-hand-o-right"></i> 
			                	How does bitcoin mining work with Blehx Mining &quest;</a>
			                <div class="open">
			                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique eos, minima commodi quibusdam repellendus temporibus ipsum ut ipsa esse eligendi consectetur perspiciatis, nesciunt inventore tempora, delectus dignissimos, nostrum dolorem quo?
			                </div>

			                <a href="#" class='new'><i class="fa fa-hand-o-right"></i>
			                 Is mining bitcoins profitable &quest; If so, then why are you not mining yourself &quest; </a>
			                <div class="open">
			                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut aliquid iusto corrupti nulla assumenda fugiat autem dolorum pariatur molestiae. Non dolor aut beatae, atque aliquam quos hic possimus eos voluptate.
			                </div>
				        </div> 
					</div>
				</div>

				<div class="col-md-6">
					<div class="os-faq-div">
						<div id="main">
			                <a href="#" class='new'>
			                	<i class="fa fa-hand-o-right"></i>
			                  How do your Ether contracts work &quest;</a>
			                <div class="open">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur at velit eos veniam incidunt dolore hic, a cum officiis, inventore id, mollitia vitae numquam officia adipisci explicabo, praesentium. Voluptate, recusandae!
			                </div>

			                <a href="#" class='new'><i class="fa fa-hand-o-right"></i> 
			                	 How does our Affiliate Program work &quest;</a>
			                <div class="open">
			                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique eos, minima commodi quibusdam repellendus temporibus ipsum ut ipsa esse eligendi consectetur perspiciatis, nesciunt inventore tempora, delectus dignissimos, nostrum dolorem quo?
			                </div>

			                <a href="#" class='new'><i class="fa fa-hand-o-right"></i>
			                 How frequently will I receive my payouts &quest; </a>
			                <div class="open">
			                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut aliquid iusto corrupti nulla assumenda fugiat autem dolorum pariatur molestiae. Non dolor aut beatae, atque aliquam quos hic possimus eos voluptate.
			                </div>
				        </div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<script>
    $(document).ready(function () {
        var $accord = $('.open');
        $(".new").click(function () {
        var $ans = $(this).next(".open").slideToggle(500);
        $accord.not($ans).filter(':visible').stop().slideUp();
        });
    });
</script>

@stop
