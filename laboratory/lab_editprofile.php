<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>Laboratory</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('lab_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">Home</a></li>
                <li><a href="lab_newappointments.php">New Appointments</a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php"><div class="highlighttext">Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='lab_viewprofile.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="polygons">
                <div class="square" style="height:470px;">
                    <br /><br /><br /><br /><br /><br/>
                    <?php
                        if(isset($_SESSION['upload']))
                        {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                        }
                    ?>
                    <form id="upload-form" method="POST" enctype="multipart/form-data">
                        <figcaption class="txtpp"><a href="#" id="file-link">Change Profile Picture</a><br/>
                        </figcaption>
                        <input type="file" name="file" id="file-input" accept="image/*">
                        <input type="hidden" name="ppUpdate" value="1">
                    </form>
                    <br /><br /><br /><br /><br/>

                    <!-- Code for hide the submit button -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function(){
                            $('#file-link').click(function(){
                                $('#file-input').click();
                            });

                            $('#file-input').change(function(){
                                $('#upload-form').submit();
                            });
                        });
                    </script>

                    <?php
                    // Check if the profile photo has been submitted
                    if (isset($_POST['ppUpdate'])) 
                    {
                        // Check if a file has been selected
                        if (isset($_FILES['file'])) 
                        {
                            // Get the filename and extension
                            $ppname = basename($_FILES['file']['name']);
                            $extension = pathinfo($ppname, PATHINFO_EXTENSION);

                            // Generate a unique filename
                            $new_ppname = 'User_' . $labtec_id . '_Updated' . '.' . $extension;

                            // Move the file to a permanent location
                            $destination= "../images/user-profilepic/labtec/".$new_ppname;

                            //Upload the Profile Picture
                            $upload = move_uploaded_file($_FILES['file']['tmp_name'], $destination);

                            //Check whether the Profile Picture is uploaded or not
                            if($upload == FALSE)
                            {
                                $_SESSION['upload'] = "Failed to upload Profile Picture! Please Retry";
                                //Redirect to edit profile page
                                header('location:'.SITEURL.'/laboratory/lab_editprofile.php'); 
                                //Stop the process
                                die();
                            }
                            else
                            {
                                // Store the filename in the database
                                $sqlpp = "UPDATE tbl_labtec SET profile_picture='$new_ppname' WHERE labtec_id ='$labtec_id'";

                                //Execute the query and Save profile picture name in database
                                $respp = mysqli_query($conn ,$sqlpp);
                                
                                //Check the execution of query
                                if($respp == TRUE)
                                {
                                    $_SESSION['upload'] = '<div class="ppUp">Profile Picture Updated Successfully</div>';
                                    //Redirect to edit profile page
                                    header('location:'.SITEURL.'/laboratory/lab_editprofile.php'); 
                                }
                                else
                                {
                                    $_SESSION['upload'] = '<div class="ppUpEr">Failed to Update Profile Picture! Please Retry</div>';
                                    //Redirect to edit profile page
                                    header('location:'.SITEURL.'/laboratory/lab_editprofile.php');
                                }

                            }
                        }
                    }
                    ?>

                    </figure>
                    <span>
                    <form action="" method="POST">
                    <table class="tbl-square">
                        <tr>
                            <td class="type1">Name :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="text" name="fullname" value="<?php echo $fullname; ?>" required=""/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1">Username :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="text" class="form-control" name="username" value="<?php echo $user; ?>" required="" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1">Email Address :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required="" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1">NIC Number :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="text" class="form-control" name="nic" value="<?php echo $nic; ?>" required="" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1">Contact Numer :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="tel" class="form-control" name="contact_number" value="<?php echo '0'.$contact_number; ?>" required=""/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1" style="padding-right: 15px;">
                            <button class="btn-pwd" style="font-size: 13px;" type="button">
                                <a href="lab_changepassword.php">
                                    <span><i class="fa-solid fa-lock" style="font-size: 15px;"></i> &nbsp; Change Password</span>
                                </a>
                            </button>
                            </td>
                            <td class="type2" style="background-color: #fff;">
                            <?php
                                if(isset($_SESSION['update-user']))
                                {
                                echo $_SESSION['update-user'];
                                unset($_SESSION['update-user']);
                                }
                            ?>
                            </td>
                        </tr>
                    </table> 
                </div>
                    <a href="lab_editprofile.php"><button class="btn-saveP square4" type="submit" name="update">
                    <i class="fa-solid fa-rotate-right"></i>
                    &nbsp; Update Profile</button></a>
                    </form>                      
                    <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="circle" style="margin-top:-10px;"/>
                    <div id="overlap"></div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    //Process the value from form and save it in Database
    //Check Submit Button is Clicked or Not?
    if(isset($_POST['update'])) {
        //Submit Button is Clicked
        //echo "<p>Button Clicked</p>";

        //Step 01 - Get the data from the form
        $fullname = $_POST['fullname'];
        $contact_number = $_POST['contact_number'];

        //Step 02 - SQL Query to get the current data from Database
        $selsql = "SELECT fullname, contact_number FROM tbl_labtec WHERE labtec_id ='$labtec_id'";
        $selres = mysqli_query($conn , $selsql) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($selres);

        // $selsql2 = "SELECT email FROM tbl_sysusers WHERE userid ='$userid'";
        // $selres2 = mysqli_query($conn , $selsql2) or die(mysqli_error($conn));
        // $row2 = mysqli_fetch_assoc($selres2);
        
        //Step 03 - Compare updated data with current data
        if ($row['fullname'] == $fullname && $row['contact_number'] == $contact_number) {
            // Data is not updated
            $_SESSION['update-user'] = '<div class="ppUpEr" style="padding-top:25px;"> No Changes made to Profile Details</div>';
            echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_editprofile.php';</script>";
        }
        else {
            // Data is updated
            //Step 04 - SQL Query to save the data in Database
            $sql3 = "UPDATE tbl_labtec SET 
                fullname = '$fullname',
                contact_number = '$contact_number'
                WHERE labtec_id ='$labtec_id'
            ";
            //echo $sql;
            $res3 = mysqli_query($conn , $sql3) or die(mysqli_error($conn));
            
            // $sql4 = "UPDATE tbl_sysusers SET 
            //     email = '$email'
            //     WHERE userid ='$userid'
            // ";
            // //echo $sql;
            // $res4 = mysqli_query($conn , $sql4) or die(mysqli_error($conn));
            
            //Step 05 - Check data is inserted (Query executed) or not & Disply Message
            if($res3 == TRUE) {
                //Data inserted
                //echo "Data Inserted";

                //Create Session Variable to display message
                $_SESSION['update-user'] = '<div class="success"> Profile Details Updated Successfully</div>';
                //Redirect to the pharmacy_respond.php page
                // header("location:".SITEURL.'pharmacy/pharmacy_viewprofile.php');
                echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_viewprofile.php';</script>";
            }
            else {
                //Data not inserted
                //echo "Fail to Insert Data";

                //Create Session Variable to display message
                $_SESSION['update-user'] = '<div class="error"> Failed to Update Profile Details</div>';
                //Redirect to the pharmacy_respond.php page
                // header("location:".SITEURL.'pharmacy/pharmacy_viewprofile.php');
                echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_viewprofile.php';</script>";
            }
        }
    }
?>
