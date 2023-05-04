<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Assistant</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('asst_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/assistant/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="asst_home.php">Home</a></li>
                <li><a href="asst_session.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="asst_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='asst_appointments.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="container-row">
            <div class="container01" style="width: 27%;">
                <div class="sessionidTXT">
                    APPOINTMENT ID <br/><br/>
                    <div style="color:#000; font-size:100px; margin-top:20px;">01</div>
                </div>
            </div>
            <div class="container02">
                <table class="viewtbl">
                    <tr>
                        <td colspan="2">
                            <div class="sessionidTXT" style="margin-bottom:0px;"><i class="fa-solid fa-book-medical"></i>&nbsp;APPOINTMENT DETAILS</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient ID :</td>
                        <td class="typeL">08</td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient Name :</td>
                        <td class="typeL">Mrs. Ramani Perera</td>
                    </tr>
                    <tr>
                        <td class="typeR">Time Slot :</td>
                        <td class="typeL">3.10 PM - 3.20 PM</td>
                    </tr>
                    <tr>
                        <td class="typeR">Appointment Status :</td>
                        <td class="typeL"><button class="btn-confirmed">Confirmed</button></td>
                    </tr>
                    <tr>
                        <td class="typeR">Upload Prescription :</td>
                        <td class="typeL">
                        <form method="POST">  
                        <div class="type-file">
                            <input type="file" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription" required/>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="typeL">
                            <button class="btnpre"><i class="fa-solid fa-arrow-up-from-bracket"></i>upload</button></form>
                            &nbsp;
                            <button class="btnpre"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
            
            </div>
        </div>
</body>
</html>