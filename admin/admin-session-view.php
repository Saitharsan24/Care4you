<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<?php
$query="SELECT * FROM tbl_docsession ";
$result=mysqli_query($conn,$query);
//$no_row=mysqli_num_rows($result);

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
            
            <button class="btn-addnew" style="width:170px;" onclick="location.href='admin-session-create.php'"><span>create session</span></button>
            <div class="content">
                <table class="tbl-main-session">
                    <thead>
                        <tr>
                            <td>Session ID</td>
                            <td>Room Number</td>
                            <td>Session Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <form>
                        <tr>
                            <td><input type="text" class="search-session" name="session-id"  autofocus="true"/></td>
                            <td><input type="text" class="search-session" name="room-no"  autofocus="true"/></td>
                            <td><input type="text" class="search-session" name="session-status"  autofocus="true"/></td>
                            <td><button class="btn-search" ><span>Search&nbsp;</span></button></td>
                        </tr>
                        </form>
                        <?php 
                        if($result){
                            while($row=mysqli_fetch_array($result)){
                         
                      ?>
                        <tr>
                            <td><?php echo $row['session_id'];  ?> </td>
                            <td><?php echo $row['room_no'];  ?></td>         

                            <td>
                                <?php 
                                    //echo $row['status'];
                                    if($row['status']==0){
                                        echo '<button class="btn-paypend"> Pending </button>';
                                    }else if($row['status']==1){
                                        echo '<button class="btn-confirmed"> Confirmed </button>';
                                    }else if($row['status']==2){
                                        echo '<button class="btn-completed"> Completed </button>';
                                    }else{
                                        echo '<button class="btn-cancelled"> Cancelled </button>'; 
                                    }
                                ?>
                            </td>                           

                            <td><button class="btn-view-session-detail" onclick="location.href='admin-session-view-detail.php?id=<?php echo $row['session_id']; ?>'"><span>Session Details</span></button></td>
                        </tr>
                        
                          <?php     
                    }
                        }?>
                        
                    </tbody>
                </table>
            </div>

        </div>
        </div>


        </body>
</html>