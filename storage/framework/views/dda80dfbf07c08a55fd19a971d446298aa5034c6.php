<?php $__env->startSection('htmlheader_title'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_description'); ?> Organisation Overview <?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <!-- <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo e(number_format((float)$donation, 2, '.', '')); ?></h3>
                  <p>Donations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo e($total_user); ?></h3>
                  <p>Total User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo e($active_user); ?></h3>
                  <p>Active User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo e($inactive_user); ?></h3>
                  <p>Inactive User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->


              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Quick Email</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    Visitors
                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div><!-- /.box-body-->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-1"></div>
                      <div class="knob-label">Visitors</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-2"></div>
                      <div class="knob-label">Online</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <div id="sparkline-3"></div>
                      <div class="knob-label">Exists</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div>
              </div>
              <!-- /.box -->



            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Morris chart -->
<link rel="stylesheet" href="<?php echo e(asset('la-assets/plugins/morris/morris.css')); ?>">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo e(asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo e(asset('la-assets/plugins/datepicker/datepicker3.css')); ?>">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo e(asset('la-assets/plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo e(asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo e(asset('la-assets/plugins/morris/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('la-assets/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('la-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('la-assets/plugins/knob/jquery.knob.js')); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo e(asset('la-assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('la-assets/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('la-assets/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- dashboard -->
<script src="<?php echo e(asset('la-assets/js/pages/dashboard.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
(function($) {
	$('body').pgNotification({
		style: 'circle',
		title: 'blehx',
		message: "Welcome to blehx Admin...",
		position: "top-right",
		timeout: 0,
		type: "success",
		thumbnail: '<img width="40" height="40" style="display: inline-block;" src="<?php echo e(Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email, 'default')); ?>" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'
	}).show();
        $.get("<?php echo e(asset('/')); ?>admin/sales",function(result){
        var data = result.charts,
        config = {
          data: data,
          xkey: 'y',
          ykeys: ['a'],
          labels: ['Total Donation'],
          fillOpacity: 0.6,
          hideHover: 'auto',
          behaveLikeLine: true,
          resize: true,
          pointFillColors:['#ffffff'],
          pointStrokeColors: ['black'],
          lineColors:['gray']
      };
    config.element = 'area-chart';
    Morris.Area(config);  
    
    var data = result.userreports,
        config = {
          data: data,
          xkey: 'y',
          ykeys: ['a'],
          labels: ['Total User'],
          fillOpacity: 0.6,
          hideHover: 'auto',
          behaveLikeLine: true,
          resize: true,
          pointFillColors:['#ffffff'],
          pointStrokeColors: ['black'],
          lineColors:['gray']
      };
    config.element = 'user-chart';
    Morris.Area(config);
    
    
    
              
        },"json");

})(window.jQuery);

</script>
<style>
    .jvectormap-zoomout{
        margin-left:-28px !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('la.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>