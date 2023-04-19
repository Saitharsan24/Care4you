<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<?php
$id = $_GET['id'];

$query="SELECT * FROM tbl_assistant INNER JOIN tbl_sysusers ON tbl_assistant.userid = tbl_sysusers.userid WHERE Assistant_ID = $id";
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
        header("Location: /Care4you/admin/admin-asst-view.php");
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
        header("Location: /Care4you/admin/admin-asst-view.php");
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
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="detail-txt-asst">ID <div class="id-txt-asst"><?php echo $row['Assistant_ID']?> </div>Assistant's Detail
        </div>
              <div class="square-detail-asst">

              <div class="detail-asst">
        
            <table class="detail-table-asst-deatil">
                <tr>
                    <td>Assistant ID :</td>
                    <td><?php echo $row['Assistant_ID']?></td>
                </tr>
                
                <tr>
                    <td>Assistant Name :</td>
                    <td><?php echo $row['name']?></td>
                </tr>
                
                <tr>
                    <td>Username :</td>
                    <td><?php echo $row['username']?></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><?php echo $row['name']?></td>
                </tr>
                <tr>
                    <td>NIC no :</td>
                    <td><?php echo $row['nic']?></td>
                </tr>
                <tr>
                    <td>Email ID :</td>
                    <td><?php echo $row['email']?></td>
                </tr>
                
                
            </table>
            <?php
            if ($row['status'] == 1) { ?>
            <?php 

               
                $status = "Disable";
                include('./admin-asst-pop.php');
                
                ?>
        
                <button class="btn-disable-asst" onclick="document.getElementById('id01').style.display='block'; 
                document.getElementById('del').action = '?id=<?php echo $row['Assistant_ID']?>&disable=<?php echo $row['userid']?> ';
                " >Disable Account</button>

                <?php 
            }
            else {
                
                $status = "Enable";
                include('./admin-asst-pop.php');
                ?>

                 <button class="btn-enable-asst" onclick="document.getElementById('id01').style.display='block'; 
                document.getElementById('del').action = '?id=<?php echo $row['Assistant_ID']?>&enable=<?php echo $row['userid']?> ';
                " >Enable Account</button> 

            <?php };
            ?>

           
            <button class="btn-del-back-asst" onclick="location.href='admin-asst-view.php'">Back</button>
            
            
            
            
        </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>