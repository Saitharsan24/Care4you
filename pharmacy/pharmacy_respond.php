<?php 
    include ('../config/constants.php');
?>
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
            <table class="tbl-respond">             
            <form action="">
                <tr>
                    <td class="tdtype1">Order ID :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="orderid" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Patient Name :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="patientname" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Available Medicines :</td>
                    <td class="tdtype2"><button class="btn-gray">
                        <a href="pharmacy_addmedicine.php">+ Add Medicine</a></button>
                    </td>
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
                                    $sql = "SELECT * FROM tbl_addmedicine";

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
                    <td class="tdtype1">Net Total (Rs.) :</td>
                    <td class="tdtype2"><input type="number" min="0" class="form-repondcontrol" name="total" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Unavailable Medicines :</td>
                    <td class="tdtype2"><input type="text" class="form-repondcontrol" name="unavailablemedicines" required="" autofocus="true"/></td>
                </tr>
            </table>
            <br /> <br />
            <button class="btn-blue"><a href="pharmacy_respond.php">Send Respond</a></button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>