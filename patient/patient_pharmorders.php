<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>



<?php 
              if(isset($_SESSION['add-order']))
              {
                if($_SESSION['add-order'] == 1) {
                  unset($_SESSION['add-order']);
                  echo "<script>openPopupOS()</script>";
                }
                if($_SESSION['add-order'] == 2) {
                  unset($_SESSION['add-order']);
                  echo "<script>openPopupOF()</script>";
                }
              }
?>

<?php

    $userid = $_SESSION['user_id'];


    $query = "SELECT order_id,pname,contactnumber,order_status,orderdate,userid FROM tbl_neworder WHERE userid='$userid'
                  UNION
              SELECT order_id,pname,contactnumber,order_status,orderdate,userid FROM tbl_respondedorders WHERE userid='$userid'
                  ORDER BY order_id DESC";

    $result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/patient.css" />
  <title>Pharmacy Orders</title>
  <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
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
        <a href="#" style="color: #0c5c75; font-weight: bold">Orders</a>
        <a href="./patient_medicalrecords.php">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="#">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>

    <div class="home-right">

      <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title" style="color: #000; font-size: 45px; margin-bottom:-40px;">My Orders</div>
        <div class="mk-odr-btn"><a href="./patient_makeorder.php"><button class="btn-mkdcapt"><span>make pharmacy order</span></button></a></div>
      </div>
    
      <div class="tbl-content">
      <table class="tbl-mydocapp" style="width:65%; margin-left: 60px;">
        <thead>
            <tr>
                <td>Order ID</td>
                <td>Contact Number</td>
                <td>Order Status</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        <?php
          if ($result){
            while ($row = mysqli_fetch_array($result))
            {
        ?>
            <tr>
                <td><?php echo $row['order_id'];  ?></td>
                <td><?php echo $row['contactnumber'];  ?></td>

                <?php
                  if ($row['order_status'] == 0)
                  { ?>
                  <td><button class="order-st00"><?php  echo 'Response Pending';?></button></td>
                <?php
                  }
                  else if($row['order_status'] == 1)
                  { ?>
                  <td><button class="order-st01"><?php  echo 'Payment Pending';?></button></td>
                <?php
                  }
                  else if($row['order_status'] == 2)
                  { ?>
                  <td><button class="order-st02"><?php  echo 'Order Confirmed';?></button></td>
                <?php
                  }
                  else if($row['order_status'] == 3)
                  { ?>
                  <td><button class="order-st03"><?php  echo 'Order Dispatched';?></button></td>
                <?php
                  }
                  else if($row['order_status'] == 4)
                  { ?>
                  <td><button class="order-st04"><?php  echo 'Delivered';?></button></td>
                <?php
                  }
                  else if($row['order_status'] == 5)
                  { ?>
                  <td><button class="order-st05"><?php  echo 'Cancelled';?></button></td>
                <?php
                  } ?>

                <td><a href="patient_pharmorderViewDetails.php?id=<?php echo $row['order_id'];?>&status=<?php echo $row['order_status'];?>"><button class="book-btn"><span>View Details</span></button></a></td>
        <?php
                    }
          }
          else
          {
        ?>
            <h3>No orders yet</h3>
      <?php
          }
      ?>            
              </tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</body>

</html>