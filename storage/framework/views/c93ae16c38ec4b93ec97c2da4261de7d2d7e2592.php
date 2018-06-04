<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="membershipform" id="frmPaypal">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="nits.arpita@gmail.com">
<input type="hidden" name="item_name" value="MemberShip">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="notify_url" value="<?php echo e(URL::to('')); ?>/order/paypal_payment">
<input type="hidden" name="amount" id="amount" value="2">
<input type="hidden" name="src" value="1">
<input type="hidden" name="sra" value="1">
<input type="hidden" name="custom" value="<?php echo e($orders->id); ?>">
<input type="hidden" name="return" value="<?php echo e(URL::to('')); ?>/order/success/<?php echo e($orders->id); ?>">
<input type="hidden" name="cancel_return" value="<?php echo e(URL::to('')); ?>/order/cancel/<?php echo e($orders->id); ?>">
</form>
<script type="text/javascript">
  document.getElementById('frmPaypal').submit();

</script>