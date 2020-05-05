<?php
include_once("header.php");
?>


<div class = "container">

   <div class = "row col-6">
   <h3>Payment Session</h3> 
   </div>
   <div class = "row col-6">
<p>
<strong>Welcome, Please click to make payment below</strong>
</p>
</div>
<div class = "row col-6">
<p>All fields are required</p>
</div>
<div class = "row col-6">

<form>


    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <button type="button" onClick="payWithRave()">Pay Now</button>
</form>
</div>

<script>
    const API_publicKey = "FLWPUBK_TEST-da3c6584e6eefa9acb463e64453d32b7-X";

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "titioba95@gmail.com",
            
            amount: 2000,
            customer_phone: "234099940409",
            currency: "NGN",
            payment_option:"card,account",
            txref: "rave-123456",
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef; // collect txRef returned and pass to a server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                    // redirect to a success page

                    window.location.assign('./success.php');
                } else {
                    // redirect to a failure page.
                    window.location.assign('./processpaymentfailed.php');
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>





