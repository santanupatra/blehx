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
      <div><h1>Edit Profile</h1></div>
      <div class="row">
      <?php echo Form::open(['url' => 'user/submitprofile', 'method'=>'post', 'enctype' => 'multipart/form-data']); ?>

          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Name :</div>              
              <div class="col-md-6"><input type="text" name="name" id="name" placeholder="Name ..." class="form-control" required="required" value="<?php echo e($userinfo->name); ?>"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Phone :</div>              
              <div class="col-md-6"><input type="text" name="phone_no" id="phone_no" placeholder="Phone" class="form-control" required="required" value="<?php echo e($userinfo->phone_no); ?>"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Email :</div>              
              <div class="col-md-6"><input type="text" name="email" id="email" placeholder="Weight ..." class="form-control" value="<?php echo e($userinfo->email); ?>" readonly="readonly"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">D.O.B :</div>              
              <div class="col-md-6"><input type="text" name="dob" id="dob" placeholder="Date of birth" class="form-control" required="required" value="<?php echo e($userinfo->dob); ?>"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Address :</div>              
              <div class="col-md-6"><input type="text" name="address" id="address" placeholder="Quantity ..." class="form-control" required="required" value="<?php echo e($userinfo->address); ?>"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">City :</div>              
              <div class="col-md-6"><input type="text" name="city" id="city" placeholder="City" class="form-control" required="required" value="<?php echo e($userinfo->city); ?>"></div>
          </div>
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Country :</div>              
              <div class="col-md-6"><input type="text" name="country" id="country" placeholder="country" class="form-control" required="required" value="<?php echo e($userinfo->country); ?>"></div>
          </div>
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-md-12">
              <div class="col-md-2">Zip :</div>              
              <div class="col-md-6"><input type="text" name="zip" id="zip" placeholder="zip" class="form-control" required="required" value="<?php echo e($userinfo->zip); ?>"></div>
          </div>
        
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-md-12">
              <div class="col-md-2">Profile Image :</div>              
              <div class="col-md-6"><input type="file" name="image"></div>
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