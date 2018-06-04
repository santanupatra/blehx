<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="membershipform" id="frmPaypal">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="nits.arpita@gmail.com">
<input type="hidden" name="item_name" value="MemberShip">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="notify_url" value="{{URL::to('')}}/order/paypal_payment">
<input type="hidden" name="amount" id="amount" value="2">
<input type="hidden" name="src" value="1">
<input type="hidden" name="sra" value="1">
<input type="hidden" name="custom" value="{{$orders->id}}">
<input type="hidden" name="return" value="{{URL::to('')}}/order/success/{{$orders->id}}">
<input type="hidden" name="cancel_return" value="{{URL::to('')}}/order/cancel/{{$orders->id}}">
</form>
<script type="text/javascript">
  //document.getElementById('frmPaypal').submit();

</script>