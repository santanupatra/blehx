
<h4>{{$category->description}}</h4>
<hr>
<ul class="listingPart">
   <li class="d-inline-block align-middle mb-0 mt-0 mx-4">
      <h2 class="red-dark font-weight-bold font-20 mb-0"><span class="currency_symbol">$</span>{{number_format($category->net_donation)}} 
<!--          <span>million</span>-->
      </h2>
      <h4 class="mb-0 mt-2 font-16 font-545454 mt-0">pledged to art</h4>
   </li>
   <li class="d-inline-block align-middle mb-0 mt-0 mx-4">
      <h2 class="red-dark font-weight-bold font-20 mb-0">{{number_format($category->net_funduser)}}</h2>
      <h4 class="mb-0 mt-2 font-16 font-545454 mt-0">successfully funded art projects</h4>
   </li>
</ul>
<hr>
@if($category->campaigns)

@foreach($category->campaigns as $campaign)
<div class="d-flex align-items-center mb-2">
   <img class="rounded-circle" alt="{{$campaign->username}}" src="{{$campaign->profile_photo}}" width="40" height="40">
   <div class="pl2">
      <p class="font-16 mb-0 mx-3">
         <b class="font-weight-normal">{{$campaign->username}}</b>
      </p>
      <p class="font-14 mb-0 mx-3">
         raised ${{number_format($campaign->donation)}} from {{$campaign->total_fundeduser}} backers for “<a href="javascript:void(0)">{{$campaign->title}}</a>.”
      </p>
   </div>
</div>
@endforeach
@endif


