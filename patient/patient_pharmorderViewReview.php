<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    $order_id = $_GET['id'];
    $order_status = $_GET['status'];

    $sql = "SELECT * FROM tbl_respondedorders WHERE order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    $respond_date = $row['responddate'];
    $respond_time = $row['respondtime'];


    $sql1= "SELECT * FROM tbl_addmedicine WHERE order_id = '$order_id'";
    $result1 = mysqli_query($conn, $sql1);
    
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
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="view-order-heading"><h2>My Order Review</h2></div>
        <div class="view-review-details">
          
          <div class="view-orderreview-row">Order ID : <div><?php echo ' '.$order_id;?></div></div>
          <div class="view-orderreview-row">Reviewed date : <div><?php echo ' '.$respond_date.'  '.$respond_time;?></div></div>
          <div class="view-orderreview-row">Available medicines :<div></div></div>
                <table class="tbl-addmed">
                                  <thead>
                                      <tr>
                                          <td>Drug Name</td>
                                          <td>Unit Price (Rs.)</td>
                                          <td>Quantity</td>
                                          <td>Total (Rs.)</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php 
                                      if (mysqli_num_rows($result1) == 0) { ?>
                                        <tr>
                                          <td colspan = 4>No Stock available</td>
                                        </tr>      
                                  <?php } else { 
                                      
                                      while ($row1 = mysqli_fetch_array($result1)) {
                                  ?>
                                        <tr>
                                          <td style="font-size: 12px;"><?php echo $row1['drugname']; ?></td>
                                          <td style="font-size: 12px;"><?php echo $row1['unitprice']; ?></td>
                                          <td style="font-size: 12px;"><?php echo $row1['quantity']; ?></td>
                                          <td style="font-size: 12px;"><?php echo $row1['total']; ?></td>
                                        </tr>
                                  <?php  }
                                        } 
                                  ?>

                                  </tbody>
                                  
                </table>
          <div class="view-orderreview-row">Net amount :<div><?php echo ' Rs.'.$row['nettotal']; ?></div></div>
          <div class="view-orderreview-row"><p>Unavailable medicines :<div><?php echo $row['unavailablemedicines']; ?></div></p></div>
        </div>

        <div class="view-orderreview-btn">
                <div class="view-order-btn02"><a href="./patient_pharmorderViewDetails.php?id=<?php echo $order_id;?>&status=<?php echo $order_status;?>"><button>Back</button></a></div>
                <div class="view-apt-divider"></div>
                <div class="review-order-btn01"><a href=""><button>Pay now</button></a></div>
          </div>
      </div>

    </div>
  </body>
</html>
