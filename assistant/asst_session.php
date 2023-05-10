<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 

        //getting the assistant id from user id 
        $user_id = $_SESSION['user_id'];
        $sqlasst_id = "SELECT assistant_id FROM tbl_assistant WHERE userid = '$user_id'";
        $resultsasst_id = mysqli_query($conn,$sqlasst_id);
        $rowasst_id = mysqli_fetch_assoc($resultsasst_id);
        $asst_id = $rowasst_id['assistant_id'];

        //getting session details from database
        $sql = "SELECT * FROM tbl_docsession WHERE assistant_id = '$asst_id' AND (status = '1' OR status = '2')";
        $result = mysqli_query($conn,$sql);

?>


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
                <li><a href="asst_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <table class="tbl-main" style="width: 70%;">
                <thead>
                    <tr>
                        <td>Session ID</td>
                        <td>Time Slot</td>
                        <td>Room Number</td>
                        <td>Session Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody> 

                    <?php 
                        if(mysqli_num_rows($result) != 0 ){
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                            <tr>
                                <td><?php echo $row['session_id'] ?></td>
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

                                <td><?php echo $time ?></td>
                                <td><?php echo $row['room_no'] ?></td>
                                <td>
                                    <?php 
                                        if($row['status']==1){
                                            echo ' '.'<button class="order-st00">Confirmed</button>';
                                        } elseif($row['status']==2){
                                            echo ' '.'<button class="order-st01">Completed</button>';
                                        }
                                    ?>
                                </td>
                                <td><a href="./asst_viewsession.php?id=<?php echo $row['session_id']     ?>"><button class="btn-viewapp"><span>View Session</span></button></a></td>
                            </tr>
                    <?php 
                            }
                        }
                    } else {
                    ?>
                            <td class="nosessiontd" colspan="5"><div class="nosession">No Sessions Assigned</div></td>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
            </div>
        </div>
</body>
</html>