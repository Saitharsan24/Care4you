<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor.css"> 
    <title>Doctor</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/doctor.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="doctorHome.php">Home</a></li>
                <li><a href="doctorSession.php">Sessions</a></li>
                <li><a href="doctorViewpatient.php">View Patients</a></li>
                <li><a href="doctorViewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Age</td>
                            <td>Contact Number</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $query = "SELECT * FROM patients,appoiments,sessions where p_id = a_p_id and s_id = a_s_id and s_d_id = '".$_SESSION['id']."'";
                            $result = $conn->query($query);                            ;
                            while($row = $result->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['p_id']?></td>
                                <td><?php echo $row['p_fname']." ".$row['p_lname']?> </td>
                                <td><?php echo $row['p_age']?></td>
                                <td><?php echo $row['p_contact_no']?></td>
                                <td><button class="btn-blue1"><a href="doctorViewpatientprofile.php">View Profile</a></button></td>
                            </tr>  
                        <?php        
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