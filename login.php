<?php
include_once("index.php");
if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
  header('location:dashboard.php');}?>


<h3>Login</h3>

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
<button type="submit">login</button>
</p>
</form>
  