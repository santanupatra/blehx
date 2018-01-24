@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/contents') }}">Content</a> :
@endsection
@section("contentheader_description", $content->$view_col)
@section("section", "Contents")
@section("section_url", url(config('laraadmin.adminRoute') . '/contents'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Contents Edit : ".$content->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($content, ['route' => [config('laraadmin.adminRoute') . '.contents.update', $content->id ], 'method'=>'PUT', 'id' => 'content-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'page_heading')
                                    --}}
                                    
                                        <div class="form-group"><label for="description">Content* :</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter Content"  name="content" id="content"></textarea>  
                                         </div>
                                    
                                    
                                        {{--
                                        
					@la_input($module, 'page_name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/contents') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#content-edit-form").validate({
		
	});
});
</script>
@endpush
<script src="{{ asset('la-assets/plugins/ckeditor/ckeditor.js') }}"></script>
