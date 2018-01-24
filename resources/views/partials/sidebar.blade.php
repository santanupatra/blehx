<div class="col-lg-2">
   <!-- <h2 class="text-center">My Profile</h2> -->
   <div class="imagePart text-center">
      <img src="{{$logged_user->image}}" class="rounded-circle w-100">
   </div>
   <h4 class="text-center mt-3 zilla_slablight mb-4">{{$logged_user->first_name}}&nbsp;
      {{$logged_user->last_name}}
   </h4>
   <ul class="list-group listingUl profileMenu pb-5">
      <li class="list-group-item active"><a href="{{URL::to('')}}/myproject">My Projects</a></li>
      <li class="list-group-item"><a href="{{URL::to('')}}/favorite">My Favorites</a></li>
      <li class="list-group-item"><a href="{{URL::to('')}}/archive">Archive</a></li>
      <li class="list-group-item"><a href="{{URL::to('')}}/mydonation">Donation</a></li>
      <li class="list-group-item"><a href="{{URL::to('')}}/user/logout">Log Out</a></li>

   </ul>
</div>
