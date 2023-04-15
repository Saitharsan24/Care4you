<?php 
session_start();
require('../config/constants.php');

$sql = "SELECT * FROM session";
$result = mysqli_query($conn, $sql);


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
<div class="table-1">
          <table>
            <tr class="head">
                <th class="th-1">Session ID</th>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>No.of.Patient</th>
                <th>Room No.</th>
                <th class="th-2"> </th>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            echo '<tr class="body-1">
              <td class="td-1">'.$row['session_id'].'</td>
              <td>'.$row['doctor_name'].'</td>
              <td>'.$row['date'].'</td>
              <td>'.$row['No.of.patient'].'</td>
              <td>'.$row['room_no'].'</td>
              <td class="td-2"><a class="button" " href="./admin-view-appointment?sessionid='.$row['session_id'].'">view session</a></td>
            </tr>';
            };
            ?>
          </table>
        </div>
        <button class="button-session" onclick="location.href='admin-create-session.php'">create session</button>
</body>
</html>