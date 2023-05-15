

<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('./popup/newtestadd.php');?>
<?php
// print_r($_SESSION);
?>

<?php 
    
    if(isset($_SESSION['addLabTest'])){
        unset($_SESSION['addLabTest']);
        unset($_POST);
        echo "<script>openPopupAT()</script>";
    }
?>


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
    <script src="../script/labtest_filter.js"></script>
    <script src="../script/labtest_filter.js"></script>
</head>

<body>
<?php include('lab_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">Home</a></li>
                <li><a href="lab_newappointments.php">New Appointments</a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php"><div class="highlighttext">Lab Tests</div></a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <!-- <div class="back" onclick="location.href='#'">
            <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div> -->

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-10px;">
                    <i class="fa-solid fa-clipboard-list" style="font-size: 35px;"></i>
                    &nbsp; Available Laboratory Test Details <br/>
                    <button onclick="openPopup1()" class="btn-mkdcapt" style="width:150px;"><span>add new test</span></button>
                </div>
            </div>
            
            <input type="text" class="search-test" name="" placeholder="Search by Test Name" id="test_name" onkeyup="filterTestName()" autofocus="true" />
                         
            <div class="tbl-content">            
                <table class="tbl-common" id="tbl-common" style="width:75%;">
                    <thead>
                        <tr>
                            <td style="width:15%">Test ID</td>
                            <td style="width:35% ; text-align:left">Test Name</td>
                            <td style="width:20%"></td>
                            <td style="width:15%"></td>
                        </tr>
                       
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM tbl_labtests";
                        $res = mysqli_query($conn, $sql);//execute the query

                        if($res == TRUE)
                        {
                            $count = mysqli_num_rows($res); //number of rows in database

                            if($count > 0 )
                            {

                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    $test_id = $rows['test_id'];
                                    $test_name = $rows['test_name'];
                                    $duration = $rows['duration'];
                                    $charge = $rows['charge'];
                                    $prerequirement = $rows['prerequirement'];
                                    $NumberOfTestsPerDay = $rows['NumberOfTestsPerDay'];
                                    
                                    //display valus in the table
                                    ?>
                                    <tr>
                                        <td><?php echo $test_id; ?> </td>
                                        <td style="text-align:left"><?php echo $test_name; ?></td>
                                        <td>
                                            <?php
                                                // Generate the URL with the variables
                                                $url = "http://localhost/Care4you/laboratory/lab_testview.php?test_id=" . $test_id;
                                            ?>
                                            <a href="<?php echo $url; ?>">
                                                <button class="btn-view" style="width:150px;"><span>View Details</span></button>
                                            </a>
                                        </td>
                                        <td>
                                            <!-- <a href="<?php //echo SITEURL;  ?>/laboratory/lab_testdelete.php?test_id=<?php //echo $test_id;?>" class="btn-delete">Delete</a> -->
                                            <button onclick="openPopupOTP()" class="btn-delete">Delete</button>
                                            <?php include('./popup/testdelete.php');?>
                                        </td>
                                    </tr>
                                    <?php 
                                }
                            }
                        }

                    ?>          
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>