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
          <a href="#">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="apt-heading"><h2>Channel a Doctor</h2></div>
        <div class="search-apt">  
          <form action="#">
            <div class="search-row">
              <p class="form-text">Doctor Name:</p>
              <select name="gender" id="gender">
                <option value="Male">Saitharsan</option>
              </select>
            </div>
            <div class="search-row">
              <p class="form-text">Specialization:</p>
              <select name="gender" id="gender">
                <option value="Male">OPD</option>
              </select>
            </div>
            <div class="search-row">
                <p class="form-text">Date:</p>
                <input type="Date" class="signup-input" name="date_of_birth" value=" "/>
            </div>
            <div class="search-btn">
                <button type="submit" class="btn signin">Search</button>
            </div>
            
          </form>
        </div>
        <div class="list-apt">
            <div class="apt-table-head">
                <div class="table-itm1"><p>Doctor Name</p></div>
                <div class="table-itm2"><p>Specialization</p></div>
                <div class="table-itm3"><p>Date</p></div>
                <div class="table-itm4"><p>Time</p></div>
            </div>
            <div class="apt-lists">
                <td class="apt-list-tbl">
                  <tr>Dr. Saitharsan</tr>
                  <tr>Cardiologist</tr>
                  <tr>24/10/2023</tr>
                  <tr>10 p.m</tr>
                  <tr class="book-btn"><a href="./patient_bookdoc1.php"><button>Book</button></a></tr>
                </td>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
