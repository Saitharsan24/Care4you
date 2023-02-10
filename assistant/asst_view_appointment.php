<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Pharmacy</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/assist-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="asst_home.php">Home</a></li>
                <li><a href="asst_session.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="asst_view.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
<!--navbar-->
    <div class="table">
          <table>
            <tr class="head">
                <th class="th-1">appointmet No</th>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Appointment Time</th>
                <th class="th-2">Appointment Status</th>
            </tr>
            <tr class="body-1">
              <td class="td-1">01</td>
              <td>23</td>
              <td>Ms. Yohan peries</td>
              <td>7.20 a.m</td>
              <td class="td-2"></td>
            </tr>
          </table>
        </div>
</body>
</html>