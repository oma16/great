<?php
include_once("header.php");
if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
  header('location:dashboard.php');
}
?>

  <div class = "container">
    <div class = "row col-6">
    <h3>Register</h3> 
    </div>
    <div class = "row col-6">
  <p>
  <strong>Welcome, Please Register</strong>
  </p>
  </div>
  <div class = "row col-6">
  <p>All fields are required</p>
  </div>
  <div class = "row col-6">
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

       type="text" class = "form-control" name="firstname" placeholder="Enter firstname" >
  </p>
  <p>
  <label for="lastname">Lastname</label><br>
  <input 

  <?php
    if(isset($_SESSION["lastname"])){
        echo "value =".$_SESSION["lastname"];
    }
  ?>
    type="text"  class = "form-control" name="lastname" placeholder="Enter lastname" >

  </p>
  <p>
  <label for="email">Email</label><br>
  <input
  <?php
    if(isset($_SESSION["email"])){
        echo "value =".$_SESSION["email"];
    }
  ?>
  type="email"  class = "form-control" name="email" placeholder="Enter email" >

  </p>
  <p>
  <label for="password">Password</label><br>
  <input type="password" name="password" placeholder="Enter password">
  </p>
  <p>
  <label for="gender">Gender</label><br>
  <select name="gender"  class = "form-control" id="" >
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
  <select name="designation" class = "form-control" id="" >
  <option value="">click to select</option>
  <option <?php
    if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Medical Team (MT)"){
        echo "selected";
    }
  ?>
  >Medical Team (MT)</option>
  <option 
  <?php
    if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Patient"){
        echo "selected";
    }
  ?>>Patient</option>
  <option 
  <?php
    if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Super Admin"){
        echo "selected";
    }
  ?>>Super Admin</option>
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

  <p><button class = "btn-success" type="submit">Register</button></p>
    

    <p>
    
    <a href="forgot.php">Forgot password</a>
    </P>
    <P>
    <a href="login.php">Already have an account? Login</a>
    </p>
  </form>


  </div>



</div>



  