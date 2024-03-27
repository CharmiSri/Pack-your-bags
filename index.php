<!DOCTYPE html>
<html>
<head>
<title>Pack Your Bags</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body style="background-repeat: no-repeat; margin-top:70px;">
<div class="container">
<div class="row">
<div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Payment Details  </h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="billing_name" id="billing_name" placeholder="Enter name" autofocus="" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="Enter email" pattern=".+@gmail.com" required>
                        </div>
                        
                  <div class="form-group">
                    
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="billing_mobile" id="billing_mobile" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min-length="10"  placeholder="Enter Mobile Number" autofocus="" required>
                        </div>
                        
                         <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="payAmount" id="payAmount" value="0" placeholder="Enter Amount" autofocus="" required>
                        </div>
						
	<!-- submit button -->
	<button  id="PayNow" class="btn btn-success btn-lg btn-block" >Submit & Pay</button>
                       
                    </div>
                </div>
            </div>
</div>
</div>
<script>
    //Pay Amount
    jQuery(document).ready(function($){
 
jQuery('#PayNow').click(function(e){
 
	var paymentOption='';
let billing_name = $('#billing_name').val();
	let billing_mobile = $('#billing_mobile').val();
	let billing_email = $('#billing_email').val();
  var shipping_name = $('#billing_name').val();
	var shipping_mobile = $('#billing_mobile').val();
	var shipping_email = $('#billing_email').val();
var paymentOption= "netbanking";
var payAmount = $('#payAmount').val();
			
var request_url="submitpayment.php";
		var formData = {
			billing_name:billing_name,
			billing_mobile:billing_mobile,
			billing_email:billing_email,
			shipping_name:shipping_name,
			shipping_mobile:shipping_mobile,
			shipping_email:shipping_email,
			paymentOption:paymentOption,
			payAmount:payAmount,
			action:'payOrder'
		}
		
		$.ajax({
			type: 'POST',
			url:request_url,
			data:formData,
			dataType: 'json',
			encode:true,
		}).done(function(data){
		
		if(data.res=='success'){
				var orderID=data.order_number;
				var orderNumber=data.order_number;
				var options = {
    "key": data.razorpay_key, // Enter the Key ID generated from the Dashboard
    "amount": data.userData.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Pack Your Bags", //your business name
    "description": data.userData.description,
    "image": "data:image/jpeg;base64,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",
    "order_id": data.userData.rpay_order_id, //This is a sample Order ID. Pass 
    "handler": function (response){
 
    window.location.replace("payment-success.php?oid="+orderID+"&rp_payment_id="+response.razorpay_payment_id+"&rp_signature="+response.razorpay_signature);
 
    },
    "modal": {
    "ondismiss": function(){
         window.location.replace("payment-success.php?oid="+orderID);
     }
},
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": data.userData.name, //your customer's name
        "email": data.userData.email,
        "contact": data.userData.mobile //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Pack Your Bags"
    },
    "config": {
    "display": {
      "blocks": {
        "banks": {
          "name": 'Pay using '+paymentOption,
          "instruments": [
           
            {
                "method": paymentOption
            },
            ],
        },
      },
      "sequence": ['block.banks'],
      "preferences": {
        "show_default_blocks": true,
      },
    },
  },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
 
    window.location.replace("payment-failed.php?oid="+orderID+"&reason="+response.error.description+"&paymentid="+response.error.metadata.payment_id);
 
         });
      rzp1.open();
     e.preventDefault(); 
}
 
});
 });
    });
</script>
</body>
</html>