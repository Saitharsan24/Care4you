<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-order.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
        <script src="../script/admin-patient-view-filter.js"></script>
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
                <li><a href="admin-patient-view.php">Patient</a></li>
                <li><a href="admin-order-view.php"><div class="highlighttext"></div>Orders</a></li>
                <li><a href="admin-doc-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">

                    <span>
                        <table class="tbl-main-patient" id="tbl-main-patient" style="margin-top:-50px;">
                            <thead>
                                <tr>
                                    <td>Order ID</td>
                                    <td>Contact Number</td>
                                    <td>Order Status</td>
                                    <td>View Details</td>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><input type="text" class="search-patient" name="patient-id" placeholder="search order id" id="order_id"  autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="phone-no" placeholder="search contact number" id="contact_no"  autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="status" placeholder="search order status" id="order_status"  autofocus="true" /></td>
                                        <td></td>
                                    </tr>
                                    <?php 
                                //    if($result){
                                //     while ($row = mysqli_fetch_array($result)) {

                                   ?>
                                <tr>
                                            <td></td>
                                            
                                            <td></td>
                                            <td>
                                               
                                                <?php
                                               
                                                ?>

                               
                                            </td>
                                            <td><button class="btn-view-patient-detail" ><span>Order Details</span></button></td>
                                        </tr>
                                        <?php 
                                
                                  
                                        ?>
    
                          
                            </tbody>
                        </table>
                    </span>

                </div>
            </div>
        </div>
</body>

</html>