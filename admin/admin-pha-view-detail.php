<?php include('../config/constants.php'); ?>


<?php
$id = $_GET['id'];

$query="SELECT * FROM tbl_pharmacist INNER JOIN tbl_sysusers ON tbl_pharmacist.userid = tbl_sysusers.userid WHERE pharmacist_id = $id";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

?>

<?php
   

   if(isset($_GET['disable'])){
    $userid = $_GET['disable'];
    $query_del = "UPDATE tbl_sysusers
    SET status = 0
    WHERE userid = $userid";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-pha-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }

   if(isset($_GET['enable'])){
    $userid = $_GET['enable'];
    $query_del = "UPDATE tbl_sysusers
    SET status = 1
    WHERE userid = $userid";
    
    if (mysqli_query($conn, $query_del)) {
        header("Location: /Care4you/admin/admin-pha-view.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
   }
   //$result=mysqli_query($conn, $sql);

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
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
            <div class="detail-txt-pha">ID <div class="id-txt-pha"><?php echo $row['pharmacist_id'] ?> </div>Pharmacis's Detail
        </div>
              <div class="square-detail-pha">

              <div class="detail-pha">
       <!-- <form method="post"> -->
            <table class="detail-table-pha-deatil">
                <tr>
                    <td>Pharmacist ID :</td>
                    <td><?php echo $row['pharmacist_id']?></td>
                </tr>
                
                <tr>
                    <td>Phamacist Name :</td>
                    <td><?php echo $row['fullname']; ?></td>
                </tr>
                
                <tr>
                    <td>Username :</td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><?php echo $row['contact_number']; ?></td>
                </tr>
                <tr>
                    <td>Email ID :</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td>NIC Number :</td>
                    <td><?php echo $row['nic']; ?></td>
                </tr>
                
            </table>
            <?php
            if ($row['status'] == 1) { 
            
                $status = "Disable";
                include('./admin-pha-pop.php');
                
                ?>
        
                <button class="btn-disable-pha" onclick="document.getElementById('id01').style.display='block'; 
                document.getElementById('del').action = '?id=<?php echo $row['pharmacist_id']?>&disable=<?php echo $row['userid']?> ';
                " >Disable Account</button>

                <?php 
            }
            else {
                
                $status = "Enable";
                include('./admin-pha-pop.php');
                ?>

                 <button class="btn-enable-pha" onclick="document.getElementById('id01').style.display='block'; 
                document.getElementById('del').action = '?id=<?php echo $row['pharmacist_id']?>&enable=<?php echo $row['userid']?> ';
                " >Enable Account</button> 

            <?php };
            ?>

            
            <button class="btn-edit-pha"  onclick="location.href='#'" type="submit" name="edit">Edit Account</button>
            
        <!--</form>-->
            <button class="btn-del-back-pha"  onclick="location.href='admin-pha-view.php'">Back</button>
            
                            </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>