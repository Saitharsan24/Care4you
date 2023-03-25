<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>CareForYou</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="asst_home.php">Home</a></li>
                <li><a href="asst_session.php">Sessions</a></li>
                <li><a href="asst_view.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
                <div class="polygons">
                    <div class="square">
                        <br /><br /><br /><br /><br /><br /><br />
                        <table class="tbl-square">
                            <tr>
                                <td class="type1">Name :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Username :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Email Address :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">NIC Number :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Contact Numer :</td>
                                <td class="type2"></td>
                            </tr>
                        </table> 
                    </div>
                        <a href="asst_editprofile.php"><button class="btn-blue square2">Edit Profile</button></a>                      
                        <img src="../images/assist-user.jpg" alt="user" class="circle" />
                        <div id="overlap"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>