<?php session_start();

$errorcount = 0;
         

$token = $_POST["token"]!=""?$_POST["token"]: $errorcount++;
$email = $_POST["email"]!=""?$_POST["email"]: $errorcount++;
$password = $_POST["password"]!=""?$_POST["password"]: $errorcount++;


$_SESSION['token'] = $token;
 $_SESSION['email'] = $email;

 if($errorcount > 0){
    
    $sesssion_error = "you have "  . $errorcount .  " error in your form submission";
    if($errorcount >1){
        $sesssion_error =  "you have " .$errorcount. " errors in your form submission";
        
    }
    
    $_SESSION["error"] = $sesssion_error;
        header('location: reset.php');
        
}else {
       $allUserTokens = scandir("db/tokens/");
       $countAllUserTokens = count($allUserTokens);
       $tokenObject = [
           'token' =>$token
        
        
    ]; 

       for($counter = 0; $counter < $countAllUserTokens; $counter++){
           
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile ==  $email .  ".json"){
        
            $tokenContent = file_get_contents( "db/tokens/".$currentTokenFile);
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;

            if($tokenFromDB == $token){
                
                $allUsers = scandir("db/users/");
               $countAllUsers = count($allUsers);
    
    for($counter = 0; $counter < $countAllUsers; $counter++){
      $currentUser = $allUsers[$counter];

      if($currentUser ==  $email . ". json"){
        $userstring = file_get_contents("db/users/".$currentUser);
        $userObject = json_decode($userstring);
        $userObject->password = password_hash($password,PASSWORD_DEFAULT);
        unlink("db/users/".$currentUser);
        unlink("db/users/".$currentUser);

        file_put_contents("db/users/". $email . ". json",json_encode($userObject));
     $_SESSION["error"] = "Password Reset successful, you can now login ". $firstname;
      //password reset success message
      $subject = "Password reset successful";
   $message = "Your account on oma has just been updated,your password has changed. 
   if you did not initate the password change, please visit snh.org and 
    reset your password immediately".$token;
    $headers = "From: no-reply@snh.org" . "\r\n" .
    "CC: mariam@snh.org";
    $try = mail($email,$subject,$message,$headers); 
    //password reset success message ends
      header('location: login.php');
        die();
      
    } 
}
    
}
           

        
}

   }
$_SESSION["error"] = "Password Reset Failed, token/email invalid or expired";
            header('location:login.php'); 
}
?>