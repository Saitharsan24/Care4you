<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-doc-appointment.php"><div class="highlighttext">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <?php 
                if(isset($_SESSION['update-charge']))
                {
                    echo $_SESSION['update-charge'];
                    unset($_SESSION['update-charge']);

                }
            ?>
            <div class="back" onclick="location.href='admin-doc-view.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <?php
                $id = $_GET['id'];

                $query = "SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid WHERE doctor_id= $id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);

                ?>

                <?php

                if (isset($_GET['disable'])) {
                    $userid = $_GET['disable'];
                    $query_del = "UPDATE tbl_sysusers
                    SET status = 0
                    WHERE userid = $userid";

                    if (mysqli_query($conn, $query_del)) {
                        header("Location: /Care4you/admin/admin-doc-view.php");
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }

                if (isset($_GET['activate'])) {
                    $userid = $_GET['activate'];
                    $query_del = "UPDATE tbl_sysusers
                    SET status = 1
                    WHERE userid = $userid";

                    if (mysqli_query($conn, $query_del)) {
                        header("Location: /Care4you/admin/admin-doc-view.php");
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }
                //$result=mysqli_query($conn, $sql);


            ?>
            
               <table class="view-doc" style="width: 57%; margin-left: 450px;">
                    <tr>
                        <td rowspan = 5 style="width:100px;">
                            <img src="../images/user-profilepic/doctor/<?php echo $row['profile_picture']; ?>" alt="user" class="ppframe">
                        </td>
                        <td class="typeR">Full Name :</td>
                        <td class="typeL"><?php echo $row['doc_name']; ?></tr>
                    <tr>
                        <td class="typeR">SLMC Number :</td>
                        <td class="typeL"><?php echo $row['SLMC_number']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Specialization :</td>
                        <td class="typeL"><?php echo $row['specialization']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Charge per session :</td>
                        <td class="typeL">Rs. <?php echo $row['charge']; ?>
                        &nbsp; &nbsp;
                        <?php  include('admin-doc-viewdetail-pop.php') ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="typeR">NIC Number :</td>
                        <td class="typeL"><?php echo $row['nic']; ?></td>
                    </tr>
                    <tr>
                        <td rowspan = 2>
                        <?php

                            if ($row['status'] == 1) {

                                $status = "Disable";
                                include('./admin-doc-pop.php');
                            ?>

                                <button class="btn-del-doc-disable" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['doctor_id'] ?>&disable=<?php echo $row['userid'] ?> ';
                                ">
                                <i class="fa-solid fa-toggle-off"></i>
                                Disable Account
                                </button>

                            <?php
                            } else {

                                $status = "Activate";
                                include('./admin-doc-pop.php');

                            ?>
                                <button class="btn-del-doc-enable" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['doctor_id'] ?>&activate=<?php echo $row['userid'] ?> ';
                                ">
                                <i class="fa-solid fa-toggle-on"></i>
                                Activate Account
                                </button>

                            <?php };
                        ?>
                        </td>
                        <td class="typeR">Contact Number :</td>
                        <td class="typeL"><?php echo $row['contact_number']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Email Address :</td>
                        <td class="typeL"><?php echo $row['email']; ?></td>
                    </tr>

               </table> 
            </div>
        </div>
</body>

</html>