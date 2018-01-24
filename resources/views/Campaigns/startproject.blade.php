@extends('layouts.default')
@section('content')
@if(session()->has('warning'))
<div class="alert alert-danger">
       {{ session()->get('warning') }}

    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  <section style="background-image:url({{$start_project->banner_image}}); background-size: cover; " class="pt-10 pb-5">
    <div class="container">
      <div class="text-center">
        <h2 class="font-40 zilla_slablight">{{$start_project->title}}</h2>
        <button type="button" name="button" class="btn btn-lg btn-danger mt-3 mb-5"> Start a project </button>
      </div>
    </div>
    <section>
      <div class="container">
        <ul class="nav nav-tabs start-nav justify-content-center" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Art</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Comics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false">Crafts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="home" aria-selected="true">Dance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-controls="profile" aria-selected="false">Design</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-controls="contact" aria-selected="false">Fashion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab7" role="tab" aria-controls="home" aria-selected="true">Film & Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-controls="profile" aria-selected="false">Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab9" role="tab" aria-controls="contact" aria-selected="false">Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab10" role="tab" aria-controls="contact" aria-selected="false">Journalism</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab11" role="tab" aria-controls="contact" aria-selected="false">Music</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab12" role="tab" aria-controls="contact" aria-selected="false">Photography</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab13" role="tab" aria-controls="contact" aria-selected="false">Publishing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab14" role="tab" aria-controls="contact" aria-selected="false">Technology</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab15" role="tab" aria-controls="contact" aria-selected="false">Theater</a>
          </li>
        </ul>
      </div>
    </section>
  </section>
  <section>
    <div class="container">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">ART</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>{{$start_project->description}}</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Comics</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="contact-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Crafts</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Dance</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="profile-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Design</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="contact-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Fashion</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="htab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Film & Video</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class=" bg-white">
                  <div class="videoWrapper">
                    <iframe src="https://www.youtube.com/embed/2ll4IA146YI" frameborder="0" allowfullscreen></iframe>
                  </div>
                  <div class="p-4">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="contact-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Food</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab9" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Games</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab10" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Journalism</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab11" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Music</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab12" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Photography</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab13" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Publishing</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab14" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Technology</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab15" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">Theater</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab16" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">ART</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab17" role="tabpanel" aria-labelledby="home-tab">
          <div class="art-cat">
            <div class="row">
              <div class="col-md-12">
                <h3 class="mt-3 mb-4">ART</h3>
              </div>
              <div class="col-md-8">
                <div class="big_type">
                  From postcard paintings to large public murals, thousands of art projects have broken new ground, sparked meaningful dialogue, and given people the opportunity to share their work with the world.
                </div>
                <div class="big_type_div">
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                  <div class="">
                    <div class="name">$ 89 million</div>
                    <p>Pledged to art</p>
                  </div>
                </div>
                <ul class="art-lst-styl">
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="div-img" style="background-image: url('http://provost.nus.edu.sg/images/profile-pic.png')">
                    </div>
                    <div class="div-txt">
                      <strong class="font-14">Chinati Foundation</strong>
                      <p class="font-12">raised $101,130 from 567 backers for <a href="#">“Robert Irwin Project.”</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="p-4 bg-white">
                  <h4>Interested?</h4>
                  <p>Click start and get sketching. See how it looks. Then share it with your friends!</p>
                  <a href="#" class="btn btn-danger btn-lg mb-4">Start a project</a>
                  <p>To launch a project, you must be within the Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, Netherlands, Norway, New Zealand, Sweden, Singapore, or United States (full details) and your project must meet Crowdfund's rules.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 startsPart">
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-9">
  				<h2 class="mb-5">{{$start_project->second_title}}</h2>				
  				
  				<p class="mb-5 big_type">{{$start_project->second_description}}</p>
  				<div class="hide block-md" style="background:url(https://static.kickstarter.com/assets/projects/learn/map-bdc6a70ced4a588e2ec21d605b20fc73ac37e37d24f53f677662e956c539e6c6.jpg) no-repeat; background-size: 100%; height: 128px;">
  				   <div class="overlayBack  p-3">
  				   	<div class="row">
  				   		<div class="col-lg-1"><i class="icon ion-android-pin"></i></div>
  				   		<div class="col-lg-11">
  				   			<p class="mb-0">12 Crowdfund projects have been successfully funded near you.<br>
Take a look at projects in Kolkata.</p>
  				   		</div>
  				   </div>
  				   </div>
  				</div>
  			</div>
  			<div class="col-lg-3">
  				<ul>
					<li class="mb-4">
					<div class="stat type-38 type-66-md ksr-red-400 font-weight-bold mb-0">13.9 <span>million people</span></div><div class="label">have backed a Crowdfund project</div>
					</li>
					<li class="mb-4">
					<div class="stat type-38 type-66-md ksr-red-400 font-weight-bold mb-0">4.5 <span>million people</span></div><div class="label">have backed more than one project</div>
					</li>
					<li>
					<div class="stat type-38 type-66-md ksr-red-400 font-weight-bold mb-0">604 <span>thousand people</span></div><div class="label">have backed ten or more projects</div>
					</li>
				</ul>
  			</div>
  		</div>
  	</div>
  </section>
  <section class="quotes js-quotes bg-red js-quotes hide block-md py14 loaded">
<div class="container">
<div class="row">
<div class="col-lg-6 pr8">
<h2 class="mb10">A Crowdfund project does more than raise money.<br>It builds community around your work.</h2>
<div class="quote-box relative">
<div class="mirror absolute b-6 l-6 mr6">
<div class="interior bg-white rounded-large p5">
<p class="type-24">
“Crowdfund creates a community of people interested in what you’re doing, and the community that’s created is important.”
</p>
<div>
<div class="avatar inline-block valign-middle mr1">
<img class="pill" alt="Braxton Pope" width="40" height="40" src="https://static.kickstarter.com/assets/projects/learn/braxton-pope-2c4fd1e27286d971cb7b4ea2e98573acbb64221bec5fe438d93bdd5e9f102739.jpg">
</div>
<div class="inline-block valign-middle">
<p class="mb0">
<b>Braxton Pope</b>
</p>
<div class="tiny_type">
raised $159,015 from 1,050 backers
</div>
</div>
</div>
</div>
<div class="arrow inline-block ml8 w0 h0"></div>
</div>
<div class="relative">
<div class="interior bg-white rounded-large p5">
<p class="type-24">
“Crowdfund creates a community of people interested in what you’re doing, and the community that’s created is important.”
</p>
<div>
<div class="avatar inline-block valign-middle mr1">
<img class="pill" alt="Braxton Pope" width="40" height="40" src="https://static.kickstarter.com/assets/projects/learn/braxton-pope-2c4fd1e27286d971cb7b4ea2e98573acbb64221bec5fe438d93bdd5e9f102739.jpg">
</div>
<div class="inline-block valign-middle">
<p class="mb0">
<b>Braxton Pope</b>
</p>
<div class="tiny_type">
raised $159,015 from 1,050 backers
</div>
</div>
</div>
</div>
<div class="arrow inline-block ml8 w0 h0"></div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="quote-box relative mb10">
<div class="mirror absolute b-6 l-6 mr6">
<div class="interior bg-white rounded-large p5">
<p class="type-24">
“The community we have all built in the past 30 days has been the greatest surprise.”
</p>
<div>
<div class="avatar inline-block valign-middle mr1">
<img class="pill" alt="Ian Wiley" width="40" height="40" src="https://static.kickstarter.com/assets/projects/learn/ian-wiley-0a031a85faa8b6da9636a825f82b2929e1d664224b6e7955b5f70407f3a87d69.jpg">
</div>
<div class="inline-block valign-middle">
<p class="mb0">
<b>Ian Wiley</b>
</p>
<div class="tiny_type">
raised $14,385 from 97 backers
</div>
</div>
</div>
</div>
<div class="arrow inline-block ml8 w0 h0"></div>
</div>
<div class="relative">
<div class="interior bg-white rounded-large p5">
<p class="type-24">
“The community we have all built in the past 30 days has been the greatest surprise.”
</p>
<div>
<div class="avatar inline-block valign-middle mr1">
<img class="pill" alt="Ian Wiley" width="40" height="40" src="https://static.kickstarter.com/assets/projects/learn/ian-wiley-0a031a85faa8b6da9636a825f82b2929e1d664224b6e7955b5f70407f3a87d69.jpg">
</div>
<div class="inline-block valign-middle">
<p class="mb0">
<b>Ian Wiley</b>
</p>
<div class="tiny_type">
raised $14,385 from 97 backers
</div>
</div>
</div>
</div>
<div class="arrow inline-block ml8 w0 h0"></div>
</div>
</div>
<div class="quote-box relative">
<div class="mirror absolute b-6 l-6 mr6">
<div class="interior bg-white rounded-large p5">
<p class="type-24">
“Crowdfund has been a powerful tool to connect with a community passionate about our work.”
</p>
<div>
<div class="avatar inline-block valign-middle mr1">
<img class="pill" alt="Jesse Genet" width="40" height="40" src="https://static.kickstarter.com/assets/projects/learn/jesse-genet-9c8bb0f68fa8303b67f25a500d02fda8917ea442c38bdfcb2170fe9f0029ed11.jpg">
</div>
<div class="inline-block valign-middle">
<p class="mb0">
<b>Jesse Genet</b>
</p>
<div class="tiny_type">
raised $13,597 from 188 backers
</div>
</div>
</div>
</div>
<div class="arrow inline-block ml8 w0 h0"></div>
</div>
<div class="relative">
<div class="interior bg-white rounded-large p5">
<p class="type-24">
“Crowdfund has been a powerful tool to connect with a community passionate about our work.”
</p>
<div>
<div class="avatar inline-block valign-middle mr1">
<img class="pill" alt="Jesse Genet" width="40" height="40" src="https://static.kickstarter.com/assets/projects/learn/jesse-genet-9c8bb0f68fa8303b67f25a500d02fda8917ea442c38bdfcb2170fe9f0029ed11.jpg">
</div>
<div class="inline-block valign-middle">
<p class="mb0">
<b>Jesse Genet</b>
</p>
<div class="tiny_type">
raised $13,597 from 188 backers
</div>
</div>
</div>
</div>
<div class="arrow inline-block ml8 w0 h0"></div>
</div>
</div>
</div>
</div>
</div>
</section>
  <section class="pt-5">
    <div class="container">
      <div class="text-center mt-3 mb-5">
        <h4>Running a profect has never been easier. Take the tour.</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-3">
          <ul class="strt-pjt-ul">
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">1. Build your project</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Paris')">2. Get feedback</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Tokyo')">3. Launch it to the world!</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'xxx')">4. Track funding progress</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'yyy')">5. Funded!</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'zzz')">6. Keep backers in the loop</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'aaa')">7. Send Rewards</a>
            </li>
            <li>
              <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'bbb')">8. You did it</a>
            </li>
          </ul>
          <div class="text-right">
            We guide you through the process so you can present your ideas clearly.
          </div>
        </div>
        <div class="col-md-9">
          <div id="London" class="tabcontent"><img src="https://static.kickstarter.com/assets/projects/learn/BuildYourProject-fbeeb44857abd61df1ef217824bf06741653740ee6d13ac8e37b66f9b04913ac.png" alt="" class="w-100">
          </div>
          <div id="Paris" class="tabcontent"><img class="w-100" src="https://static.kickstarter.com/assets/projects/learn/GetFeedback-42fb4a5e91eb478d86cd15414ad35162c0bcc376112c5ed684bbc82f0fc32ec5.png" alt="Getfeedback">
          </div>
          <div id="Tokyo" class="tabcontent"><img class="w-100" width="580" src="https://static.kickstarter.com/assets/projects/learn/LaunchYourProject-96c84de8e556d9497ed5da35d3d7a852832614421d6afa8875e8ae7a5c6c2d45.png" alt="Launchyourproject">			
        </div>
        <div id="xxx" class="tabcontent"><img class="w-100" width="580" src="https://static.kickstarter.com/assets/projects/learn/TrackProgress_alt-a0a24fe80e828a0fcef4e061e3a8c0836f796e1ec4e6c7b1946372105a6e1d42.png" alt="Trackprogress alt">
          </div>
          <div id="yyy" class="tabcontent"><img class="w-100" src="https://d3mlfyygrfdi2i.cloudfront.net/28a0/startpage_20130920_confetti_v2.jpg" alt="Startpage 20130920 confetti v2">
          </div>
          <div id="zzz" class="tabcontent"><img class="w-100" src="https://static.kickstarter.com/assets/projects/learn/SurveysUpdates-186e8ccfa1f3b997eadda955c2bc66f8b72fed41bb0996f257a92217989d40f9.png" alt="Surveysupdates">
          </div>
          <div id="aaa" class="tabcontent"><img class="w-100" src="https://static.kickstarter.com/assets/projects/learn/FulfillRewards-626018371e27f2c5fbda5db024b982379070989059c795c0e9d3da47856fdb1d.png" alt="Fulfillrewards">
          </div>
          <div id="bbb" class="tabcontent"><img class="w-100" src="https://static.kickstarter.com/assets/projects/learn/creativefulfillment-afb256bd6219ccd91f6c372c29f3577eb96cb6a1ef729c3f55fb583b164b57ca.png" alt="Creativefulfillment">
          </div>
      </div>
    </div>
  </section>
  <!-- <section class="mt-5 mb-5">
    <div class="row">
      <div class="col-mg-6">

      </div>
      <div class="col-mg-6">

      </div>
    </div>
  </section> -->
    <section class="pt-5 pb-5 bg-white">
      <div class="container">
        <div class="row justify-content-md-center startProjects">
          <div class="col-lg-5 ">
            <h6 class="mb-3 font-weight-bold font-24 text-center">Get started</h6>
            {!! Form::open(['url' => 'campaignfirststep','method'=>'post']) !!}
             <input type="hidden" value="1" name="step">
              <div class="form-row">
                <div class="col-12 mb-4">
                	<h2>Chosse a category</h2>
                    <select name="category_id" required="" class="form-control" id="category_id">
                     <option value="">Select Category</option>
                     @if($categories)
                     @foreach($categories as $category)
                     <option value="{{$category->id}}" {{(!empty($selectcategory) and $selectcategory==$category->id)?'selected':''}}>{{$category->name}}</option>
                     @endforeach
                     @endif

                    </select>
                </div>
                <div class="col-12  mb-4">
                	<h2>Give your project a title</h2>
                    <input type="text" class="form-control" placeholder="title" required="" name="title">
                </div>
                <div class="col-12  mb-4">
                	<h2>Your <span class="tooltip1">permanent residence:
                			<span class="tooltiptext">Choose the country where you have a primary address, bank account, and government-issued ID. <br/><br/> You must be at least 18 years old and a permanent resident of one of the following countries: Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, the United Kingdom, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, the Netherlands, Norway, New Zealand, Sweden, Singapore, and the United States.</span></span></h2>
                   <input type="text" class="form-control" placeholder="Your country" required="" name="country">

                </div>

                <div class="col-5  mb-4">
                    <button class="btn btn-danger btn-block bg-red font-14 font-weight-bold" style=" cursor:pointer;" type="submit">Save and continue</button>
                </div>

              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
    <section class="bg-white py-5">
      <div class="container">
        <h3 class="mb-5"> WHY CROWDFUND? </h3>
        <div class="row">
          <div class="col-md-6">
            <h4>Crowdfund is just for creative projects.</h4>
            <p>We built Crowdfund as a tool for artists, designers, makers, musicians, and creative people everywhere. We’re proud to be the only platform that’s fully dedicated to building community around creative projects.</p>
          </div>
          <div class="col-md-6">
            <h4>Our community wants to support you.</h4>
            <p>Millions of backers agree — helping to create something new is exciting. People love peeking behind the creative curtain and directly supporting the creative process. In fact, 12.5 million people have pledged more than $2.88 billion to bring Crowdfund projects to life over the years.</p>
          </div>
          <div class="col-md-6">
            <h4>Crowdfund is just for creative projects.</h4>
            <p>We built Crowdfund as a tool for artists, designers, makers, musicians, and creative people everywhere. We’re proud to be the only platform that’s fully dedicated to building community around creative projects.</p>
          </div>
          <div class="col-md-6">
            <h4>Our community wants to support you.</h4>
            <p>Millions of backers agree — helping to create something new is exciting. People love peeking behind the creative curtain and directly supporting the creative process. In fact, 12.5 million people have pledged more than $2.88 billion to bring Crowdfund projects to life over the years.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="accordionPart">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6">
    				 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What can I use Crowdfund to fund?
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <p>Crowdfund is specifically for creative projects in the following categories: Art, Comics, Crafts, Dance, Design, Fashion, Film & Video, Food, Games, Journalism, Music, Photography, Publishing, Technology, and Theater. Make an album, write a book, create an immersive theater experience, score a film — you name it. Read more about our project guidelines.</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Where is Crowdfund available?
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       <p> Anyone, anywhere can pledge to a project with a major credit card or debit card.</p>

<p>Anyone in the following countries can start a project: Austria, Australia, Belgium, Canada, Switzerland, Germany, Denmark, Spain, France, the UK, Hong Kong, Ireland, Italy, Japan, Luxembourg, Mexico, the Netherlands, Norway, New Zealand, Sweden, Singapore, or the US. Learn more</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Who can I get pledges from?
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <p>Millions of people visit Crowdfund every week, but support always begins with people you know. Friends, fans, and the communities you’re a part of will likely be some of your earliest supporters, not to mention your biggest resources for spreading the word about your project.</p>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          
Does Crowdfund screen projects?
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        <p>We review projects before they launch to make sure they meet our requirements, and this may take up to three days.</p>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSeven">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          

What is Crowdfund’s fee?
        </a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
      <div class="panel-body">
        <p>If a project is successfully funded, Crowdfund collects a 5% fee from the final funding total. If a project is not successfully funded, no fees are collected.
</p>
<p>
Stripe, our payments partner, collects and processes Crowdfund pledges, and their payment processing fees work out to roughly 3-5%. See a detailed fees breakdown here.
</p>
<p>
Note: As a Crowdfund creator you keep 100% control over your work, which means you’ll never have to give up ownership to Crowdfund or your backers
</p>
      </div>
    </div>
  </div>
  
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingEight">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">How can I get my project featured as a Project We Love?
        </a>
      </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
      <div class="panel-body">
        <p>Projects We Love is a collection of projects that do an exceptional job of using Crowdfund, whether through a well-executed video, extra thoughtful rewards, or an extremely compelling story. Our team handpicks each project, recognizing creators for the work they’ve put into making a one-of-a-kind project page. You can find more tips about how to get featured 
</p>
<a href="https://www.kickstarter.com/blog/how-to-get-featured-on-kickstarter">Click here</a>
      </div>
    </div>
  </div>
</div>
    			</div>
    			<div class="col-lg-6">
    				 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingNine">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
          
How much work is it to run a project?
        </a>
      </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNine">
      <div class="panel-body">
       <p> Every Crowdfund project has its share of exhilarating and challenging moments, but the amount of work generally depends on the size and complexity of the project.</p>

<p>Expect the first few days after launch to be very busy as you spread the word to your community, answer questions from potential backers, and more. You may need to spend the last few days rallying your social networks in order to reach your funding goal.</p>

<p>Projects sometimes take on a life of their own, and in that case you should expect to spend more time creating and fulfilling rewards.</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTen">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">Do I have to make a video?
        </a>
      </h4>
    </div>
    <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
      <div class="panel-body">
       <p> Though videos are not required, we strongly encourage making one. More than 80% of projects have videos, and projects that don’t tend to have a lower chance of being successful. To show you how easy it is to make a video, we made a fun how-to, just for you. Watch “How to Make An Awesome Video”</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingdddd">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsedddd" aria-expanded="false" aria-controls="collapsedddd">
          
What happens if I get funded?
        </a>
      </h4>
    </div>
    <div id="collapsedddd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingdddd">
      <div class="panel-body">
        <p>First, your backers' cards are charged and then after about two weeks funds will be sent to your bank account from our payments processor, Stripe. The rest is up to you.</p>

<p>As you work, post updates for backers when you have big news or just to check in. Backers love hearing from creators and they appreciate progress reports, even when things aren’t going so well.</p>

<p>When rewards are ready, our survey tool will help you get all the info you need from each backer — mailing address, t-shirt size, color preference, etc. Ask friends to help package rewards and then mail them out with love.</p>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingsss">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesss" aria-expanded="false" aria-controls="collapsesss">
          

What happens if I don’t get funded?
        </a>
      </h4>
    </div>
    <div id="collapsesss" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsss">
      <div class="panel-body">
        <p>If your project does not reach its funding goal, backers will not be charged and money will not be collected or distributed. Even if your project doesn’t get funded, you’ll still get useful feedback from the experience and often find a new audience for your work. You’re always welcome to re-launch your project on Crowdfund and apply what you’ve learned from your first project.</p>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingffff">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseffff" aria-expanded="false" aria-controls="collapseffff">
          

 How do I get in touch with questions?
        </a>
      </h4>
    </div>
    <div id="collapseffff" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingffff">
      <div class="panel-body">
        <p>You can reach out with your questions through this <a href="#">contact form</a>. We also recommend taking a look at <a href="#">our FAQs</a> for more detailed information, along with the <a href="#">creator handbook</a> for guidance on starting and running a project.</p>
      </div>
    </div>
  </div>
</div>
    			</div>
    		</div>
    	</div>
    </section>
    <section style="background-image:url('https://static.kickstarter.com/assets/projects/learn/end-bg-a747a210c03f839aba12f390b745b7682527f0d3aa31e591d124857a49287272.jpg')" class="pt-5 pb-5 creative-btn">
      <div class="container">
        <h4 class="text-center text-white zilla_slablight font-weight-bold">“ A way for every creative person to <br> control their destiny ”</h4>
        <p class="text-center text-white zilla_slablight">— Brian Fargo, successful Crowdfund project creator </p>
        <div class="center-list mt-5">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-5">
                  <a href="#" class="btn btn-lg btn-outline-dark btn-block"> Meet our creators </a>
                </div>
                <div class="col-md-2 text-center text-white d-flex align-items-center justify-content-center"> - or - </div>
                <div class="col-md-5">
                  <a href="#" class="btn btn-lg btn-danger btn-block">Start sketching a project </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
    $(document).ready(function(){
    $("#category_id").change(function(){
    $.get("{{URL::asset('/')}}category/child/"+$(this).val(),function(data){
    $("#sub_category_id").html(data);
    });
    });
    });
    </script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
	$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
@stop
