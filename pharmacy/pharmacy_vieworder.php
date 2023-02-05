<?php include('../config/constants.php') ?>
<?php include('./partials/login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>Pharmacy</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php"><div class="highlighttext">New Orders</div></a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
            <table class="tbl-vieworder">
                <tr>
                    <td class="tdtype1">Order ID :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Patient Name :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Ordered Date :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Prescription :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Remarks :</td>
                    <td class="tdtype2"></td>
                </tr>
            </table>
            <br /> <br />
            <button class="btn-blue"><a href="pharmacy_respond.php">Respond</a></button>
            </span>
            </div>
        </div>
    </div>
</body>
</html>