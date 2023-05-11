<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
//$query = "SELECT * FROM tbl_doctor";
$query="SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid ";
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
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-doc-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">

                    <button class="btn-addnew"  onclick="location.href='admin-doc-reg.php'"><span>add new doctor</span></button>
                    <div class="back" onclick="location.href='admin-system-users.php'">
                        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                    </div>

                    <span>
                        <table class="tbl-main-doc" id="tbl-main-doc">
                            <thead>
                                <tr>
                                    <td>Doctor ID</td>
                                    <td>Doctor Name</td>
                                    <td>Specialization</td>
                                    <td>SLMC Number</td>
                                    <td>Account Status</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <form>
                                    <tr>
                                        <td><input type="text" class="search-doc" name="doc-id" id="doc-id" autofocus="true" placeholder="search Doctor ID" onkeyup="filterDoctorId()" /></td>
                                        <td><input type="text" class="search-doc" name="doc-name" id="doc-name" autofocus="true" placeholder="search Name" onkeyup="filterDoctorName()" /></td>
                                        <td><input type="text" class="search-doc" name="Specialize" id="doc-Specialize" autofocus="true" placeholder="search Specialization" onkeyup="filterDoctorSpecialize()" /></td>
                                        <td><input type="text" class="search-doc" name="Slmc" id="doc-slmc" autofocus="true" placeholder="search SLMC number" onkeyup="filterDoctorSlmc()"/></td>
                                        <td><input type="text" class="search-doc" name="status"  id="doc-status" autofocus="true" placeholder="search Account Status" onkeyup="filterDoctorStatus()" /></td>
                                        <td><button onclick class="btn-search"><span>Clear filter&emsp;</span></button></td>
                                    </tr>
                                </form>
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_array($result)) {

                                ?>
                                        <tr>
                                            <td><?php echo $row['doctor_id'];  ?></td>
                                            <td><?php echo $row['doc_name'];  ?></td>
                                            <td><?php echo $row['specialization'];  ?></td>
                                            <td><?php echo $row['SLMC_number'];  ?></td>
                                            <td><?php
                                            if ($row['status']==1){
                                                echo '<button class="active-status">Active</button>';
                                            }else{
                                                echo '<button class="passive-status">Disabled</button>';
                                            }
                                            ?>
                                            </td>
                                            <td><button class="btn-view-doc-detail" onclick='location.href="admin-doc-view-detail.php?id=<?php echo $row["doctor_id"]; ?>"'><span>Doctor Details</span></button></td>
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