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
<?php include('pharmacy_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php"><div>New Orders</div></a></li>
                <li><a href="pharmacy_orderhistory.php" class="highlighttext">Order History</a></li>
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
                        $orderdate = $row['orderdate'];
                        $prescription_name = $row['prescription_name'];
                        $remarks = $row['remarks'];
                    }
                }
            ?>
            <span>
            <table class="tbl-vieworder">
                <tr>
                    <td class="tdtype1">Order ID :</td>
                    <td class="tdtype2"><?php echo $order_id; ?></td>
                </tr>
                <tr>
                    <td class="tdtype1">Patient Name :</td>
                    <td class="tdtype2"><?php echo $pname; ?></td>
                </tr>
                <tr>
                    <td class="tdtype1">Address :</td>
                    <td class="tdtype2"><?php echo $orderdate; ?></td>
                </tr>
                <tr>
                    <td class="tdtype1">Contact No :</td>
                    <td class="tdtype2"><?php echo $orderdate; ?></td>
                </tr>
                <tr>
                    <td class="tdtype1">Ordered Date :</td>
                    <td class="tdtype2"><?php echo $orderdate; ?></td>
                </tr>
                <tr>
                    <td class="tdtype1">Order Stauts :</td>
                    <td class="tdtype2"><?php echo $orderdate; ?></td>
                </tr>
                <tr>
                    <td class="tdtype1" style="vertical-align:top;">Prescription :</td>
                    <td class="tdtype2">
                        <?php
                            //Check whether the prescription name is available or not
                            if($prescription_name!= "")
                            {
                                //Prescription available
                                ?>
                                <?php
                                    //Get the extension of the prescription
                                    $tmp = explode('.',$prescription_name);
                                    $ext = end($tmp);
                                    //echo $ext;

                                    if($ext=='gif'||$ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='tiff')
                                    {
                                        ?>
                                        <a href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                            <?php echo $prescription_name; ?>
                                        </a>
                                        <?php
                                    }
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
                <tr>
                    <td class="tdtype1">Other items :</td>
                    <td class="tdtype2">
                        <?php
                        if($remarks != "")
                        {
                            echo $remarks;
                        }
                        else
                        {
                            echo "<div class='grayouttext'>No any remarks to display</div>";
                        } 
                        
                        ?>
                    </td>
                </tr>
            </table>
            <br /> <br />
            <button class="btn-blue"><a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_respond.php?id=<?php echo $order_id;?>">View respond</a></button>
            </span>
            </div>
        </div>
    </div>
</body>
</html>