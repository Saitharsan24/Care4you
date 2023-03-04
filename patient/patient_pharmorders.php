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
        <div class="my-doc-apt">
          <h2>My Orders</h2>
        </div>
      </div>

      <div>
        <div class="make-apt-btn"><a href="patient_makeorder.php "><button>Make Pharmacy Order</button></a></div>
      </div>

        <span>
          <table class="tbl-main-pha" id="tbl-main-pha">
            <thead>
              <tr>
                <th>Pharmacist ID</th>
                <th>Pharmacist Name</th>
                <th>Account Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <th><input type="text" class="search-pha" name="pha-id" id="phar_id" autofocus="true" onchange="filterPharId()"></td>
                <th><input type="text" class="search-pha" name="pha-name" id="phar_name" autofocus="true" onchange="filterPharName()"></td>
                <th></th>
                <th><button class="btn-view-pha-detail"><span>Search</span></button></td>
              </tr>


              <?php
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
              ?>
                  <tr>
                    <td><?php echo $row['pharmacist_id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <th><?php
                        if ($row['status'] == 1) {
                          echo '<span class="active-status"> Active </span>';
                        } else {
                          echo '<span class="passive-status"> Passive </span>';
                        }
                        ?></th>
                    <td><button class="btn-view-pha-detail" onclick='location.href="admin-pha-view-detail.php?id=<?php echo $row["pharmacist_id"]; ?>"'><span>Pharmacist Details</span></button></td>
                  </tr>
              <?php
                }
              }

              ?>


            </tbody>
          </table>
        </span>
      </div>





    </div>
  </div>
</body>

</html>