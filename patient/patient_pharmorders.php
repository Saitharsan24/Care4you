<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>



<?php

    $userid = $_SESSION['user_id'];

    $query = "SELECT order_id,pname,contactnumber,order_status,orderdate,userid FROM tbl_neworder WHERE userid='$userid'
                  UNION
              SELECT order_id,pname,contactnumber,order_status,orderdate,userid FROM tbl_respondedorders WHERE userid='$userid'
                  ORDER BY order_id;";

    $result = mysqli_query($conn, $query);

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
        <a href="#" style="color: #0c5c75; font-weight: bold">Orders</a>
        <a href="./patient_medicalrecords.php">Medical records</a>
        <a href="#">View doctors</a>
        <a href="#">View profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>


    <div class="home-right">
      <div class="text-content">
        <div class="my-doc-apt order-heading">
          <h2>My Orders</h2>
        </div>
        <div>
          <div class="make-apt-btn"><a href="patient_makeorder.php "><button>Make Pharmacy Order</button></a></div>
        </div>
      </div>

      <div class="table-order-details">
        <div class="order-tbl-heading">
          <div>Order ID</div>
          <div class="divide-order divide-order-02"></div>
          <div>Phone No</div>
          <div class="divide-order divide-order-03"></div>
          <div>Order status</div>
        </div>
        <div class="order-tbl-search">
          <table>
            <tr>
              <td><input type="text" class="search-row1" autofocus="true" /></td>
              <td><input type="text" class="search-row3" autofocus="true" /></td>
              <td><input type="text" class="search-row4" autofocus="true" /></td>
            </tr>
          </table>
        </div>

       

         
            <?php
            if ($result) {
              while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="order-tbl-list">
            <table>
              <tr>
                  <td class="order-data01"><?php echo $row['order_id'];  ?></td>
                  <td class="order-data03"><?php echo $row['contactnumber'];  ?></td>
                  <?php
                      if ($row['order_status'] == 0) { ?>
                        <td class="order-data04 order-st01"> <?php  echo 'Response pending';?></td>
                  <?php
                      } else if($row['order_status'] == 1) { ?>
                        <td class="order-data04 order-st02"> <?php  echo 'Response pending';?></td>
                  <?php
                      } else if($row['order_status'] == 2) { ?>
                        <td class="order-data04 order-st03"> <?php  echo 'Complete'; ?></td>
                  <?php
                      } else if($row['order_status'] == 3) { ?>
                        <td class="order-data04 order-st04"> <?php  echo 'Cancelled'; ?></td>
                  <?php
                      }
                      ?>
                  
                  <td><a href="./patient_pharmorderViewDetails.php?id=<?php echo $row['order_id'];?>&status=<?php echo $row['order_status'];?>"><button class="btn-view-pha-detail order-btn-view"><span>View Details</span></button></a></td>
              </tr>
            </table>
            </div>

            <?php
              }
            } else {
              ?>
            <h3>No orders yet</h3>

            
            <?php
              }
            ?>
      </div>
    </div>
  </div>
  </div>
</body>

</html>