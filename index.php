<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><b>You are welcome</b></p>
<div>

<ul>
<li><a href="index.php">Home</a></li>
<?php if(isset($_SESSION['loggedIn'])){ ?>


<li><a href="login.php">Login</a></li>
<li><a href="register.php">Register</a></li>
<?php }else{ ?>
<li><a href="logout.php">Logout</a></li>
<?php } ?>
</ul>
</div>
</body>
</html>
    
    