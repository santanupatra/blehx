

<?php $__env->startSection("contentheader_title"); ?>
	<a href="<?php echo e(url(config('laraadmin.adminRoute') . '/site_settings')); ?>">Site Setting</a> :
<?php $__env->stopSection(); ?>
<?php $__env->startSection("contentheader_description", $site_setting->$view_col); ?>
<?php $__env->startSection("section", "Site Settings"); ?>
<?php $__env->startSection("section_url", url(config('laraadmin.adminRoute') . '/site_settings')); ?>
<?php $__env->startSection("sub_section", "Edit"); ?>

<?php $__env->startSection("htmlheader_title", "Site Settings Edit : ".$site_setting->$view_col); ?>

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
				<?php echo Form::model($site_setting, ['route' => [config('laraadmin.adminRoute') . '.site_settings.update', $site_setting->id ], 'method'=>'PUT', 'id' => 'site_setting-edit-form']); ?>

					<?php echo LAFormMaker::form($module); ?>
					
					<?php /*
					<?php echo LAFormMaker::input($module, 'logo'); ?>
					<?php echo LAFormMaker::input($module, 'fb_link'); ?>
					<?php echo LAFormMaker::input($module, 'twitter_link'); ?>
					<?php echo LAFormMaker::input($module, 'google_plus'); ?>
					<?php echo LAFormMaker::input($module, 'linkedin_link'); ?>
					<?php echo LAFormMaker::input($module, 'youtube_link'); ?>
					<?php echo LAFormMaker::input($module, 'admin_email'); ?>
					*/ ?>
                    <br>
					<div class="form-group">
						<?php echo Form::submit( 'Update', ['class'=>'btn btn-success']); ?> <button class="btn btn-default pull-right"><a href="<?php echo e(url(config('laraadmin.adminRoute') . '/site_settings')); ?>">Cancel</a></button>
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
	$("#site_setting-edit-form").validate({
		
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>