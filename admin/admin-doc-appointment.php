<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<!DOCTYPE html>
<html lang="en">
<?php
  //$sql = "SELECT * FROM tbl_docappointment ";

  $sql="SELECT * FROM tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.docapt_id = tbl_docsession.session_id ";
  $result = mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  //print_r($row);die();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-appointment.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="../script/filter.js"></script>
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
                <li><a href="#">Orders</a></li>
                <li><a href="admin-doc-appointment.php"><div class="highlighttext">Appointments</div></a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">

                
                    <div class="back" onclick="location.href='admin-system-users.php'">
                        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                    </div>
                   <div class="doc-apt-title"> Doctor Appointments</div>
                    <span>
                        <table class="tbl-main-appoint" id="tbl-main-doc">
                            <thead>
                                <tr>
                                <td>Reference No</td>
                                <td>Appointment No</td>
                                 <td>Date</td>
                                <td>Time</td>
                                <td>Payment Status</td>
                                <td></td>
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td><input type="text" class="search-appoint" name="#" id="doc-id" autofocus="true" placeholder="" onkeyup="" /></td>
                                        <td><input type="text" class="search-appoint" name="#" id="doc-name" autofocus="true" placeholder="" onkeyup="" /></td>
                                        <td><input type="text" class="search-appoint" name="#" id="doc-Specialize" autofocus="true" placeholder="" onkeyup="" /></td>
                                        <td><input type="text" class="search-appoint" name="#" id="doc-slmc" autofocus="true" placeholder="" onkeyup=""/></td>
                                        <td><input type="text" class="search-appoint" name="#"  id="doc-status" autofocus="true" placeholder="" onkeyup="" /></td>
                                        <td><button class="btn-search"><span>Search</span></button></td>
                                    </tr>
                                    <?php
                                    if($result){
                            while($row=mysqli_fetch_array($result)){
                                 ?>
                               
                                        <tr>
                                            <td><?php echo $row['docapt_id'] ?></td>
                                            <td><?php echo $row['docapt_no'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['docapt_time'] ?></td>
                                            <td><button class="btn-green">
                                             <?php
                              if($row['docapt_status']==0){
                                echo '<button vs class="active-status"> Pending </button>';
                              }else if($row['docapt_status']==1){
                                echo '<button class="passive-status"> Confirm</button>';
                              }else if($row['docapt_status']==2){
                                echo '<button class="passive-status"> complete </button>'; 
                              }else{
                                echo '<button class="passive-status"> cancel </button>'; 
                              }
                              ?> 
                                                </button></td>
                                            
                                            <td><button class="btn-view-appoint-detail" onclick='location.href="admin-doc-appointment-detail.php?id=<?php echo $row["docapt_id"]; ?>"'><span>Appointment Details</span></button></td>
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