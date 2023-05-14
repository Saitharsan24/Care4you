<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-session.css">
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
                <li><a href="admin-session-view.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="admin-patient-view.php">Patient</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>

        <?php
            $id = $_GET['id'];
    
         

            
            $query="SELECT * FROM tbl_docsession 
            INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
            INNER JOIN tbl_assistant ON tbl_docsession.assistant_id = tbl_assistant.assistant_id
            WHERE session_id = $id";


            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
           
           $doc_id=$row['doctor_id'];
           
        ?>

        <?php
        
            if(isset($_GET['cancel'])){
                $sessionid = $_GET['cancel'];
                $query_del = "UPDATE tbl_docsession
                SET status = 3
                WHERE session_id = $sessionid";
                
                if (mysqli_query($conn, $query_del)) {
                    header("Location: /Care4you/admin/admin-session-cancel-mail.php?session_id=".$id);
                                 } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            }

            if(isset($_GET['confirm'])){
                $sessionid = $_GET['confirm'];
                $query_del = "UPDATE tbl_docsession
                SET status = 1
                WHERE session_id = $sessionid";
                
                if (mysqli_query($conn, $query_del)) {
                    header("Location: /Care4you/admin/admin-session-view.php?doc_id=".$doc_id);
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            }

        
        
        ?>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='admin-session-view.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="container-row">
            <div class="container01">
                <div class="sessionidTXT">
                    SESSION ID <br/><br/>
                    <div style="color:#000; font-size:100px; margin-top:20px;"><?php echo $row['session_id']; ?></div>
                </div>
            </div>
            <div class="container02">
                <table class="viewtbl">
                    <tr>
                        <td colspan="2">
                            <div class="sessionidTXT" style="margin-bottom:0px;"><i class="fa-solid fa-hand-holding-medical"></i>&nbsp;SESSION DETAILS</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Doctor ID :</td>
                        <td class="typeL"><?php echo $row['doctor_id']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Doctor Name :</td>
                        <td class="typeL"><?php echo $row['doc_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Assistant ID :</td>
                        <td class="typeL"><?php echo $row['assistant_id']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Assistant Name :</td>
                        <td class="typeL"><?php echo $row['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Date :</td>
                        <td class="typeL"><?php echo $row['date']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Time Slot :</td>

                        <?php  
                                          if($row['time_slot']==0){
                                              $time="8am-10am";   
                                          }else if($row['time_slot']==1){
                                              $time='10am-12pm';
                                          }else if($row['time_slot']==2){
                                              $time='12pm-2pm';
                                          }else if($row['time_slot']==3){
                                              $time='2pm-4pm';
                                          }else if($row['time_slot']==4){
                                              $time='4pm-6pm';
                                          }else{   
                                              $time='6pm-8pm';
                                          } 
                                      ?>
                        <td class="typeL"><?php echo $time; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Room Number :</td>
                        <td class="typeL"><?php echo $row['room_no']; ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Session Status :</td>
                        <td class="typeL">
                                <?php 
                                    //echo $row['status'];
                                    if($row['status']==0){
                                        echo '<button class="btn-paypend"> Pending </button>';
                                    }else if($row['status']==1){
                                        echo '<button class="btn-confirmed"> Confirmed </button>';
                                    }else if($row['status']==2){
                                        echo '<button class="btn-completed"> Completed </button>';
                                    }else if($row['status']==3){
                                        echo '<button class="btn-cancelled"> Cancelled </button>'; 
                                    }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <?php
                                if($row['status']==1)
                                {
                                    $status="Cancel";
                                    include('./admin-session-pop.php');
                                
                            ?>
                            <button class="btn-disable" onclick="document.getElementById('id01').style.display='block'; document.getElementById('del').action = '?id=<?php echo $row['session_id'] ?>&cancel=<?php echo $row['session_id'] ?> ';">
                            <i class="fa-solid fa-toggle-off"></i>
                            Cancel Session
                            </button>

                            <?php
                                }
                                if($row['status']==3)
                                {        
                                    $status = "Confirm";
                                    include('./admin-session-pop.php');
                            ?>
                                <button class="btn-activate" onclick="document.getElementById('id01').style.display='block'; document.getElementById('del').action = '?id=<?php echo $row['session_id'] ?>&confirm=<?php echo $row['session_id'] ?>';">
                                <i class="fa-solid fa-toggle-on"></i>
                                Enable Session
                                </button>
                            <?php 
                            };
                            ?>
                        </td>      
                    </tr>
                </table>
            </div>
            </div>
            
            </div>
        </div>
</body>
</html>