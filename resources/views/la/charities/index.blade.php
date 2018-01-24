@extends("la.layouts.app")

@section("contentheader_title", "Charities")
@section("contentheader_description", "charities listing")
@section("section", "Users")
@section("sub_section", "Listing")
@section("htmlheader_title", "Charities Listing")

@section("headerElems")

@endsection

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="display table table-bordered">
		<thead>
		<tr class="success">
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
                        <th>Approve</th>
			<th>Actions</th>
		</tr>
                @if($charities)
                @foreach($charities as $charity)
                
                <tr>
                    <td>{{$charity->id}}</td>
                    <td>{{$charity->first_name}}</td>
                    <td>{{$charity->last_name}}</td>
                    <td>{{$charity->email}}</td>
                    <td>{{$charity->is_approve?'Yes':'No'}}</td>
                    <td>
                        <a href="{{url(config('laraadmin.adminRoute'))}}/charity/{{$charity->id}}/edit" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i>
                        </a>
                        &nbsp;&nbsp;
                        <a href="{{url(config('laraadmin.adminRoute'))}}/charity/delete/{{$charity->id}}" class="btn btn-danger btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-times"></i>
                        </a>
                        &nbsp;&nbsp;
                        <a href="{{url(config('laraadmin.adminRoute'))}}/charity/approve/{{$charity->id}}/{{$charity->is_approve?0:1}}" 
                           class="btn btn-danger btn-xs" style="display:inline;padding:2px 5px 3px 5px;">{{$charity->is_approve?'Approval':'Approved'}}</i>
                        </a>
                        
                        
                        

                        
                        
                    </td>
                </tr>
                @endforeach
                @endif
                
                
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script>
$(function () {
	
	$("#user-add-form").validate({
		
	});
});
</script>
@endpush