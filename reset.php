<?php 
include_once("header.php");
require_once("function/alert.php");
require_once('function/user.php');

if(!is_user_loggedIn() && !is_token_set()){

    $_SESSION["error"] = "You are not authorized to view that page";
      header('location: login.php');
      die();
    }
?>

<div class = "container">
  <div class = "row col-6">
  <h3>Reset password</h3>
  </div>
  <div class = "row col-6">
  <p>Reset password associated with your account: [email]</p>
  </div>
  <div class = "row col-6">
<form action="processreset.php" method="post">
<p>
<?php
 print_error(); print_message();
?>
</p>

   <?php if(!is_user_loggedIn()){?>
<input 
<?php
 if(is_token_set_in_session()){
      echo "value ='".$_SESSION['token']. "'";
  }else{
      echo "value ='". $_GET['token']. "'";
  }

?> 
type="hidden" name="token">

<?php } ?>

<p>
<label for="email">Email</label><br>
<input 
<?php
  if(isset($_SESSION["email"])){
      echo "value =".$_SESSION["email"]."";
  }
?>
     type="email" name="email" placeholder="Enter email" >

</p>
<p>
<label for="password">Enter New Password</label><br>
<input type="password" name="password" placeholder="password">
</p>

<p>
<button class="btn-success" type="submit">reset button</button>
</p>


</form>
</div>
</div>