<?php $__env->startSection('content'); ?>
<div id="main-container">
  <div class="container">
    <section class="addcart-section">
  <div class="container">   

    <div class="row" style="padding:10px">
      <div class="col-md-12">
        <div class="box">
          <form method="post" action="#">
              <h1>My Order</h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>                       
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>Status</th>                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach($orders as $list): ?>
                          <tr>
                              
                              <td><a href="#"><?php echo e($list->orderid); ?></a>
                              </td>
                              <td>
                                  <?php echo e($list->name); ?>

                              </td>
                              <td>$<?php echo e($list->total_price); ?></td>
                              <td><?php echo e($list->order_date); ?></td>
                              <td><?php echo e($list->is_deliver); ?></td>
                              
                          </tr>
                          <?php endforeach; ?>
                          
                      </tbody>
                     
                  </table>

              </div>
              <!-- /.table-responsive -->

             
          </form>
        </div>          
       </div> 

      
    </div>
  </div>
</section>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>