<?php $__env->startSection('content'); ?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
   <ul>
      <?php foreach($errors->all() as $error): ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
<div class="clearfix"></div>
<section class="product-detailsection">
      <div class="container">
      <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Payment</li>
        </ul>      
      </div>
    </div>
    <div class="row">
          <div class="col-md-5 center-div">
        <div class="product-detail-rightdiv">
              <h3 class="h4 pay">Payment</h3>
                <div class="pay-area">
                    <?php echo Form::open(['url' => 'order/stripe_payment', 'method'=>'post', 'id'=>'frmstripe', 'enctype' => 'multipart/form-data']); ?>

                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="amount" id="amount" value="<?php echo e($orders->total_price); ?>">
                        <input type="hidden" name="custom" id="custom" value="101">
                        <input type="hidden" name="id" value="<?php echo e($orders->id); ?>">
                        <input type="hidden" name="strip_token" id="strip_token_gift" class="form-control total">
                        <div class="form-group" style="text-align: center;">
                            <label for="exampleInputEmail1">Total Amount:</label>
                            $<?php echo e($orders->total_price); ?>                            
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Card Holder Name</label>
                            <input type="text" class="form-control" name="card_name" id="cardfullname" placeholder="Name of card holder">                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Card Number</label>
                            <input type="text" class="form-control" name="cardnumber" id="cardnumber" placeholder="4242 4242 4242 4242" maxlength="16">                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CVV</label>
                            <input type="text" class="form-control" name="cvv" id="cvvcode" placeholder="Number on back" maxlength="3">                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Expiration Date</label>
                            <div class="row">
                                <div class="col-md-6">                                    
                                    <select class="form-control" name="exp_month" id="expitymonth">
                                     <?php
                                        for($i=1; $i<=12; $i++){  ?>    
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                      <?php  } ?>
                                    </select> 
                                </div>
                                <div class="col-md-6">
                                   <select class="form-control" name="exp_year" id="expityyear">
                                      <?php
                                        $d=date("Y");
                                        $t= $d+10;
                                       for($r=$d; $r<=$t; $r++){  ?>   
                                        <option value="<?php echo $r?>"><?php echo $r;?></option>
                                       <?php  } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pay-card"> <img src="<?php echo e(URL::asset('assets/img/visa.jpg')); ?>" > </div>
                                    <div class="pay-card"> <img src="<?php echo e(URL::asset('assets/img/mastercard.jpg')); ?>"> </div>
                                    <div class="pay-card"><img src="<?php echo e(URL::asset('assets/img/amex.jpg')); ?>"> </div>
                                </div>
                                <div class="col-md-6">                                    
                                       <a href="javascript: void(0);" class="checkout clickpay2 btn bg-warning pay-now-btn" >PAY NOW</a>                                  
                                </div>
                            </div>
                        </div>
                     <?php echo Form::close(); ?>

                </div>
            </div>
      </div>
        </div>

  </div>
    </section>
<div class="clearfix"></div>


<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
   // $(function(){
   //   $('#frmPaypal').submit();
   // })
   
</script>
<?php
   $stripe_publish_key='pk_test_Vit1ZPRTtYcSsvBqn9speID7';//Configure::read('STRIPE_PUBLISH_KEY');
   ?>
<script>
   Stripe.setPublishableKey('<?php echo $stripe_publish_key;?>');
   $('.clickpay2').on('click', function() {
    var cardNumber = $('#cardnumber').val();
     var expityMonth = $('#expitymonth').val();
     var expityYear = $('#expityyear').val();
     var cvvCode = $('#cvvcode').val();
     var cardFullName = $('#cardfullname').val();
     if (cardNumber == '') {
             $("#cardnumber").addClass('required');
             $("#cardnumber").css('border', '1px solid #ff0000');
             $("#cardnumber").focus();
             return false;
      }
     if (expityMonth == '') {
       $("#cardnumber").removeClass('required');
       $("#expitymonth").addClass('required');
       $("#expitymonth").css('border', '1px solid #ff0000');
       $("#expitymonth").focus();
     }
     if (expityYear == '') {
       $("#cardnumber").removeClass('required');
       $("#expitymonth").removeClass('required');
       $("#expityyear").addClass('required');
       $("#expityyear").css('border', '1px solid #ff0000');
       $("#expityyear").focus();
       return false;
     }
     if (cvvCode == '') {
       $("#cardnumber").removeClass('required');
       $("#expitymonth").removeClass('required');
       $("#expityyear").removeClass('required');
       $("#cvvcode").addClass('required');
       $("#cvvcode").css('border', '1px solid #ff0000');
       $("#cvvcode").focus();
       return false;
     }
     if (cardFullName == '') {
       $("#cardnumber").removeClass('required');
       $("#expitymonth").removeClass('required');
       $("#expityyear").removeClass('required');
       $("#cvvcode").removeClass('required');
       $("#cardfullname").addClass('required');
       $("#cardfullname").css('border', '1px solid #ff0000');
       $("#cardfullname").focus();
       return false;
     }else{

       $("#cardnumber").removeClass('required');
       $("#expitymonth").removeClass('required');
       $("#expityyear").removeClass('required');
       $("#cvvcode").removeClass('required');
       $("#cardfullname").removeClass('required');
     }
   
       var cardFullName = $("#cardfullname").val();
       var cardNumber = $("#cardnumber").val();
       var expityMonth = $("#expitymonth").val();
       var expityYear = $("#expityyear").val();
       var cvvCode = $("#cvvcode").val();
       Stripe.createToken({
           number: cardNumber,
           cvc: cvvCode,
           exp_month: expityMonth,
           exp_year: expityYear
       }, function(status, response){
           if(response.hasOwnProperty("error")) {
               var StripeMsg=response.error.message;
               //$('#loading_modal').modal('hide');
               $("#stripe_error_pro").show("slow");
               $('#StripeErrorMsg').html(StripeMsg);
               //$('#StripeMsgModal').modal();
           }else if(typeof(response.id) != "undefined" && response.id !== null){
               //$('#loading_modal').modal({backdrop: 'static', keyboard: false});
         var stripetoken = response.id;
         //stripetoken = $(this).attr("strip_token");
         //alert(stripetoken);
         $('#strip_token_gift').val(stripetoken);
         if(stripetoken!=''){
           $("#frmstripe").submit();
         }else{
          $("#stripe_error_pro").show("slow");
         }
      
           }else{
            $("#stripe_error_pro").show("slow");
           }
       });
     //alert(cardNumber)
   });
   
   
   
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>