<?php
session_start();
require_once('function/user.php');


if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  header('location:dashboard.php');
}


$errorcount = 0;

$email = $_POST["email"]!=""?$_POST["email"]: $errorcount++;
$password = $_POST["password"]!=""?$_POST["password"]: $errorcount++;


$_SESSION["email"] = $email;

if($errorcount > 0){
    $sesssion_error = "you have " .$errorcount." error in your form submission ";
    if($errorcount >1){
        $sesssion_error = "you have " .$errorcount. " errors in your form submission";
    }
  
    $_SESSION["error"] = $sesssion_error;

    header('location: login.php');
}else {
        
      $allUsers = scandir("db/users/");
      $countAllUsers = count($allUsers);
    
    for($counter = 0; $counter < $countAllUsers; $counter++){
      $currentUser = $allUsers[$counter];

      if($currentUser ==  $email . ". json"){
        $userstring = file_get_contents("db/users/".$currentUser);
        $userObject = json_decode($userstring);
        $passwordFromDB = $userObject->password;
        $passwordFromUser = password_verify($password, $passwordFromDB);
        
        if( $passwordFromDB == $passwordFromUser){
        
          $_SESSION['loggedIn'] = $userObject->id;
          $_SESSION['fullname'] = $userObject->firstname.  " ". $userObject->lastname;
          $_SESSION['role'] = $userObject->designation;
          
      
                  header('location:dashboard.php');
          die();
        
              
              
          
          

  
          
            
      }
    
     
}
}


  $_SESSION["error"] = "Invalid email or password";
  header('location:login.php');
  die();    
  
  }


    
?>