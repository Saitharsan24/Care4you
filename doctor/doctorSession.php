<?php include_once "login_check.php";
    include_once "dbconnection.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor.css"> 
    <title>Doctor</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.png" alt="user" class="imgframe">
            <ul>
                <li><a href="doctorHome.php">Home</a></li>
                <li><a href="#">Sessions</a></li>
                <li><a href="doctorViewpatient.php">View Patients</a></li>
                <li><a href="doctorViewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="logout_process.php">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Session ID</td>
                            <td>Date</td>
                            <td>Session Time</td>
                            <td>No of Patients</td>
                            <td>Room Number</td>
                            <td>Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM appoiments,sessions where a_s_id = s_id and s_d_id = '".$_SESSION['id']."'";
                            $result = $conn->query($query);                            ;
                            while($row = $result->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['s_id']?></td>
                                <td><?php echo $row['s_date']?></td>
                                <td><?php echo $row['s_timeslot']?></td>
                                <td><?php echo $row['s_id']?></td>
                                <td><?php echo $row['a_room']?></td>
                                <td><button class="btn-green"><?php echo $row['a_stat']?></button></td>
                                <td><button class="btn-blue"><a href="doctorAppointments.php">View Appointments</button></td>
                            </tr>  
                        <?php        
                            }
                        ?>
                    </tbody>
                </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>