<?php include('../config/constants.php'); ?>
<?php include('admin_getinfo.php') ?>

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
</head>
<?php
$id = $_GET['id'];   //get the ID form admin-order-view.php page
$query = "SELECT * FROM tbl_neworder WHERE order_id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


if(isset($_GET['cancel'])){
    $order_id = $_GET['cancel'];
    $query_del = "UPDATE tbl_neworder
    SET order_status = 5
    WHERE order_id = $order_id";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-order-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }
  
?>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patient</a></li>
                <li><a href="admin-order-view.php"><div class="highlighttext"></div>Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="back" onclick="location.href='admin-order-view.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>
                <div class="order-title-detail" id="id"> Order Details</div>

                <table class="view-order" id="tbl-main-order">
                    <tr>
                        <td class="typeR">Order ID :</td>
                        <td class="typeL"><?php echo $row['order_id']; ?> </td>

                    </tr>
                    <tr>
                        <td class="typeR"> Name :</td>
                        <td class="typeL"><?php echo $row['pname']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Address :</td>
                        <td class="typeL"><?php echo $row['paddress']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Contact No :</td>
                        <td class="typeL"><?php echo $row['contactnumber']; ?> </td>

                    </tr>
                    <tr>
                        <td class="typeR">Order date :</td>
                        <td class="typeL"><?php echo $row['orderdate']; ?></td>
                    </tr>
                   

                    <tr>
                        <td class="typeR">Nic No :</td>
                        <td class="typeL"><?php echo $row['nic']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Other Item :</td>
                        <td class="typeL"><?php echo $row['remarks']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Other Status :</td>
                        <td class="typeL">
                            <?php
                            if ($row['order_status'] == 0) {
                                echo '<button class="btn-rpending"> Response pending </button>';
                            } else if ($row['order_status'] == 1) {
                                echo '<button class="btn-ppending"> Payment pending</button>';
                            } else if ($row['order_status'] == 2) {
                                echo '<button class="btn-confirmed"> Order Confirm </button>';
                            } else if ($row['order_status'] == 3) {
                                echo '<button class="btn-dispatch"> Order Dispatched</button>';
                            } else if ($row['order_status'] == 4) {
                                echo '<button class="btn-deliver">Delivered </button>';
                            } else if ($row['order_status'] == 5) {
                                echo '<button class="btn-cancelled"> Cancelled </button>';
                            }
                            ?>
                        </td>
                    </tr>
         <tr >
            <td>
                <?php
                if ($row['order_status'] == 0||$row['order_status'] == 1||$row['order_status'] == 2) {



                    $status = "cancel";
                    include('./admin-order-pop.php');

                ?>

                    <button class="btn-cancel" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['order_id'] ?>&cancel=<?php echo $row['order_id'] ?> ';
                                ">
                        <i class="fa-solid fa-toggle-off"></i>
                        Cancel
                    </button>

                <?php
                }
                ?>
                </td>
             </tr>
            </table>
            </div>
        </div>
</body>

</html>