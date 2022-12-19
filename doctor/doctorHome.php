<?php include_once "login_check.php";
include_once "dbconnection.php";
$sql = "SELECT * FROM doctors WHERE d_id='".$_SESSION['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
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
                <li><a href="#">Home</a></li>
                <li><a href="doctorSession.php">Sessions</a></li>
                <li><a href="doctorViewpatient.php">View Patients</a></li>
                <li><a href="doctorViewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="logout_process.php">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="welcometext">Welcome <div class="usernametext"><?php echo $row["d_fname"]." ".$row["d_lname"] ?></div></div>
            <span>
            <table>
                <tr>
                </br></br></br>
                    <td colspan="2" style="text-align:center; padding-left: 35%; padding-right: 30%;">
                        <p id="rcorners">
                            Total Sessions for this week
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            05
                            </span>
                        </p>
                        </br></br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="rcorners">
                            Cancelled Sessions for this week
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            01
                            </span>
                        </p>
                    </td>
                    <td>
                        <p id="rcorners">
                            Confirmed Sessions for this week
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            04
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>