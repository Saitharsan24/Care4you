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
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <figure>
                <img src="../images/user.jpg" alt="user" class="imgframe">
                <figcaption style="margin-left: 55px;">Change Profile Picture</figcaption>
            </figure>
            <span>

            <?php
                
            ?>

            <form>
            <table class="formtable">
                <tr>
                    <td>Name :</td>
                    <td><input type="text" class="form-control" name="name" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" class="form-control" name="username" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Email Address :</td>
                    <td><input type="text" class="form-control" name="email" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>NIC Number :</td>
                    <td><input type="text" class="form-control" name="nic" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Contact Numer :</td>
                    <td><input type="text" class="form-control" name="contactnumber" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td></br><a href="pharmacy_changepassword.php"><div class="hrefmodtext">Change Password</div></a></td>
                </tr>
            </table>
            <button class="btn-blue" type="submit">Save Changes</button>
            </form>
            </span>
            </div>
        </div>
    </div>
</body>
</html>