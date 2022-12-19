<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Session</title>
</head>
<body>
<div class="navbar">

<div class="logo">
<img src="../images/logo.png"/>
 </div>

<div class="profile">
    <img src="../images/profile.png"/>
</div>

    <div class="home">
        <a href="admin_home.php">
    <label>Home</label>
        </a>
    </div>

    <div class="session">
        <a href="admin-session.php">
    <label>Sessions</label>
        </a>
    </div>

    <div class="view-patient">
        <a href="#">
    <label>View patient</label>
        </a>
    </div>


    <div class="view-order">
        <a href="#">
    <label>View orders</label>
        </a>
    </div>

    
    <div class="view-appointment">
        <a href="#">
    <label>View Appointments</label>
        </a>
    </div>

    <div class="report">
        <a href="#">
    <label>Reports</label>
        </a>
    </div>

    
    <div class="system-user">
        <a href="#">
    <label>System users</label>
        </a>
    </div>


    <div class="view-profile">
        <a href="admin-view-profile.php">
    <label>View Profile</label>
        </a>
    </div>


    <div class="signout">
    
        <a href="#">
            <label>Sign Out</label>   
        </a>
   </div>
</div>

<!-- navgation-->
<div class="table-1">
          <table>
            <tr class="head">
                <th class="th-1">Session ID</th>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>No.of.Patient</th>
                <th>Room No.</th>
                <th class="th-2"> </th>
            </tr>
            <tr class="body-1">
              <td class="td-1">01</td>
              <td>Dr.Nuwan Fonseka</td>
              <td>16/12/2022</td>
              <td>20</td>
              <td>1</td>
              <td class="td-2"><button class="button" onclick="location.href='admin-view-appointment.php'">view session</button></td>
            </tr>
          </table>
        </div>
</body>
</html>