<?php include_once("header.php");
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
$allAppointment = scandir("db/appointment/");
$countAllAppointment = count($allAppointment);

for($counter = 0; $counter < $countAllAppointment; $counter++){
    $currentAppointment = $allAppointment[$counter];


}
$str_appointment = file_get_contents("db/appointment/" .$currentAppointment);  
$appointment = json_decode($str_appointment, true);


$temp ="<table>";


$temp .="<tr><th>Fullname</th>";
$temp .="<th>Date of birth</th>";
$temp .="<th>Gender</th>";
$temp .="<th>Date of appointment</th>";
$temp .="<th>Time of appointment</th>";
$temp .="<th>Nature of appointment</th>";
$temp .="<th>Initial complaint</th>";
$temp .="<th>Department</th></tr>";

for($i = 0; $i < $countAllAppointment; $i++){

    $temp .= "<tr>";
    $temp .= "<td>" . $appointment["fullname"] . "</td>";
    $temp .= "<td>" . $appointment["date_of_birth"] . "</td>";
    $temp .= "<td>" . $appointment["gender"] . "</td>";
    $temp .= "<td>" . $appointment["date_of_appointment"] . "</td>";
    $temp .= "<td>" . $appointment["time_of_appointment"] . "</td>";
    $temp .= "<td>" . $appointment["nature_of_appointment"] . "</td>";
    $temp .= "<td>" . $appointment["initial_complaint"] . "</td>";
    $temp .= "<td>" . $appointment["department"] . "</td>";
    $temp .= "</tr>";

    $temp .= "</table>";

    print  $temp;
}

