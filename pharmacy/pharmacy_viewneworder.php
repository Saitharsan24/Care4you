<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
    //Get the Order ID
    $id = $_GET['id'];
    //Query to get all data from tbl_neworder for selected order
    $sql = "SELECT * FROM tbl_neworder WHERE order_id=$id";
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
            $paddress = $row['paddress'];
            $contactnumber = $row['contactnumber'];
            $prescription_name = $row['prescription_name'];
            $remarks = $row['remarks'];
            $order_status = $row['order_status'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy-orders.css"> 
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
                <li><a href="pharmacy_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content" style="overflow: hidden;"> 
            <div class="info">

            <div class="back" onclick="location.href='pharmacy_neworders.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                <i class="fa-solid fa-pager" style="font-size: 35px;"></i>
                    &nbsp; Order Details
                </div>
            </div>

            <?php
                //Check whether the prescription name is available or not
                if($prescription_name!= "")
                {
                    //Prescription available
                    //Get the extension of the prescription
                    $tmp = explode('.',$prescription_name);
                    $ext = end($tmp);
                    //echo $ext;

                    if($ext=='gif'||$ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='tiff')
                    {
                        ?>
                        <div class="containorL1">
                            <div class="containorSL">
                                <div class="idtxt">Order ID : <?php echo $order_id; ?> </div>

                                <br/>

                                <div class="headtxt">Patient Name</div>
                                <div class="datatxt"><?php echo $pname; ?></div>

                                <div class="headtxt">Patient Address</div>
                                <div class="datatxt"><?php echo $paddress; ?></div>                   
                                
                                <div class="headtxt">Contact Number</div> 
                                <div class="datatxt"><?php echo '0'.$contactnumber; ?></div>                   
                                
                                <div class="headtxt">Order Status</div> 
                                <div class="datatxt">
                                    <?php
                                        if($order_status == 0) { ?>
                                            <button class="btn-yellow"> <?php echo 'Payment Pending';?> </button>
                                    <?php
                                        } else if($order_status == 1) { ?>
                                            <button class="btn-green"> <?php echo 'Payment Completed'; ?> </button>
                                    <?php
                                        } ?>
                                </div>  
                                
                                <div class="headtxt">Other Items</div> 
                                <div class="datatxt">
                                    <?php
                                        if($remarks != ""){
                                            echo $remarks;
                                        }
                                        else{
                                            echo "<div class='grayouttext'>No any other items ordered</div>";
                                        } 
                                    ?>
                                </div>

                            </div>
                            <div class="containorSR">
                                <a href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" download>
                                    <img src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" class="containorSR" style="width:90%; max-height:60vh;">
                                </a>
                                <a class="datatxt2-link" title="Open Prescription in New Window" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                    <?php echo "Order".$order_id." - Prescription.".$ext; ?> &nbsp;
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                            </div>
                        </div>
                        <a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_respond.php?id=<?php echo $order_id;?>">
                            <button class="btn-respond"><span>Respond to Order &nbsp;</span></button>
                        </a>
                        <?php
                    }
                    elseif ($ext=='pdf')
                    {
                        ?>
                        <div class="containorL1">
                            <div class="containorSL">
                                <div class="idtxt">Order ID : <?php echo $order_id; ?> </div>

                                <br/>

                                <div class="headtxt">Patient Name</div>
                                <div class="datatxt"><?php echo $pname; ?></div>

                                <div class="headtxt">Patient Address</div>
                                <div class="datatxt"><?php echo $paddress; ?></div>                   
                                
                                <div class="headtxt">Contact Number</div> 
                                <div class="datatxt"><?php echo '0'.$contactnumber; ?></div>                   
                                
                                <div class="headtxt">Order Status</div> 
                                <div class="datatxt">
                                    <?php
                                        if($order_status == 0) { ?>
                                            <button class="btn-yellow"> <?php echo 'Payment Pending';?> </button>
                                    <?php
                                        } else if($order_status == 1) { ?>
                                            <button class="btn-green"> <?php echo 'Payment Completed'; ?> </button>
                                    <?php
                                        } ?>
                                </div>  
                                
                                <div class="headtxt">Other Items</div> 
                                <div class="datatxt">
                                    <?php
                                        if($remarks != ""){
                                            echo $remarks;
                                        }
                                        else{
                                            echo "<div class='grayouttext'>No any other items ordered</div>";
                                        } 
                                    ?>
                                </div>

                            </div>
                            <div class="containorSR">
                                <iframe src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" frameborder="0" class="containorSR" style="width:90%;min-height:60vh;" onclick="location.href='<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>'">
                                </iframe>
                                <a class="datatxt2-link" title="Open Prescription in New Window" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                    <?php echo "Order".$order_id." - Prescription.".$ext; ?> &nbsp;
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                            </div>
                        </div>
                        <a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_respond.php?id=<?php echo $order_id;?>">
                            <button class="btn-respond"><span>Respond to Order &nbsp;</span></button>
                        </a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="containorL2">
                            <div class="containorSL">
                                <div class="idtxt">Order ID : <?php echo $order_id; ?> </div>

                                <br/>

                                <table class="tbl-pdf">
                                    <tr>
                                        <td class="typeR"><div class="headtxt">Patient Name : </div></td>
                                        <td class="typeL"><div class="datatxt2"><?php echo $pname; ?></div></td>
                                    </tr>
                                    <tr>
                                        <td class="typeR"><div class="headtxt">Patient Address : </div></td>
                                        <td class="typeL"><div class="datatxt2"><?php echo $paddress; ?></div></td>
                                    </tr>
                                    <tr>
                                        <td class="typeR"><div class="headtxt">Contact Number : </div></td>
                                        <td class="typeL"><div class="datatxt2"><?php echo '0'.$contactnumber; ?></div></td>
                                    </tr>
                                    <tr>
                                        <td class="typeR"><div class="headtxt">Prescription : </div></td>
                                        <td class="typeL">
                                        <div class="datatxt2">
                                            <a class="datatxt2-link" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" download>
                                                <?php echo "Order".$order_id." - Prescription.".$ext; ?> &nbsp;
                                                <i class="fa-solid fa-file-arrow-down"></i>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="typeR"><div class="headtxt">Order Status : </div></td>
                                        <td class="typeL">
                                        <div class="datatxt2">
                                            <?php
                                                if($order_status == 0) { ?>
                                                    <button class="btn-yellow"> <?php echo 'Payment Pending';?> </button>
                                            <?php
                                                } else if($order_status == 1) { ?>
                                                    <button class="btn-green"> <?php echo 'Payment Completed'; ?> </button>
                                            <?php
                                                } ?>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="typeR"><div class="headtxt">Other Items : </div></td>
                                        <td class="typeL">
                                        <div class="datatxt2" style="margin-top:-22px;">
                                            <?php
                                                if($remarks != ""){
                                                    echo $remarks;
                                                }
                                                else{
                                                    echo "<div class='grayouttext'>No any other items ordered</div>";
                                                } 
                                            ?>
                                        </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_respond.php?id=<?php echo $order_id;?>">
                            <button class="btn-respond"><span>Respond to Order &nbsp;</span></button>
                        </a>
                        <?php
                    }
                }
                else
                {
                    //Prescription not available
                    ?>
                        <div class="containorL1">
                            <div class="containorSL">
                                <div class="idtxt">Order ID : <?php echo $order_id; ?> </div>

                                <br/>

                                <div class="headtxt">Patient Name</div>
                                <div class="datatxt"><?php echo $pname; ?></div>

                                <div class="headtxt">Patient Address</div>
                                <div class="datatxt"><?php echo $paddress; ?></div>                   
                                
                                <div class="headtxt">Contact Number</div> 
                                <div class="datatxt"><?php echo '0'.$contactnumber; ?></div>                   
                                
                                <div class="headtxt">Order Status</div> 
                                <div class="datatxt">
                                    <?php
                                        if($order_status == 0) { ?>
                                            <button class="btn-yellow"> <?php echo 'Payment Pending';?> </button>
                                    <?php
                                        } else if($order_status == 1) { ?>
                                            <button class="btn-green"> <?php echo 'Payment Completed'; ?> </button>
                                    <?php
                                        } ?>
                                </div>  
                                
                                <div class="headtxt">Other Items</div> 
                                <div class="datatxt">
                                    <?php
                                        if($remarks != ""){
                                            echo $remarks;
                                        }
                                        else{
                                            echo "<div class='grayouttext'>No any other items ordered</div>";
                                        } 
                                    ?>
                                </div>

                            </div>
                            <div class="containorSR">
                                <div class="warntext">
                                    Prescription Unavailable or Not Uploded! <br/>
                                    Please inform customer and cancel the order.
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_respond.php?id=<?php echo $order_id;?>">
                            <button class="btn-respond"><span>Respond to Order &nbsp;</span></button>
                        </a>
                    <?php

                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>