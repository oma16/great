<?php
include_once("header.php");
if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
  header('location:dashboard.php');}?>

<div class = "container">
<div class = "row col-6">
<h3>Login</h3>
</div>
<div class = "row col-6">
<form action="processlogin.php" method="post">
<p>
<?php
if(isset($_SESSION['error'])&& !empty($_SESSION['error'])){
    echo "<span style = color:blue>".$_SESSION['error']."</span>";
    session_destroy();
}
?>
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