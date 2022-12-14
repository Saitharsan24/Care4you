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
            <form action="">
                <table class="tbl-addmedform">
                    <tr>
                        <td class="tdtype1">Drug Name :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="drugnaame" required="" autofocus="true"/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Unit Price (Rs.) :</td>
                        <td class="tdtype2"><input type="number" min="0" class="form-addmedcontrol" name="unitprice" required="" autofocus="true"/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Quantity :</td>
                        <td class="tdtype2"><input type="number" min="0" class="form-addmedcontrol" name="quantity" required="" autofocus="true"/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Total (Rs.) :</td>
                        <td class="tdtype2"><input type="number" min="0" class="form-addmedcontrol" name="total" required="" autofocus="true"/></td>
                    </tr>
                </table>
            <br /> <br />
            <a href="pharmacy_respond.php"><button type="submit" class="btn-blue">Add</button></a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>