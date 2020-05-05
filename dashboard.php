<?php
include_once("header.php");


if(!isset($_SESSION['loggedIn'])){
    
    header('location:login.php'); 

}
?>


<h3>Dashboard</h3>
    

     LoggedIn User ID = <?php echo $_SESSION['loggedIn'] ?>
     Welcome, <?php echo $_SESSION['fullname']?>, you are logged in as 
     <?php echo $_SESSION['role']?>, and your ID is 
     <?php echo $_SESSION['loggedIn']?>


     

<?php
if($_SESSION['role'] == "Medical Team (MT)"){
   
  header('location: mt.php');
  
}else{
  header('location: patient.php');
  die();
}
     
     
   
   