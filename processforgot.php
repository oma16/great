<?php session_start();
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  header('location:dashboard.php');
}


$errorcount = 0;

$email = $_POST["email"]!=""?$_POST["email"]: $errorcount++;



$_SESSION["email"] = $email;

if($errorcount > 0){
    $sesssion_error = "you have " .$errorcount." error in your form submission ";
    if($errorcount >1){
        $sesssion_error = "you have " .$errorcount. " errors in your form submission";
    }
  
    $_SESSION["error"] = $sesssion_error;

    header('location: forgot.php');
}else {
        
      $allUsers = scandir("db/users/");
      $countAllUsers = count($allUsers);
    
    for($counter = 0; $counter < $countAllUsers; $counter++){
      $currentUser = $allUsers[$counter];
      
      if($currentUser ==  $email . ". json"){
          //send email and redirect to reset page  

          //generating token code begins
     $token = "";  //TODO; work on token generation
     $alphabets = ['a','b','c','d','e','f','g','h','i','j','A',
     'B','C','D','E','F','G','H','I','J','K','L','M'];
     
     
     for($i = 0; $i < 30; $i++){

       $index = mt_rand(0, count($alphabets)-1);
       $token .= $alphabets[$index];
     }


     
     //generating token code ends 

    $subject = "Password reset link";
    $message = "A password reset has been initiated from your account,if you did not initiate this reset, please ignore this message,
    otherwise, visit localhost/great/reset.php?token=".$token;
    $headers = "From: no-reply@snh.org" . "\r\n" .
    "CC: mariam@snh.org";
    file_put_contents("db/tokens/". $email . ". json",json_encode(['token'=>$token]));
    $try = mail($email,$subject,$message,$headers); 
    if($try){
        //display a success message

        $_SESSION["error"] = "password reset has been sent to ur email : ". $email;
              header('location:reset.php');
      die();
    }else{
        //display error message
        $_SESSION["error"] = "Something went wrong, we could not send password reset to : ". $email;
              header('location:forgot.php');

    
            }

    die();
      }

      
    }
    $_SESSION["error"] = "Email not Register with us ERR : ". $email;
    header('location:forgot.php');
    die();  
} 
?>
