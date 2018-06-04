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
      <div><h1>Create product</h1></div>
      <div class="row">
      <?php echo Form::open(['url' => 'product/store', 'method'=>'post', 'enctype' => 'multipart/form-data']); ?>

          
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Category :</div>              
              <div class="col-md-6">
                <select name="category_id" id="category_id">
                  <?php foreach($category as $cat): ?>
                  <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Products :</div>              
              <div class="col-md-6">
                <select name="product_id" id="product_id">
                  <option value="0">Select Product</option>
                </select>
              </div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Price :</div>              
              <div class="col-md-6"><input type="text" name="price" id="price" placeholder="Product Price ..." class="form-control" required="required"></div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-2">Quantity :</div>              
              <div class="col-md-6"><input type="text" name="quantity" id="quantity" placeholder="Quantity ..." class="form-control" required="required"></div>
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
<script>
$(function(){
  $('#category_id').change(function(){
    category_id = $('#category_id').val();
      $.ajax({
            method: "GET",
            url: '<?php echo e(URL::to('')); ?>/product/productlist',
            data: { category_id: category_id}
          })
          .done(function( data ) {

           var obj = jQuery.parseJSON( data );
            if(obj.Ack  == 1){                   
              $('#product_id').html(obj.products);
            }
            else{
               alert('No product avilable in this category.');  
            }
          });
  })
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>