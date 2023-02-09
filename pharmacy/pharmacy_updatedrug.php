<?php include('../config/constants.php')?>
<?php include('./partials/login_access.php') ?>
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
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php"><div class="highlighttext">Drug Stock</div></a></li>
                <li><a href="pharmacy_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <?php 
                //get the id of the drug
                $id = $_GET['id'];
                //SQL query to get the details
                $sql = "SELECT * FROM tbl_medicine WHERE medicine_id=$id" ;
                //excute the query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    $count =mysqli_num_rows($res);
                    if($count==1)
                    {
                        //echo "Drug Available";
                        $row = mysqli_fetch_assoc($res);
                        $id = $row['medicine_id'];
                        $med_name = $row['med_name'];
                        $strength = $row['strength'];
                        $quantity = $row['quantity'];
                        $unit_price = $row['unit_price']; 
                    }
                    else
                    {
                        //redirect to stock.php
                        header('location:'.SITEURL.'pharmacy/pharmacy_stock.php');
                    }
                
                }           
            ?>
            <form action="" method="POST">
                <table class="tbl-addmedform">
                    <tr>
                        <td colspan ="2" style="text-align: center; color: #083746; font-size: 18px; font-weight: 700;"> 
                        Update Drug - <?php echo $med_name; ?> <br />
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Drug Name :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="name" value="<?php echo $med_name; ?>" readonly required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Drug Strength :</td>
                        <td class="tdtype2"><input type="text" class="form-addmedcontrol" name="strength" value="<?php echo $strength; ?>" readonly required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Quantity :</td>
                        <td class="tdtype2"><input type="number" class="form-addmedcontrol" name="qty" value="<?php echo $quantity; ?>" required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Unit Price (Rs.):</td>
                        <td class="tdtype2"><input type="number" class="form-addmedcontrol" step="any" name="price" value="<?php echo $unit_price; ?>" required/></td>
                    </tr>
                </table>
            <br /> <br />
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" name="update" class="btn-blue">Update Drug</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    //check whter the update button is clicked or not
    if(isset($_POST['update']))
    {
        //Get all the values from form to update
        $id = $_POST['id'];
        $med_name =$_POST['name'];
        $strength = $_POST['strength'];
        $quantity = $_POST['qty'];
        $unit_price = $_POST['price'];

        //Create sql query to update drug
        $sql2 = "UPDATE tbl_medicine SET 
        med_name = '$med_name',
        strength = '$strength',
        quantity = '$quantity',
        unit_price = '$unit_price'
        WHERE medicine_id = '$id'";

        //execute query
        $res2= mysqli_query($conn , $sql2);

        if($res2 == TRUE)
        {
            $_SESSION['update']= '<div class="success">Drug details Updated Successfully</div>';
            header("location:".SITEURL.'pharmacy/pharmacy_stock.php');
        }
        else
        {
            $_SESSION['update']= '<div class="error">Falied to update Drug details</div>';
            header("location:".SITEURL.'pharmacy/pharmacy_stock.php');
        }
    }
?>