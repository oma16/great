<?php 
include_once("header.php");
require_once("function/alert.php");
?>
<div class = "container">
<div class = "row col-6">
<h3>Forgot password</h3>
</div>
<div class = "row col-6">
<p>Provide the email address associated with your account</p>
</div>
<div class = "row col-6">
<form action="processforgot.php" method="post">
<p>
<?php
print_error(); print_message();
?>
</p>

<p>
<label for="email">Email</label><br>
<input
<?php
  if(isset($_SESSION["email"])){
      echo "value =".$_SESSION["email"];
  }
?>
 type="email" name="email" placeholder="Enter email" >

</p>

<p>
<button  class = "btn-success" type="submit">send reset code</button>
</p>


</form>
</div>
</div>
<?php include_once("footer.php");?>