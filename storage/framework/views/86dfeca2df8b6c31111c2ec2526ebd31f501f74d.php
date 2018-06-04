<?php $__env->startSection('content'); ?>
<div id="main-container">
  <div class="container">
    <section class="addcart-section">
  <div class="container">   

    <div class="row" style="padding:10px">
      <div class="col-md-12">
        <div class="box">
          <form method="post" action="#">
              <h1>List Service</h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>                       
                          <tr>
                              <th>Name</th>
                              <th>Hashpower</th>
                              <th>price</th>
                              <th>Category</th>
                              <th colspan="2">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach($lists as $list): ?>
                          <tr>                              
                              <td><a href="#"><?php echo e($list->name); ?></a>
                              </td>
                              <td>
                                  <?php echo e($list->hashrate); ?> <?php echo e($list->hashrate_type); ?>

                              </td>
                              <td>$<?php echo e($list->price); ?></td>
                              <td><?php echo e($list->cat_name); ?></td>
                              <td>
                                  <a href="<?php echo e(URL::to('')); ?>/service/edit/<?php echo e($list->sp_id); ?>" class="btn btn-info" role="button">Edit</a>
                                  <a href="<?php echo e(URL::to('')); ?>/service/delete/<?php echo e($list->sp_id); ?>" onclick="return confirm('Are you sure you want to delete this service?')" class="btn btn-info" role="button">Delete</a>
                                 
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