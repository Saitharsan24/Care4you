<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php
// displaying First name and nic from database
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM tbl_patient where userid = '$user_id'";
$result = mysqli_query($conn, $query);

$row = $result->fetch_assoc();
$f_name = $row['first_name'];
$l_name = $row['last_name'];
$p_name = $f_name . " " . $l_name;
;
$p_nic = $row['nic'];
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
        <a href="./patient_pharmorders.php" style="color: #0c5c75; font-weight: bold">Orders</a>
        <a href="./patient_medicalrecords.php">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="./patient_viewprofile.php">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">

      <div class="back" onclick="location.href='patient_pharmorders.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="makeorder-heading">
        <h2>Make Pharmacy Order</h2>
      </div>

      <?php
      if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
      if (isset($_SESSION['add-order'])) {
        echo $_SESSION['add-order'];
        unset($_SESSION['add-order']);
      }
      ?>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-content make-order">
          <div class="form-itm">
            <p>Name :</p>
            <input type="text" name="pname" value="<?php echo $p_name; ?>" readonly />
          </div>
          <div class="form-itm">
            <p>Contact No :</p>
            <input type="tel" name="contactnumber" pattern="[0-0]{1}[0-9]{9}" required />
          </div>
          <div class="form-itm">
            <p>NIC No :</p>
            <input type="text" name="nic" pattern="[0-9]{9}[Vv0-9]{1,3}" value="<?php echo $p_nic; ?>" readonly />
          </div>
          <div class="form-itm other-order">
            <p>Address :</p>
            <textarea name="paddress"></textarea>
          </div>
          <!-- <div class="form-itm">
              <input type="text">
            </div> -->
          <div class="form-itm type-file">
            <p>Upload Prescription :</p>
            <input name="prescription" type="file" accept="image/*,.doc,.docx,.txt,.pdf" c required />
          </div>
          <div class="form-itm other-order">
            <p>Other items :</p>
            <textarea name="remarks"></textarea>
          </div>
          <div class="apt-btn order-btn">
            <div class="apt-btn-css"><a href="patient_pharmorders.php"><button type="submit" name="order">Place
                  order</button></a></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>

<?php

//Check whether the Place Order button is clicked
if (isset($_POST['order'])) {

  //Get the order placed date
  date_default_timezone_set('Asia/Kolkata');
  $date = date('d/m/Y');
  $time = date('h:i:sA');
  //echo "DATE - ".$date;
  //echo "TIME - ".$time;

  //Get the order details from the form
  $pname = $p_name;
  $paddress = $_POST['paddress'];
  $nic = $p_nic;
  $contactnumber = $_POST['contactnumber'];
  $remarks = $_POST['remarks'];


  //Check whether the prescription is uploaded or not


  if (isset($_FILES['prescription']['name'])) {

    //Upload the prescription
    //To upload the prescription we need the file name, source path and destination path

    //Get the prescription name
    $prescription_name = $_FILES['prescription']['name'];


    //Upload prescription only if prescription is selected
    if ($prescription_name != "") {
      //Auto Rename the Prescription

      //Get the extension of the prescription
      $namarr = explode('.', $prescription_name);
      $ext = end($namarr);

      //Rename the prescription
      $prescription_name = "Order_" . date('d_m_y_h_i_s_A') . "." . $ext;

      //Get the source path
      $source_path = $_FILES['prescription']['tmp_name'];

      //Give the destination path
      $destination_path = "../images/pharmacy-orders/" . $prescription_name;

      //Upload the prescription
      $upload = move_uploaded_file($source_path, $destination_path);

      //Check whether the prescription is uploaded or not
      if ($upload == FALSE) {
        $_SESSION['upload'] = "Failed to upload Prescription! Please Retry";
        //Redirect to place order page
        // header('location:'.SITEURL.'/patient/patient_pharmorders.php'); 
        //Stop the process
        die();
      }

    }

  } else {
    //Prescription not uploaded and prescription name is not set (Data can not save)
    $prescription_name = "";
  }


  //SQL Query to insert Order to database
  $sql = "INSERT INTO tbl_neworder (pname,paddress,nic,contactnumber,prescription_name,remarks,orderdate,ordertime,userid) 
                VALUES ('$pname','$paddress','$nic','$contactnumber','$prescription_name','$remarks','$date','$time','$user_id')";

  //Execute the query and Save order details in database
  $res = mysqli_query($conn, $sql);
  // print_r($res);die();


  //Check the execution of query
  if ($res) {
    //Query executed and order details saved in database
    // print_r("test");die();
    $_SESSION['add-order'] = 1;
    //Redirect to home page
    header('location:' . SITEURL . '/patient/patient_pharmorders.php');
  } else {
    //Failed to execute the query
    $_SESSION['add-order'] = 2;

    //Redirect to placeorder page
    header('location:' . SITEURL . '/patient/patient_pharmorders.php');
  }
}

?>