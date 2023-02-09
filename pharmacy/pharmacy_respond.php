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
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.jpg" alt="user" class="imgframe">
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
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);

                }
                if(isset($_SESSION['nomed'])){
                    echo $_SESSION['nomed'];
                    unset($_SESSION['nomed']);

                }
            ?>
            <?php
                //Get the Order ID
                $id = $_GET['id'];
                //Query to get all data from tbl_neworder for selected order
                $sql2 = "SELECT * FROM tbl_neworder WHERE order_id=$id";
                //Exeute the Query                                    
                $res2 = mysqli_query($conn, $sql2);

                //Check Query executed or not
                if($res2 == TRUE)
                {
                    $count2 =mysqli_num_rows($res2);
                    if($count2 == 1)
                    {
                        //echo "Order Available";
                        $row = mysqli_fetch_assoc($res2);
                        $order_id = $row['order_id'];
                        $pname = $row['pname'];
                        $prescription_name = $row['prescription_name'];
                        $remarks = $row['remarks'];
                    }
                }
            ?>  
            <table class="tbl-respond">             
            <form action="" method="POST">
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
                                        <img src="<?php echo SITEURL; ?>/images/pharmacy-orders/<?php echo $prescription_name; ?>" width="400px">
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
                    <td class="tdtype2"><button class="btn-gray">
                        <a href="<?php echo SITEURL;  ?>pharmacy/pharmacy_addmedicine.php?id=<?php echo $order_id;?>">+ Add Medicine</a></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="tdtype1">
                        <table class="tbl-addmed">
                            <thead>
                                <tr>
                                    <td>Drug Name</td>
                                    <td>Strength</td>
                                    <td>Unit Price (Rs.)</td>
                                    <td>Quantity</td>
                                    <td>Total (Rs.)</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    //Query to get all data from tbl_addmedicine table
                                    $sql = "SELECT * FROM tbl_addmedicine WHERE orderid=$order_id";

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
                                                $strength = $rows['strength'];
                                                $unitprice = $rows['unitprice'];
                                                $quantity = $rows['quantity'];
                                                $total = $rows['total'];

                                                //Display the Values in Table
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $drugname ?></td>
                                                    <td><?php echo $strength ?></td>
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
                <!-- <tr>
                    <td class="tdtype1">Net Total (Rs.) :</td>
                    <td class="tdtype2"><input type="number" min="0" class="form-repondcontrol" name="total" required="" autofocus="true"/></td>
                </tr> -->
                <tr>
                    <td class="tdtype1">Unavailable Medicines :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="unavailablemedicines" autofocus="true"/></td>
                </tr>
            </table>
            <br /> <br />
            <button type="submit" class="btn-blue" name="sendrespond">Send Respond</button>
            </form>
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
        $order_id = $_POST['order_id'];
        $pname = $_POST['pname'];
        $temp = $_POST['remarks'];
        $unavailablemedicines = $_POST['unavailablemedicines'];

        //Query to check medicines are added or not
        $sql3 = "SELECT * FROM tbl_addmedicine WHERE orderid=$order_id";
        $res3 = mysqli_query($conn, $sql3);
        if($res3 == TRUE)
        {
            $count3 = mysqli_num_rows($res3);
            if($count3 > 0)
            {
                $medadded = TRUE;
            }
            else
            {
                $medadded = FALSE;
            }
        }

        if($unavailablemedicines!="")
        {
            $unmedadd =TRUE;
        }
        else
        {
            $unmedadd =FALSE;
        }

        if($medadded==TRUE || $unmedadd==TRUE)
        {
            //empty remarks convert
            if($temp=="No any remarks to display")
            {
                $remarks = "";
            }
            else{
                $remarks = $temp;
            }

            //Get the responded date
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d/m/Y');
            $time = date('h:i:sA');

            //Get remain order details from neworder table
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
                }
            }

            //Calculate total
            $sql3 = "SELECT * FROM tbl_addmedicine WHERE orderid=$order_id";
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
            }

            //Display all data
            // echo $order_id;
            // echo $pname;
            // echo $paddress;        
            // echo $contactnumber;
            // echo $prescription_name;
            // echo $remarks;
            // echo $orderdate;
            // echo $ordertime;
            // echo $unavailablemedicines;
            // echo $date;
            // echo $time;
            // echo $nettotal;

            //Save in respondedorders table
            $sql4 = "INSERT INTO tbl_respondedorders SET 
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
                    nettotal ='$nettotal'
                    ";
            $res4 = mysqli_query($conn, $sql4);

            if($res == TRUE)
            {
                //Delete reponded order from neworders table
                $sql5 = "DELETE FROM tbl_neworder WHERE order_id=$order_id";
                $res5 = mysqli_query($conn, $sql5);
                //Responded order details added to table
                $_SESSION['respond'] = '<div class="success">Repond Sent!</div>';
                //Redirect to the pharmacy_neworders.php page
                //header("location:".SITEURL.'pharmacy/pharmacy_neworders.php');
                echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_neworders.php';</script>";

            }
            else
            {
                //Failed to add responded order details to table
                $_SESSION['respond'] = '<div class="error">Fail to Send Respond!</div>';
                //Redirect to the pharmacy_neworders.php page
                //header("location:".SITEURL.'pharmacy/pharmacy_neworders.php');
                echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_neworders.php';</script>";
            }
        }
        else
        {
            //No medicine details added to respond
            $_SESSION['emptymed'] = '<div class="error">Add Medicine Details to send respond!</div>';
            $_SESSION['id'] = $order_id;
            //Redirect to the pharmacy_respond.php page
            //header("location:".SITEURL.'pharmacy/pharmacy_respond2.php');
            echo "<script> window.location.href='http://localhost/Care4you/pharmacy/pharmacy_respond2.php';</script>";
        }
    }
?>