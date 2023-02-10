<?php 
session_start();
require('../config/constants.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];


    $sql = "INSERT INTO `assistant` ( `username`, `name`, `password`, `phoneno`, `email`) 
    VALUES ( '$username', '$name', '$password', '$phoneno', '$email ');" ;
    
    if(mysqli_query($conn, $sql)){
        header('Location: admin-asst-view.php');
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
<div class="reg-asst">
Register the assistant 
  </div>
<div class="main_content-reg-asst">
<form method="POST" >
        <div class="asst-id-1">
        <label for="asst" >Assistant_ID: </lable>
            <input id="asst" name="asst" type="text" required>
    </div>

    <div class="asst-username-1">
        <label for="username" >User Name: </lable>
            <input id="username" name="username" type="text" required>
    </div>

    <div class="asst-name-1">
        <label for="name" >Name: </lable>
            <input id="name" name="name" type="text" required>
    </div>
    <div class="asst-password-1">
        <label for="password" >Password: </lable>
            <input id="password"  name="password" type="text" required>
    </div>
    <div class="asst-phoneno-1">
        <label for="phoneno" >Phone Number: </lable>
            <input id="phoneno" name="phoneno" type="text" required>
    </div>
    <div class="asst-email-1">
        <label for="email" >Email ID: </lable>
            <input id="email" name="email" type="text" required>
    </div>
    <button class="asst-reg-button" type="submit" name="submit">Register</button>
</form>
<button class="asst-back-button" onclick="location.href='admin-asst-view.php'" >Back</button>
    </div>
    
    
  
</div>
</body>
</html>