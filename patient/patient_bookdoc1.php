<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<?php
  date_default_timezone_set("Asia/Calcutta");

$session_id = $_GET['id'];
$userid = $_SESSION['user_id'];


$sql = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";

$result = mysqli_query($conn, $sql);

if ($result) {

  //getting variables from database
  $row = mysqli_fetch_assoc($result);
  $doc_name = $row['doc_name'];
  $special = $row['specialization'];
  $date = $row['date'];
  $timeslot = $row['time_slot'];
  $noofapt = $row['no_of_appointment'];

  //to find the timeslot
  if ($timeslot == 1) {
    $starttime = strtotime('08:00:00');
  } else if ($timeslot == 2) {
    $starttime = strtotime('10:00:00');
  } else if ($timeslot == 3) {
    $starttime = strtotime('12:00:00');
  } else if ($timeslot == 4) {
    $starttime = strtotime('14:00:00');
  } else if ($timeslot == 5) {
    $starttime = strtotime('16:00:00');
  } else {
    $starttime = strtotime('18:00:00');
  }

  //Code for available appointment number
  $aptnosql = "SELECT docapt_id,docapt_no, docapt_status,my_other,docapt_flag FROM tbl_docappointment WHERE session_id ='$session_id'";
  $aptnoresult = mysqli_query($conn,$aptnosql);
  
  if(mysqli_num_rows($aptnoresult) != 0){
         
          $flag = 0;
                          
          while ($aptnorow = mysqli_fetch_assoc($aptnoresult)) {
            
              for($i = 1; $i < 13; $i++){
                if($aptnorow['docapt_no'] == $i && $aptnorow['docapt_status'] == 2 && $aptnorow['docapt_flag']==0){
                  $apt_no = $i;
                  $flag= 1;
                  $apt_id = $aptnorow['docapt_id'];
                  $sqlupdateflag = "UPDATE tbl_docappointment
                                        SET docapt_flag ='1' 
                                        WHERE docapt_id = '$apt_id'";
                  break;
                }
              }
            
            if($flag == 1){
              break;
            }
          }

          if($flag == 0){
            $apt_no = $noofapt + 1;
          }  

  } else {
      $apt_no = 1;
  }         

  //code for appointment time
  $apt_dur = 600;
  $apt_time = $starttime + (($apt_no-1) * $apt_dur);
  $apt_time_format = date('h:i A', $apt_time);



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
        <a href="./patient_medicalrecords.php">Medical records</a>
        <a href="./patient_doctorlist.php">View doctors</a>
        <a href="#">View profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">

      <div class="back" onclick="location.href='patient_makedocappointment.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="form-content">
        <div class="book1-heading">
          <h2>Book for an Appointment</h2>
        </div>

          <form method="post">

              <div class="form-itm">
                <p>Doctor Name :</p>
                <input type="text" value="<?php echo $row['doc_name']; ?>" readonly>
              </div>

              <div class="form-itm">
                <p>Specialization :</p>
                <input type="text" value="<?php echo $row['specialization']; ?>" readonly>
              </div>

              <div class="form-itm">
                <p>Date :</p>
                <input type="text" value="<?php echo $row['date']; ?>" readonly>
              </div>

              <div class="form-itm">
                <p>Time :</p>
                <input type="text" value="<?php echo $apt_time_format; ?>" readonly>
              </div>

              <div class="form-itm">
                <p>Appointment No :</p>
                <input type="text" value="<?php echo $apt_no; ?>" readonly>
              </div>
              
              <div class="form-itm radio-itm">
                <p>Make appointment for :</p>
                    <input type="radio" name="aptfor" value="0" required>
                    <label>Myself</label>
                  <div class="radio-gap"></div>
                    <input type="radio" name="aptfor" value="1">
                    <label>Others</label>
              </div>

              <!-- <div class="form-itm radio-itm radio-itm2">
                <p>Records access to doctor :</p>
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div> -->

              <div class="apt-btn">
                <div class="apt-btn-css"><button type="submit" name="next">Next</button></div>
              </div>

          </form>
      </div>
    </div>
  </div>
</body>

</html>


<?php
  
    if(isset($_POST['next'])){

        //deleting if there is any appointment is pending in the database
        


        //getting from POST method whether it is myself or others
        $my_other = $_POST['aptfor'];

        //checking if there is already booked appointments for the doctor
        $sqlcheckapt = "SELECT * FROM tbl_docappointment WHERE created_by = '$userid' AND docapt_status != 2 AND session_id = '$session_id'";
        $sqlcheckaptresult = mysqli_query($conn,$sqlcheckapt);

        //print_r(mysqli_num_rows($sqlcheckaptresult));die();

        //flag for myself duplicate appointment
        $myaptflag = 0;
        $otheraptflag = 0;

        while($sqlcheckaptrow = mysqli_fetch_assoc($sqlcheckaptresult)){
          if($sqlcheckaptrow['my_other'] == 0){
            $myaptflag = 1;
          }
          if($sqlcheckaptrow['my_other'] == 1){
            $otheraptflag = 1;
          }
        }

      
        //alerting if myself booking already made
        if($myaptflag == 1 && $my_other == 0){
            include('./popups/docbook-popup.php');
          echo '<script>openPopup()</script>';

        } else if($otheraptflag == 1 && $my_other == 1){
          include('./popups/docbook-popup.php');
          echo '<script>openPopup()</script>';

        } else {

        //storing session variable which should be taken to book2
        $_SESSION['apt_time'] = $apt_time_format;
        $_SESSION['apt_no'] = $apt_no;
        $_SESSION['timer_flag'] = 1;


        $sqlinsert = "INSERT INTO tbl_docappointment (session_id,docapt_time,docapt_no,docapt_status,created_by,my_other)
                        VALUES ('$session_id','$apt_time_format','$apt_no','0','$userid','$my_other')";

        $insertresult = mysqli_query($conn,$sqlinsert);

        $lastInsertedId = mysqli_insert_id($conn);
        
        header('location:'.SITEURL.'patient/patient_bookdoc2.php?id='.$session_id.'&myother='.$my_other.'&lastid='.$lastInsertedId);
        }
    }

?>