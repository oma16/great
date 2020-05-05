<?php 
session_start();
require_once('function/user.php');


if(!isset($_SESSION['loggedIn'])){
    
    header('location:login.php'); 
}


$errorcount = 0;
$fullname = $_POST["fullname"]!=""?$_POST["fullname"]: $errorcount++;
$date_of_birth = $_POST["date_of_birth"]!=""?$_POST["date_of_birth"]: $errorcount++;
$email = $_POST["email"]!=""?$_POST["email"]: $errorcount++;
$phone_number = $_POST["phone_number"]!=""?$_POST["phone_number"]: $errorcount++;
$gender = $_POST["gender"]!=""?$_POST["gender"]: $errorcount++;
$date_of_appointment = $_POST["date_of_appointment"]!=""?$_POST["date_of_appointment"]: $errorcount++;
$time_of_appointment = $_POST["time_of_appointment"]!=""?$_POST["time_of_appointment"]: $errorcount++;
$nature_of_appointment = $_POST["nature_of_appointment"]!=""?$_POST["nature_of_appointment"]: $errorcount++;
$initial_complaint = $_POST["initial_complaint"]!=""?$_POST["initial_complaint"]: $errorcount++;
$department = $_POST["department"]!=""?$_POST["department"]: $errorcount++;

 $_SESSION["fullname"] = $fullname;
 $_SESSION["date_of_birth"] = $date_of_birth;
 $_SESSION["email"] = $email;
 $_SESSION["phone_number"] = $phone_number;
 $_SESSION["gender"] = $gender;
 $_SESSION["date_of_appointment"] = $date_of_appointment;
 $_SESSION["time_of_appointment"] = $time_of_appointment;
 $_SESSION["nature_of_appointment"] = $nature_of_appointment;
 $_SESSION["initial_complaint"] = $initial_complaint;
 $_SESSION["department"] = $department;



 if($errorcount > 0){
    
    $sesssion_error = "you have "  . $errorcount .  " error in your form submission";
    if($errorcount >1){
        $sesssion_error =  "you have " .$errorcount. " errors in your form submission";
        
    }
    
    $_SESSION["error"] = $sesssion_error;

    header('location: bookappointment.php');
}else{

    $allAppointment = scandir("db/appointment/");
    $countAllAppointment = count($allAppointment);
    $newAppointmentId = ($countAllAppointment);
     $appointmentObject = [
         'id'=> $newAppointmentId,
         'fullname'=> $fullname,
         'date_of_birth'=> $date_of_birth,
         'email'=>$email,
         'phone_number'=> $phone_number,
         'gender'=> $gender,
         'date_of_appointment'=>$date_of_appointment,
         'time_of_appointment'=>$time_of_appointment,
         'nature_of_appointment'=>$nature_of_appointment,
         'initial_complaint'=>$initial_complaint,
         'department'=> $department
         
     ]; 

     for($counter = 0; $counter < $countAllAppointment; $counter++){
         $currentAppointment = $allAppointment[$counter];
         

         if($currentAppointment == $fullname. " . json"){
                 
              }
     }
      file_put_contents("db/Appointment/". $fullname . ". json",json_encode($appointmentObject));
      $_SESSION["message"] = "Appointment Booking successful :". $fullname;
      header('location:dashboard.php');

    }



    ?>


  