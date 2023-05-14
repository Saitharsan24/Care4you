<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('asst_getinfo.php') ?>
<?php include('./asst_popups/editprespopup.php') ?>

<?php 

    


    $docapt_id = $_GET['id'];
    $sql = "SELECT * FROM tbl_docappointment 
                INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid  
                INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
                AND docapt_id = '$docapt_id'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

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
            <div class="back" onclick="location.href='asst_appointments.php?id=<?php echo $row['session_id'] ?>'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="container-row">
            <div class="container1">
                <div class="sessionidTXT">
                    REFERENCE NO<br/><br/>
                    <div style="color:#000; font-size:100px; margin-top:20px;"><?php echo $docapt_id ?></div>
                </div>
            </div>
            <div class="container2">
                <form method="post">
                <table class="viewtblAPP">
                    <tr>
                        <td colspan="2">
                            <div class="sessionidTXT" style="margin-bottom:10px;"><i class="fa-solid fa-book-medical"></i>&nbsp;APPOINTMENT DETAILS</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Appointment No :</td>
                        <td class="typeL"><?php echo $row['docapt_no'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient ID :</td>
                        <td class="typeL"><?php echo $row['p_id'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient Name :</td>
                        
                            <?php 
                                if($row['my_other'] == 1){
                            ?>
                                <td class="typeL"><?php echo $row['pat_name'] ?></td>
                            <?php
                                }else{
                            ?>
                                <td class="typeL"><?php echo $row['first_name'] ?></td>
                            <?php        
                                }
                            ?>
                    </tr>
                    <tr>
                        <td class="typeR">Appointment Time :</td>
                        <td class="typeL"><?php echo $row['docapt_time'] ?></td>
                    </tr>

                    <?php 
                        if($row['docapt_status'] == 1){
                    ?>  
                            <tr>
                                <td class="typeR">Appointment Status :</td>
                                <td class="typeL">
                                    <?php 
                                        // if($row['docapt_status']==1){
                                        //     echo ' '.'<button class="order-st00">Confirmed</button>';
                                        // } elseif($row['docapt_status']==2){
                                        //     echo ' '.'<button class="order-st01">Completed</button>';
                                        // }
                                    ?>

                                    <label class="switch">
                                        <input type="checkbox" id="toggle" name="attendance">
                                        <span class="slider round"></span>
                                        <span id="toggle-text">Not Attended</span>
                                    </label>
                                    <script>
                                        const toggle = document.getElementById("toggle");
                                        const toggleText = document.getElementById("toggle-text");

                                        toggle.addEventListener("change", function() {
                                        if (this.checked) {
                                            toggleText.textContent = "Attended";
                                        } else {
                                            toggleText.textContent = "Not Attended";
                                        }  
                                        });
                                    </script>
                                </td>
                            </tr>

                            <tr>
                                <td class="typeR">Upload Prescription :</td>
                                <td class="typeL">
                                <form method="POST">  
                                <div class="type-file upload-input">
                                    <input type="file" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription" required/>
                                </div>
                                </td>
                        
                            </tr>

                            <tr>
                                <td class="typeR">Other Remarks :</td>
                                <td class="typeL">
                                    <textarea class="textarea" name="asst-remark" id="address" placeholder="Enter Doctor Remarks Here"></textarea>
                                </td>
                            </tr>
                    <?php
                        }

                        if($row['docapt_status'] == 3 || $row['docapt_status'] == 4){
                    ?>          
                                
                            <tr>    
                                <td class="typeR">Appointment Status :</td>
                                
                                <td class="typeL">
                                    <?php 
                                    if($row['docapt_status']==3){
                                        echo ' '.'<button class="docapt-st03">Completed</button>';
                                    } elseif($row['docapt_status']==4){
                                        echo ' '.'<button class="docapt-st04">Not Attended</button>';
                                    } 
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="typeR">Prescription :</td>
                                <td class="typeL">
                                    <?php 
                                        echo $row['prescription_name']; 
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="typeR">Other Remarks :</td>
                                <td class="typeL">
                                   <?php echo $row['other_remark']; ?>
                                </td>
                            </tr>
                    <?php 
                        }
                    ?>

                    <tr>
                        <td>        
                                <?php 
                                    if ($row['docapt_status']==1) {
                                ?>
                                        <button class="btnpre" type="submit" name="des-upload"><i class="fa-solid fa-arrow-up-from-bracket"></i>upload</button></form>
                                        &nbsp;
                                <?php
                                    }
                                ?>
                                
                                <?php
                                    if ($row['docapt_status'] == 3 || $row['docapt_status'] == 4) {
                                ?>
                                        <button type="button" class="btnpre" onclick="openPopupE()"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                                        
                                <?php 
                                    }
                                ?>

                        </td>
                    </tr>
                </table>
                </form>
            </div>
            </div>
            
            </div>
        </div>
</body>
</html>


<?php 
    if(isset($_POST['des-upload'])){

        if(isset($_FILES['prescription']['name']))
        {
              
            //Upload the prescription
            //To upload the prescription we need the file name, source path and destination path

            //Get the prescription name
            $prescription_name = $_FILES['prescription']['name'];
            

            //Upload prescription only if prescription is selected
            if($prescription_name != "")
            {
                //Auto Rename the Prescription

                //Get the extension of the prescription
                $namarr =explode('.',$prescription_name);
                $ext = end($namarr);

                //Rename the prescription
                $prescription_name = $docapt_id."_".$p_id.".".$ext;

                //Get the source path
                $source_path = $_FILES['prescription']['tmp_name'];

                //Give the destination path
                $destination_path = "../images/docprescription/".$prescription_name; 

                //Upload the prescription
                $upload = move_uploaded_file($source_path,$destination_path);

                //Check whether the prescription is uploaded or not
                if($upload == FALSE)
                {
                    //$_SESSION['upload'] = "Failed to upload Prescription! Please Retry";
                    //Redirect to place order page
                    // header('location:'.SITEURL.'/patient/patient_pharmorders.php'); 
                    //Stop the process
                    die();
                }

            } 

        }
        else
        {
            //Prescription not uploaded and prescription name is not set (Data can not save)
            $prescription_name = "";
        }

        if(isset($_POST['attendance'])){
            $attended_check = 3;
        } else{
            $attended_check = 4;
        }
        
        $remarks = $_POST['asst-remark'];


        $sql = "UPDATE tbl_docappointment 
                    SET docapt_status = '$attended_check',
                        other_remark = '$remarks',
                        prescription_name = '$prescription_name'
                    WHERE docapt_id = '$docapt_id'";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            // $_SESSION['pres-upload'] == 1;
            // echo "<script> window.location.href='http://localhost/Care4you/assistant/asst_viewappointment.php?id=$docapt_id';</script>";
            echo "<script>openPopupPU()</script>";
        }
    
    }



?>