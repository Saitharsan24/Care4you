
<?php include('../config/constants.php'); ?>
<?php
$id = $_GET['id'];

//$query = "SELECT * FROM tbl_docsession  WHERE session_id= $id";
$query="SELECT * FROM tbl_docsession 
INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
INNER JOIN tbl_assistant ON tbl_docsession.assistant_id = tbl_assistant.assistant_id
WHERE session_id = $id";


$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
//print_r($row);die();
?>

<?php
   

   if(isset($_GET['cancel'])){
    $sessionid = $_GET['cancel'];
    $query_del = "UPDATE tbl_docsession
    SET status = 2
    WHERE session_id = $sessionid";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-session-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }

   if(isset($_GET['activate'])){
    $sessionid = $_GET['activate'];
    $query_del = "UPDATE tbl_docsession
    SET status = 1
    WHERE session_id = $sessionid";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-session-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }

   
//    if(isset($_GET['enable'])){
//     $userid = $_GET['enable'];
//     $query_del = "UPDATE tbl_docsession
//     SET status = 1
//     WHERE session_id = $userid";
    
//     if (mysqli_query($conn, $query_del)) {
//         header("Location: /Care4you/admin/admin-asst-view.php");
//     } else {
//         echo "Error deleting record: " . mysqli_error($conn);
//     }
//    }

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-session.css">
    <title>ADMIN</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="detail-txt-session">Detail of Session ID <div class="id-txt-session"><?php echo $row['doctor_id']; ?></div>
        </div>
              <div class="square-detail-session">

              <div class="detail-session">
        
            <table class="detail-table-session-deatil">
                <tr>
                    <td>Doctor ID :</td>
                    <td><?php echo $row['doctor_id']; ?></td>
                </tr>
                
                <tr>
                    <td>Doctor Name :</td>
                    <td><?php echo $row['doc_name']; ?></td>
                </tr>
                <tr>
                    <td>Doctor ID :</td>
                    <td><?php echo $row['doctor_id']; ?></td>
                </tr>
            
                <tr>
                    <td>Assitant Name :</td>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                
                <tr>
                    <td>Date :</td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
                <tr>
                    <td>Room :</td>
                    <td><?php echo $row['room_no']; ?></td>
                </tr>
                <tr>
                    <td>Time Slot :</td>
                    <td><?php echo $row['time_slot']; ?></td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <?php
                            if($row['status']==0){
                                $status="Activate";
                                include('./admin-session-pop.php');
                            
                       ?>
                        <button class="btn-del-doc-enable" onclick="document.getElementById('id01').style.display='block'; 
                                document.getElementById('del').action = '?id=<?php echo $row['session_id'] ?>&activate=<?php echo $row['session_id'] ?> ';
                                ">
                                <i class="fa-solid fa-toggle-on"></i>
                                Cancel Session
                                </button>

                                <?php
                          }     else{
                                      
                                $status = "Cancel";
                                include('./admin-session-pop.php');
                               
                            
                               ?>
                               <button class="btn-del-doc-enable" onclick="document.getElementById('id01').style.display='block'; 
                               document.getElementById('del').action = '?id=<?php echo $row['session_id'] ?>&cancel=<?php echo $row['session_id'] ?>';
                               ">
                               <i class="fa-solid fa-toggle-on"></i>
                               Activate Session
                               </button>

                               <?php 
                          };
                            ?>
                                
                </tr>
                
                
            </table>
        
           <!-- <button class="btn-del-session" >Delete Session</button> -->

           
            <button class="btn-back-session" onclick="location.href='admin-session-view.php'">Back</button>
            
            
            
            
        </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>