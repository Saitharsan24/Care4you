<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    $id = $_GET['id'];
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
            <div class="back" onclick="location.href='pharmacy_vieworder.php?id=<?php echo $id ?>'">
            <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="info">
            <?php
            
                //Query to get all data from tbl_respondedorder for selected order
                $sql = "SELECT * FROM tbl_respondedorders WHERE order_id=$id";
                //Exeute the Query                                    
                $res = mysqli_query($conn, $sql);

                //Check Query executed or not
                if($res == TRUE)
                {
                    $count =mysqli_num_rows($res);
                    if($count == 1)
                    {
                        //echo "Order Available";
                        $row = mysqli_fetch_assoc($res);
                        $order_id = $row['order_id'];
                        $pname = $row['pname'];
                        $prescription_name = $row['prescription_name'];
                        $remarks = $row['remarks'];
                        $unavailablemedicines = $row['unavailablemedicines'];
                        $nettotal =  $row['nettotal'];

                    }
                }
            ?>  
            <div class="back" onclick="location.href='pharmacy_vieworder.php?id=<?php echo $id; ?>'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <table class="tbl-respond">             
            <form>
                <tr>
                    <td class="tdtype1">Order ID :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="order_id" required="" autofocus="true" value="<?php echo $order_id; ?>"readonly/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Patient Name :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="pname" required="" autofocus="true" value="<?php echo $pname; ?>"readonly/></td>
                </tr>
                <tr>
                    <td class="tdtype1" style="vertical-align:top;">Prescription :</td>
                    <td class="tdtype2">
                    <?php
                            //Check whether the prescription name is available or not
                            if($prescription_name!= "")
                            {
                                //Prescription availabl-3-+
                                ?>
                                <?php
                                    //Get the extension of the prescription
                                    $tmp = explode('.',$prescription_name);
                                    $ext = end($tmp);
                                    //echo $ext;

                                    if($ext=='gif'||$ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='tiff')
                                    {
                                        ?>
                                        <a title="Open in new window" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                        <img src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" width="400px">
                                        </a>
                                        <?php
                                    }
                                    else if($ext=='pdf')
                                    {?>
                                        <iframe src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" frameborder="0" height="100%" width="100%" onclick="location.href='<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>'"></iframe>
                                        <a title="Open in new window" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                        <?php echo "Order".$order_id."-Prescription.".$ext; ?>
                                        </a>
                                    <?php }
                                    else
                                    {
                                        ?>
                                        <a href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                        <?php echo "Order".$order_id."-Prescription.".$ext; ?>
                                        </a>
                                        <?php
                                    }
                            }
                            else
                            {
                                //Prescription not available
                                echo "<div class='error'>Prescription not available</div>";
                            }
                        ?>
                    </td>
                </tr>
                
                <?php
                if($remarks != "")
                    {
                        ?>
                        <tr>
                            <td class="tdtype1">Remarks :</td>
                            <td class="tdtype2"><input type="text" class="form-repondcontrol" name="remarks" required="" autofocus="true" value="<?php echo $remarks; ?>"readonly/></td>
                        </tr>
                        <?php
                    }
                    else
                    {
                        ?>
                        <tr>
                            <td class="tdtype1">Remarks :</td>
                            <td class="tdtype2"><input type="text" class="form-repondcontrol-gray" name="remarks" required="" autofocus="true" value="No any remarks to display"readonly/></td>
                        </tr>
                        <?php
                    }
                ?>
                <tr>
                    <td class="tdtype1">Available Medicines :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td colspan="2" class="tdtype1">
                        <table class="tbl-addmed">
                            <thead>
                                <tr>
                                    <td>Drug Name</td>
                                    <td>Unit Price (Rs.)</td>
                                    <td>Quantity</td>
                                    <td>Total (Rs.)</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    //Query to get all data from tbl_addmedicine table
                                    $sql = "SELECT * FROM tbl_addmedicine WHERE order_id=$order_id";

                                    //Exeute the Query                                    
                                    $res = mysqli_query($conn, $sql);

                                    //Check Query executed or not
                                    if($res == TRUE){

                                        //Count rows in tbl_addmedicine table
                                        $count = mysqli_num_rows($res);     //funtion to get all rows in tbl_addmedicine table
                                        
                                        //Check the number of rows
                                        if($count > 0)
                                        {
                                            while($rows = mysqli_fetch_assoc($res))
                                            {

                                                //Use while loop to get all data in tbl_addmedicine table
                                                $drugname = $rows['drugname'];
                                                $unitprice = $rows['unitprice'];
                                                $quantity = $rows['quantity'];
                                                $total = $rows['total'];

                                                //Display the Values in Table
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $drugname ?></td>
                                                    <td><?php echo $unitprice ?></td>
                                                    <td><?php echo $quantity ?></td>
                                                    <td><?php echo $total ?></td>
                                                </tr>
                                                
                                                <?php

                                            }

                                        }
                                        else
                                        {
                                            //Have no data in tbl_addmedicine table
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="tdtype1">Unavailable Medicines :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="unavailablemedicines" autofocus="true" value="<?php echo $unavailablemedicines; ?>"readonly/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Net Total (Rs.) :</td>
                    <td class="tdtype2"><input type="number" min="0" class="form-repondcontrol" name="total" required="" autofocus="true" value="<?php echo $nettotal; ?>"readonly/></td>
                </tr>
            </table>
            </form>
            </div>
        </div>
    </div>
</body>
</html>