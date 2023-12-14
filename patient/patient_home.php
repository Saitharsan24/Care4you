<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

// $user_id = $_SESSION['user_id'];
// $sql = "SELECT first_name FROM tbl_patient WHERE userid = '$user_id'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/patient.css" />
  <link rel="stylesheet" href="../css/patient_home_slider.css">
  <title>Home</title>
  <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
  <script src="../script/slider.js"></script>
</head>
<?php include('patient_getinfo.php') ?>

<body>
  <div class="main-div">
    <div class="home-left">
      <div class="nav-logo">
        <a href="./patient_home.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="profile-image">
        <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="imgframe" />
      </div>
      <div class="nav-links">
        <a href="./patient_home.php" style="color: #0c5c75; font-weight: bold">Home</a>
        <a href="./patient_appointments.php">Appointments</a>
        <a href="./patient_pharmorders.php">Orders</a>
        <a href="./patient_medicalrecords.php">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="./patient_viewprofile.php">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="text-content">
        Welcome
        <div class="user-name">
          <?php echo $first_name ?>
        </div>
      </div>
      <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);

      }
      if (isset($_SESSION['no-login-message'])) {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);

      }
      ?>
      <div class="page-content">

        <section class="wrapper" id="wrapper">
          <div class="sliderpannel">

            <div class="image-container">
              <div class="carousel mySlides fade">
                <img src="../images/patient-home-slider/Slide01.jpg" class="slide-img" alt="slider-image">
              </div>
              <div class="carousel mySlides fade">
                <img src="../images/patient-home-slider/Slide02.jpg" class="slide-img" alt="slider-image">
              </div>
              <div class="carousel mySlides fade">
                <img src="../images/patient-home-slider/Slide03.jpg" class="slide-img" alt="slider-image">
              </div>


            </div>

          </div>
        </section>

        <div class="right-page-content">
          <div><a href="./patient_makedocappointment.php"><button>Make doctor appointment</button></a></div>
          <div class="home-divider"></div>
          <div><a href="./patient_makeorder.php"><button>Order medicine</button></a></div>
          <div class="home-divider"></div>
          <div><a href="./patient_makelabappointment.php"><button>Make lab appointment</button></a></div>
        </div>
      </div>
    </div>
  </div>
</body>


<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }

    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
</script>

</html>