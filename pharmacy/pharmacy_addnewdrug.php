<?php include('../config/constants.php')?>
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
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php"><div class="highlighttext">Drug Stock</div></a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <form action="" method="POST">
                <table class="tbl-addmedform">
                    <tr>
                        <td colspan ="2" style="text-align: center; color: #083746; font-size: 18px; font-weight: 700;"> 
                        Add New Drug to System <br />
                        <span style="text-align: left; color: red; font-size: 16px; font-weight: 700;">
                        ***
                        </span>
                        <span style="text-align: left; color: #000000; font-size: 12px; font-weight: 500;">
                        when entering same drug with different strengths enter strength alone with drugname in drugname field
                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Drug Name :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="name" required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Drug Strength :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="strength" required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Quantity :</td>
                        <td class="tdtype2"><input type="number" class="form-addmedcontrol" name="qty" required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Unit Price (Rs.):</td>
                        <td class="tdtype2"><input type="number" class="form-addmedcontrol" step="any" name="price" required/></td>
                    </tr>
                </table>
            <br /> <br />
            <button type="submit" name="add" class="btn-blue">Add Drug</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html

<?php

    //Process the value from form and save it in Database

    //Check Submit Button is Clicked or Not?

    if(isset($_POST['add']))
    {
        //Submit Button is Clicked
        //echo "<p>Button Clicked</p>";

        //Step 01 - Get the data from the form
        $name = $_POST['name'];
        $strength = $_POST['strength'];
        $quantity = $_POST['qty'];
        $unitprice = $_POST['price'];
        

        //Calculate total using unitprice and quantity
        // $total = $unitprice * $quantity;
        //----------

        //Step 02 - SQL Query to save the data in Database
        $sql = "INSERT INTO tbl_medicine SET 
                med_name = '$name',
                strength ='$strength',
                quantity = '$quantity',                
                unit_price = '$unitprice'
                ";
        echo $sql;

        //Step 03 - Execute the Query and save data in Database
        include ('../config/constants.php');

        $res = mysqli_query($conn , $sql) or die(mysqli_error($conn));

        //Step 04 - Check data is inserted (Query executed) or not & Disply Message
        if($res == TRUE){

            //Data inserted
            //echo "Data Inserted";

            //Create Session Variable to display message
            $_SESSION['add-drug'] = '<div class="success"> New Drug Added to System Successfully</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'pharmacy/pharmacy_stock.php');

        }
        else{

            //Data not inserted
            //echo "Fail to Insert Data";

            //Create Session Variable to display message
            $_SESSION['add-drug'] = '<div class="error"> Failed to Add New Drug to System</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'pharmacy/pharmacy_stock.php');

        }

    }

?>