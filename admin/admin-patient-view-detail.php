<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<script>
  function openPopup1() {
    const section = document.getElementById("section1");
    section.classList.add("active");
  }
  function openPopup2() {
    const section = document.getElementById("section2");
    section.classList.add("active");
  } 
  function openPopup3() {
    const section = document.getElementById("section3");
    section.classList.add("active");
  }

  const overlay1 = document.querySelector(".overlay"),
    closeBtn = document.querySelector(".close-btn");

function closePopup1() {
const section = document.getElementById("section1");
section.classList.remove("active");
}

closeBtn.addEventListener("click", closePopup);
overlay1.addEventListener("click", closePopup);
</script>
<?php
  
  if(isset($_POST['update']))
  {
    $id = $_GET['id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $nic=$_POST['nic'];

    $query1 = "UPDATE tbl_patient SET `first_name`='$fname',`last_name`='$lname',`address`='$address'
    ,`contact`='$contact',`dob`='$dob',`nic`='$nic'
    WHERE p_id=$id";
    $res1=mysqli_query($conn,$query1);   //update quary for tbl_patient table usering the p_id

    $query2="SELECT * FROM tbl_patient WHERE p_id = $id"; 
    $result2=mysqli_query($conn,$query2);
    $row = mysqli_fetch_assoc($result2);     //for get the userid form tbl_patient table

    $uid = $row['userid'];                  //assign the userid in $uid variable
    $query2 = "UPDATE tbl_sysusers SET username='$username', email='$email'
    WHERE userid='$uid'";
    $res2=mysqli_query($conn,$query2);      //  update quary for tbl_patient table usering the userid  
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-view-patient.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php"><div class="highlighttext">Patients</div></a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <?php 
                if(isset($_SESSION['update-mge']))
                {
                    echo $_SESSION['update-mge'];
                    unset($_SESSION['update-mge']);

                }
            ?>
            <div class="back" onclick="location.href='admin-patient-view.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <?php
                  $id=$_GET['id'];    //Get thr id from patient view page
                  $query="SELECT * FROM tbl_patient INNER JOIN tbl_sysusers ON tbl_patient.userid = tbl_sysusers.userid WHERE p_id = $id"; //select tbl_patient and  tables 
                  $result=mysqli_query($conn,$query);
                  $row = mysqli_fetch_assoc($result);    


            ?>

               <?php

                if (isset($_GET['disable'])) {
                    $userid = $_GET['disable'];
                    $query_del = "UPDATE tbl_sysusers
                    SET `status`  = 0
                    WHERE userid= $userid";
       
                    if (mysqli_query($conn, $query_del)) {
                        header("Location: /Care4you/admin/admin-patient-view.php");
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }

                if (isset($_GET['activate'])) {
                    $userid = $_GET['activate'];
                    $query_del = "UPDATE tbl_sysusers
                    SET `status` = 1
                    WHERE userid = $userid";
 
                    if (mysqli_query($conn, $query_del)) {
                        header("Location: /Care4you/admin/admin-patient-view.php");
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }
                //$result=mysqli_query($conn, $sql);


            ?>

            <div class="container-row">
            
            <!-- <div class="container01"></div> -->

            <div class="container02">
                <table class="tbl-patientview">
                   
                <img src="../images/user.png" alt="user" class="container01"></td>
                  

                    
                    
                        <td colspan="2" class="typeC">
                            <i class="fa-solid fa-address-card" style="font-size: 30px;"></i>&nbsp; Patient Details
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient ID :</td>
                        <td class="typeL">&emsp; <?php echo $row['p_id']; ?> </td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient Name :</td>
                        <td class="typeL">&emsp; <?php echo $row['first_name'] ?><?php echo " ";echo $row['last_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Username :</td>
                        <td class="typeL">&emsp; <?php echo $row['username'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Gender :</td>
                        <td class="typeL">&emsp; <?php echo $row['gender'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient Address :</td>
                        <td class="typeL">&emsp; <?php echo $row['address'] ?>
                        &nbsp; &nbsp;
                        <?php  include('admin-patient-viewdetail-address-pop.php') ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Contact Number :</td>
                        <td class="typeL">&emsp; <?php echo '0'.$row['contact'] ?>
                            &nbsp; &nbsp;
                            <?php  include('admin-patient-viewdetail-phoneno-pop.php') ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Email Address :</td>
                        <td class="typeL">&emsp; <?php echo $row['email'] ?>
                        &nbsp; &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Date of Birth :</td>
                        <td class="typeL">&emsp; <?php echo $row['dob'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">NIC Number :</td>
                        <td class="typeL">&emsp; <?php echo $row['nic'] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="typeR">
                            <?php
                                if($row['status']==1){
                                    $status="Disable";
                                    include('./admin-patient-pop.php');
                                
                             ?>
                                <button class="btn-disable" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['p_id'] ?>&disable=<?php echo $row['userid'] ?> ';
                                ">
                                <i class="fa-solid fa-toggle-off"></i>
                                Disable Account
                                </button>
  
                                <?php
                             }  else {

                                $status = "Activate";
                                include('./admin-patient-pop.php');
                               

                            ?>
                             <button class="btn-activate" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['p_id'] ?>&activate=<?php echo $row['userid'] ?> ';
                                ">
                                <i class="fa-solid fa-toggle-on"></i>
                                Activate Account
                                </button>

                                <?php  
                             }
                                ?>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>