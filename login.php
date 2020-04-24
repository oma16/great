<?php
include_once("header.php");
require_once("function/alert.php");



if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
  header('location:dashboard.php');}?>

<div class = "container">
<div class = "row col-6">
<h3>Login</h3>
</div>
<div class = "row col-6">
<form action="processlogin.php" method="post">
<p>
<?php print_error(); print_message();?>
</p>

<p>
<label for="email">Email</label>
<input 
<?php
  if(isset($_SESSION["email"])){
       echo "value =".$_SESSION["email"];
  }
?>
      type="email" name="email" placeholder="email">
</p>

<p>
<label for="password">Password</label>
<input type="password" name="password" placeholder="password">
</p>
<p>
<button class = "btn-success" type="submit">login</button>
</p>
</form>
</div>
</div>
<?php include_once("footer.php");?>