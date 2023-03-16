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
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <figure>
                <img src="../images/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
                <figcaption style="margin-left: 55px;">Change Profile Picture</figcaption>
            </figure>
            <span>

            <?php
                
            ?>

            <form action="" method="POST">
            <table class="formtable">
                <tr>
                    <td>Name :</td>
                    <td><input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" required=""/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" class="form-control" name="username" value="<?php echo $user; ?>" required=""readonly/></td>
                </tr>
                <tr>
                    <td>Email Address :</td>
                    <td><input type="text" class="form-control" name="email" value="<?php echo $email; ?>" required=""/></td>
                </tr>
                <tr>
                    <td>NIC Number :</td>
                    <td><input type="text" class="form-control" name="nic" value="<?php echo $nic; ?>" required=""/></td>
                </tr>
                <tr>
                    <td>Contact Numer :</td>
                    <td><input type="text" class="form-control" name="contact_number" value="<?php echo $contact_number; ?>" required=""/></td>
                </tr>
                <tr>
                    <td></br><a href="pharmacy_changepassword.php"><div class="hrefmodtext">Change Password</div></a></td>
                </tr>
            </table>
            <button class="btn-blue" type="submit" name="update">Update Changes</button>
            </form>
            </span>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    //Process the value from form and save it in Database

    //Check Submit Button is Clicked or Not?

    if(isset($_POST['update']))
    {
        //Submit Button is Clicked
        //echo "<p>Button Clicked</p>";

        //Step 01 - Get the data from the form
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $nic = $_POST['nic'];
        $contact_number = $_POST['contact_number'];

        //Step 02 - SQL Query to save the data in Database
        $sql3 = "UPDATE tbl_pharmacist SET 
                fullname = '$fullname',
                email ='$email',
                nic = '$nic',                
                contact_number = '$contact_number'
                WHERE pharmacist_id ='$pharmacist_id'
                ";
        //echo $sql;

        $res3 = mysqli_query($conn , $sql3) or die(mysqli_error($conn));

        //Step 04 - Check data is inserted (Query executed) or not & Disply Message
        if($res3 == TRUE){

            //Data inserted
            //echo "Data Inserted";

            //Create Session Variable to display message
            $_SESSION['update-user'] = '<div class="success"> Profile Details Updated Successfully</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'pharmacy/pharmacy_viewprofile.php');

        }
        else{

            //Data not inserted
            //echo "Fail to Insert Data";

            //Create Session Variable to display message
            $_SESSION['update-user'] = '<div class="error"> Failed to Update Profile Details</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'pharmacy/pharmacy_viewprofile.php');

        }

    }

?>
