<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-session.css">
    <title>ADMIN</title>
</head>
<body>
<div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>

        <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
              <div class="head-create-session">Create Session</div>
              <div class="square-create-session">

              <div class="form-create-session">
              <form>
            <table class="formtable-create-session">
                <tr>
                    <td>Doctor Name :</td>
                    <td><input type="text" class="form-create-session" name="name" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Date :</td>
                    <td><input type="date" class="form-create-session" name="username" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>room :</td>
                    <td><select name="room" class="form-create-session">
                      <option>No-1</option>
                      <option>No-2</option>
                      <option>No-3</option>
                      <option>No-4</option>
                      <option>No-5</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Time Slot :</td>
                    <td><select name="room" class="form-create-session">
                      <option>8am-10am</option>
                      <option>10am-12pm</option>
                      <option>12pm-2pm</option>
                      <option>2pm-4pm</option>
                      <option>4pm-6pm</option>
                      <option>6pm-8pm</option>
  
                                      </select></td>
                    </td>
                </tr>
                
                
            </table>
            <button class="btn-create-session" type="submit">Create Session</button>
            <button class="btn-create-session-back" onclick="location.href='admin-session-view.php'">Back</button>
            </form>
                            </div>
        </div>            
        </div>
</body>
</html>