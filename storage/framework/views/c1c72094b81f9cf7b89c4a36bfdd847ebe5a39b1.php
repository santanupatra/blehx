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
<section class="new_product-section">
      <div class="container">
    <div class="row">
          <div class="col-md-12">
        <div class="page-header">
              <h2 class="text-uppercase h2">Product</h2>
              <div class="cart-div pull-right"> <i class="fa fa-cart-plus cart"></i> </div>
            </div>
      </div>
        </div>
    <div class="new_product-div">
          <div class="row">
        <div class="col-md-12">
              <ol class="breadcrumb">
               <li><a herf="#">All Products</a></li>
                <?php foreach( $categories as $cat ): ?>
                  <li><a herf="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></a></li>              
                <?php endforeach; ?>
              </ol>
        </div>
      </div>
          <div class="row">
          <?php foreach( $products as $pro ): ?>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="new_product-item">
                <div class="thumbnail"> <img src="<?php echo e(URL::asset('../storage/uploads/product')); ?>/<?php echo e($pro->image); ?>" alt="" class="img-responsive center-block" style="width: 268px; height: 224px">
                    <div class="caption">
                  <h3 class="h4 text-center text-uppercase"><?php echo e($pro->name); ?></h3>
                 <!--  <p class="h5 text-center">Shipping:March 15-22 </p> -->
                  <p class="h3 text-center text-uppercase">&dollar; <?php echo e($pro->price); ?> usd</p>
                  <p class="text-center"> <a href="<?php echo e(URL::to('/product/details/')); ?>/<?php echo e($pro->id); ?>" class="btn btn-default btn-sm text-uppercase"> <i class="fa fa-list-alt"></i> Lear More</a> &nbsp; <a href="#" class="btn btn-default btn-sm btn-primary text-uppercase"> <i class="fa fa-shopping-cart"></i> Add to Cart </a> </p>
                </div>
                </div>
              </div>
          </div>
          <?php endforeach; ?>       
        
        <div class="col-md-3 col-sm-12 col-xs-12"></div>
      </div>
        </div>
  </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>