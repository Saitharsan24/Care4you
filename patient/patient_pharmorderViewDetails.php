<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
$order_id = $_GET['id'];
$order_status = $_GET['status'];

if ($order_status == 0) {
  $sql = "SELECT * FROM tbl_neworder WHERE order_id = '$order_id'";
} else {
  $sql = "SELECT * FROM tbl_respondedorders WHERE order_id = '$order_id'";
}

$result = mysqli_query($conn, $sql);
$orderrow = mysqli_fetch_assoc($result);

$pname = $orderrow['pname'];
$paddress = $orderrow['paddress'];
$contact = $orderrow['contactnumber'];
$order_date = $orderrow['orderdate'];
$nic = $orderrow['nic'];
$prescription = $orderrow['prescription_name'];
$other_items = $orderrow['remarks'];

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
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">

      <div class="back" onclick="location.href='patient_pharmorders.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="view-order-heading">
        <h2>My Order Details</h2>
      </div>
      <div class="view-order-details">


        <div class="view-orderdetails-row">Order ID :<div>
            <?php echo ' ' . $order_id; ?>
          </div>
        </div>
        <div class="view-orderdetails-row">Name :<div>
            <?php echo ' ' . $pname; ?>
          </div>
        </div>
        <div class="view-orderdetails-row">Address :<div>
            <?php echo ' ' . $paddress; ?>
          </div>
        </div>
        <div class="view-orderdetails-row">Contact No :<div>
            <?php echo ' ' . $contact; ?>
          </div>
        </div>
        <div class="view-orderdetails-row">Order date :<div>
            <?php echo ' ' . $order_date; ?>
          </div>
        </div>
        <div class="view-orderdetails-row">Order status :
          <div>
            <?php

            if ($order_status == 0) {
              echo ' ' . '<button class="order-st00">Response Pending</button>';
            } elseif ($order_status == 1) {
              echo ' ' . '<button class="order-st01">Payment Pending</button>';
            } elseif ($order_status == 2) {
              echo ' ' . '<button class="order-st02"">Confirmed</button>';
            } elseif ($order_status == 3) {
              echo ' ' . '<button class="order-st03"">Dispatched</button>';
            } else {
              echo ' ' . '<button class="order-st04">Complete</button>';
            }
            ?>
          </div>
        </div>
        <div class="view-orderdetails-row">Prescription :<div class="uploaded-file"><a
              href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription; ?>" target="blank"> <?php echo $prescription; ?></a></div>
        </div>
        <div class="view-orderdetails-row">NIC No :<div>
            <?php echo ' ' . $nic; ?>
          </div>
        </div>

        <?php
        if ($other_items == '') {
          ?>

          <div class="view-orderdetails-row">Other items :<div style="color:rgb(165, 164, 170); font-style:italic"> No
              other items requested</div>
          </div>

        <?php
        } else {
          ?>

          <div class="view-orderdetails-row">Other items :<div>
              <?php echo $other_items ?>
            </div>
          </div>

          <?php
        }
        ?>

        <div class="view-order-btn">
          <?php if (isset($orderrow['responddate'])) { ?>
            <div class="view-order-btn02"><a
                href="./patient_pharmorderViewReview.php?id=<?php echo $orderrow['order_id']; ?>&status=<?php echo $orderrow['order_status']; ?>"><button>View
                  review</button></a></div>
          <?php } ?>
          <div class="view-apt-divider"></div>

          <?php
          if ($orderrow['order_status'] == 0 || $orderrow['order_status'] == 1) {
            ?>
            <div class="view-order-btn01"><button onclick="openPopupOCAN()">Cancel Order</button></div>

            <?php
            include('./popups/pharmorderpopup.php');
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>