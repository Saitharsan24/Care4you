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
          <a href="./patient_appointments.php" style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical records</a>
          <a href="./patient_doctorlist.php">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">

        <div class="back" onclick="location.href='patient_labappointments.php'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>

        <div class="makeorder-heading"><h2>Make Lab Appointment</h2></div>
        <div class="form-content lab-apt-form">

            <div class="lab-apt-row">
              <div>Name : <input type="text" name="pname" placeholder="Enter patient name" required/></div>
              <div class="lab-divider1"></div>
              <div>Contact :<input type="text" name="contact" placeholder="Enter patient contact No" required/></div>
            </div>

            <div class="lab-apt-row">
              <div>NIC No : <input type="text" name="nic" placeholder="Enter patient NIC No" required/></div>
              <div class="lab-divider2"></div>
              <div>Date : <input type="date" name="pname" placeholder="Enter patient name" required/></div>
            </div>

            <div class="lab-apt-row">
              <div class="upload-lapapt">Upload Prescription : <input type="file" class="upload-pres" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription" required/></div>
            </div>

            <div class="lab-apt-row-table">
              <div class="lab-apt-row-table-tag">Tests to be done :</div>
              <table class="tbl-lab-apt">
                <form action="">
                                  <thead>
                                          <td>Test Name</td>
                                          <td>Time Slot</td>
                                          <td>Charge (Rs.)</td>
                                          <td></td>
                                      </tr>
                                  </thead>
                                  <tbody>                         
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td colspan = 4><button>+ Add test</button></td>
                                        </tr>
                                  </tbody>
                  </form>              
                </table>
            </div>

            <div class="lab-apt-row">
              <div class="upload-lapapt">Total Amount : <input type="text"></div>
            </div>

            <div class="apt-btn-css">
              <a href=""><button>Pay Now</button></a>
            </div>
           
        </div>
      </div>
    </div>
  </body>
</html>
