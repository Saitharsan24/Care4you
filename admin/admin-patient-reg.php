<?php 
session_start();
require('../config/constants.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];


    $sql = "INSERT INTO `laboratory` ( `name`, `user_name`, `email`, `password`, `telephone_number`) 
    VALUES ( '$username', '$name', '$email', '$psw', '$phone ');" ;
    
    if(mysqli_query($conn, $sql)){
        header('Location: admin-patient-view.php');
        exit();
    }
    else{
        header('Location: admin-create-session.php');
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Session</title>
</head>
<body>
<div class="navbar">

<div class="logo">
<img src="../images/logo.png"/>
 </div>

<div class="profile">
    <img src="../images/profile.png"/>
</div>

    <div class="home">
        <a href="admin_home.php">
    <label>Home</label>
        </a>
    </div>

    <div class="session">
        <a href="admin-session.php">
    <label>Sessions</label>
        </a>
    </div>

    <div class="view-patient">
        <a href="#">
    <label>View patient</label>
        </a>
    </div>


    <div class="view-order">
        <a href="#">
    <label>View orders</label>
        </a>
    </div>

    
    <div class="view-appointment">
        <a href="#">
    <label>View Appointments</label>
        </a>
    </div>

    <div class="report">
        <a href="#">
    <label>Reports</label>
        </a>
    </div>

    
    <div class="system-user">
        <a href="admin-system-users.php">
    <label>System users</label>
        </a>
    </div>


    <div class="view-profile">
        <a href="admin-view-profile.php">
    <label>View Profile</label>
        </a>
    </div>


    <div class="signout">
    
        <a href="#">
            <label>Sign Out</label>   
        </a>
   </div>
</div>

<!-- navgation-->
<div class="reg-patient">
Register the Lab technician
  </div>
<div class="main_content-reg-patient">
<form method="POST" >
        <div class="patient-id-patient">
        <label for="asst" >Lab asst ID: </lable>
            <input id="asst" name="labID" type="text" >
    </div>

    <div class="username-patient">
        <label for="username" >User Name: </lable>
            <input id="username" name="username" type="text" >
    </div>

    <div class="name-patient">
        <label for="name" >Name: </lable>
            <input id="name" name="name" type="text" >
    </div>
    <div class="password-patient">
        <label for="password" >Phone No: </lable>
            <input id="password"  name="phone" type="text" >
    </div>
    <div class="phoneno-patient">
        <label for="phoneno" >Email: </lable>
            <input id="phoneno" name="email" type="text" >
    </div>
    <div class="email-patient">
        <label for="email" >Password: </lable>
            <input id="email" name="psw" type="text" >
    </div>
    <button class="patient-reg-button" type="submit" name="submit">Register</button>
</form>
<button class="patient-back-button" onclick="location.href='admin-patient-view.php'" >Back</button>
    </div>
    
    
  
</div>
</body>
</html>