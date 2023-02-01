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
                <li><a href="pharmacy_neworders.php"><div class="highlighttext">New Orders</div></a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="logout.php">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <form action="" method="POST">
                <table class="tbl-addmedform">
                    <tr>
                        <td colspan ="2" style="text-align: center; color: #083746; font-size: 18px; font-weight: 700;"> Add Available Medicines to Order</td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Order ID :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="orderid" /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Drug Name :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="drugname" /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Unit Price (Rs.) :</td>
                        <td class="tdtype2"><input type="number" min="0"  step="any" class="form-addmedcontrol" name="unitprice" /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Quantity :</td>
                        <td class="tdtype2"><input type="number" min="0" class="form-addmedcontrol" name="quantity" /></td>
                    </tr>
                </table>
            <br /> <br />
            <button type="submit" name="add" class="btn-blue">Add</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    //Process the value from form and save it in Database

    //Check Submit Button is Clicked or Not?

    if(isset($_POST['add']))
    {
        //Submit Button is Clicked
        //echo "<p>Button Clicked</p>";

        //Step 01 - Get the data from the form
        $orderid = $_POST['orderid'];
        $drugname = $_POST['drugname'];
        $unitprice = $_POST['unitprice'];
        $quantity = $_POST['quantity'];

        //Calculate total using unitprice and quantity
        $total = $unitprice * $quantity;
        //----------

        //Step 02 - SQL Query to save the data in Database
        $sql = "INSERT INTO tbl_addmedicine SET
                orderid = '$orderid',
                drugname = '$drugname',
                unitprice = '$unitprice',
                quantity = '$quantity',
                total = '$total'
                ";
        //echo $sql;

        //Step 03 - Execute the Query and save data in Database
        include ('../config/constants.php');

        $res = mysqli_query($conn , $sql) or die(mysqli_error($conn));

        //Step 04 - Check data is inserted (Query executed) or not & Disply Message
        if($res == TRUE){

            //Data inserted
            //echo "Data Inserted";

            //Create Session Variable to display message
            //$_SESSION['add'] = '<div class="success"> Medicine Added to Order</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'pharmacy/pharmacy_respond.php');

        }
        else{

            //Data not inserted
            //echo "Fail to Insert Data";

            //Create Session Variable to display message
            //$_SESSION['add'] = '<div class="error"> Failed to Add Medicine to Order</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'pharmacy/pharmacy_respond.php');

        }

    }

?>