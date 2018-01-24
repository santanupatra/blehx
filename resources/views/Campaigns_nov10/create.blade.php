

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
<section class="mt-5 mb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-xl-12 tabberPart">
            <div class="d-flex justify-content-center align-items-center">
               <ul class="d-inline-block left exitEditor mr-2">
                  <li ><a class="btn btn-primary bttn-black block p-3 rounded border">�? Exit editor</a></li>
               </ul>
               <ul class="nav nav-tabs left pr-2 steps left bg-white border rounded p-1" role="tablist">
                  <li class="nav-item border-right-1">
                     <a class="nav-link active" href="#profile" role="tab" data-toggle="tab" id='profile_tab'>
                     <span class="checkIcon icon ion-ios-checkmark"></span><span class="basics pl-3">Basics</span>
                     </a>
                  </li>
                  <li class="nav-item border-right-1">
                     <a class="nav-link" href="#buzz" role="tab" data-toggle="tab" id='buzz_tab'><span class="checkIcon icon ion-ios-checkmark"></span><span class="basics pl-3">Rewards</span></a>
                  </li>
                  <li class="nav-item border-right-1">
                     <a class="nav-link" href="#references" role="tab" data-toggle="tab" id='references_tab'><span class="checkIcon icon ion-ios-checkmark"></span><span class="basics pl-3">Story</span></a>
                  </li>
                  <li class="nav-item border-right-1">
                     <a class="nav-link" href="#references1" role="tab" data-toggle="tab" id='references1_tab'><span class="checkIcon icon ion-ios-checkmark"></span><span class="basics pl-3">About You</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#references2" role="tab" data-toggle="tab" id='references2_tab'><span class="checkIcon icon ion-ios-checkmark"></span><span class="basics pl-3">Account</span></a>
                  </li>
               </ul>
               <ul class="d-inline-block left exitEditor ml-2">
                  <li ><a class="block p-3 rounded border">Preview</a></li>
               </ul>
            </div>
            <div class="clearfix"></div>
            <!-- Tab panes -->
            <div class="tab-content">
               <div role="tabpanel" class="tab-pane in active" id="profile">
                  <h2 class="text-center mt-5 font-weight-bold">Let’s get started.</h2>
                  <p class="text-center">Make a great first impression with your project’s title and image, and set your funding goal, campaign duration, and project category.</p>
                  <div class="border rounded clearfix mt-5 p-4">
                     <div class="row">
                        <div class="col-lg-8 col-xl-8 col-12">
                           {!! Form::open(['url' => 'campaign/update/'.$campaign->id,'method'=>'put','files'=>true]) !!}
                           <input type="hidden" name="lat" id="lat" value="{{$campaign->lat}}">
                           <input type="hidden" name="lang" id="lang" value="{{$campaign->lang}}">
                           <input type="hidden" name="hide_image"  value="{{$campaign->photo}}">
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Project image</label>
                                 <div class="col-lg-9">
                                    <div class="asset_upload">
                                       <div class="upload">
                                          <input name="photo" id="campaign_photo" class="photo file"  data-help_section="project-image-help" type="file"
                                          {{empty($campaign->photo)?'required':''}}>
                                          <strong class="text-center">
                                             <img id="blah" class="img-fluid" src="{{!empty($campaign->photo)?$campaign->imgpath->path:''}}">
                                             <div class="clearfix"></div>
                                             Choose an image from your computer <span class="has_file_hide d-block mt-3">This is the main image associated with your project. Make it count!</span><span>JPEG, PNG, GIF, or BMP • 50MB file limit</span> <span>At least 1024x576 pixels • 16:9 aspect ratio</span>
                                          </strong>
                                       </div>
                                    </div>
                                    <div class="field-help-2">
                                       <p>
                                          This is the first thing that people will see when they come across your project. Choose an image that’s crisp and text-free. <a target="_blank" href="/help/images?ref=edit">Here are some tips</a>.
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Project title</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <input type="text" class="form-control" id="title" name="title" required=""  maxlength="60"
                                          value="{{$campaign->title}}">
                                       <span class="character_counter_container" id="titlecount">{{60-strlen($campaign->title)}}/60</span>
                                    </div>
                                    <div class="field-help-2">
                                       <p>Our search looks through words from your project title and blurb, so make them clear and descriptive of what you’re making. Your profile name will be searchable, too.</p>
                                       <p>These words will help people find your project, so choose them wisely! Your name will be searchable too.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Short blurb</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <textarea class="required textarea"  maxlength="135" id="short_description" style=" height:123px !important;" name="short_description">{{$campaign->short_description}}</textarea>
                                       <span class="character_counter_container" id="shortdesccount">{{135-strlen($campaign->short_description)}}/135</span>
                                    </div>
                                    <div class="field-help-2">
                                       <p>Give people a sense of what you’re doing. Skip “Help me�? and focus on what you’re making.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Category</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <select class="custom-select selectField mb-3" required="" id="category" name="category_id">
                                          @if($categories)
                                          <option value="">Select Category</option>
                                          @foreach($categories as $category)
                                          <option value="{{$category->id}}" {{!empty($category->id==$campaign->category_id)?'selected':''}}>{{$category->name}}</option>
                                          @endforeach
                                          @endif
                                       </select>
                                       <select class="custom-select selectField" id="subcategory" name="sub_category_id">
                                          <option  value="">Subcategory (optional)</option>
                                          @if($subcategories)
                                          @foreach($subcategories as $category)
                                          <option value="{{$category->id}}" {{!empty($category->id==$campaign->sub_category_id)?'selected':''}}>{{$category->name}}</option>
                                          @endforeach
                                          @endif
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Project location</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <input type="text" class="form-control" id="address" placeholder="Project location" name="location" value="{{$campaign->location}}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Funding duration</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <div class="fieldwrapper">
                                          <ul class="options">
                                             <li class="number-of-days d-flex mb-3">
                                                <label class="option_label font-14"><input  required="" class="radio mr-1" type="radio" name="end_type" value="1" {{$campaign->end_type==1?'checked':''}}>Number of days</label>
                                                <div class="input-container bg-white border">
                                                   <div class="p2">
                                                      <input length="3" size="3" value="{{$campaign->no_of_day}}" class="text" type="text" name="no_of_day">
                                                      <div class="rec pt-1">Up to 60 days, but we recommend 30 or fewer</div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="number-of-days d-flex">
                                                <label class="option_label font-14"><input required="" class="radio mr-1" type="radio" name="end_type" value="2" {{$campaign->end_type==2?'checked':''}}>End on date & time</label>
                                                <div class="input-container bg-white border">
                                                   <div class="p2" id="datetimepicker12">
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="field-help-2">
                                       <p>Projects with shorter durations have higher success rates. You won’t be able to adjust your duration after you launch. </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Funding goal</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <input type="text" class="form-control"  placeholder="$1" value="{{$campaign->goal}}" required="" name="goal">
                                    </div>
                                    <div class="field-help-2">
                                       <p>Funding on Kickstarter is all-or-nothing. It’s okay to raise more than your goal, but if your goal isn’t met, no money will be collected. Your goal should reflect the minimum amount of funds you need to complete your project and send out rewards, and include a buffer for payments processing fees.</p>
                                       <p>If your project is successfully funded, the following fees will be collected from your funding total: Kickstarter’s 5% fee, and payment processing fees (between 3% and 5%). If funding isn’t successful, there are no fees.
                                          <a href="#" class="d-block">View fees breakdown</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <!--                                    <label for="last_name" class="col-lg-3 col-form-label">
                                    Project collaborators</label>-->
                                 <div class="col-lg-9">
                                    <!--                                       <p>Grant your teammates access to help with your project.</p>-->
                                    <button class="btn btn-primary bg-red mb-2" type="submit" style="cursor:pointer;">Save</button>
                                 </div>
                              </div>
                           </div>
                           {!! Form::close() !!}
                        </div>
                        <div class="col-lg-4 col-xl-4 col-sm-6 col-12">
                           <a class="school-tout mb-2" target="_blank" href="#"><span>How to:</span> Make an awesome project
                           </a>
                           <h5 class="font-16">Need advice?</h5>
                           <p class="font-15">
                              Visit Campus to read discussions about
                              <a target="_blank" href="#">preparing for a project</a>
                              and more.
                           </p>
                           @if($campaign->photo)
                           <img src="{{$campaign->imgpath->path}}" id="default_img" class="img-fluid">
                           @else
                           <img src="{{URL::asset("/")}}assets/img/noimage.png" id="default_img" class="img-fluid">
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane fade" id="buzz">
                  <h2 class="text-center mt-5 font-weight-bold">Set your rewards and shipping costs.</h2>
                  <p class="text-center">Invite backers to be a part of the creative experience by offering rewards like a copy of what you’re making, a special experience, or a behind-the-scenes look into your process.</p>
                  <div class="border rounded clearfix mt-5 p-4">
                     <div class="row">
                        <div class="col-lg-8 col-xl-8 col-12">
                           <form action="">
                              <div class="grey-field mb-3 clearfix">
                                 <div class="form-group row">
                                    <label for="last_name" class="col-lg-3 col-form-label primary help">
                                       Reward #<span class="reward_num">1</span><span class="icon ion-help-circled"></span>
                                       <div class="num-backers">0 backers</div>
                                    </label>
                                    <div class="col-lg-9">
                                       <div class="fieldContainer">
                                          <table class="table table-responsive table-bordered">
                                             <tr>
                                                <td width="40%">Title</td>
                                                <td width="60%" class="nameFieldsPart"><input type="text" class="textFields"></td>
                                             </tr>
                                             <tr>
                                                <td width="40%">Pledge amount</td>
                                                <td width="60%" class="nameFieldsPart"><input type="text" class="textFields" value="$0"></td>
                                             </tr>
                                             <tr>
                                                <td width="40%">Description</td>
                                                <td width="60%" class="nameFieldsPart">
                                                   <textarea class="textarea" class="textareaPart"></textarea>
                                                   <ul class="m-0 p-0 unstyled">
                                                      <li class="unstyled">
                                                         <div style="background:#f8f9fd" class="d-flex align-items-center p-2">
                                                            <div class="flex-1">
                                                               <div class="">
                                                                  <div class="font-12">fff</div>
                                                                  <div class="">
                                                                     <a href="#" class="font-12">Edit</a>
                                                                     <a href="#" class="font-12">Delete</a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="d-flex plus_minus_scale">
                                                               <a href="#" class="rounded-circle">
                                                               <span class="ion-android-add-circle"></span>
                                                               </a>
                                                               <span class="mr-2 ml-2">1</span>
                                                               <a href="#">
                                                               <span class="ion-android-remove-circle"></span>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div style="background:#f8f9fd" class="d-flex align-items-center p-2">
                                                            <div class="flex-1">
                                                               <div class="">
                                                                  <div class="font-12">fff</div>
                                                                  <div class="">
                                                                     <a href="#" class="font-12">Edit</a>
                                                                     <a href="#" class="font-12">Delete</a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="d-flex plus_minus_scale">
                                                               <a href="#" class="rounded-circle">
                                                               <span class="ion-android-add-circle"></span>
                                                               </a>
                                                               <span class="mr-2 ml-2">1</span>
                                                               <a href="#">
                                                               <span class="ion-android-remove-circle"></span>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                   <a class="itemsAddNewLink d-inline-block ml-3" href="javascript:void(0)" onclick=" $('#itemModal').modal('show')"><i class="icon ion-ios-plus-empty font-weight-bold mr-2 d-inline-block ml-3 mb-3 mt-3"></i>Add an Item</a>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td width="40%">Estimated delivery</td>
                                                <td width="60%" class="nameFieldsPart">
                                                   <div class="selectField">
                                                      <select class="form-control">
                                                         <option>September</option>
                                                         <option>october</option>
                                                         <option>November</option>
                                                         <option>December</option>
                                                         <option>5</option>
                                                      </select>
                                                   </div>
                                                   <div class="selectField">
                                                      <select class="form-control">
                                                         <option>2017</option>
                                                         <option>2018</option>
                                                         <option>2016</option>
                                                         <option>2015</option>
                                                         <option>2014</option>
                                                      </select>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td width="40%">Shipping details</td>
                                                <td width="60%" class="nameFieldsPart">
                                                   <select class="form-control">
                                                      <option>Select an option</option>
                                                      <option>october</option>
                                                      <option>November</option>
                                                      <option>December</option>
                                                      <option>5</option>
                                                   </select>
                                                </td>
                                             </tr>
                                             <tr >
                                                <td width="40%" rowspan="3">Limit availability </td>
                                                <td width="60%" class="nameFieldsPart">
                                                   <div class="form-check">
                                                      <label class="form-check-label">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                      Enable reward limit
                                                      </label>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr >
                                                <td width="60%" class="nameFieldsPart">
                                                   <div class="form-check">
                                                      <label class="form-check-label">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                      Set backer limit
                                                      </label>
                                                      <input type="text">
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr >
                                                <td width="60%" class="nameFieldsPart">
                                                   <div class="form-check">
                                                      <label class="form-check-label">
                                                      <input class="form-check-input" type="checkbox" value="">
                                                      Set start/end date
                                                      </label>
                                                      <div class="clearfix"></div>
                                                      <label>Available from: </label><input type="text"><span class="font-12">UTC +05:30</span>
                                                      <label>Available until: </label><input type="text"><span class="font-12">UTC +05:30</span>
                                                   </div>
                                                </td>
                                             </tr>
                                          </table>
                                          <div class="float-right duplicateReward">
                                             <span class="d-inline-block mr-3"><a href="#"><i class="icon ion-ios-albums"></i>Duplicate reward</a></span>
                                             <span><a href="#"><i class="icon ion-android-delete"></i>Delete</a></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <div class="addAnotherButton borderer text-center">
                              <a href="#" class="itemsAddNewLink d-inline-block ml-3 d-block py-5 px-5"><i class="icon ion-ios-plus-empty font-weight-bold mr-2 d-inline-block"></i>Add a new Reward</a>
                           </div>
                        </div>
                        <div class="col-lg-4 col-xl-4 col-sm-6 col-12">
                           <a class="school-tout mb-2" target="_blank" href="#"><span>How to:</span> Create great rewards?
                           </a>
                           <h5 class="font-16">What to offer</h5>
                           <p class="font-15">
                              Copies of what you're making, unique experiences, and limited editions work great.
                           </p>
                           <h5 class="font-16">How to price</h5>
                           <ul class="font-14 rewardList">
                              <li>Price fairly, and offer a good value. What would you consider a fair exchange?</li>
                              <li>Most popular pledge amount: $25</li>
                              <li>Something fun for $10 or less is always a good idea.</li>
                              <li>Backers based in the U.S. will always see reward amounts and funding goals reflected in USD.</li>
                              <li>Funds that backers pledge to account for shipping costs will count towards your project's funding goal. Keep this in mind when setting your goal.</li>
                              <li>Use the shipping tool to add delivery costs for any country you like (including your own). The price will be added to backer's pledges as they check out.</li>
                           </ul>
                           <h5 class="font-16 color-red">What's prohibited</h5>
                           <ul class="font-14 rewardList">
                              <li>Rewards not directly produced by the creator or the project itself</li>
                              <li>Financial incentives</li>
                              <li>Raffles, lotteries, and sweepstakes</li>
                              <li>Coupons, discounts, and cash-value gift cards</li>
                              <li>For more, please review our list of prohibited items and subject matter</li>
                           </ul>
                           <h5 class="font-14 font-weight-bold color-red">Need ideas for rewards?</h5>
                           <p>Campus has a discussion on that — and plenty more. </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane fade" id="references">
                  <h2 class="text-center mt-5 font-weight-bold">Tell us about your project.</h2>
                  <p class="text-center">Use images, video, and a compelling description to describe what you’re making. Be sure to get specific about why people should be excited about your project. </p>
                  <div class="border rounded clearfix mt-5 p-4">
                     <div class="row">
                        <div class="col-lg-8 col-xl-8 col-12">
                           {!! Form::open(['url' => 'campaign/updatethird/'.$campaign->id,'method'=>'put','files'=>true]) !!}
                           <input type="hidden" name="hide_video" value="{{$campaign->video}}">
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Project video</label>
                                 <div class="col-lg-9">
                                    <div class="asset_upload">
                                       <div class="upload">
                                          <input name="video" id="project_video" class="photo file"  data-help_section="project-image-help" type="file">
                                          <strong class="text-center">
                                          Choose a video from your computer <span class="has_file_hide d-block mt-3">MOV, MPEG, AVI, MP4, 3GP, WMV, or FLV • 5GB file limit</span>
                                          </strong>
                                       </div>
                                    </div>
                                    <div class="field-help-2">
                                       <p>
                                          Have fun – add a video! Projects with a video have a much higher chance of success. For a dose of inspiration, check out the <a href="#">Creator Handbook.</a> Need some help? Visit our <a href="#">Creator FAQ. </a>.
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Project description</label>
                                 <div class="col-lg-9">
                                    <div class="field-help-2">
                                       <p>Use your project description to share more about what you’re raising funds to do and how you plan to pull it off. It’s up to you to make the case for your project.</p>
                                    </div>
                                    <div class="textFieldParts">
                                       <textarea class="form-control" id="editor1" rows="3" name="description">
                                       {{trim($campaign->description)}}  
                                       </textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Request help from the community</label>
                                 <div class="col-lg-9">
                                    <div class="field-help-2">
                                       <p>List the skills, resources, or expertise from others that could help enhance your project. If someone can contribute, they can start a dialogue directly from your project page.</p>
                                    </div>
                                    <div class="textFieldParts form-group">
                                       <label>Project need (optional)</label>
                                       <textarea class="required textarea" style="height:86px !important;" name="project_need_1" id="project_need_1" maxlength="140" placeholder="Painting the Sistine Chapel will require extravagant but cost-effective colors. Are you a color mixologist who'd like to help?"></textarea>
                                       <span class="character_counter_container" id="optional1">{{140-strlen($campaign->project_need_1)}}/140</span>
                                    </div>
                                    <div class="textFieldParts form-group">
                                       <label>Project need (optional)</label>
                                       <textarea class="required textarea" style=" height:86px;" name="project_need_2" maxlength="140" id="project_need_2" placeholder="Looking for an advanced belayer to hoist us up 68 feet. Otherwise, we’ll have to resort to rickety scaffolding and painting on our backs!"></textarea>
                                       <span class="character_counter_container" id="optional2">{{140-strlen($campaign->project_need_2)}}/140</span>
                                    </div>
                                    <div class="textFieldParts form-group">
                                       <label>Project need (optional)</label>
                                       <textarea class="required textarea" style=" height:86px;" id="" name="project_need_3" id="project_need_3" maxlength="140" placeholder="Do you have experience with image projection onto rounded, uneven surfaces? Please get in touch!"></textarea>
                                       <span class="character_counter_container" id="optional3">{{140-strlen($campaign->project_need_3)}}/140</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Risks and challenges</label>
                                 <div class="col-lg-9">
                                    <div class="field-help-2">
                                       <p>
                                          What are the risks and challenges that come with completing your project, and how are you qualified to overcome them?
                                       </p>
                                       <p>Every project comes with its own unique risks and challenges. Let your backers know how you’re prepared to overcome these challenges by setting proper expectations and communicating anything that could cause delays or changes in your production plan.</p>
                                       <p>Please mention if you’re still in the process of completing any past projects or if your project requires approval or premarket review from an outside company or agency before you can distribute rewards.</p>
                                       <p>Being fully transparent and addressing these potential challenges from the start will help backers understand that your project is a work in progress, and that you’ve thought through all of the possible outcomes.</p>
                                    </div>
                                    <div class="form-group">
                                       <textarea class="form-control" id="exampleTextarea" rows="3" name="risk">{{$campaign->risk}}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Project FAQs</label>
                                 <div class="col-lg-9">
                                    <div class="field-help-2">
                                       <p>
                                          You can add frequently asked questions to the FAQ tab on your project page once it goes live. <a href="#">Learn more</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <!--                                    <label for="last_name" class="col-lg-3 col-form-label">
                                    Project collaborators</label>-->
                                 <div class="col-lg-9">
                                    <!--                                       <p>Grant your teammates access to help with your project.</p>-->
                                    <button class="btn btn-primary bg-red mb-2" type="submit" style="cursor:pointer;">Save</button>
                                 </div>
                              </div>
                           </div>
                           {!! Form::close() !!}
                        </div>
                        <div class="col-lg-4 col-xl-4 col-sm-6 col-12">
                           <a class="school-tout mb-2" target="_blank" href="#"><span>How to:</span> Make an awesome video
                           </a>
                           <h5 class="font-16">Looking for advice?</h5>
                           <p class="font-14">
                              Visit Campus to read about <a href="#">making great videos</a> and more.
                           </p>
                           <h5 class="font-16">Important reminder</h5>
                           <p class="font-14">
                              Kickstarter is a global community, and including translations of your description and rewards, or using our Captions & Subtitles to make your videos more accessible, will help your project have a wider appeal. If you're including text or audio in a language outside of those that we currently support (English, French, German, and Spanish), we also ask that you include English translations or subtitles.
                           </p>
                           <p class="font-14">Don't use music, images, video, or other content that you don't have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.</p>
                           <p class="font-14">For legal, mostly free alternatives, check out some of these great resources: <a href="#">SoundCloud</a>, <a href="#">Vimeo Music Store</a>, <a href="#">Free Music Archive</a>, and <a href="#">ccMixter</a>.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane" id="references1">
                  <h2 class="text-center mt-5 font-weight-bold">Tell us more about yourself.</h2>
                  <p class="text-center">Add a bio and links to your website and social media profiles. Think of it as your creative resume.</p>
                  <div class="border rounded clearfix mt-5 p-4">
                     <div class="row">
                        <div class="col-lg-8 col-xl-8 col-12">
                           {!! Form::open(['url' => 'campaign/updatefourth/'.$campaign->id,'method'=>'put','files'=>true]) !!}
                           <input type="hidden" name="fb_user_id" id="fb_user_id" value="{{$campaign->fb_user_id}}">
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Profile photo</label>
                                 <div class="col-lg-9">
                                    <div class="asset_upload">
                                       <div class="upload">
                                          <input name="profile_image" id="profile_image" class="photo file"  data-help_section="project-image-help" type="file" >
                                          <strong class="text-center">
                                          @if($campaign->profile_image)   
                                          <img id="profimgsrc" class="img-fluid" src="{{!empty($campaign->photo)?$campaign->profilephoto->path:''}}">
                                          @else
                                          <img id="profimgsrc" class="img-fluid" src="">
                                          @endif
                                          <span class="has_file_hide d-block mt-3">Choose an image from your computer</span>
                                          </strong>
                                       </div>
                                    </div>
                                    <div class="field-help-2">
                                       <p>JPEG, PNG, GIF, or BMP • 50MB file limit </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Name</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <input type="text" class="form-control" id="user_name" name="user_name" value="{{$campaign->user_name}}">
                                    </div>
                                    <div class="field-help-2">
                                       <p>Heads up: Once you launch a project, you cannot make changes to your name on Kickstarter.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Facebook Connect</label>
                                 <div class="col-lg-9">
                                    <div class="field-help-2">
                                       <p>Build trust with potential backers by showing there's a real person behind the project. Your name and number of friends will be displayed.</p>
                                    </div>
                                    <div class="fb-login-button">
                                       <a class="btn btn-primary faceBookBtn" href="javascript:void(0)" onclick="login();"><i class="icon ion-social-facebook d-inline-block mr-2"></i>Login with Facebook</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Biography</label>
                                 <div class="col-lg-9">
                                    <div class="form-group">
                                       <textarea class="form-control" id="exampleTextarea" rows="3" name="biography">{{$campaign->biography}}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Your Location</label>
                                 <div class="col-lg-9">
                                    <input type="text" class="form-control" id="user_location" name="user_location" value="{{$campaign->user_location}}" >
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Website</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <div class="row">
                                          <div class="col-lg-10">
                                             <input type="text" class="form-control" id="website_samp">
                                          </div>
                                          <div class="col-lg-2">
                                             <button class="btn btn-primary bg-red" type="button" id="add_btn">Add</button>
                                          </div>
                                       </div>
                                       <div class="clearfix"></div>
                                       <div class="row website" style=" margin-top:4px;" id="website_container">
                                          @if($campaign->website)
                                          @foreach($campaign->website as $wbsite)
                                          <div class="col-lg-10">
                                             <input type="text" class="form-control" name="website[]" value="{{$wbsite}}">
                                             <a href='javascript:void(0)' class='float-right font-16' onclick='$(this).parent().remove()'>
                                             <i class='icon ion-android-close'></i></a>
                                          </div>
                                          @endforeach
                                          @endif
                                       </div>
                                    </div>
                                    <div class="field-help-2">
                                       <p>Some suggestions: Link to your blog, portfolio, Twitter, Instagram, etc.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <label for="last_name" class="col-lg-3 col-form-label">
                                 Google Analytics</label>
                                 <div class="col-lg-9">
                                    <div class="textFieldParts">
                                       <input type="text" class="form-control" placeholder="UA-XXXXXXXX-X" name="analytics" value="{{$campaign->analytics}}">
                                    </div>
                                    <div class="field-help-2">
                                       <p>Enter your tracking ID to enable Google Analytics for your project. Check out our FAQ for more info.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="grey-field mb-3 clearfix">
                              <div class="form-group row">
                                 <!--                                    <label for="last_name" class="col-lg-3 col-form-label">
                                    Project collaborators</label>-->
                                 <div class="col-lg-9">
                                    <!--                                       <p>Grant your teammates access to help with your project.</p>-->
                                    <button class="btn btn-primary bg-red mb-2" type="submit" style="cursor:pointer;">Save</button>
                                 </div>
                              </div>
                           </div>
                           {!! Form::close() !!}
                        </div>
                        <div class="col-lg-4 col-xl-4 col-sm-6 col-12">
                           <h5 class="font-16">Important notes on accountability</h5>
                           <p class="font-14">Part of every creator’s job is earning their backers’ trust, especially backers who don’t personally know them. It’s up to you to make the case that you can successfully bring your project to life. Present your qualifications and share links that help reinforce them.</p>
                           <h5 class="font-16">Returning creators</h5>
                           <p class="font-14">Launching another project? Awesome! For the sake of transparency, just be sure all of them are under the same account. In special circumstances where this won't work (this project’s a solo album, the last one was with your mariachi band) just be sure to link to any previous projects in your bio.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane" id="references2">
                  <h2 class="text-center mt-5 font-weight-bold">Confirm your identity and link a bank account.</h2>
                  <p class="text-center">Provide additional details about yourself and where funds should be sent.</p>
                  <div class="border rounded clearfix mt-5 p-4">
                     <div class="row">
                        <div class="col-lg-8 col-xl-8 col-12">
                           <form action="">
                              <div class="grey-field mb-3 clearfix">
                                 <div class="form-group row">
                                    <label for="last_name" class="col-lg-3 col-form-label primary help">Contact details</label>
                                    <div class="col-lg-9">
                                       <div class="fieldContainer">
                                          <table class="table table-responsive table-bordered">
                                             <tr>
                                                <td width="30%" rowspan="2">Email</td>
                                                <td width="70%" class="nameFieldsPart font-14 py-3 px-1">
                                                   nits.karunadri1@gmail.com
                                                   <div class="float-right font-14">Unverified</div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td width="30%">
                                                   <p class="font-14">In order to create a project you’ll need to verify your email. Send a verification email to yourself using the button below, then use the link in the email to verify your email address.</p>
                                                   <button type="button" class="btn btn-primary bg-red">Send Verification Email</button>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="grey-field mb-3 px-3 py-2 clearfix">Funds recipient</div>
                              <div class="grey-field mb-3 px-3 py-2 clearfix">Bank account</div>
                              <div class="grey-field mb-3 px-3 py-2 clearfix">Payment source</div>
                           </form>
                        </div>
                        <div class="col-lg-4 col-xl-4 col-sm-6 col-12">
                           <h5 class="font-16">Eligibility requirements </h5>
                           <p class="font-15">
                              To be eligible to start a Kickstarter project as a creator in United States, you need to meet the following requirements:
                           </p>
                           <ul class="font-14 rewardList">
                              <li>ou are 18 years of age or older.</li>
                              <li>You are a permanent resident of United States.</li>
                              <li>You are creating a project in your own name, or on behalf of a registered legal entity with which you are affiliated.</li>
                              <li>You have a bank account, address, and government-issued ID from the United States.</li>
                              <li>If running your project as an individual, the linked bank account must belong to the person who verified their identity for your project.</li>
                              <li>You have a major credit or debit card.</li>
                           </ul>
                           <h5 class="font-16">Questions about taxes?</h5>
                           <p>Check out <a href="#">Kickstarter and Taxes</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYFY2fp_meJiSEKve5pDJk9Kzr_oDOlPk&libraries=places"></script>
<link rel="stylesheet" href="{{URL::to('/')}}/assets/css/bootstrap-datetimepicker.css">
<script src="{{URL::to('/')}}/assets/js/moment-with-locales.js"></script>
<script src="{{URL::to('/')}}/assets/js/bootstrap-datetimepicker.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
   $(document).ready(function(){
   $("#category").change(function(){
    $.get("{{URL::to('')}}/category/child/"+$(this).val(),function(data){
   $("#subcategory").html(data);
   });
   })
   $("#project_photo").change(function(){
   
   });
   $("#title").keyup(function(){
   remainchar=60-parseInt($(this).val().length) ;
   $("#titlecount").html(remainchar+"/"+"60");
   })
   $("#short_description").keyup(function(){
   remainchar=135-parseInt($(this).val().length) ;
   $("#shortdesccount").html(remainchar+"/"+"135");
   
   })
   $("#project_need_1").keyup(function(){
   remainchar=140-parseInt($(this).val().length) ;
   $("#optional1").html(remainchar+"/"+"140");
   })
   $("#project_need_2").keyup(function(){
   remainchar=140-parseInt($(this).val().length) ;
   $("#optional2").html(remainchar+"/"+"140");
   
   })
   
   $("#project_need_3").keyup(function(){
   remainchar=140-parseInt($(this).val().length) ;
   $("#optional3").html(remainchar+"/"+"140");
   
   })
   
   $("#add_btn").click(function(){
    var site=$("#website_samp").val();  
    if(site!='')
    {
    var content="<div class='col-lg-10'><input type='text' class='form-control' name='website[]' value="+site+"><a href='javascript:void(0)' class='float-right font-16' onclick='$(this).parent().remove()'><i class='icon ion-android-close'></i></a></div>"
    $("#website_container").append(content) ; 
    $("#website_samp").val('');
   }
   })
   
   
   
   //    $('#datetimepicker12').datetimepicker({
   //                inline: true,
   //                sideBySide: true
   //            });
   $('#editor1').summernote({
           defaultFontName: 'Lato',
           height: 300,                 // set editor height
           width: 460,
           minHeight: null,             // set minimum height of editor
           maxHeight: null,             // set maximum height of editor
           focus: true,                  // set focus to editable area after initializing summernote
           popover: {
                       image: [
                         ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                         ['float', ['floatLeft', 'floatRight', 'floatNone']],
                         ['remove', ['removeMedia']]
                       ],
                       link: [
                         ['link', ['linkDialogShow', 'unlink']]
                       ],
                       air: [
                         ['color', ['color']],
                         ['font', ['bold', 'underline']],
                         ['fontsize', ['8', '9', '10', '11', '12', '14', '18', '24', '36']],
                         ['para', ['ul', 'paragraph']],
                         ['table', ['table']],
                         ['insert', ['link', 'picture']]
                         ['style', ['style']],
                         ['text', ['bold', 'italic', 'underline', 'color', 'clear']],
                         ['para', [ 'paragraph']],
                         ['height', ['height']],
                         ['font', ['Lato','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
                       ]
                     },
           
         
       });
       
       var slect_tab="{{$slect_tab}}";
       if(slect_tab=='profile')
       {
           $("#profile_tab").trigger("click");
       
       }
       else if(slect_tab=='buzz')
       {
           $("#buzz_tab").trigger("click");
       }
       
       else if(slect_tab=='references')
       {
           $("#references_tab").trigger("click");
       }
       else if(slect_tab=='references1')
       {
           $("#references1_tab").trigger("click");
       }
       else if(slect_tab=='buzz')
       {
           $("#buzz_tab").trigger("click");
       }
       
       else if(slect_tab=='references2')
       {
           $("#references2_tab").trigger("click");
       }
       
       
       else
       {
         $("#profile_tab").trigger("click");
   
       }
       
   
   });
   var input = document.getElementById('address');
   var autocomplete = new google.maps.places.Autocomplete(input);
   google.maps.event.addListener(autocomplete, 'place_changed', function() {
       var place = autocomplete.getPlace();
       $("#lat").attr("value",place.geometry.location.lat());
       $("#lang").attr("value",place.geometry.location.lng());
   });
    var input = document.getElementById('user_location');
   var autocomplete = new google.maps.places.Autocomplete(input);
   google.maps.event.addListener(autocomplete);
   
   function readURL(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
   
       reader.onload = function (e) {
           $('#blah').attr('src', e.target.result);
           $('#default_img').attr('src', e.target.result);
   
       }
   
       reader.readAsDataURL(input.files[0]);
   }
   }
   $("#campaign_photo").change(function(){
   readURL(this);
   });
   $("#profile_image").change(function(){
   readURLProfile(this);   
   });
   function readURLProfile(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
   
       reader.onload = function (e) {
           $('#profimgsrc').attr('src', e.target.result);
   
       }
   
       reader.readAsDataURL(input.files[0]);
   }
   }
</script>
<script>
   window.fbAsyncInit = function() {
           FB.init({
           appId: '192920864584099',
           status: true,
           cookie: true,
           xfbml: true
       });
   };
   
   // Load the SDK asynchronously
   (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
   }(document));
   
   function login() {
       FB.login(function(response) {
       console.log(response,"FB Response");
       if (!response || response.status !== 'connected') 
       {
           alert('Failed');
       } else 
       {
           $("#fb_user_id").attr("value",response.authResponse.userID);
           $("#fbconnect").modal("show");
           
       }
       
   
       }, {});            
   }
   
   
   
   
</script>
<style>
   .note-popover
   {
   display:none !important;
   }
</style>
<!-- Modal -->
<div class="modal fade" id="fbconnect" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Facebook</h4>
         </div>
         <div class="modal-body">
            <p>This Facebook account is connected successfully.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div class="modal fade" id="itemModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add a reward item</h4>
         </div>
        {!! Form::open(['url' => '/storeitem','method'=>'post','files'=>true]) !!}
        <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
         <div class="modal-body">
            <div class="form-group">
               <label for="email">Name (required):</label>
               <input type="text" class="form-control" required="" placeholder="Examples:Album download,Screenplay,etc" name="reward_name">
            </div>
           
            <div class="checkbox">
                <label><input type="checkbox" name="is_electronic" value="1"> This is a digital item. Think album downloads, e-books, videos, or anything that’s delivered online.</label>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary bg-red mb-2" type="submit" style="cursor:pointer;">Save</button>  
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
         {!! Form::close() !!}

      </div>
   </div>
</div>
@stop

