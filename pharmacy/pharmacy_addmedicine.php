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
<?php include('pharmacy_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php"><div class="highlighttext">New Orders</div></a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <?php
                //Get the Order ID
                $id = $_GET['id'];
                //Query to get all data from tbl_neworder for selected order
                $sql3 = "SELECT order_id FROM tbl_neworder WHERE order_id=$id";
                //Exeute the Query                                    
                $res3 = mysqli_query($conn, $sql3);

                //Check Query executed or not
                if($res3 == TRUE)
                {
                    $count =mysqli_num_rows($res3);
                    if($count == 1)
                    {
                        //echo "Order Available";
                        $row = mysqli_fetch_assoc($res3);
                        $order_id = $row['order_id'];
                    }
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-addmedform">
                    <tr>
                        <td colspan ="2" style="text-align: center; color: #083746; font-size: 18px; font-weight: 700;"> Add Available Medicines to Order</td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Order ID :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="orderid" value="<?php echo $order_id; ?>"readonly/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Drug Name :</td>
                        <td class="tdtype2">
                            <!-- <input type="text" class="form-addmedcontrol" name="drugname" /> -->
                            <select name="drugname" id="drugname" class="form-addmedcontrol">
                                <?php

                                    $query ="SELECT medicine_id,med_name FROM tbl_medicine ORDER BY med_name ASC";
                                    $result = mysqli_query($conn,$query);
                                    $count = mysqli_num_rows($result);

                                    if($count > 0)
                                    {
                                        while($optionData=mysqli_fetch_assoc($result))
                                        {
                                        $option =$optionData['med_name'];
                                        $id =$optionData['medicine_id'];
                                ?>
                                <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                                <?php
                                        }
                                    }
                                ?>                                
                            </select>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="tdtype1">Unit Price (Rs.) :</td>
                        <td class="tdtype2"><input type="number" min="0"  step="any" class="form-addmedcontrol" name="unitprice" /></td>
                    </tr> -->
                    <tr>
                        <td class="tdtype1">Strength :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="strength" placeholder="100mg"/></td>
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
        $strength = $_POST['strength'];
        $quantity = $_POST['quantity'];

        //Step 02- Check the quantity amount is valid or not
        $qtyqry = "SELECT quantity FROM tbl_medicine WHERE med_name='$drugname' AND strength='$strength'";
        $rsltdata = mysqli_query($conn, $qtyqry);
        if($rsltdata == TRUE)
        {
            $rowdata = mysqli_fetch_assoc($rsltdata);
            $validqty = $rowdata['quantity'];
            //echo $validqty;
        }
        else
        {
            //Have no data 
        }

        if($validqty >= $quantity)
        {
            //Update medicine table by reducing quantity
            $newqty = $validqty - $quantity;

            $sql2 = "UPDATE tbl_medicine SET quantity='$newqty' WHERE med_name='$drugname' AND strength='$strength'";
            $res2 = mysqli_query($conn, $sql2);

            //Get unit price from database
            $unitpriceqry = "SELECT unit_price FROM tbl_medicine WHERE med_name='$drugname' AND strength='$strength'";
            $rslt = mysqli_query($conn, $unitpriceqry);
            if($rslt == TRUE)
            {
                $row = mysqli_fetch_assoc($rslt);
                $unitprice = $row['unit_price'];
                // echo $unitprice;
            }
            else
            {
                //Have no data 
            }

            //Calculate total using unitprice and quantity
            $total = $unitprice * $quantity;
            //----------

            //Step 03 - SQL Query to save the data in Database
            $sql = "INSERT INTO tbl_addmedicine SET
                    orderid = '$orderid',
                    drugname = '$drugname',
                    strength = '$strength',
                    unitprice = '$unitprice',
                    quantity = '$quantity',
                    total = '$total'
                    ";
            //echo $sql;

            //Step 04 - Execute the Query and save data in Database
            // include ('../config/constants.php');

            $res = mysqli_query($conn , $sql) or die(mysqli_error($conn));

            //Step 05 - Check data is inserted (Query executed) or not & Disply Message
            if($res == TRUE)
            {
                //Data inserted
                //echo "Data Inserted";

                //Create Session Variable to display message
                $_SESSION['add'] = '<div class="success"> Medicine Added to Order</div>';
                $_SESSION['id'] = $order_id;
                //Redirect to the pharmacy_respond.php page
                //header("location:".SITEURL.'pharmacy/pharmacy_respond.php');
                echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond2.php';</script>";

            }
            else{

                //Data not inserted
                //echo "Fail to Insert Data";

                //Create Session Variable to display message
                $_SESSION['add'] = '<div class="error"> Failed to Add Medicine to Order</div>';
                $_SESSION['id'] = $order_id;
                //Redirect to the pharmacy_respond.php page
                //header("location:".SITEURL.'pharmacy/pharmacy_respond.php');
                echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond2.php';</script>";

            }

        }
        else
        {
            //No enough medicines
            //echo "No enough medicines";

            //Create Session Variable to display message
            $_SESSION['nomed'] = '<div class="error">There is currently insufficient amount of the required medicine! </div>';
            $_SESSION['id'] = $order_id;
            //Redirect to the pharmacy_respond.php page
            //header("location:".SITEURL.'pharmacy/pharmacy_respond.php');
            echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond2.php';</script>";            
        }
    }
?>