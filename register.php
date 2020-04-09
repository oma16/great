<?php
session_start();
if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
  header('location:dashboard.php');
}
?>
<h3>Register</h3> 
<p>
<strong>Welcome, Please Register</strong>
</p>
<p>All fields are required</p>

<form action="processregister.php" method="post">

<p>
<?php
if(isset($_SESSION['error'])&& !empty($_SESSION['error'])){
    echo "<span style = color:blue>".$_SESSION['error']."</span>";
    session_destroy();
}
?>
</p>
<label for="firstname">Firstname</label> <br>
<input
<?php
  if(isset($_SESSION["firstname"])){
      echo "value =".$_SESSION['firstname'];
  }
?>

 type="text" name="firstname" placeholder="Enter firstname" >
</p>
<p>
<label for="lastname">Lastname</label><br>
<input 

<?php
  if(isset($_SESSION["lastname"])){
      echo "value =".$_SESSION["lastname"];
  }
?>
  type="text" name="lastname" placeholder="Enter lastname" >

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
<label for="password">Password</label><br>
<input type="password" name="password" placeholder="Enter password">
</p>
<p>
<label for="gender">Gender</label><br>
<select name="gender" id="" >
<option value="">click to select</option>
<option
<?php
  if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "Male"){
      echo "selected";
  }
?>
 >Male</option>
<option 
<?php
  if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "Female"){
      echo "selected";
  }
?>
>Female</option>
</select>

<p>
<label for="designation">Designation</label><br>
<select name="designation" id="" >
<option value="">click to select</option>
<option <?php
  if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Medical Team (MT)"){
      echo "selected";
  }
?>
>Medical Team (MT)</option>
<option 
<?php
  if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Patients"){
      echo "selected";
  }
?>>Patients</option>
</select>

</p>
<p>
<label for="department">Department</label><br>
<input 
<?php
  if(isset($_SESSION["department"])){
      echo "value =".$_SESSION["department"];
  }
?>
    type="text" name="department" placeholder ="Enter department" >
</select>

 <p><button type="submit">Register</button></p>




</form>





  