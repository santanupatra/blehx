

<?php $__env->startSection("contentheader_title"); ?>
	<a href="<?php echo e(url(config('laraadmin.adminRoute') . '/banners')); ?>">Banner</a> :
<?php $__env->stopSection(); ?>
<?php $__env->startSection("contentheader_description", $banner->$view_col); ?>
<?php $__env->startSection("section", "Banners"); ?>
<?php $__env->startSection("section_url", url(config('laraadmin.adminRoute') . '/banners')); ?>
<?php $__env->startSection("sub_section", "Edit"); ?>

<?php $__env->startSection("htmlheader_title", "Banners Edit : ".$banner->$view_col); ?>

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
				<?php echo Form::model($banner, ['route' => [config('laraadmin.adminRoute') . '.banners.update', $banner->id ], 'method'=>'PUT', 'id' => 'banner-edit-form']); ?>

					<?php echo LAFormMaker::form($module); ?>
					
					<?php /*
					<?php echo LAFormMaker::input($module, 'title'); ?>
					<?php echo LAFormMaker::input($module, 'image'); ?>
					<?php echo LAFormMaker::input($module, 'description'); ?>
					<?php echo LAFormMaker::input($module, 'short_order'); ?>
					*/ ?>
                    <br>
					<div class="form-group">
						<?php echo Form::submit( 'Update', ['class'=>'btn btn-success']); ?> <button class="btn btn-default pull-right"><a href="<?php echo e(url(config('laraadmin.adminRoute') . '/banners')); ?>">Cancel</a></button>
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
	$("#banner-edit-form").validate({
		
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>