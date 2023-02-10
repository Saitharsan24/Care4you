<?php 
session_start();
require('../config/constants.php');
if(isset($_POST['submit'])){
    $docname = $_POST['docname'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $smlc = $_POST['smlc'];
    $email = $_POST['email'];
    $spec = $_POST['spec'];
    $charge = $_POST['charge'];


    $sql = "INSERT INTO `doctor` ( `name`, `user_name`, `phone_number`, `email`, `SLMC_number`, `charges`,`specialization`) 
    VALUES ( '$name', '$username', '$phone', '$email', '$smlc ', '$charge', '$spec');" ;
    
    if(mysqli_query($conn, $sql)){
        header('Location: admin-doc-view.php');
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
Register the doctor
  </div>
<div class="main_content-reg-asst">
<form method="POST" >
        <div class="doc-id-doc">
        <label for="asst" >Doctor ID: </lable>
            <input id="asst" name="docname" type="text" >
    </div>

    <div class="username-doc">
        <label for="username" >Name: </lable>
            <input id="username" name="name" type="text" required>
    </div>

    <div class="name-doc">
        <label for="name" >User Name: </lable>
            <input id="name" name="username" type="text" required >
    </div>
    <div class="phoneno-doc">
        <label for="password" >Phone No: </lable>
            <input id="password"  name="phone" type="text" required>
    </div>
    <div class="slmc-doc">
        <label for="phoneno" >SLMC No: </lable>
            <input id="phoneno" name="smlc" type="text" required>
    </div>
    <div class="email-doc">
        <label for="email" >Email ID: </lable>
            <input id="email" name="email" type="text" required>
    </div>
    <div class="sap-doc">
        <label for="email" >Specialization: </lable>
            <input id="email" name="spec" type="text" required>
    </div>
    <div class="charge-doc">
        <label for="email" >Charges: </lable>
            <input id="email" name="charge" type="text" required>
    </div>
    <button class="doc-reg-button" type="submit" name="submit">Register</button>
</form>
<button class="doc-back-button" onclick="location.href='admin-doc-view.php'" >Back</button>
    </div> 