<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
$query = "SELECT * FROM tbl_doctor";
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
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">
                        <div class="highlighttext">System Users
                    </a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">
                    <div class="doc-list"></div>
                    <button class="to-reg-doc-page" onclick="location.href='admin-doc-reg.php'">To Register</button>
                    <button class="back-doc-view" onclick="location.href='admin-system-users.php'">Back</button>
                    <span>
                        <table class="tbl-main-doc">
                            <thead>
                                <tr>
                                    <td>Doctor ID</td>
                                    <td>Doctor Name</td>
                                    <td>Specialization</td>
                                    <td>SLMC_number</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <form>
                                    <tr>
                                        <td><input type="text" class="search-doc" name="doc-id" autofocus="true" /></td>
                                        <td><input type="text" class="search-doc" name="doc-name" autofocus="true" /></td>
                                        <td><input type="text" class="search-doc" name="Specialize" autofocus="true" /></td>
                                        <td><input type="text" class="search-doc" name="Slmc" autofocus="true" /></td>
                                        <td><input type="text" class="search-doc" name="Slmc" autofocus="true" /></td>
                                        <td><button class="btn-view-lab-detail"><span>Search</span></button></td>
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
                                <td><button class="btn-view-lab-detail" onclick='location.href="admin-doc-view-detail.php?id=<?php echo $row["doctor_id"]; ?>"'><span>View Doctor Details</span></button></td>
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