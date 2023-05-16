<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('./popups/otherrecord.php') ?>

<?php
if (isset($_POST)) {
  if (isset($_POST['upload'])) {
    // print_r($_POST);die();
    $doctor_name = $_POST["doctor_name"];
    $rtype = $_POST["rtype"];
    // $record_name = $_FILES["record"]["name"];
    $description = $_POST["description"];



    //Check whether the record is uploaded or not
    //print_r($_FILES['record']);
    //die(); //Break the code to prevent data insertion

    if (isset($_FILES['record']['name'])) {

      //Upload the record
      //To upload the record we need the file name, source path and destination path

      //Get the record name
      $record_name = $_FILES['record']['name'];


      //Upload record only if record is selected
      if ($record_name != "") {
        //Auto Rename the record

        //Get the extension of the record
        $s = explode('.', $record_name);
        $ext = end($s);

        //Rename the record
        $record_name = "Record_" . date('dmyhisA') . "." . $ext;

        //Get the source path
        $source_path = $_FILES['record']['tmp_name'];

        //Give the destination path
        $destination_path = "../images/patient-records/" . $record_name;

        //Upload the record
        $upload = move_uploaded_file($source_path, $destination_path);

        //Check whether the record is uploaded or not
        if ($upload == FALSE) {
          $_SESSION['upload'] = "Failed to upload record! Please Retry";
          //Redirect to place order page
          // header('location:'.SITEURL.'/patient/patient_pharmorders.php'); 
          //Stop the process
          die();
        }

      }

    } else {
      //record not uploaded and record name is not set (Data can not save)
      $record_name = "";
    }

    $userid = $_SESSION['user_id'];

    $sql = "INSERT INTO tbl_otherrecords (doctor_name,record_type,file_name,description,userid)
                      VALUES ('$doctor_name','$rtype','$record_name','$description',$userid)";
    $result = mysqli_query($conn, $sql);


  }
  // print_r($_POST);die();
}


//to dispaly other reocrd
$userid = $_SESSION['user_id'];

$sqldisplay = "SELECT * FROM tbl_otherrecords WHERE userid = '$userid' ";

$results =  mysqli_query($conn, $sqldisplay);


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
  <?php include('patient_getinfo.php') ?>
  <div class="main-div">
    <div class="home-left">
      <div class="nav-logo">
        <a href="./patient_home.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="profile-image">
      <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="imgframe" />      </div>
      <div class="nav-links">
        <a href="./patient_home.php">Home</a>
        <a href="./patient_appointments.php">Appointments</a>
        <a href="./patient_pharmorders.php">Orders</a>
        <a href="./patient_medicalrecords.php" style="color: #0c5c75; font-weight: bold">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="./patient_viewprofile.php">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="back" onclick="location.href='patient_medicalrecords.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content"
        style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title" style="margin-bottom:10px;">My Medical Records</div>
        <div class="mk-apt-btn"><button class="btn-mkdcapt" onclick="openPopup()"><span>upload a record</span></button>
        </div>
      </div>

      <div class="tbl-content">
        <table class="tbl-mydocapp" style="width:68%; margin-left:60px;">
          <thead>
            <tr>
              <td>Record ID</td>
              <td>Record Type</td>
              <td></td>
              <td></td>
            </tr>
          </thead>
          <tbody>

          <?php 
          while($rowreport = mysqli_fetch_assoc($results)){
          ?>
          
            <tr>
              <td><?php echo $rowreport['record_id'] ?></td>
              <?php 
                if($rowreport['record_type']==0){
                  $type = "Doctor Prescription";
                } else {
                  $type = "Lab Report";
                }
              ?>

              <td><?php echo $type ?></td>
              
              <?php 
                if($rowreport['record_type'] == 1 ){
              ?>

              <td>
                <button onclick="downloadPDF()" class="pre-btn" style="width:180px;"><span>Download Lab
                    Report</span></button>
                <script>
                  function downloadPDF() {
                    var link = document.createElement('a');
                    link.download = 'CareForYou-LabReport.pdf';
                    link.href = '../images/lab-reports/patient-report/LFT.pdf';
                    link.click();
                  }
                </script>
              </td>

              <?php 
                } else {
              ?>

              <td>
                <button onclick="downloadImage()" class="pre-btn" style="width:180px;"><span>Download
                    Prescription</span></button>
                <img src="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" id="image" style="display:none">
                <script>
                  function downloadImage() {
                    var img = document.getElementById("image");
                    var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
                    var link = document.createElement('a');
                    link.download = 'CareForYou-Prescription.png';
                    link.href = url;
                    link.click();
                  }
                </script>
              </td>

              <?php 
                }
              ?> 
    
              <?php 
                if($rowreport['record_type'] == 1 ){
              ?>

              <td>
                <a href="patient_viewotherprescription.php">
                  <button class="book-btn"><span>View Details</span></button>
                </a>
                </td>
                <?php 
                } else {
                ?>                
              <td>
                <a href="../images/lab-reports/patient-report/LFT.pdf" target="_blank">
                  <button class="book-btn"><span>View Report</span></button>
                </a>
              </td>

              <?php 
                } 
                ?>                

            </tr>

          <?php 
          }
          ?>
         
          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>
<?php
//Check whether the Place Order button is clicked

?>

</html>