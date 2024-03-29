<?php include('../config/constants.php'); ?>
<?php include('admin_getinfo.php') ?>

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
</head>
<?php

  $apt_id=$_GET['id'];


   

   if(isset($_GET['cancel'])){
    $apt_id = $_GET['cancel'];
    $query_del = "UPDATE tbl_docappointment
    SET docapt_status = 3
    WHERE docapt_id = $apt_id";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-doc-appointment.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }

   if(isset($_GET['confirm'])){
    $apt_id = $_GET['confirm'];
    //print_r($apt_id);die();
    $query_del = "UPDATE tbl_docappointment
    SET docapt_status = 1
    WHERE docapt_id = $apt_id";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-doc-appointment.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }
   //$result=mysqli_query($conn, $sql);




  $sql="SELECT * FROM tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.docapt_id = tbl_docsession.session_id WHERE docapt_id='$apt_id'";
  
  
  $sql = "SELECT * FROM  
  tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
  INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
  INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid 
  INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
  AND docapt_id = '$apt_id'";

    $results = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($results);

    
    
    if ($row['my_other']==0) {
        $p_name = $row['first_name'];
        $p_nic = $row['nic'];
       
      }
  
      if ($row['my_other']==1) {
        $p_name = $row['pat_name'];
        $p_nic = $row['pat_nic'];
     
      }
 
?>
<body>
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
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="back" onclick="location.href='admin-doc-appointment.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="doc-apt-title-detail" id="id"> Doctor Appointments Details</div>
            
            <table class="view-apt" id="tbl-main-app">
                   <tr>
                        <td class="typeR">Reference No :</td>
                        <td class="typeL"><?php echo $row['docapt_id'] ?> </td>

                        </tr>
                    <tr>
                        <td class="typeR">Doctor Name :</td>
                        <td class="typeL"><?php echo $row['doc_name'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Date :</td>
                        <td class="typeL"><?php echo $row['date'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Appointment No :</td>
                        <td class="typeL"><?php echo $row['docapt_no'] ?> </td>                 
                    
                    </tr>
                    <tr>
                        <td class="typeR">Appointment time :</td>
                        <td class="typeL"><?php echo $row['docapt_time'] ?></td>
                    </tr>
                    <tr>
                    
                        <td class="typeR">Room No :</td>
                        <td class="typeL"><?php echo $row['room_no'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient name :</td>
                        <td class="typeL"><?php echo $p_name  ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Nic No :</td>
                        <td class="typeL"><?php echo $p_nic ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Session Status :</td>
                        <td class="typeL">
                        <?php
                              if($row['docapt_status']==0){
                                echo '<button vs class="btn-pending"> Pending </button>';
                              }else if($row['docapt_status']==1){
                                echo '<button class="btn-confirmed"> Confirm</button>';
                              }else if($row['docapt_status']==2){
                                echo '<button class="btn-completed"> Completed </button>'; 
                              }else if($row['docapt_status']==3){
                                echo '<button class="btn-cancelled"> Cancelled </button>'; 
                              }else if($row['docapt_status']==4){
                                echo '<button class="btn-nattended"> Not Attended </button>';                  
                              }
                              ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Total Amount :</td>
                        <td class="typeL"><?php echo $row['net_total'] ?></td>
                    </tr>

       
               <tr rowspan="2">
               
                <td  >
               <?php
                            if ($row['docapt_status'] == 1) { 
                        

                            
                                $status = "cancel";
                                include('./admin-appointment-pop.php');
                                
                                ?>
                        
                                <button class="btn-doc-cancel" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['docapt_id']?>&cancel=<?php echo $row['docapt_id']?> ';
                                " >
                                <i class="fa-solid fa-toggle-off"></i>
                                Cancel
                                </button>

                                <?php 
                            }
                             if($row['docapt_status'] == 3) {
                                
                                $status = "confirm";
                                include('./admin-appointment-pop.php');
                                ?>

                                <button class="btn-doc-confirm" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['docapt_id']?>&confirm=<?php echo $row['docapt_id']?> ';
                                " >
                                <i class="fa-solid fa-toggle-on"></i>
                                Confirm 
                                </button> 

                            <?php };
                        ?>   
                        </td>
                    </tr>
                       </table> 
                       
            </div>
        </div>
</body>

</html>