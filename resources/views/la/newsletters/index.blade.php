@extends("la.layouts.app")

@section("contentheader_title", "Newsletters")

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                            <form method="post" id="newsletterform" novalidate="" action="{{ url(config('laraadmin.adminRoute') . '/sendnewsletter') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="first_name">All:</label>
                                    <input  name="all" value="1" type="checkbox" id="checkall" checked="">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Subscribers* :</label>
                                    <select required="1" name="subscribers[]" disabled="" class="form-control" multiple="" id="subscribers">
                                        @foreach($subscribers as $subscribe)
                                        <option value="{{$subscribe->email}}">{{$subscribe->email}}</option>
                                        @endforeach
                                        
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Subject* :</label>
                                    <input type="text" name="subject" required="1" class=" form-control">
                                    
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="last_name">Content* :</label>
                                    <textarea name="content" required="1" class=" form-control" id="editor1" style=" height:336px;"></textarea>
                                    
                                </div>
                               
					
                    <br>
					<div class="form-group">
                                            <button class="btn btn-success" type="submit">Send</button>
                                            <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}">Cancel</a></button>
					</div>
                            </form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

@endpush

@push('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
$(function () {
	
	$("#newsletterform").validate({
		
	});
        $("#checkall").click(function(){
        if($(this).is(':checked'))
        {
            $("#subscribers").attr("disabled",true);
        }
        else{
                        $("#subscribers").attr("disabled",false);

            
        }
        
        })
       $('#editor1').summernote({
            defaultFontName: 'Lato',
            height: 300,                 // set editor height
            width: 950,
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
        
});
</script>
@endpush