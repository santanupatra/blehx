<?php $__env->startSection('content'); ?>
<section class="cus-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h2 class="text-uppercase h1">Contact Us</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="cus-leftdiv">
          <h1>Thank you for using <strong>Blehx!</strong></h1>
        </div>

        <div class="google-div">
          <div class="page-header">
            <h4>Here We Are</h4>
          </div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d188820.8050415982!2d-71.11037070142213!3d42.314264698825404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1516628925983" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-6">
        <div class="cus-formdiv">
          <h5>Fill Here</h5>

          <?php echo Form::open(['url' => 'user/sendmail','method'=>'post','onsubmit'=>'return validation();']); ?>

            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name" required id="name" />
            </div>

            <div class="form-group">
            <input type="email" class="form-control" placeholder="Email-id..." required name="email" id="email">
            </div>

            <div class="form-group">
               <input type="tel" class="form-control" placeholder="Phone" required name="phone" id="phone">
            </div>

            <div class="form-group">
            <input type="text" class="form-control" placeholder="Title" required name="title" id="title">
            </div>

            <div class="form-group">
              <textarea class="form-control" rows="7" placeholder="Message" name="message"></textarea>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success text-center text-capitalize" data-toggle="modal">Send</button>
            </div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>