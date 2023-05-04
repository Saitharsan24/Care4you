<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
$query = "SELECT * FROM tbl_pharmacist INNER JOIN tbl_sysusers ON tbl_pharmacist.userid = tbl_sysusers.userid ";
$result = mysqli_query($conn, $query);
$no_row = mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="../script/filter.js"></script>
</head>

<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">

                    <button class="btn-addnew" style="left: 1265px; width:170px;" onclick="location.href='admin-pha-reg.php'"><span>add new pharmacist</span></button>
                    <div class="back" onclick="location.href='admin-system-users.php'">
                        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                    </div>

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
                                    <td><input type="text" class="search-pha" name="pha-id" id="phar_id" autofocus="true" placeholder="search pharmacits ID" onkeyup="filterPharId()"></td>
                                    <td><input type="text" class="search-pha" name="pha-name" id="phar_name" autofocus="true" placeholder="search Name" onkeyup="filterPharName()"></td>
                                    <td><input type="text" class="search-pha" name="pha-id" id="phar_status" autofocus="true" placeholder="search Account Status"onkeyup="filterPharStatus()"></th>
                                    <td><button class="search-doc"><span>Search&emsp;</span></button></td>
                                </tr>


                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['pharmacist_id']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td ><?php
                                                if ($row['status'] == 1) {
                                                    echo '<button vs class="active-status"> Active </button>';
                                                } else {
                                                    echo '<button class="passive-status"> Disabled </button>';
                                                }
                                                ?></td>
                                            <td><button class="btn-view-pha-detail" onclick='location.href="admin-pha-view-detail.php?id=<?php echo $row["pharmacist_id"]; ?>"'><span>Pharmacist Details</span></button></td>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>


                            </tbody>
                        </table>
                </div>
            </div>
        </div>
</body>

</html>