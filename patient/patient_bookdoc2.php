<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?><!DOCTYPE html>

<?php

    //getting data from URL 
    $session_id = $_GET['id'];
    $my_other = $_GET['myother'];

    //retrieving session variables
    $apt_time_format = $_SESSION['apt_time'];
    $apt_no = $_SESSION['apt_no'];
        
    //checking whether apt for myslef or other
    if($my_other==0){
      
      //getting user id and retrieving p_id
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT * FROM tbl_patient WHERE userid = '$user_id'";
      $results = mysqli_query($conn, $sql);
      
      //fetching data from patient table
      if($results){
        $row = mysqli_fetch_assoc($results);
        
        $pname = $row['first_name'];
        $pnic = $row['nic'];
        $pcontact = $row['contact'];
      }
    }

    //getting registered patient details from the database
    $sql1 = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";
    $result1 = mysqli_query($conn, $sql1);

    //fetching data from doct table
    if($result1){
      $row1 = mysqli_fetch_assoc($result1);
      
      $doc_fee = $row1['charge'];
    }

    $booking_fee= 500;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="main-div">
      <div class="home-left">
        <div class="nav-logo">
          <a href="./patient_home.php">
            <img src="../images/logo.png" alt="logo" />
          </a>
        </div>
        <div class="profile-image">
          <img src="../images/user.png" alt="profile-image" />
        </div>
        <div class="nav-links">
          <a href="./patient_home.php">Home</a>
          <a href="./patient_appointments.php" style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical records</a>
          <a href="./patient_doctorlist.php">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>

      <div class="home-right">

        <div class="back" onclick="location.href='patient_bookdoc1.php?id=<?php echo $session_id ?>'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>
        
        <div class="book2-heading"><h2>Book for an Appointment</h2></div>
        <div class="book2-form">
              <form method="POST">

                  <div>
                    <?php 
                        if($my_other==0){
                    ?>
                          <div class="form-itm">
                            <p>Patient Name :</p>
                            <input type="text" name="pname" value="<?php echo $pname ?>" readonly/>
                          </div>

                          <div class="form-itm">
                            <p>NIC No :</p>
                            <input type="text" name="nic" value="<?php echo $pnic ?>" readonly/>
                          </div>

                          <div class="form-itm">
                            <p>Contact No :</p>
                            <input type="text" name="contact" value="<?php echo $pcontact ?>" readonly/>
                          </div>

                    <?php
                        }else {
                    ?>

                          <div class="form-itm">
                            <p>Patient Name :</p>
                            <input type="text" name="pname" placeholder="Enter patient name" required/>
                          </div>

                          <div class="form-itm">
                            <p>NIC No :</p>
                            <input type="text" name="nic" placeholder="Enter patient NIC No" required/>
                          </div>

                          <div class="form-itm">
                            <p>Contact No :</p>
                            <input type="text" name="contact" placeholder="Enter patient contact No" required/>
                          </div>

                    <?php
                        }
                    ?>

                  </div>

                          <!-- <div class="form-divider"></div> -->

                  <div>

                    <div class="form-itm">
                      <p>Doctor fee :</p>
                      <input type="text"  value="<?php echo "Rs.".$doc_fee ?>" readonly/>
                    </div>

                    <div class="form-itm">
                      <p>Booking fee :</p>
                      <input type="text" value="<?php echo "Rs.".$booking_fee ?>" readonly/>
                    </div>

                    <div class="form-itm">
                      <p>Total amount :</p>
                      <input type="text" name="nettotal" value="<?php echo "Rs.".($booking_fee+$doc_fee) ?>" readonly/>
                    </div>

                  </div>

                  <div class="apt-btn form-set-btn">
            
                    <div class="apt-btn-css">
                      <a href="./patient_docappointments.php"><button type="submit" name="paylater">Pay Later</button></a>
                    </div>

                    <div class="apt-btn-space"></div>

                    <div class="apt-btn-css">
                      <a href=""><button>Pay Now</button></a>
                    </div>

                  </div>

              </form>
        </div>

        <div class="form-set form-bottom-text">
          <p>** NOTE: You have to make the payment within 24h.</p>
        </div>

      </div>
    </div>
  </body>
</html>


<?php 

    if(isset($_POST['paylater'])){
      

      //Inserting the system user appointment 
      if($my_other==0){

        //inserting into doc appointment table
        $net_total = $booking_fee + $doc_fee;

        $sqlinsert = "INSERT INTO tbl_docappointment (session_id,docapt_time,docapt_no,docapt_status,created_by,my_other,net_total)
                        VALUES ('$session_id','$apt_time_format','$apt_no'','0','$user_id','$my_other','$net_total')";

        $insertresult = mysqli_query($conn,$sqlinsert);
                
        //updating no of patient in docsession table
        $new_no_of_apt = $row1['no_of_appointment'] + 1;

        $sqlupdate = "UPDATE tbl_docsession
                        SET no_of_appointment ='$new_no_of_apt' 
                        WHERE session_id = '$session_id'";

        $updateresult = mysqli_query($conn,$sqlupdate);
        
        if($insertresult && $updateresult){
            
            header('location:'.SITEURL.'patient/patient_docappointments.php');

        }else{

            echo "Error: " . $s . "<br>" . mysqli_error($conn);
            die();

        }

      }
       
      //inserting non system users
      if($my_other==1){
        
          //inserting into doc appointment table
          $net_total = $booking_fee + $doc_fee;
          $p_name = $_POST['pname'];
          $p_contact = $_POST['contact'];
          $p_nic = $_POST['nic']; 

          $sqlinsert = "INSERT INTO tbl_docappointment (session_id,docapt_time,docapt_no,docapt_status,pat_name,pat_nic,pat_contact,created_by,my_other,net_total)
                          VALUES ('$session_id','$apt_time_format','$apt_no','0','$p_name','$p_contact','$p_nic','$user_id','$my_other','$net_total')";
       
          $insertresult = mysqli_query($conn,$sqlinsert);
                       
          //updating no of patient in docsession table
          $new_no_of_apt = $row1['no_of_appointment'] + 1;
       
          $sqlupdate = "UPDATE tbl_docsession
                          SET no_of_appointment ='$new_no_of_apt' 
                          WHERE session_id = '$session_id'";
       
          $updateresult = mysqli_query($conn,$sqlupdate);
               
          if($insertresult && $updateresult){
                   
              header('location:'.SITEURL.'patient/patient_docappointments.php');
       
          }else{
       
              echo "Error: " . $s . "<br>" . mysqli_error($conn);
              die();
       
          } 

      }

    }
?>