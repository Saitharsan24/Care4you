<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
$query="SELECT * FROM tbl_patient INNER JOIN tbl_sysusers ON tbl_patient.userid = tbl_sysusers.userid ";
$result = mysqli_query($conn, $query);
$no_row = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-view-patient.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
        <script src="../script/admin-patient-view-filter.js"></script>
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
                <li><a href="admin-patient-view.php"><div class="highlighttext">Patients</div></a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">

                    <span>
                        <table class="tbl-main-patient" id="tbl-main-patient" style="margin-top:-50px;">
                            <thead>
                                <tr>
                                    <td>Patient ID</td>
                                    <td>Patient Name</td>
                                    <td>Contact Number</td>
                                    <td>Account Status</td>
                                    <td>View Details</td>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr >
                                     
                                        <td class="search_1"><input type="text"  class="search-patient" name="patient-id" placeholder="search patient id" id="patient_id" onkeyup="filterPatientId()" autofocus="true" /></td> </dv>
                                        <td><input type="text" class="search-patient" name="patient-name" placeholder="search patient name" id="patient_name" onkeyup="filterPatientName()" autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="phone-no" placeholder="search contact number" id="contact_no" onkeyup="filterContactNo()" autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="status" placeholder="search account status" id="account_status" onkeyup="filterAccountStatus()" autofocus="true" /></td>
                                        <td><a href=""><button class="btn-search"><span>Clear filter&emsp;</span></button></a></td>
                                    </tr>
                                    <?php 
                                   if($result){
                                    while ($row = mysqli_fetch_array($result)) {

                                   ?>
                                <tr>
                                            <td><?php echo $row['p_id'];?></td>
                                            <td><?php echo $row['first_name'];?></td>
                                            <td><?php echo '0'.$row['contact'];?></td>
                                            <td>
                                               
                                                <?php
                                                if ($row['status'] == 1) { 
                                                    echo '<button class="active-status">Active</button>';
                                                } else {
                                                    echo '<button class="passive-status"> Disabled </button>';
                                                }
                                                ?>

                               
                                            </td>
                                            <td><button class="btn-view-patient-detail" onclick='location.href="admin-patient-view-detail.php?id=<?php echo $row["p_id"] ?>"'><span>Patient Details</span></button></td>
                                        </tr>
                                        <?php 
                                
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