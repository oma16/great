<?php include_once("header.php")?>
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
if(isset($_SESSION['error'])&& !empty($_SESSION['error'])){
    echo "<span style = color:blue>".$_SESSION['error']."</span>";
    session_destroy();
}
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
