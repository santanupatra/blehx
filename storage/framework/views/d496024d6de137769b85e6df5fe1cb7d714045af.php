<?php $__env->startSection("contentheader_title", "Email Templates"); ?>
<?php $__env->startSection("contentheader_description", "Email Templates listing"); ?>
<?php $__env->startSection("section", "Email Templates"); ?>
<?php $__env->startSection("sub_section", "Listing"); ?>
<?php $__env->startSection("htmlheader_title", "Email Templates Listing"); ?>

<?php $__env->startSection("headerElems"); ?>
<?php if(LAFormMaker::la_access("Email_Templates", "create")) { ?>
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Email Template</button>
<?php } ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("main-content"); ?>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			<?php foreach( $listing_cols as $col ): ?>
			<th><?php echo e(isset($module->fields[$col]['label']) ? $module->fields[$col]['label'] : ucfirst($col)); ?></th>
			<?php endforeach; ?>
			<?php if($show_actions): ?>
			<th>Actions</th>
			<?php endif; ?>
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

<?php if(LAFormMaker::la_access("Email_Templates", "create")) { ?>
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Email Template</h4>
			</div>
			<?php echo Form::open(['action' => 'LA\Email_TemplatesController@store', 'id' => 'email_template-add-form']); ?>

			<div class="modal-body">
				<div class="box-body">
                    <?php echo LAFormMaker::form($module); ?>
					
					<?php /*
					<?php echo LAFormMaker::input($module, 'subject'); ?>
                                    */ ?>
                                    
                                          
                                              <div class="form-group"><label for="description">Content* :</label>
                                                <textarea class="form-control" placeholder="Enter Content"  name="content" id="editor1"></textarea>  
                                               </div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?php echo Form::submit( 'Submit', ['class'=>'btn btn-success']); ?>

			</div>
			<?php echo Form::close(); ?>

		</div>
	</div>
</div>
<?php } ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('la-assets/plugins/datatables/datatables.min.css')); ?>"/>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('la-assets/plugins/datatables/datatables.min.js')); ?>"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "<?php echo e(url(config('laraadmin.adminRoute') . '/email_template_dt_ajax')); ?>",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		<?php if($show_actions): ?>
		columnDefs: [ { orderable: false, targets: [-1] }],
		<?php endif; ?>
	});
	$("#email_template-add-form").validate({
		
	});
        
         $('#editor1').summernote({
            defaultFontName: 'Lato',
            height: 300,                 // set editor height
            width: 560,
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>