<!DOCTYPE html>
<html lang="en">
<<<<<<< Updated upstream
=======
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
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
          <a href="./patient_home.php" style="color: #0c5c75; font-weight: bold">Home</a>
          <a href="./patient_appointments.php">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical records</a>
          <a href="#">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <div class="signout"><a href="../logout.php">Sign Out</a></div>
      </div>
      <div class="home-right">
        <div class="text-content">
          Welcome
          <div class="user-name">Name</div>
        </div>
        <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
>>>>>>> Stashed changes

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/patient.css">
    <title>Home | Patient</title>
</head>

<<<<<<< Updated upstream
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.png" alt="user" class="imgframe">
            <ul>
                <li><a href="patient_home.php">Home</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Medical records</a></li>
                <li><a href="#">Lab reports</a></li>
                <li><a href="patient_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="#">Sign Out</a></div>
        </div>
        <div class="right-content">
            <div class="welcome-text">
                <p>Welcome</p>
                <p class="coloured-name">Laxshan</p>
            </div>
            <div class="dash-btn">
                <div class="dashboard">
                    <div class="dash-element">
                        <p>UPCOMING</p>
                        <p>APPOINTMENTS</p>
                        <p class="count">05</p>
                    </div>
                </div>

                <div class="button-set">
                    <button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button>
                    <button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button>
                    <button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button>
                </div>
            </div>
=======
                }
            ?>
        <div class="page-content">
          <div class="left-page-content">
           
          </div>
          <div class="right-page-content">
            <div><a href="./patient_makedocappointment.php"><button>Make doctor appointment</button></a></div>
            <div class="home-divider"></div>
            <div><a href="./patient_makeorder.php"><button>Order medicine</button></a></div>
            <div class="home-divider"></div>
            <div><a href="./patient_makelabappointment.php"><button>Make lab appointment</button></a></div>
          </div>
>>>>>>> Stashed changes
        </div>
    </div>
     

</body>

</html>