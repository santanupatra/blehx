<?php $__env->startSection("contentheader_title"); ?>
	<a href="<?php echo e(url(config('laraadmin.adminRoute') . '/services')); ?>">Service</a> :
<?php $__env->stopSection(); ?>
<?php $__env->startSection("contentheader_description", $service->$view_col); ?>
<?php $__env->startSection("section", "Services"); ?>
<?php $__env->startSection("section_url", url(config('laraadmin.adminRoute') . '/services')); ?>
<?php $__env->startSection("sub_section", "Edit"); ?>

<?php $__env->startSection("htmlheader_title", "Services Edit : ".$service->$view_col); ?>

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
				<?php echo Form::model($service, ['route' => [config('laraadmin.adminRoute') . '.services.update', $service->id ], 'method'=>'PUT', 'id' => 'service-edit-form']); ?>

					<?php echo LAFormMaker::form($module); ?>
					
					<?php /*
					<?php echo LAFormMaker::input($module, 'name'); ?>
					<?php echo LAFormMaker::input($module, 'hashrate'); ?>
					<?php echo LAFormMaker::input($module, 'category_id'); ?>
					<?php echo LAFormMaker::input($module, 'short_description'); ?>
					<?php echo LAFormMaker::input($module, 'description'); ?>
					*/ ?>
                    <br>
					<div class="form-group">
						<?php echo Form::submit( 'Update', ['class'=>'btn btn-success']); ?> <button class="btn btn-default pull-right"><a href="<?php echo e(url(config('laraadmin.adminRoute') . '/services')); ?>">Cancel</a></button>
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
	$("#service-edit-form").validate({
		
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>