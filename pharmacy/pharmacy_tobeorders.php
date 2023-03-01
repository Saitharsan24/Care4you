<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
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
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php"><div class="highlighttext">Order History</div></a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
        
        <div class="right-button">
            <a href="pharmacy_pendingorders.php"><button class="btn-press">Pending</button></a>
            <button class="btn-pressed"><div class="pressedtext">To be delivered</div></button>
            <a href="pharmacy_completeorders.php"><button class="btn-press">Completed</button></a><br /><br />
            <a href="pharmacy_orderhistory.php"><div class="cleartext">Clear filters &#10006;</div>
        </div>
            <div class="info">
            <span>
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
                        <tr>
                            <td>04</td>
                            <td>Ms. Sivamayoury</td>
                            <td>16/11/2022</td>
                            <td><button class="btn-green">Success</button></td>
                            <td><button class="btn-vieworder"><span>View Order Details</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>