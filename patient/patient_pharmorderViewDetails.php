<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
    $order_id = $_GET['id'];
    $order_status = $_GET['status'];

    if($order_status == 0){
      $sql = "SELECT * FROM tbl_neworder WHERE order_id = '$order_id'";
    } else {
      $sql = "SELECT * FROM tbl_respondedorders WHERE order_id = '$order_id'";
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $pname = $row['pname'];
    $paddress = $row['paddress'];
    $contact = $row['contactnumber'];
    $order_date = $row['orderdate'];
    $nic = $row['nic'];
    $prescription = $row['prescription_name'];

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
          <a href="./patient_appointments.php">Appointments</a>
          <a href="./patient_pharmorders.php" style="color: #0c5c75; font-weight: bold">Orders</a>
          <a href="#">Medical records</a>
          <a href="./patient_medicalrecords.php">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="view-order-heading"><h2>My Order Details</h2></div>
        <div class="view-order-details">
          

          <div class="view-orderdetails-row">Order ID :<?php echo ' '.$order_id; ?></div>
          <div class="view-orderdetails-row">Name :</div>
          <div class="view-orderdetails-row">Address :</div>
          <div class="view-orderdetails-row">Contact No :</div>
          <div class="view-orderdetails-row">Order date :</div>
          <div class="view-orderdetails-row">Order status :</div>
          <div class="view-orderdetails-row">Prescription :</div>
          <div class="view-orderdetails-row">NIC No :</div>
        
          <div class="view-order-btn">
            <div class="view-order-btn02"><a href="./patient_pharmorderViewReview.php"><button>View review</button></a></div>
            <div class="view-apt-divider"></div>
            <div class="view-order-btn01"><a href=""><button>Cancel Order</button></a></div>
          </div>
        </div>
        <div class="view-order-back-btn">
          <div class="view-order-btn02"><a href="./patient_pharmorders.php"><button>Back</button></a></div>
        </div>
      </div>
    </div>
  </body>
</html>
