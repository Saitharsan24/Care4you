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
    $query_del = "UPDATE tbl_labappointment
    SET labapt_status = 4
    WHERE labapt_id = $apt_id";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-lab-appointment.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }

   if(isset($_GET['confirm'])){
    $apt_id = $_GET['confirm'];
    $query_del = "UPDATE tbl_labappointment
    SET labapt_status = 2
    WHERE labapt_id = $apt_id";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-lab-appointment.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }


 $query="SELECT * FROM tbl_labappointment INNER JOIN tbl_patient ON tbl_labappointment.created_by = tbl_patient.userid WHERE tbl_labappointment.labapt_id=$apt_id ";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);

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
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="back" onclick="location.href='admin-lab-appointment.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="lab-apt-title-detail" id="id"> Lab Appointments Details</div>
            
            <table class="view-lab-apt" id="tbl-main-app">
                   <tr>
                        <td class="typeR">Patient Name :</td>   <!--from tbl_patient -->
                        <td class="typeL"><?php echo $row['first_name'] ?> </td>

                        </tr>
                    <tr>
                        <td class="typeR">Contact Number :</td>     <!--from tbl_patient -->
                        <td class="typeL"><?php echo $row['contact'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Nic :</td>              <!--from tbl_patient-->
                        <td class="typeL"><?php echo $row['nic'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Requested Date :</td>        <!--from tbl_labappointment -->
                        <td class="typeL"><?php echo $row['labapt_date'] ?></td>                 
                    
                    </tr>
                    <tr>
                        <td class="typeR">Appointment Status :</td>     <!--from tbl_labappointment -->
                        <td class="typeL"><?php 
                        //echo $row['labapt_status'] 
                        if($row['labapt_status']==0){
                            echo '<button vs class="btn-pending-lab">response pending </button>';
                          }else if($row['labapt_status']==1){
                            echo '<button class="btn-ppending-lab"> pending payment</button>';
                          }else if($row['labapt_status']==2){
                            echo '<button class="btn-confirmed-lab"> confirmed </button>'; 
                          }else if($row['labapt_status']==3){
                            echo '<button class="btn-completed-lab"> complete </button>'; 
                          }else if($row['labapt_status']==4){
                            echo '<button class="btn-cancelled-lab">  cancelled</button>';
                          }

                       
                        ?></td>
                    </tr>
                        
                    </tr>
                    <tr>
                        <td class="typeR">Total Amount :</td>
                        <td class="typeL"><?php echo $row['nettotal'] ?></td>
                    </tr>
                    <tr rowspan="2">
               
                <td  >
                    <?php
                           if ($row['labapt_status'] == 2) { 
                       

                           
                               $status = "cancel";
                               include('./admin-appointment-pop.php');
                               
                               ?>
                       
                               <button class="btn-doc-cancel" onclick="document.getElementById('id01').style.display='block'; 
                               document.getElementById('del').action = '?id=<?php echo $row['labapt_id']?>&cancel=<?php echo $row['labapt_id']?> ';
                               " >
                               <i class="fa-solid fa-toggle-off"></i>
                               Cancel
                               </button>

                               <?php 
                           }
                            if($row['labapt_status'] == 4) {
                               
                               $status = "confirm";
                               include('./admin-appointment-pop.php');
                               ?>

                               <button class="btn-doc-confirm" onclick="document.getElementById('id01').style.display='block'; 
                               document.getElementById('del').action = '?id=<?php echo $row['labapt_id']?>&confirm=<?php echo $row['labapt_id']?> ';
                               " >
                               <i class="fa-solid fa-toggle-on"></i>
                               Confirm 
                               </button> 

                           <?php };
                       ?>   
                 </tr>
               </table>                  
            </div>
        </div>
</body>

</html>