<?php $__env->startSection("contentheader_title"); ?>
	<a href="<?php echo e(url(config('laraadmin.adminRoute') . '/email_templates')); ?>">Email Template</a> :
<?php $__env->stopSection(); ?>
<?php $__env->startSection("contentheader_description", $email_template->$view_col); ?>
<?php $__env->startSection("section", "Email Templates"); ?>
<?php $__env->startSection("section_url", url(config('laraadmin.adminRoute') . '/email_templates')); ?>
<?php $__env->startSection("sub_section", "Edit"); ?>

<?php $__env->startSection("htmlheader_title", "Email Templates Edit : ".$email_template->$view_col); ?>

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php echo Form::model($email_template, ['route' => [config('laraadmin.adminRoute') . '.email_templates.update', $email_template->id ], 'method'=>'PUT', 'id' => 'email_template-edit-form']); ?>

					<?php echo LAFormMaker::form($module); ?>
					
					<?php /*
					<?php echo LAFormMaker::input($module, 'subject'); ?>
					
					*/ ?>
                                        
                                         <div class="form-group"><label for="description">Content* :</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter Content"  name="content" id="editor1"><?php echo e($email_template->content); ?></textarea>  
                                         </div>
                                        
                                        
                                        
                    <br>
					<div class="form-group">
						<?php echo Form::submit( 'Update', ['class'=>'btn btn-success']); ?> <button class="btn btn-default pull-right"><a href="<?php echo e(url(config('laraadmin.adminRoute') . '/email_templates')); ?>">Cancel</a></button>
					</div>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
$(function () {
	$("#email_template-edit-form").validate({
		
	});
        $('#editor1').summernote({
            defaultFontName: 'Lato',
            height: 300,                 // set editor height
            width: 700,
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