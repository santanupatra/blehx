<?php $__env->startSection('content'); ?>
<section class="prisng-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="prisng-div">
          <div class="page-header">
            <h2 class="h2">Payment Details</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="prctxt-div">
           <div class="col-md-6">
                <div class="inner-tabdiv">
                  <div class="panel panel-warning">                    
                    <div class="panel-body">
                      <h3 class="text-center text-uppercase"><?php echo e($details->name); ?>

                        <small><?php echo e($details->uname); ?></small>  
                      </h3>

                      <h1 class="text-center">
                        <strong><sub>$</sub><?php echo e($details->price); ?></strong>                         
                      </h1>

                      <h2 class="text-center">
                        <?php echo e($details->hashrate); ?> <?php echo e($details->hashrate_type); ?>                        
                      </h2>
                      <p class="text-center"><?php echo e($details->description); ?></p>                                      
                    </div>
                  </div>
                </div>
              </div> 
               
        </div>
         <div class="prctxt-div">
           <div class="col-md-6">
                <div class="inner-tabdiv">
                  <div class="panel panel-warning">                    
                    <div class="panel-body">
                      
                      <h3 class="text-center text-uppercase"><small>Tital Amount : $ <?php echo e($details->price); ?></small></h3>
                      <h3 class="text-center text-uppercase"><small>Total Hashrate : <?php echo e($details->hashrate); ?> <?php echo e($details->hashrate_type); ?></small></h3>                                   
                    </div>
                  </div>
                </div>
              </div> 
               
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<section class="ptab-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ptab-div">


    


        </div> <!-- ptab-div -->
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>