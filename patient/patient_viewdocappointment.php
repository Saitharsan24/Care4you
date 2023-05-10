<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('./popups/docreschedule.php') ?>


<?php
    
    $docapt_id = $_GET['id'];

    $sql = "SELECT * FROM  
              tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
              INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
              INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid 
              INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
              AND docapt_id = '$docapt_id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    //storing session variable of doctor id to reschedule
    // $_SESSION[''] = $row['docl'] ;

    if ($row['my_other']==0) {
      $p_name = $row['first_name'];
      $p_nic = $row['nic'];
    }

    if ($row['my_other']==1) {
      $p_name = $row['pat_name'];
      $p_nic = $row['pat_nic'];
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="main-div">
      <div class="home-left">
        <div class="nav-logo">
          <a href="./patient_home.php">
            <img src="../images/logo.png" alt="logo" />
          </a>
        </div>
        <div class="profile-image">
          <img src="../images/user.png" alt="profile-image" />
        </div>
        <div class="nav-links">
          <a href="./patient_home.php">Home</a>
          <a href="./patient_appointments.php" style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="#">Medical records</a>
          <a href="./patient_doctorlist.php">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">

        <div class="back" onclick="location.href='patient_docappointments.php'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>

        <div class="view-apt-heading"><h2>My Appointments</h2></div>
        <div class="view-apt-details">
          <div class="view-details-row">Reference No :<div><?php echo $docapt_id ?></div></div>
          <div class="view-details-row">Doctor Name :<div><?php echo $row['doc_name'] ?></div></div>
          <div class="view-details-row">Date :<div><?php echo $row['date'] ?></div></div>
          <div class="view-details-row">Appointment No :<div><?php echo $row['docapt_no'] ?></div></div>
          <div class="view-details-row">Appointment time :<div><?php echo $row['docapt_time'] ?></div></div>
          <div class="view-details-row">Room No :<div><?php echo $row['room_no'] ?></div></div>
          <div class="view-details-row">Patient name :<div><?php echo $p_name ?></div></div>
          <div class="view-details-row">NIC No :<div><?php echo $p_nic ?></div></div>
          <div class="view-details-row">Session status :
          <div>
                  <?php 

                      if($row['docapt_status']==1){
                          echo ' '.'<button class="docapt-st01">Confirmed</button>';
                      } elseif($row['docapt_status']==2){
                          echo ' '.'<button class="docapt-st02">Cancelled</button>';
                      } elseif($row['docapt_status']==3){
                          echo ' '.'<button class="docapt-st03"">Completed</button>';   
                      } else{
                          echo ' '.'<button class="docapt-st04">Not attended</button>';
                      }
                  
                  ?>
              </div>  
          </div>
          <div class="view-details-row">Total Amount :<div><?php echo 'Rs.'.$row['net_total'] ?></div></div>
            <div class="view-apt-btn">
                      
              <?php 
              if($row['docapt_status']==1){
              ?> 
                  <div class="view-apt-btn01"><button>Cancel appointment</button></div>
                  <div class="view-apt-divider"></div>
                  <div class="view-apt-btn02"><button onclick="openPopup()">Reschedule appointment</button></div>
              <?php
              }
              ?>
              
            </div>
        </div>
      </div>
    </div>
  </body>
</html>