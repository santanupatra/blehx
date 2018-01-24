

<?php $__env->startSection("contentheader_title", "Backups"); ?>
<?php $__env->startSection("contentheader_description", "backups listing"); ?>
<?php $__env->startSection("section", "Backups"); ?>
<?php $__env->startSection("sub_section", "Listing"); ?>
<?php $__env->startSection("htmlheader_title", "Backups Listing"); ?>

<?php $__env->startSection("headerElems"); ?>
<?php if(LAFormMaker::la_access("Backups", "create")) { ?>
	<button class="btn btn-success btn-sm pull-right" id="CreateBackup">Create Backup</button>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('la-assets/plugins/datatables/datatables.min.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('la-assets/plugins/datatables/datatables.min.js')); ?>"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "<?php echo e(url(config('laraadmin.adminRoute') . '/backup_dt_ajax')); ?>",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		<?php if($show_actions): ?>
		columnDefs: [ { orderable: false, targets: [-1] }],
		<?php endif; ?>
	});
	
	$("#CreateBackup").on("click", function() {
		$.ajax({
			url: "<?php echo e(url(config('laraadmin.adminRoute') . '/create_backup_ajax')); ?>",
			method: 'POST',
			beforeSend: function() {
				$("#CreateBackup").html('<i class="fa fa-refresh fa-spin"></i> Creating Backup...');
			},
			headers: {
		    	'X-CSRF-Token': $('input[name="_token"]').val()
    		},
			success: function( data ) {
				if(data.status == "success") {
					$("#CreateBackup").html('<i class="fa fa-check"></i> Backup Created');
					$('body').pgNotification({
						style: 'circle',
						title: 'Backup Creation',
						message: data.message,
						position: "top-right",
						timeout: 0,
						type: "success",
						thumbnail: '<img width="40" height="40" style="display: inline-block;" src="<?php echo e(asset('la-assets/img/laraadmin_logo_white.png')); ?>" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'
					}).show();
					setTimeout(function() {
						window.location.reload();
					}, 1000);
				} else {
					$("#CreateBackup").html('Create Backup');
					$('body').pgNotification({
						style: 'circle',
						title: 'Backup creation failed',
						message: data.message,
						position: "top-right",
						timeout: 0,
						type: "danger",
						thumbnail: '<img width="40" height="40" style="display: inline-block;" src="<?php echo e(asset('la-assets/img/laraadmin_logo_white.png')); ?>" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'
					}).show();
					console.error(data.output);
				}
			}
		});
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("la.layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>