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
        <div class="view-order-heading"><h2>My Order Details</h2></div>
        <div class="view-order-details">
          <div class="view-orderdetails-row"><p>Order ID :</p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>Name :</p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>Address :</p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>Contact No :</p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>Order date :</p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>Order status :</p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>Prescription : </p><div><p></p></div></div>
          <div class="view-orderdetails-row"><p>NIC No :</p><div><p></p></div></div>
        
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
