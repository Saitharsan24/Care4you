<?php 
session_start();
require('../config/constants.php');
if(isset($_POST['submit'])){
    $doc_name = $_POST['doc-name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $no_patient = $_POST['no-patient'];
    $room = $_POST['room'];
    $asst_id =1;


    $sql = "INSERT INTO `session` ( `doctor_name`, `date`, `time`, `room_no`, `assistant_id`, `No.of.patient`) 
    VALUES ( '$doc_name', '$date', '$time', '$room', '$asst_id ', '$no_patient');" ;
    
    if(mysqli_query($conn, $sql)){
        header('Location: admin-session.php');
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
    <title>admin-home</title>
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
                <a href="view-session.php">
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
                <a href="admin-view-appointment.php">
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


<div class="create-session">
     Create the session
  </div>

<div class="main_content-create-session"> 
        <form method="POST" >
        <div class="doctor_name-1">
        <label for="doc-name" >Doctor Name: </lable>
            <input id="doc-name" name="doc-name" type="text" >
    </div>

    <div class="date-2">
        <label for="date" >Date: </lable>
            <input id="date" name="date" type="date" >
    </div>

    <div class="time-2">
        <label for="time" >Time: </lable>
            <input id="time" name="time" type="time" >
    </div>
    <div class="no_patient-2">
        <label for="no-patient" >Number of patient: </lable>
            <input id="no-patient"  name="no-patient" type="number" >
    </div>
    <div class="room_no-2">
        <label for="room" >Room number: </lable>
            <input id="room" name="room" type="text" >
    </div>

    </div>
    
    <button class="add-button" type="submit" name="submit">Add</button>
   

    </form>
    <button class="back_button-create-app" onclick="location.href='admin-session.php'">Back</button>
</body>
</html>