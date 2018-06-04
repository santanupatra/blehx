<?php $__env->startSection('content'); ?>
<div id="main-container">
  <div class="container">
    <section class="addcart-section">
  <div class="container">   

    <div class="row" style="padding:10px">
      <div class="col-md-12">
        <div class="box">
          <form method="post" action="#">
              <h1>List product</h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>                       
                          <tr>
                              <th>Product</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>price</th>
                              <th>Category</th>
                              <th colspan="2">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach($lists as $list): ?>
                          <tr>
                              <td>
                                  <a href="#">
                                      <img src="<?php echo e(URL::asset('../storage/uploads/product')); ?>/<?php echo e($list->image); ?>" width="150" alt="White Blouse Armani">
                                  </a>
                              </td>
                              <td><a href="#"><?php echo e($list->name); ?></a>
                              </td>
                              <td>
                                  <?php echo e($list->quantity); ?>

                              </td>
                              <td>$<?php echo e($list->price); ?></td>
                              <td><?php echo e($list->cat_name); ?></td>
                              <td>
                                  <a href="<?php echo e(URL::to('')); ?>/product/edit/<?php echo e($list->sp_id); ?>" class="btn btn-info" role="button">Edit</a>
                                  <a href="<?php echo e(URL::to('')); ?>/product/delete/<?php echo e($list->sp_id); ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-info" role="button">Delete</a>
                                 
                              </td>
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