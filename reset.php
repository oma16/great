<?php 
include_once("header.php");

if(!isset($_GET['token']) && !isset($_SESSION['token'])){

    $_SESSION["error"] = "You are not authorized to view that page";
      header('location: login.php');
      die();
    }
?>


  <h3>Reset password</h3>
  <p>Reset password associated with your account: [email]</p>

<form action="processreset.php" method="post">
<p>
<?php
if(isset($_SESSION["error"])&& !empty($_SESSION["error"])){
    echo "<span style = color:blue>".$_SESSION["error"]."</span>";
    session_destroy();
}
?>
</p>
<p>
<input 
<?php
 if(isset($_SESSION['token'])){
      echo "value ='".$_SESSION['token']. "'";
  }else{
      echo "value ='". $_GET['token']. "'";
  }

?> 
type="hidden" name="token">


</p>
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
<button type="submit">reset button</button>
</p>


</form>
