<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-appointment.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="../script/appointment_filter.js"></script>
</head>

<?php
  
//   $sql = "SELECT * FROM  
//   tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
//   INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
//   INNER JOIN tbl_patient ON tbl_docappointment.created_by = tbl_patient.userid ";

$sql="SELECT * FROM tbl_labappointment INNER JOIN tbl_patient ON tbl_labappointment.created_by=tbl_patient.userid ";
$result = mysqli_query($conn,$sql);
//print_r($result);die();
 
?>

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
                <li><a href="admin-appointment.php"><div class="highlighttext">Appointments</div></a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">

                
                    <div class="back" onclick="location.href='admin-appointment.php'">
                        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                    </div>
                   <div class="lab-apt-title"> Lab Appointments</div>
                    <span>
                        <table class="tbl-main-lab-appoint" id="tbl-main-app">
                            <thead>
                                <tr>
                                <td>Reference No</td>   <!-- from tbl_docappointment table -->
                                <td>Patient Name</td>    <!-- from tbl_patient table(if my-other status=1), or tbl_docappointment table(if my-other status=0)  -->
                                 <td>Date</td>            <!-- from tbl_session table -->
                                <td>Appointment Status</td> <!-- from tbl_docappointment table  -->
                                <td></td>
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td><input type="text" class="search-appoint" name="#" id="ref_no" autofocus="true" placeholder="search Reference Number" onkeyup="filterReferenceNO()" /></td>
                                        <td><input type="text" class="search-appoint" name="#" id="patient_name" autofocus="true" placeholder="search Patient name" onkeyup="filterPatientName()" /></td>
                                        <td><input type="text" class="search-appoint" name="#" id="date" autofocus="true" placeholder="search appointment date" onkeyup="filterDate()" /></td>
                                        <td><input type="text" class="search-appoint" name="#" id="appt_status" autofocus="true" placeholder="search status" onkeyup="filterStatus()"/></td>
                                        <td><a href=""><button class="btn-search"><span>Clear filter&emsp;</span></button></a></td>
                                    </tr>
                                    <?php
                                                                if($result){
                                                                    while($row=mysqli_fetch_array($result)){
                                                                   ?>
                               
                                        <tr>
                                            <td><?php echo $row['labapt_id'] ?></td>
                                            <td><?php  echo $row['first_name'] ?>  </td>
                                                     

                                           <td><?php echo $row['labapt_date'] ?></td>
                                            <td><?php echo $row['labapt_status'] ?></td>    
                                            <td><button class="btn-view-appoint-detail" onclick='location.href="admin-lab-appointment-detail.php?id=<?php echo $row["labapt_id"]; ?>"'><span>Appointment Details</span></button></td>
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