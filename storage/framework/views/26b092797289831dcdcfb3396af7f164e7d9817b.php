<?php $__env->startSection('content'); ?>
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
<div id="main-container">
  <div class="container">  
    
    <!-- hash power -->
    <div id="current-mining" class="mma mma-bc1">
      <div><h1>Edit Service</h1></div>
      <div class="row">
      <?php echo Form::open(['url' => 'service/store', 'method'=>'post', 'enctype' => 'multipart/form-data']); ?>

          <input type="hidden" name="id" value="<?php echo e($service->id); ?>">
          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Category :</div>              
              <div class="col-md-6"><?php echo e($service->cat_name); ?></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Service Name :</div>              
              <div class="col-md-6"><?php echo e($service->pro_name); ?></div>
          </div>
           <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Hashrate :</div>              
              <div class="col-md-6"><span id="rate"><?php echo e($service->hashrate); ?></span> <span id="desit"><?php echo e($service->hashrate_type); ?></span></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Price :</div>              
              <div class="col-md-6"><input type="text" name="price" id="price" placeholder="Product Price ..." class="form-control" required="required" value="<?php echo e($service->price); ?>"></div>
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