<?php $__env->startSection('content'); ?>

<div id="main-container">
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
   <ul>
      <?php foreach($errors->all() as $error): ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
<div class="alert alert-success">
   <?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>
  <div class="container">  
    
    <!-- hash power -->
    <div id="current-mining" class="mma mma-bc1">
      <div><h1>Change Password</h1></div>
      <div class="row">
      <?php echo Form::open(['url' => 'user/submitpassword', 'method'=>'post']); ?>

          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Old Password :</div>              
              <div class="col-md-6"><input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control" required="required"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">New Password :</div>              
              <div class="col-md-6"><input type="password" name="password" id="password" placeholder="New Password" class="form-control" required="required" ></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Conf Password :</div>              
              <div class="col-md-6"><input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password" class="form-control"></div>
          </div>
          
        
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-12" style="float: right;"><button type="submit" class="btn btn-warning"> Submit </button></div>
        
        <?php echo Form::close(); ?>

      </div>
    </div>
    <!-- hashing power --> 
    
    
    
    
    </div>
    
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>