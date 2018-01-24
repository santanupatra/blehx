

<?php $__env->startSection("contentheader_title", "Contents"); ?>
<?php $__env->startSection("contentheader_description", "Contents listing"); ?>
<?php $__env->startSection("section", "Contents"); ?>
<?php $__env->startSection("sub_section", "Listing"); ?>
<?php $__env->startSection("htmlheader_title", "Contents Listing"); ?>

<?php $__env->startSection("headerElems"); ?>
<?php if(LAFormMaker::la_access("Contents", "create")) { ?>
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Content</button>
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

<?php if(LAFormMaker::la_access("Contents", "create")) { ?>
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Content</h4>
			</div>
			<?php echo Form::open(['action' => 'LA\ContentsController@store', 'id' => 'content-add-form']); ?>

			<div class="modal-body">
				<div class="box-body">
                    <?php echo LAFormMaker::form($module); ?>
					
					<?php /*
					<?php echo LAFormMaker::input($module, 'page_heading'); ?>
                                    */ ?>
                                    <div class="form-group"><label for="description">Content* :</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter Content"  name="content" id="content"></textarea>  
                                         </div>
                                        <?php /*
					<?php echo LAFormMaker::input($module, 'page_name'); ?>
					*/ ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('la-assets/plugins/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('la-assets/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "<?php echo e(url(config('laraadmin.adminRoute') . '/content_dt_ajax')); ?>",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		<?php if($show_actions): ?>
		columnDefs: [ { orderable: false, targets: [-1] }],
		<?php endif; ?>
	});
	$("#content-add-form").validate({
		
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>