<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
$query="SELECT * FROM tbl_assistant INNER JOIN tbl_sysusers ON tbl_assistant.userid = tbl_sysusers.userid ";
$result=mysqli_query($conn,$query);
$no_row=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
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
                <li><a href="admin-patient-view.php">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
            <div class="info">
              <div class="asst-list"></div>
              <button class="to-reg-asst-page" onclick="location.href='admin-asst-reg.php'">To Register</button>
              <button class="back-asst-view" onclick="location.href='admin-system-users.php'">Back</button>
              <span>
                <table class="tbl-main-asst">
                    <thead>
                        <tr>
                            <td>Assistant ID</td>
                            <td>Assistant Name</td>
                            <td>Account status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="search-asst" name="asst-id"  autofocus="true"/></td>
                            <td><input type="text" class="search-asst" name="asst-name"  autofocus="true"/></td>
                            <td><input type="text" class="search-asst" name="asst-status"  autofocus="true"/></td>
                            <td><button class="btn-view-asst-detail" ><span>Search</span></button></td>
                        </tr>
                        <?php
                        if($result){
                            while($row=mysqli_fetch_array($result)){
                                 ?>
                        <tr>
                            <td><?php echo $row['Assistant_ID']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                           
                            <td><?php
                              if($row['status']==1){
                                echo '<span class="active-status"> Active </span>';
                              }else{
                                echo '<span class="passive-status"> Passive </span>';
                              }
                              ?>
                            </td>
                            <td><button class="btn-view-asst-detail" onclick='location.href="admin-asst-view-detail.php?id=<?php echo $row["Assistant_ID"]; ?>"'><span>Assistant Details</span></button></td>
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