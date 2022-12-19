<?php include_once "login_check.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor.css"> 
    <title>Doctor</title>
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
            <div class="signouttext"><a href="logout_process.php">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
            <table class="tbl-remarks">
                <tr>
                    <td class="tdtype1">Name :</td>
                    <td class="tdtype2"><input type="text" class="form-control" name="name" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Age :</td>
                    <td class="tdtype2"><input type="text" class="form-control" name="age" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Appointment No :</td>
                    <td class="tdtype2"><input type="text" class="form-control" name="appointmentno" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Consultant :</td>
                    <td class="tdtype2"><input type="text" class="form-control" name="consultant" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td class="tdtype1">Prescription :</td>
                    <td class="tdtype2">
                        <input type="file" id="prescription" name="prescription">
                    </td>
                </tr>
                <tr>
                    <td class="tdtype1">Other Remarks :</td>
                    <td class="tdtype2">
                        <textarea name="otherremarks" cols="67" rows="5" resize="none">
                        </textarea>
                    </td>
                </tr>
            </table>
            <br /> <br />
            <button class="btn-blue"><a href="#">Send Remarks</a></button>
            </span>
            </div>
        </div>
    </div>
</body>
</html>