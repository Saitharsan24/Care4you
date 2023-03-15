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
          <div class="view-orderreview-row"><p>Order ID :</p><div><p></p></div></div>
          <div class="view-orderreview-row"><p>Reviewed date :</p><div><p></p></div></div>
          <div class="view-orderreview-row"><p>Available medicines :</p><div><p></p></div></div>
          <table class="tbl-addmed">
                            <thead>
                                <tr>
                                    <td>Drug Name</td>
                                    <td>Strength</td>
                                    <td>Unit Price (Rs.)</td>
                                    <td>Quantity</td>
                                    <td>Total (Rs.)</td>
                                </tr>
                            </thead>
          </table>
          <div class="view-orderreview-row"><p>Net amount :</p><div><p></p></div></div>
          <div class="view-orderreview-row"><p>Unavailable medicines :</p><div><p></p></div></div>
          <div class="view-order-btn">
            <div class="view-order-btn02"><a href="./patient_pharmorderViewDetails.php"><button>Back</button></a></div>
            <div class="view-apt-divider"></div>
            <div class="review-order-btn01"><a href=""><button>Pay now</button></a></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
