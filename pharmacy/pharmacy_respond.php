<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

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

            <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);

                }
                if(isset($_SESSION['nomed'])){
                    echo $_SESSION['nomed'];
                    unset($_SESSION['nomed']);

                }
                if(isset($_SESSION['med-respond2'])){
                    echo $_SESSION['med-respond2'];
                    unset($_SESSION['med-respond2']);

                }
                if(isset($_SESSION['nomedmsg-respond'])){
                    echo $_SESSION['nomedmsg-respond'];
                    unset($_SESSION['nomedmsg-respond']);

                }
                if(isset($_SESSION['nomed-respond2'])){
                    echo $_SESSION['nomed-respond2'];
                    unset($_SESSION['nomed-respond2']);

                }
            ?>
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

            <div class="back" onclick="location.href='<?php echo SITEURL;  ?>/pharmacy/pharmacy_viewneworder.php?id=<?php echo $order_id;?>'">
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
                        <div class="containorLarge">
                            <div class="containorSLeft">
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
                            <div class="containorSRight">
                                <a href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" download>
                                    <img src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" class="containorSR" style="width:90%; max-height:60vh;">
                                </a>
                                <a class="datatxt2-link" title="Open Prescription in New Window" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                    <?php echo "Order".$order_id." - Prescription.".$ext; ?> &nbsp;
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                            </div>
                            <?php include('pharmacy_tbl-addmed.php') ?>
                        </div>
                        <?php
                    }
                    elseif ($ext=='pdf')
                    {
                        ?>
                        <div class="containorLarge">
                            <div class="containorSLeft">
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
                            <div class="containorSRight">
                                <iframe src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" frameborder="0" class="containorSR" style="width:90%;min-height:60vh;" onclick="location.href='<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>'">
                                </iframe>
                                <a class="datatxt2-link" title="Open Prescription in New Window" href="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" target="_blank">
                                    <?php echo "Order".$order_id." - Prescription.".$ext; ?> &nbsp;
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                            </div>
                            <?php include('pharmacy_tbl-addmed.php') ?>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="containorLargetxt">
                            <div class="containorSL" style="margin-right:5; min-width:45%;">
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
                            <?php include('pharmacy_tbl-addmed.php') ?>
                        </div>
                        <?php
                    }
                }
                else
                {
                    //Prescription not available
                    ?>
                        <div class="containorLarge">
                            <div class="containorSLeft">
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
                            <div class="containorSRight">
                                <div class="warntext">
                                    Prescription Unavailable or Not Uploded! <br/>
                                    Please inform customer to cancel the order.
                                </div>
                            </div>
                            <?php include('pharmacy_tbl-addmed.php') ?>
                        </div>
                    <?php

                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    //Process the value from form and save it in Database

    //Check sendrespond Button is Clicked or Not?
    if(isset($_POST['sendrespond']))
    {
        //Get the data from the form
        $unavailablemedicines = $_POST['unavailablemedicines'];

        //Query to check medicines are added or not
        $sql3 = "SELECT * FROM tbl_addmedicine WHERE order_id=$order_id";
        $res3 = mysqli_query($conn, $sql3);

        if($res3 == TRUE)
        {
            //Count if medicines added or not
            $medadded_count = mysqli_num_rows($res3);

            if($medadded_count > 0)
            {
                $medadded = TRUE;
                //Medicines Added to order
                 
                //01.empty remarks convert
                if($temp =="No any remarks to display"){
                    $remarks = "";
                }
                else{
                    $remarks = $temp;
                }

                //02.get the responded date
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d/m/Y');
                $time = date('h:i:sA');

                //03.get remain order details from neworder table
                $sql2 = "SELECT * FROM tbl_neworder WHERE order_id=$order_id";
                $res2 = mysqli_query($conn, $sql2);

                if($res2 == TRUE)
                {
                    $count2 = mysqli_num_rows($res2);
                    if($count2 == 1)
                    {
                        $row = mysqli_fetch_assoc($res2);
                        $paddress = $row['paddress'];
                        $contactnumber = $row['contactnumber'];
                        $prescription_name = $row['prescription_name'];
                        $orderdate = $row['orderdate'];
                        $ordertime = $row['ordertime'];
                        $puserid = $row['userid'];
                        $pnic = $row['nic'];
                    }
                }

                //04.Calculate total
                $sql3 = "SELECT * FROM tbl_addmedicine WHERE order_id=$order_id";
                $res3 = mysqli_query($conn, $sql3);

                if($res3 == TRUE)
                {
                    $count3 = mysqli_num_rows($res3);
                    if($count3 > 0)
                    {
                        $total =0;
                        $nettotal =0;
                        while($row2 = mysqli_fetch_assoc($res3))
                        {
                            $total = $row2['total'];
                            $nettotal = $nettotal + $total; 
                        }
                    }
                    else
                    {
                        $nettotal = 0;
                    }
                }

                //05.define order stataus
                $order_status = 1;

                //06. define nomedicine flag to 0
                $nomedicine = 0;

                //Save in respondedorders table
                $medaddsql = "INSERT INTO tbl_respondedorders SET 
                order_id = '$order_id',
                pname ='$pname',
                paddress = '$paddress',                
                contactnumber = '$contactnumber',
                prescription_name ='$prescription_name',
                remarks ='$remarks',
                orderdate ='$orderdate',
                ordertime ='$ordertime',
                unavailablemedicines ='$unavailablemedicines',
                responddate ='$date',
                respondtime ='$time',
                nettotal ='$nettotal',
                order_status = '$order_status',
                nic = '$pnic',
                userid = '$puserid',
                nomedicine = '$nomedicine'
                ";

                $medaddres = mysqli_query($conn, $medaddsql);

                if($medaddres == TRUE)
                {
                    //Delete reponded order from neworders table
                    $sql5 = "DELETE FROM tbl_neworder WHERE order_id=$order_id";
                    $res5 = mysqli_query($conn, $sql5);

                    //Responded order details added to table
                    $_SESSION['med-respond1'] = 'Medicine Available Repond Sent!';
                    //Redirect to the pharmacy_neworders.php page
                    //header("location:".SITEURL.'pharmacy/pharmacy_neworders.php');
                    echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_neworders.php';</script>";

                }
                else
                {
                    //Failed to add responded order details to table
                    $_SESSION['med-respond2'] = '<div class="error">Fail to Send Respond!</div>';
                    //Redirect to the pharmacy_respond2.php page
                    //header("location:".SITEURL.'pharmacy/pharmacy_respond2.php');
                    echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond.php?id=" . $order_id . "';</script>";
                }


            }
            else
            {
                $medadded = FALSE;
                //No any Medicines Added to order

                if($unavailablemedicines =="")
                {
                    $unmedadd = FALSE;
                    //Display message to remind medicine unavailable message
                    $_SESSION['nomedmsg-respond'] = '<div class="error">Please fill Medicine Unvailable Message!</div>';
                    //Redirect to the pharmacy_respond2.php page
                    //header("location:".SITEURL."pharmacy/pharmacy_respond2.php?id=".$order_id);
                    echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond.php?id=" . $order_id . "';</script>";
                }
                else
                {
                    $unmedadd = TRUE;
                    //No any Medicines Added to order and Unavailable Medicines Message filled

                    //01.empty remarks convert
                    if($temp =="No any remarks to display"){
                        $remarks = "";
                    }
                    else{
                        $remarks = $temp;
                    }

                    //02.get the responded date
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d/m/Y');
                    $time = date('h:i:sA');

                    //03.get remain order details from neworder table
                    $sql2 = "SELECT * FROM tbl_neworder WHERE order_id=$order_id";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == TRUE)
                    {
                        $count2 = mysqli_num_rows($res2);
                        if($count2 == 1)
                        {
                            $row = mysqli_fetch_assoc($res2);
                            $paddress = $row['paddress'];
                            $contactnumber = $row['contactnumber'];
                            $prescription_name = $row['prescription_name'];
                            $orderdate = $row['orderdate'];
                            $ordertime = $row['ordertime'];
                            $puserid = $row['userid'];
                            $pnic = $row['nic'];
                        }
                    }

                    //04.Calculate total
                    $sql3 = "SELECT * FROM tbl_addmedicine WHERE order_id=$order_id";
                    $res3 = mysqli_query($conn, $sql3);

                    if($res3 == TRUE)
                    {
                        $count3 = mysqli_num_rows($res3);
                        if($count3 > 0)
                        {
                            $total =0;
                            $nettotal =0;
                            while($row2 = mysqli_fetch_assoc($res3))
                            {
                                $total = $row2['total'];
                                $nettotal = $nettotal + $total; 
                            }
                        }
                        else
                        {
                            $nettotal = 0;
                        }
                    }

                    //05.define order stataus
                    $order_status = 5;

                    //06. define nomedicine flag to 0
                    $nomedicine = 1;

                    //Save in respondedorders table
                    $medaddsql = "INSERT INTO tbl_respondedorders SET 
                    order_id = '$order_id',
                    pname ='$pname',
                    paddress = '$paddress',                
                    contactnumber = '$contactnumber',
                    prescription_name ='$prescription_name',
                    remarks ='$remarks',
                    orderdate ='$orderdate',
                    ordertime ='$ordertime',
                    unavailablemedicines ='$unavailablemedicines',
                    responddate ='$date',
                    respondtime ='$time',
                    nettotal ='$nettotal',
                    order_status = '$order_status',
                    nic = '$pnic',
                    userid = '$puserid',
                    nomedicine = '$nomedicine'
                    ";

                    $medaddres = mysqli_query($conn, $medaddsql);

                    if($medaddres == TRUE)
                    {
                        //Delete reponded order from neworders table
                        $sql5 = "DELETE FROM tbl_neworder WHERE order_id=$order_id";
                        $res5 = mysqli_query($conn, $sql5);

                        //Responded order details added to table
                        $_SESSION['nomed-respond1'] = 'Repond Sent!';
                        //Redirect to the pharmacy_neworders.php page
                        //header("location:".SITEURL.'pharmacy/pharmacy_neworders.php');
                        echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_neworders.php';</script>";

                    }
                    else
                    {
                        //Failed to add responded order details to table
                        $_SESSION['nomed-respond2'] = '<div class="error">Fail to Send Respond!</div>';
                        //Redirect to the pharmacy_respond2.php page
                        //header("location:".SITEURL.'pharmacy/pharmacy_respond2.php');
                        echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond.php?id=" . $order_id . "';</script>";
                    }

                }
            }
        }

    }

?>