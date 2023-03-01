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
        <div class="left-button">
            <a href="pharmacy_addnewdrug.php"><button class="btn-addnew"><span>add new</span></button></a>
        </div> 
            <div class="info">
            <?php 
                if(isset($_SESSION['add-drug']))
                {
                    echo $_SESSION['add-drug'];
                    unset($_SESSION['add-drug']);

                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            ?>
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Drug Name</td>
                            <td>Strength</td>
                            <td>Quantity</td>
                            <td style="width: 500px">Unit Price (Rs.)</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "SELECT * FROM tbl_medicine ORDER BY med_name ASC";
                        $res = mysqli_query($conn, $sql);//execute the query

                        if($res == TRUE)
                        {
                            $count = mysqli_num_rows($res); //number of rows in database

                            if($count > 0 )
                            {

                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    $id = $rows['medicine_id'];
                                    $med_name = $rows['med_name'];
                                    $strength = $rows['strength'];
                                    $quantity = $rows['quantity'];
                                    $unit_price = $rows['unit_price'];
                                    
                                    //display valus in the table
                                    ?>
                                    <tr>
                                        <td><?php echo $med_name; ?> </td>
                                        <td><?php echo $strength; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $unit_price; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_updatedrug.php?id=<?php echo $id;?>" class="btn-update">Update</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo SITEURL;  ?>/pharmacy/pharmacy_deletedrug.php?id=<?php echo $id;?>" class="btn-delete">Delete</a>
                                        
                                        </td>
                                    </tr>
                                    <?php 
                                }
                            }
                            else
                            {

                            }
                        }

                    ?>
                    </tbody>
                </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>