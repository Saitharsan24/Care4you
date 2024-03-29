<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 

    $btn_all = $btn_pending = $btn_tobe = $btn_complete = 'btn-press';

    if(!isset($_GET['pendingid']) && !isset($_GET['tobeid']) && !isset($_GET['completeid'])){
        $sql = "SELECT * FROM tbl_respondedorders ";

        $result = mysqli_query($conn, $sql);

        $btn_all = "btn-press";

    }
    if(isset($_GET['pendingid'])){

        $pending_id = $_GET['pendingid'];
        $sql = "SELECT * FROM tbl_respondedorders WHERE order_status=1";

        $result = mysqli_query($conn, $sql);

        $btn_pending = "btn-pressed";

    }  if( isset($_GET['tobeid'])){
        
        $tobe_id = $_GET['tobeid'];
        $sql = "SELECT * FROM tbl_respondedorders WHERE order_status=2";

        $result = mysqli_query($conn, $sql);

        $btn_tobe = "btn-pressed";

    } if( isset($_GET['dispatchid'])) {

        $complete_id = $_GET['dispatchid'];
        $sql = "SELECT * FROM tbl_respondedorders WHERE order_status=3";

        $result = mysqli_query($conn, $sql);

        $btn_complete = "btn-pressed";

    } if( isset($_GET['completedid'])) {

        $complete_id = $_GET['completedid'];
        $sql = "SELECT * FROM tbl_respondedorders WHERE order_status=4";

        $result = mysqli_query($conn, $sql);

        $btn_complete = "btn-pressed";
    } if( isset($_GET['cancelledid'])) {

        $complete_id = $_GET['cancelledid'];
        $sql = "SELECT * FROM tbl_respondedorders WHERE order_status=5";

        $result = mysqli_query($conn, $sql);

        $btn_complete = "btn-pressed";
    }
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>Pharmacy</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('pharmacy_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php"><div class="highlighttext">Order History</div></a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
        <div class="info">
            <div class="order-filter-btn2">
                <div class="right-button order-filter-main-btn2">
                    <a href="?pendingid "><button class="btn-press <?php echo $btn_pending?>" name="pendingpayment">Pending</button></a>
                    <a href="?tobeid"><button class="btn-press <?php echo $btn_tobe ?>" name="tobedelivered">To be delivered</button></a>
                    <a href="?dispatchid"><button class="btn-press <?php echo $btn_complete ?>" name="complete">Dispatched</button></a>
                    <a href="?completedid"><button class="btn-press <?php echo $btn_complete ?>" name="complete">Delivered</button></a>
                    <a href="?cancelledid"><button class="btn-press <?php echo $btn_complete ?>" name="complete">Cancelled</button></a>
                </div>

                <?php 
                    if(isset($_GET['pendingid']) || isset($_GET['tobeid']) || isset($_GET['completeid'])){ ?>
                        <div class="clearfilt-order"><a href="./pharmacy_orderhistory.php"><i class="fa-solid fa-circle-xmark" style="color: #0d5c75;"></i>clear filter</a></div>
                <?php }?>

            </div>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Order ID</td>
                            <td>Patient Name</td>
                            <td>Respond Date</td>
                            <td>Payment Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['responddate']; ?></td>

                        <?php
                             if($row['order_status'] == 1) { ?>
                                <td><button class="st01"> <?php echo 'Payment Pending';?> </button></td>
                        <?php
                            } else if($row['order_status'] == 2) { ?>
                                <td><button class="st02"> <?php echo 'To be Delivered'; ?> </button></td>
                        <?php   
                            } else if($row['order_status'] == 3) { ?>
                                <td><button class="st03"> <?php echo 'Dispatched'; ?> </button></td>
                        <?php
                            } else if($row['order_status'] == 4) { ?>
                                <td><button class="st04"> <?php echo 'Delivered'; ?> </button></td>
                        <?php 
                            } else { ?>
                                <td><button class="st05"> <?php echo 'Cancelled'; ?> </button></td>
                        <?php
                            } 
                            ?>
                            <td><a href="./pharmacy_vieworder.php?id=<?php echo $row['order_id'];?>"><button class="btn-vieworder"><span>View Details</span></button></a></td>
                        </tr>
                        <?php } ?>

                        <?php
                            } else {
                        ?>
                            <h3>No orders yet</h3>
                        <?php
                            }
                        ?>                            

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>