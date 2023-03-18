<?php include ('../config/constants.php');?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lab.css"> 
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
                <li><a href="lab_appointments.php">Lab Appointments</a></li>
                <li><a href="lab_viewprofile.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <form action="" method="POST">
                <table class="tbl-addappform">
                    <tr>
                        <td colspan ="2" style="text-align: center; color: #083746; font-size: 18px; font-weight: 700;"> Lab Appointment for Unregistered Patient</td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Lab Appointment ID :</td>
                        <td class="tdtype2"><input type="text" class="form-addappcontrol" name="unregappid" /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Patient Name :</td>
                        <td class="tdtype2"><input type="text" class="form-addappcontrol" name="patientname" required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Age :</td>
                        <td class="tdtype2"><input type="number" min="1" class="form-addappcontrol" name="age" required/></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Address :</td>
                        <td class="tdtype2">
                            <textarea name="address" cols="44" rows="3"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Contact Number :</td>
                        <td class="tdtype2"><input type="tel" id="contactnumber" name="contactnumber" class="form-addappcontrol" placeholder="07XXXXXXXX" pattern="[0-0]{1}[0-9]{9}" required /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Email Address :</td>
                        <td class="tdtype2"><input type="email" class="form-addappcontrol" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Appointment Date :</td>
                        <td class="tdtype2"><input type="date" name="appdate" placeholder="dd-mm-yyyy" min="2022-12-19" max="2030-12-31" /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Appointment Time :</td>
                        <td class="tdtype2"><input type="time" id="apptime" name="apptime" min="8:00" max="20:00" required /></td>
                    </tr>
                    <tr>
                        <td class="tdtype1">Tests to be done :</td>
                        <td class="tdtype2">
                            <textarea name="tests" cols="44" rows="3"></textarea>
                        </td>
                    </tr>
                </table>
                <br /> <br />
                <button type="submit" name="addapp" class="btn-blue">Add Appointment</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    //Process the value from form and save it in Database

    //Check Submit Button is Clicked or Not?

    if(isset($_POST['addapp']))
    {
        //Submit Button is Clicked
        //echo "<p> Button Clicked </p>";

        //Step 01 - Get the data from the form
        $patientname = $_POST['patientname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $contactnumber = $_POST['contactnumber'];
        $email = $_POST['email'];
        $appdate = $_POST['appdate'];
        $apptime = $_POST['apptime'];
        $tests = $_POST['tests'];

        //Step 02 - SQL Query to save the data in Database
        $sql = "INSERT INTO tbl_addlabapp SET
                patientname = '$patientname',
                age = '$age',
                address = '$address',
                contactnumber = '$contactnumber',
                email = '$email',
                appdate = '$appdate',
                apptime = '$apptime',
                tests = '$tests'
                ";
        //echo $sql;

        //Step 03 - Execute the Query and save data in Database
        include ('../config/constants.php');

        $res = mysqli_query($conn , $sql) or die(mysqli_error($conn));

        //Step 04 - Check data is inserted (Query executed) or not & Disply Message
        if($res == TRUE){

            //Data inserted
            echo "Data Inserted";

            //Create Session Variable to display message
            //$_SESSION['add'] = '<div class="success"> Medicine Added to Order</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'laboratory/lab_unreguserappointments.php');

        }
        else{

            //Data not inserted
            echo "Fail to Insert Data";

            //Create Session Variable to display message
            //$_SESSION['add'] = '<div class="error"> Failed to Add Medicine to Order</div>';
            //Redirect to the pharmacy_respond.php page
            header("location:".SITEURL.'laboratory/lab_addappointment.php');

        }
    }

?>