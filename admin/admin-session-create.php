<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php
    
    $sql_1="SELECT doctor_id,doc_name FROM tbl_doctor";
    $result_1 = mysqli_query($conn, $sql_1);
   

    $sql_2="SELECT assistant_id,name FROM tbl_assistant";
    $result_2 = mysqli_query($conn, $sql_2);
    

    if(isset($_POST['reg'])){
        $id=$_GET['doc_id'];
        
        $_SESSION['doc_id']=$id;
        // print_r($_SESSION['doc_id']);die();
            $doc_id=$_POST['doctor_id'];
            $asst_id=$_POST['assitant_id'];
            $date=$_POST['date'];
            //print_r($date);die();
            $room=$_POST['room'];
            
             if($_POST['time-slot']=='8am-10am'){
                $time=0;
             }else if($_POST['time-slot']=='10am-12pm'){
                $time=1;
             }else if($_POST['time-slot']=='12pm-2pm'){
                $time=2;
             }else if($_POST['time-slot']=='2pm-4pm'){
                $time=3;
             }else if($_POST['time-slot']=='4pm-6pm'){
                $time=4;
             }else{   
                $time=5;
             }

            $sql = "INSERT INTO tbl_docsession (doctor_id,date,room_no,time_slot,assistant_id) VALUES ('$doc_id', '$date','$room','$time','$asst_id')";
            $res1 = mysqli_query($conn, $sql);

        if($res1){
            header("Location: /Care4you/admin/admin-session-view.php");
        }else{
            echo "Error: " . "<br>" . mysqli_error($conn); die();
        }

  }

?>

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
                <li><a href="#">Orders</a></li>
                <li><a href="admin-doc-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
            <div class="main_content">
                <div class="info">
                    <div class="head-create-session">Create Session</div>
                    <div class="square-create-session">
                        <div class="form-asst">
                            <form action="admin-session-mail-pop.php" method="POST">
                                <div class="form-asst">
                                   
                                    <br>
                                    <div class="doc-id-option">
                                    <?php
                                    if($result_1){
                                        echo "Doctor ID:"; 
                                        ?>
                                     <SELECT id='doctor_id' name=doctor_id onchange="var doc_id = this.value;location.href = '/Care4you/admin/admin-session-create.php?doc_id=' + doc_id;" >
                                        <option value="NULL" hidden></option>
                                     <?php
                                     if (isset($_GET['doc_id'])) {
                                        while($row = mysqli_fetch_assoc($result_1)){
                                            if ($row['doctor_id'] == $_GET['doc_id']) {
                                                echo "<option value=$row[doctor_id] selected>$row[doctor_id]</option>";
                                            } else {
                                                echo "<option value=$row[doctor_id]>$row[doctor_id]</option>"; 
                                            }
                                            
                                           
                                        }
                                         echo "</select>  </div>";


                                    ?>
                                        <br>  
                                        <div class="#">
                                        <?php
                                            if($result_2){
                                                echo "Assitant ID:"; ?>
                                            <SELECT name=assitant_id onchange="var assi_id = this.value;location.href = '/Care4you/admin/admin-session-create.php?doc_id=<?php echo $_GET['doc_id'] ?>&assi_id='+assi_id;">
                                            <option value="NULL" hidden></option> 
                                        <?php
                                        if (isset($_GET['assi_id'])){
                                            while($row = mysqli_fetch_assoc($result_2)){
                                                if ($row['assistant_id'] == $_GET['assi_id']) {
                                                    echo "<option value=$row[assistant_id] selected>$row[assistant_id]</option>";
                                                } else {
                                                    echo "<option value=$row[assistant_id]>$row[assistant_id]</option>";
                                                }
                                                
                                               
                                            }
    
                                            echo "</select> </div>"; ?>

                                            <br>
                                            <div class="#">
                                                <label>Date :</label>
                                                <?php
                                                if (isset($_GET['date'])) { ?>
                                                    <input value=<?php echo $_GET['date'] ?>  type="date" class="form-create-session" name="date" required="" autofocus="true"  onchange="var date = this.value;location.href = '/Care4you/admin/admin-session-create.php?doc_id=<?php echo $_GET['doc_id'] ?>&assi_id=<?php echo $_GET['assi_id'] ?>&date='+date;"/></div>

                                                    <br>
                                                    <div class="doc-room-div">
                                                        <label>Room :</label>
                                                        <select name="room" class="form-create-session" onchange="var room = this.value;location.href = '/Care4you/admin/admin-session-create.php?doc_id=<?php echo $_GET['doc_id'] ?>&assi_id=<?php echo $_GET['assi_id'] ?>&date=<?php echo $_GET['date'] ?>&room='+room;">
                                                        <option value="NULL" hidden></option>
                                                        <?php if (isset($_GET['room'])) {
                                                            for ($i=1; $i < 6; $i++) {
                                                                if ($_GET['room'] == "No ".$i) { ?>
                                                                    <option value="No <?php echo $i ?>" selected>No <?php echo $i ?></option>
                                                                <?php } else { ?>
                                                                    <option value="No <?php echo $i ?>" >No <?php echo $i ?></option>
                                                                <?php } } ?>
                                                                </select>
                                                                </div>
                                                                <br>
                                                                <?php
                                                                $doc_id = $_GET['doc_id'];
                                                                $assi_id = $_GET['assi_id'];
                                                                $date_selected = $_GET['date'];
                                                                $room_no = $_GET['room'];
                                                                $query="SELECT time_slot FROM tbl_docsession 
                                                                WHERE (date = '$date_selected' AND doctor_id = $doc_id AND room_no = '$room_no')
                                                                OR (date = '$date_selected' AND assistant_id = $assi_id AND room_no = '$room_no')
                                                                OR (date = '$date_selected'  AND room_no = '$room_no')
                                                                OR (date = '$date_selected' AND doctor_id = $doc_id )
                                                                OR (date = '$date_selected' AND assistant_id = $assi_id )
                                                            
                                                                ";
                                                                $result3=mysqli_query($conn,$query);
                                                                $time_slot = array();
                                                                while($row3 = mysqli_fetch_array($result3)){
                                                                    $time_slot = array_merge($time_slot,$row3);
                                                                
                                                                };
                                                                
                                                                
                                                                ?>
                                                                <div class="doc-timeslot-div ">
                                                                    <label>Time Slot :</label>
                                                                    <select name="time-slot" class="form-create-session">
                                                                        <?php 
                                                                        if (!in_array("8am-10am",$time_slot)) {
                                                                           echo '<option>8am-10am</option>';
                                                                        }
                                                                        if (!in_array("10am-12pm",$time_slot)) {
                                                                            echo '<option>10am-12pm</option>';
                                                                         }
                                                                         if (!in_array("12pm-2pm",$time_slot)) {
                                                                            echo '<option>12pm-2pm</option>';
                                                                         }
                                                                         if (!in_array("2pm-4pm",$time_slot)) {
                                                                            echo '<option>2pm-4pm</option>';
                                                                         }
                                                                         if (!in_array("4pm-6pm",$time_slot)) {
                                                                            echo '<option>4pm-6pm</option>';
                                                                         }
                                                                         if (!in_array("6pm-8pm",$time_slot)) {
                                                                            echo '<option>6pm-8pm</option>';
                                                                         }
                                                                        
                                                                        ?>

                                                                         
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                                
                                                        <?php
                                                            } else {
                                                                for ($i=1; $i < 6; $i++) { ?>
                                                                    <option value="No <?php echo $i ?>" >No <?php echo $i ?></option>
                                                                <?php }
                                                            }
                                                            
                                                            ?> </select>
                                                            </div>                                                    

                                                <?php } else { ?>
                                                        <input type="date" class="form-create-session" name="date" required="" autofocus="true"  onchange="var date = this.value;location.href = '/Care4you/admin/admin-session-create.php?doc_id=<?php echo $_GET['doc_id'] ?>&assi_id=<?php echo $_GET['assi_id'] ?>&date='+date;"/></div>
                                                    <?php }
                                                    
                                                    ?>
                                               
                                            </div>




                                            
                                        <?php
                                        }
                                        else{
                                            while($row = mysqli_fetch_assoc($result_2)){
                                                echo "<option value=$row[assistant_id]>$row[assistant_id]</option>";
                                            }
    
                                            echo "</select>";

                                        }
                                        
                                      
                                     }

                                     ?>
                                    <?php
                                     } else {
                                        while($row = mysqli_fetch_assoc($result_1)){
                                            echo "<option value=$row[doctor_id]>$row[doctor_id]</option>";
                                        }
                                        echo "</select>";
                                     }                               
                                      
                                     }
                                     ?>      
                                     
                                     <button class="btn-create-session" type="submit" name="reg">Create</button>

                                     
                                </form>
                                        

                            
                           
                            <button class="btn-create-session-back" type="button" onclick="location.href='admin-session-view.php'">Back</button>
                      
                        </div>

                    </div>
                </div>

            <?php
            // $id=$_GET['doc_id'];
            // $_SESSION['doc_id']=$id;
            
            //   if(isset($POST['reg'])){
            //     print_r($id);die();
            //    // $id=$_GET['id'];
               
            //     $query = "SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid WHERE userid=$id";
            //     $result_1 = mysqli_query($conn, $query);
            //     $row = mysqli_fetch_array($result_1);
             
            //        $email= $row['email'];
                   
                
            // }
          
            ?>
</body>

</html>