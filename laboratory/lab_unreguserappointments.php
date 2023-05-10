<?php include ('../config/constants.php');?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lab.css"> 
    <title>Laboratory</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('lab_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="lab_appointments.php">Lab Appointments</a></li>
                <li><a href="">Lab tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <div class="leftalign"><a href="lab_addappointment.php"><button class="btn-addapp"><span>Add Appointment</span></button></a></div>               
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Lab Appointment ID</td>
                            <td>Patient Name</td>
                            <td>Appointment Date</td>
                            <td>Appointment Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Query to get all data from tbl_addmedicine table
                        $sql = "SELECT * FROM tbl_addlabapp";

                        //Exeute the Query                                    
                        $res = mysqli_query($conn, $sql);

                        //Check Query executed or not
                        if($res == TRUE){

                            //Count rows in tbl_addmedicine table
                            $count = mysqli_num_rows($res);     //funtion to get all rows in tbl_addmedicine table
                                        
                            //Check the number of rows
                            if($count > 0)
                            {
                                while($rows = mysqli_fetch_assoc($res))
                                {

                                    //Use while loop to get all data in tbl_addmedicine table
                                    $unregappid = $rows['unregappid'];
                                    $patientname = $rows['patientname'];
                                    $appdate = $rows['appdate'];
                                    $apptime = $rows['apptime'];

                                    //Display the Values in Table
                                    ?>
                                                
                                    <tr>
                                        <td><?php echo $unregappid ?></td>
                                        <td><?php echo $patientname ?></td>
                                        <td><?php echo $appdate ?></td>
                                        <td><?php echo $apptime ?></td>
                                        <td><a href="lab_viewappointment.php"><button class="btn-viewapp"><span>View Appointment</span></button></a></td>
                                    </tr>
                                                
                                    <?php

                                }

                            }
                            else
                            {
                                //Have no data in tbl_addmedicine table
                            }
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