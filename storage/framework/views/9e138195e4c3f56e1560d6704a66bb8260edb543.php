<?php $__env->startSection("contentheader_title"); ?>
	<a href="<?php echo e(url(config('laraadmin.adminRoute') . '/categories')); ?>">Category</a> :
<?php $__env->stopSection(); ?>
<?php $__env->startSection("contentheader_description", $category->$view_col); ?>
<?php $__env->startSection("section", "Categories"); ?>
<?php $__env->startSection("section_url", url(config('laraadmin.adminRoute') . '/categories')); ?>
<?php $__env->startSection("sub_section", "Edit"); ?>

<?php $__env->startSection("htmlheader_title", "Categories Edit : ".$category->$view_col); ?>

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
				<?php echo Form::model($category, ['route' => [config('laraadmin.adminRoute') . '.categories.update', $category->id ], 'method'=>'PUT', 'enctype' => 'multipart/form-data', 'id' => 'category-edit-form']); ?>

					<?php echo LAFormMaker::form($module); ?>					
					<?php /*					
					<?php echo LAFormMaker::input($module, 'name'); ?>
					<?php echo LAFormMaker::input($module, 'description'); ?>
					<?php echo LAFormMaker::input($module, 'active'); ?>
					*/ ?>
					<div class="form-group"><label for="image" style="display:block;">Image* :</label>
					 <input type="file" name="image" id="image">
					 <div style="padding-top: 10px"></div>
					 <img src="<?php echo e(URL::asset('../storage/uploads/category/')); ?>/<?php echo e($category->image); ?>" alt="" width="150">	
					</div>
                    <br>
					<div class="form-group">
						<?php echo Form::submit( 'Update', ['class'=>'btn btn-success']); ?> <button class="btn btn-default pull-right"><a href="<?php echo e(url(config('laraadmin.adminRoute') . '/categories')); ?>">Cancel</a></button>
					</div>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function () {
	$("#category-edit-form").validate({
		
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>