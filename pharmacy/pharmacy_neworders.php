<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>Pharmacy</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.png" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="#">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Order ID</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Ordered Date</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>24</td>
                            <td>Mr. Sandakoon</td>
                            <td>14/11/2022</td>
                            <td><button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>13</td>
                            <td>Ms. Weerakoon</td>
                            <td>14/11/2022</td>
                            <td><button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>42</td>
                            <td>Mr. Thanushan</td>
                            <td>15/11/2022</td>
                            <td><button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button></td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>55</td>
                            <td>Ms. Sivamayoury</td>
                            <td>15/11/2022</td>
                            <td><button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button></td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>65</td>
                            <td>Mr. Jonathan</td>
                            <td>15/11/2022</td>
                            <td><button class="btn-blue1"><a href="pharmacy_vieworder.php">View Order</a></button></td>
                        </tr>
                    </tbody>
                </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>