
<?php 
session_start();
require('../config/constants.php');

$sql = "SELECT * FROM assistant";
$result = mysqli_query($conn, $sql);


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
                <a href="Admin-view-profile.php">
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
                <th class="th-1">Assistant ID</th>
                <th>User Name</th>
                <th>Name</th>
                <th>Phone number</th>
                <th>Email ID</th>
            </tr>

            
             <?php 
            while($row = mysqli_fetch_assoc($result)){
            echo '<tr class="body-1">
              <td class="td-1">'.$row['Assistant_ID'].'</td>
              <td>'.$row['username'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['phoneno'].'</td>
              <td>'.$row['email'].'</td>
              
            </tr>';
            };
            ?>
          </table>
        </div>
        <button class="button-1" onclick="location.href='admin-asst-reg.php'">Register assistant</button>
        <button class="asst-back-button" onclick="location.href='admin-system-users.php'" >Back</button>
</body>
</html>