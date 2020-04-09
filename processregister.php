<?php 
session_start();

$errorcount = 0;
$firstname = $_POST["firstname"]!=""?$_POST["firstname"]: $errorcount++;
$lastname = $_POST["lastname"]!=""?$_POST["lastname"]: $errorcount++;
$email = $_POST["email"]!=""?$_POST["email"]: $errorcount++;
$password = $_POST["password"]!=""?$_POST["password"]: $errorcount++;
$gender = $_POST["gender"]!=""?$_POST["gender"]: $errorcount++;
$designation = $_POST["designation"]!=""?$_POST["designation"]: $errorcount++;
$department = $_POST["department"]!=""?$_POST["department"]: $errorcount++;

 $_SESSION["firstname"] = $firstname;
 $_SESSION["lastname"] = $lastname;
 $_SESSION["email"] = $email;
 $_SESSION["gender"] = $gender;
 $_SESSION["designation"] = $designation;
 $_SESSION["department"] = $department;



 if($errorcount > 0){
    
    $sesssion_error = "you have "  . $errorcount .  " error in your form submission";
    if($errorcount >1){
        $sesssion_error =  "you have " .$errorcount. " errors in your form submission";
        
    }
    
    $_SESSION["error"] = $sesssion_error;

    header('location: register.php');
}else{

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);
    $newUserId = ($countAllUsers-1);
     $userObject = [
         'id'=> $newUserId,
         'firstname'=> $firstname,
         'lastname'=> $lastname,
         'email'=> $email,
         'password'=> password_hash($password,PASSWORD_DEFAULT),
         'gender'=> $gender,
         'designation'=> $designation,
         'department'=> $department
         
     ]; 

     for($counter = 0; $counter < $countAllUsers; $counter++){
         $currentUser = $allUsers[$counter];

         if($currentUser == $email. " . json"){
             
    $_SESSION["error"] = "Registration failed,User already exists";
    header('location:register.php');       
              }
     }
      file_put_contents("db/users/". $email . ". json",json_encode($userObject));
      $_SESSION["error"] = "Registration successful, you can now login ". $firstname;
      header('location:login.php');

    }



    ?>


  