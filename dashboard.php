<?php
include_once("index.php");


if(!isset($_SESSION['loggedIn'])){
    
    header('location:login.php'); 

}
?>


<h3>Dashboard</h3>

     LoggedIn User ID =<?php echo $_SESSION['loggedIn'] ?>
     Welcome,<?php echo $_SESSION['fullname']?>, you are logged in as 
     <?php echo $_SESSION['designation']?>, and your ID is 
     <?php echo $_SESSION['loggedIn']?>
