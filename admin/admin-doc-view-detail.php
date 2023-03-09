<?php include('../config/constants.php'); ?>

<?php
$id = $_GET['id'];

$query = "SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid WHERE doctor_id= $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<?php


if (isset($_GET['disable'])) {
    $userid = $_GET['disable'];
    $query_del = "UPDATE tbl_sysusers
    SET status = 0
    WHERE userid = $userid";

    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-doc-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if (isset($_GET['enable'])) {
    $userid = $_GET['enable'];
    $query_del = "UPDATE tbl_sysusers
    SET status = 1
    WHERE userid = $userid";

    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-doc-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
//$result=mysqli_query($conn, $sql);


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
                <li><a href="admin-system-users.php">
                        <div class="highlighttext">System Users
                    </a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="detail-txt-doc">ID <div class="id-txt-doc"><?php echo $row['doctor_id']; ?> </div>Doctor's Detail
                </div>
                <div class="square-detail-doc">

                    <div class="detail-doc">

                        <table class="detail-table-lab-deatil">
                            <tr>
                                <td>Doctor Name :</td>
                                <td><?php echo $row['doc_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Doctor ID :</td>
                                <td><?php echo $row['doctor_id']; ?></td>
                            </tr>
                            <tr>
                                <td>Username :</td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone Number :</td>
                                <td><?php echo $row['phone_number']; ?></td>
                            </tr>
                            <tr>
                                <td>Email ID :</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>SLMC_number :</td>
                                <td><?php echo $row['SLMC_number']; ?></td>
                            </tr>
                            <tr>
                                <td>charges :</td>
                                <td><?php echo $row['charges']; ?></td>
                            </tr>
                            <tr>
                                <td>Specialize :</td>
                                <td><?php echo $row['specialization']; ?></td>
                            </tr>

                        </table>
                        <?php

                        if ($row['status'] == 1) {

                            $status = "Disable";
                            include('./admin-doc-pop.php');
                        ?>

                            <button class="btn-del-doc-disable" onclick="document.getElementById('id01').style.display='block'; 
                            document.getElementById('del').action = '?id=<?php echo $row['doctor_id'] ?>&disable=<?php echo $row['userid'] ?> ';
                            ">Disable Account</button>

                        <?php
                        } else {

                            $status = "Enable";
                            include('./admin-doc-pop.php');

                        ?>


                            <button class="btn-del-doc-enable" onclick="document.getElementById('id01').style.display='block'; 
                            document.getElementById('del').action = '?id=<?php echo $row['doctor_id'] ?>&enable=<?php echo $row['userid'] ?> ';
                            ">Enable Account</button>

                        <?php };
                        ?>


                        <button class="btn-del-back-doc" onclick="location.href='admin-doc-view.php'">Back</button>
                    </div>
                </div>
            </div>


        </div>
</body>

</html>