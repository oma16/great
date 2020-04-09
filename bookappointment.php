<?php include_once("header.php");

if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
  header('location:dashboard.php');
}
?>
<div class = "container">

   <div class = "row col-6">
   <h3>Book Appointment</h3> 
   </div>
   <div class = "row col-6">
<p>
<strong>Welcome, Please fill the form below</strong>
</p>
</div>
<div class = "row col-6">
<p>All fields are required</p>
</div>
<div class = "row col-6">

<form action="processbookappointment.php" method="post">
<div>
<p>
<?php
if(isset($_SESSION['error'])&& !empty($_SESSION['error'])){
    echo "<span style = color:blue>".$_SESSION['error']."</span>";
    session_destroy();
}
?>
</p>

<p>
<label for="fullname">Full Name  </label>
<input 
<?php
  if(isset($_SESSION["fullname"])){
      echo "value =".$_SESSION['fullname'];
  }
?>
   type="text" class = "form-control" name="fullname" id="">

</p>
<p>
<label for="date_of_birth">Date of Birth  </label>
<input 
<?php
  if(isset($_SESSION["date_of_birth"])){
      echo "value =".$_SESSION['date_of_birth'];
  }
?>
   type="date" class = "form-control" name="date_of_birth" id="">

</p>
<p>
<p>
<label for="gender">Gender</label><br>
<select name="gender" class = "form-control"  id="" >
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
<label for="date_of_appointment">Date of Appointment  </label>
<input 
<?php
  if(isset($_SESSION["date_of_appointment"])){
      echo "value =".$_SESSION['date_of_appointment'];
  }
?>
     type="date" class = "form-control" name="date_of_appointment" id="">

</p>


<p>
<label for="time_of_appointment ">Time of Appointment </label>
<input
<?php
  if(isset($_SESSION["time_of_appointment"])){
      echo "value =".$_SESSION['time_of_appointment'];
  }
?>
      type="time" class = "form-control" name="time_of_appointment" id="">
</p>
<p>
<label for="nature_of_appointment">nature_of_appointment </label>
<select name="nature_of_appointment" class = "form-control" id="">
<option value="">Click to select</option>
<option 
<?php
  if(isset($_SESSION["nature_of_appointment"]) && $_SESSION["nature_of_appointment"] == "Daily"){
      echo "selected";
  }
?>
>Daily</option>
<option 
<?php
  if(isset($_SESSION["nature_of_appointment"]) && $_SESSION["nature_of_appointment"] == "Weekly"){
      echo "selected";
  }
?>
>Weekly</option>
<option 
<?php
  if(isset($_SESSION["nature_of_appointment"]) && $_SESSION["nature_of_appointment"] == "Monthly"){
      echo "selected";
  }
?>
>Monthly</option>
<option 
<?php
  if(isset($_SESSION["nature_of_appointment"]) && $_SESSION["nature_of_appointment"] == "Quaterly"){
      echo "selected";
  }
?>
>Quaterly</option>
<option 
<?php
  if(isset($_SESSION["nature_of_appointment"]) && $_SESSION["nature_of_appointment"] == "Twice a year"){
      echo "selected";
  }
?>
>Twice a year</option>
<option 
<?php
  if(isset($_SESSION["nature_of_appointment"]) && $_SESSION["nature_of_appointment"] == "Yearly"){
      echo "selected";
  }
?>
>Yearly</option>

</select>
</p>
<p>
<label for="initial_complaint">Initial Complaint </label>
<textarea 
<?php
  if(isset($_SESSION["initial_complaint"])){
      echo "value =".$_SESSION['initial_complaint'];
  }
?>
   class = "form-control" name="initial_complaint" id="" cols="30" rows="10"></textarea>
</p>
<p>
<label for="department">Department </label>
<select name="department"  class = "form-control" id="">
<option value="">Click to select</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Medical "){
      echo "selected";
  }
?>
>Medical</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Outpatient"){
      echo "selected";
  }
?>
>Outpatient</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Inpatient"){
      echo "selected";
  }
?>
>Inpatient</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Paramedical"){
      echo "selected";
  }
?>
>Paramedical</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Phyical Medicine and Rehabilitation"){
      echo "selected";
  }
?>
>Phyical Medicine and Rehabilitation</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Nursing"){
      echo "selected";
  }
?>
>Nursing</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Operation Theatre Complex"){
      echo "selected";
  }
?>
>Operation Theatre Complex</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Pharmacy"){
      echo "selected";
  }
?>
>Pharmacy</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Radiology"){
      echo "selected";
  }
?>

>Radiology</option>
<option 
<?php
  if(isset($_SESSION["department"]) && $_SESSION["department"] == "Pathology"){
      echo "selected";
  }
?>
>Pathology</option>
</select>
</p>
<button   type="submit" class = "btn-success">Book Appointment</button>


</form>
</div>

</div>