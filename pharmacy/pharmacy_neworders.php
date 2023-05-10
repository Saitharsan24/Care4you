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
                <li><a href="pharmacy_neworders.php"><div class="highlighttext">New Orders</div></a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <?php 
                if(isset($_SESSION['med-respond1'])){
                    echo $_SESSION['med-respond1'];
                    unset($_SESSION['med-respond1']);

                }
                if(isset($_SESSION['nomed-respond1'])){
                    echo $_SESSION['nomed-respond1'];
                    unset($_SESSION['nomed-respond1']);

                }
            ?>
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Order ID</td>
                            <td>Patient Name</td>
                            <td>Ordered Date</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>                    
                    <?php
                        //Query to get all data from tbl_neworder table
                        $sql = "SELECT * FROM tbl_neworder";
                        //Exeute the Query                                    
                        $res = mysqli_query($conn, $sql);

                        //Check Query executed or not
                        if($res == TRUE)
                        {
                            //Count rows in tbl_neworder table
                            $count = mysqli_num_rows($res);
                            //Check whther data available in database
                            if($count > 0)
                            {
                                //Data available in database
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $order_id = $row['order_id'];
                                    $pname = $row['pname'];
                                    $orderdate = $row['orderdate'];

                                    //Display data in the table
                    ?>
                                        <tr>
                                            <td><?php echo $order_id;?></td>
                                            <td><?php echo $pname;?></td>
                                            <td><?php echo $orderdate;?></td>
                                            <td><a href="<?php echo SITEURL;  ?>pharmacy/pharmacy_viewneworder.php?id=<?php echo $order_id;?>"><button class="btn-blue1"><span>View Order</span></button></a></td>
                                        </tr>
                    <?php
                                    
                                }
                            }
                            else
                            {
                                //No any order details yet
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