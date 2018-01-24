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
<section class="homebanner" style="background: url('{{$fundraise_setting->banner}}') center center !important; background-size: cover;">
    <div class="container">
      <div class="inner d-flex justify-content-center align-items-center">
        <div class="d-inline-block homebannerText text-center">
          <h1 class="text-white zilla_slablight font-60">{{$fundraise_setting->banner_text1}} <br> {{$fundraise_setting->banner_text2}}.</h1>
          <a  class="btn btn-danger bg-red latosemibold font-18" href="{{URL::asset('/')}}start-project">Start a project</a>
        </div>
      </div>
    </div>
  </section>
  <section class="mt-5 mb-5">
    <div class="container">
      <div class="row">
      	<div class="col-lg-12 col-xl-12">
      		<h2 class="text-center red-dark font-16 font-weight-bold mb-4">Create a project in any of the following categories</h2>
      		<ul class="mx-auto w-1000 text-center nav nav-tabs d-flex justify-content-center align-items-center" role="tablist">
                                @if($categories)
                                @foreach($categories as $key=> $category)
                                <li class="d-inline-block mx-1 mb-4 nav-item">
					<a class="catbtn btn btn--gray btn-primary nav-link {{$key==0?'art':'comics'}}-background {{$key==0?'active':''}}" href="#profile" role="tab" data-toggle="tab"
                                           onclick="getdetails('{{$category->id}}','{{$category->name}}');" id="catbtn{{$category->id}}"
                                           >{{$category->name}}</a>
				</li>
                                @endforeach
                                @endif
				
      		</ul>
      		
      		
               <div class="tab-content">
				  <div role="tabpanel" class="tab-pane in active" id="profile">
				  	<div class="py-4">
				  		<h2 class="artText font-weight-bold font-30" id="category_name"></h2>
				  		<div class="row">
				  			<div class="col-lg-8 col-xl-8 col-md-6 col-12 font-24 postCode" id="catdetail">
				  				
				  			</div>
							<div class="col-lg-4 col-xl-4 col-md-6 col-12">
								<div class="bg-faded rounded-large p-4 right-side">
										<h4 class="font-16 font-weight-bold mb-2">Interested?</h4>
										<p class="font-16">Click start and get sketching. See how it looks. Then share it with your friends!</p>
										<a class="btn btn-primary btn-red btn-lg" href="{{URL::asset('/')}}start-project">Start a project</a>
										<p class="mt-3">
										We're here for you! Our Community Managers know all about running projects in each of our categories. Drop us a line about your project idea: <a href="mailto:art@kickstarter.com">art@kickstarter.com</a>.
										Got questions about something else? Visit our <a href="#">Help center</a>.
										</p>
										<p class="font-12 mb-0">
										To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (<a href="#">full details</a>) and your project must meet Kickstarter's <a target="_blank" href="#">rules</a>.
										</p>
								</div>
							</div>
				  		</div>
					</div>
				  </div>
				 
				 
				 
				</div>
      	</div>
      </div>
    </div>
  </section>
 
    <!--  testimonials  -->

     @if ($testimonials)

      <section class="testimonials py-5 bg-faded text-center">
          <div class="container">
              <div id="carouseltestimonials" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                    @foreach ($testimonials as $key => $testimonial)
                    <div class="carousel-item {{$key==1?'active':''}}">
                      <div class="row justify-content-center">
                          <div class="col-lg-8 col-test">
                              <h1 class="mb-4 font-30">{{$testimonial['title']}}</h1>
                              <h5 class="font-18 font-theme line-hight-30">{{$testimonial['description']}}</h5>
                              <div class="test-pic my-3 mx-auto">
                                  <img src="{{$testimonial['user_image']}}" alt="" class="img-responsive" style=" height:84px; width:84px; border-radius:52px;">
                              </div>
                              <h5 class="font-16 font-weight-bold">{{$testimonial['username']}}</h5>
                          </div>
                      </div>
                    </div>
                  @endforeach  
                  </div>
                  <ol class="carousel-indicators mt-3">
                    <li data-target="#carouseltestimonials" data-slide-to="0" class="active"></li>
                    <li data-target="#carouseltestimonials" data-slide-to="1"></li>
                    <li data-target="#carouseltestimonials" data-slide-to="2"></li>
                  </ol>
                </div>
          </div>
      </section>
     @endif


      <section class="mt-4 mb-4">
        <div class="container">
          <h3 class="text-center mb-5 font-40">Why Choose Us</h3>
          <div class="row">
            <div class="col-lg-6">
              <h4 class="font-24 mb-3">Just for creative projects</h4>
              <p class="font-14 font-theme">{{$fundraise_setting->project_text1}}</p>
              <h4 class="font-24 mb-3">Just for creative projects</h4>
              <p class="font-14 font-theme">{{$fundraise_setting->project_text2}}</p>
            </div>
            <div class="col-lg-6">
              <section class="faq">
                <div class="container">
                    <div aria-multiselectable="true" role="tablist" id="accordion">
                        @if(!empty($faqs))
                        @foreach($faqs as $key=> $faq)
                        <div class="card mb-3">
                          <div id="headingOne{{$key}}" role="tab" class="card-header border-bottom-0 bg-dip-gray">
                            <h4 class="mb-0">
                              <a class="d-block text-blue" aria-controls="collapseOne{{$key}}" aria-expanded="true" href="#collapseOne{{$key}}" data-parent="#accordion" data-toggle="collapse">
                                <span class="font-14">{{$faq->title}}</span> <i class="ion-ios-plus-outline float-right"></i>
                              </a>
                            </h4>
                          </div>

                          <div aria-labelledby="headingOne{{$key}}" role="tabpanel" class="collapse {{$key==0?'show':''}}" id="collapseOne{{$key}}">
                            <div class="card-block pt-0">
                              <p class=" font-14 bg-faded p-3 font-theme">{{$faq->description}}</p>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        @endif
                       
                      </div>
                </div>
            </section>
            </div>
          </div>
        </div>
      </section>

      <section class="homebanner" style="background-image: url('{{$fundraise_setting->footer_banner}}');">
        <div class="container">
          <div class="inner d-flex justify-content-center align-items-center" style=" height: 425px; ">
            <div class="d-inline-block homebannerText text-center">
              <h3 class="text-white mb-4 zilla_slablight">“{{$fundraise_setting->footer_text1}}”</h3>
              <p class="text-white mb-4 font-18">— {{$fundraise_setting->footer_text2}}</p>
              <div class="row">
                <div class="col-md-6">
                  <button type="button" name="button" class="btn btn-danger bg-red btn-block font-weight-bold mb-2">Meet our creators</button>
                </div>
                <div class="col-md-6">
                  <button type="button" name="button" class="btn btn-outline-primary white  btn-block font-weight-bold mb-2">Start sketching a project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     <script>
         
         $(document).ready(function(){
          getdetails('{{$categories[0]->id}}','{{$categories[0]->name}}');   
         });
         function getdetails(camp_id,camp_title)
         {
             $(".catbtn").removeClass("active");
             $("#catbtn"+camp_id).addClass("active");
             $("#category_name").html(camp_title);
             $.get("{{URL::to('')}}/category/"+camp_id,function(data){
             $("#catdetail").html(data);  
             });
             
         }
         
         
     </script>    




@stop


