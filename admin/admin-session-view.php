<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-session.css">
    <title>ADMIN</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
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

        <div class="main_content">
            <div class="info">
              <div class="asst-list"></div>
              <button class="to-create-session-page" onclick="location.href='admin-session-create.php'">To Create Session</button>
              <button class="back-session-view" onclick="location.href='#'">Back</button>
              <span>
                <table class="tbl-main-session">
                    <thead>
                        <tr>
                            <td>Session ID</td>
                            <td>Room Number</td>
                            <td>Session Status</td>
                            <td>View Session Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <form>
                        <tr>
                            <td><input type="text" class="search-session" name="session-id"  autofocus="true"/></td>
                            <td><input type="text" class="search-session" name="room-no"  autofocus="true"/></td>
                            <td><input type="text" class="search-session" name="session-status"  autofocus="true"/></td>
                            <td><button class="btn-view-session-detail" ><span>Search</span></button></td>
                        </tr>
                        </form>
                        <tr>
                            <td>02</td>
                            <td>Ms. Weerakoon</td>
                            <td>Ms. Weerakoon</td>                           
                            <td><button class="btn-view-session-detail" onclick="location.href='admin-session-view-detail.php'"><span>Session Details</span></button></td>
                        </tr>
                        
                    </tbody>
                </table>
            </span>

</div>
        </div>


        </body>
</html>