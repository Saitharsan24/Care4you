<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?>
<?php require '../libraries/PHPMailer/vendor/autoload.php'; ?>
<?php require '../libraries/PHPMailer/vendor/payment_config.php'; ?>



<?php 
//Redirection from javascript to clear tentative booking

    if(isset($_GET['cancelId'])){

      $clear_apt = $_GET['cancelId'];
      //print_r('hi'.$clear_apt);die();
      
      $sqlclear = "DELETE FROM tbl_docappointment WHERE docapt_id = '$clear_apt'";
      $resultClear = mysqli_query($conn, $sqlclear);

      if($resultClear){

        unset($_SESSION['cleardocapt']);
        header('Location:'.SITEURL.'patient/patient_docappointments.php');
      }

    }
?>




<?php
    date_default_timezone_set("Asia/Calcutta");

  

    //getting data from URL 
    $session_id = $_GET['id'];
    $my_other = $_GET['myother'];
    $lastId = $_GET['lastid'];

    //retrieving session variables
    $apt_time_format = $_SESSION['apt_time'];
    $apt_no = $_SESSION['apt_no'];
    $user_id = $_SESSION['user_id'];
    $timer_flag = $_SESSION['timer_flag'];
        
    //checking whether apt for myslef or other
    if($my_other==0){
      
      //getting user id and retrieving p_id
      $sql = "SELECT * FROM tbl_patient 
                INNER JOIN tbl_sysusers ON tbl_patient.userid = tbl_sysusers.userid
                AND tbl_patient.userid = '$user_id'";
      $results = mysqli_query($conn, $sql);
      
      //fetching data from patient table
      if($results){
        $row = mysqli_fetch_assoc($results);
        
        $pname = $row['first_name'];
        $pnic = $row['nic'];
        $pcontact = $row['contact'];
        $pemail = $row['email'];
      }
    }

    //getting doctor details from the database
    $sql1 = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";
    $result1 = mysqli_query($conn, $sql1);

    //getting doctor details from the database
    $sql2 = "SELECT * FROM tbl_docappointment WHERE docapt_id = '$lastId'";
    $result2 = mysqli_query($conn,$sql2);

    //fetching data from doct table
    if($result2){
      $row1 = mysqli_fetch_assoc($result1);
      $row2 = mysqli_fetch_assoc($result2);
      $current_time =strtotime(date("y-m-d H:i:s"));
      $created_date = strtotime($row2['created_at']);

      // print_r($row2['created_at']);die();
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
    <script>
      window.onload = function() {
            var countdownElement = document.getElementById("countdown");
            var timeInSeconds = <?php echo ($created_date + 600) - $current_time?>; // 10 minutes = 10 * 60 seconds

            var countdownInterval = setInterval(function() {
                var minutes = Math.floor(timeInSeconds / 60);
                var seconds = timeInSeconds % 60;

                countdownElement.innerHTML = minutes + "m " + seconds + "s";

                if (timeInSeconds <= 0) {
                    clearInterval(countdownInterval);
                    <?php $_SESSION['cleardocapt'] = $lastId; ?>
                    window.location = "http://localhost/Care4you/patient/patient_bookdoc2.php?cancelId=<?php echo $lastId ?>";
                }

                timeInSeconds--;
            }, 1000); // Update every second (1000ms)
        };
    </script>

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
          <form action="./patient_docappointments.php" method="post" id="addform">

                  <div>
                    <?php 
                        if($my_other==0){ //For myslef appointment part
                    ?>
                          <div class="form-itm">
                            <p>Patient Name :</p>
                            <input type="text" value="<?php echo $pname ?>" readonly/>
                          </div>

                          <div class="form-itm">
                            <p>NIC No :</p>
                            <input type="text" value="<?php echo $pnic ?>" readonly/>
                          </div>

                          <div class="form-itm">
                            <p>Contact No :</p>
                            <input type="text" value="<?php echo $pcontact ?>" readonly/>
                          </div>

                    <?php
                        }else { //For others appointment part
                    ?>
                          <div class="form-itm">
                            <p>Patient Full Name :</p>
                            <input type="text" name="pname" placeholder="Enter patient name" required/>
                          </div>

                          <div class="form-itm">
                            <p>Your relationship to the patient :</p>
                            <input type="text" name="relationship" placeholder="Enter relatioship" required/>
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
                        $_SESSION['donating_amount'] = ($booking_fee+$doc_fee)*100;
                    ?>

                  </div>

                          <!-- <div class="form-divider"></div> -->

                  <div>

                    <div class="form-itm">
                      <p>Doctor fee :</p>
                      <input type="text"  value="<?php echo "Rs.".$doc_fee ?>" readonly/>
                    </div>

                    <div class="form-itm">
                      <p>Hospital charges :</p>
                      <input type="text" value="<?php echo "Rs.".$booking_fee ?>" readonly/>
                    </div>

                    <div class="form-itm">
                      <p>Total amount :</p>
                      <input type="text" name="nettotal" value="<?php echo "Rs.".($booking_fee+$doc_fee) ?>" readonly/>
                    </div>

                  </div>

                  <div class="apt-btn form-set-btn">

                    <div class="apt-btn-book2">
                      <p id="countdown">00:00</p>
                    </div>
                  
                    <div class="apt-btn-css">
                    
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo $_SESSION['public_key'] ?>"
                            data-amount="<?php echo ($booking_fee+$doc_fee)*100 ?>" data-name="CareForYou Payment"
                            data-description="Donate to Save Lives" data-currency="lkr"
                            data-image="../images/logoicon.png" 
                            data-email="<?php echo $pemail ?>">
                        </script>
                        <!-- <img class="cardLogos-img" src="./../../public/img/orgdashboard/card logos.jpg" alt="req"> -->
                        <!-- <a href="./patient_docappointments.php"><button type="submit" name="paylater">Pay</button></a> -->
                    </div>
                              
                  </div>

          </form>
        </div>

        <div class="form-set form-bottom-text">
          <p>** NOTE: You have to make the payment within 10min.</p>
        </div>

      </div>

    </div>
  </body>
</html>


<?php 

    // if(isset($_POST['paylater'])){
      
     
    //   //Inserting the system user appointment 
    //   if($my_other==0){
        
    //     //inserting into doc appointment table
    //     $net_total = $booking_fee + $doc_fee;
      
    //     $aptsqlupdate = "UPDATE tbl_docappointment 
    //                       SET net_total = '$net_total',
    //                           docapt_status = 1
    //                       WHERE
    //                           docapt_id = '$lastId'";

    //     $aptupdateresult = mysqli_query($conn,$aptsqlupdate);
                
    //     //updating no of patient in docsession table
    //     $new_no_of_apt = $row1['no_of_appointment'] + 1;

    //     $sqlupdate = "UPDATE tbl_docsession
    //                     SET no_of_appointment ='$new_no_of_apt' 
    //                     WHERE session_id = '$session_id'";

    //     $updateresult = mysqli_query($conn,$sqlupdate);
        
    //     if($aptupdateresult && $updateresult){
            
    //         header('Location:'.SITEURL.'patient/patient_docappointments.php');

    //     }else{

    //         echo "Error: " . $s . "<br>" . mysqli_error($conn);
    //         die();

    //     }
        
    //   }
     
      
    //   //inserting non system users
    //   if($my_other==1){

        
    //       //inserting into doc appointment table
    //       $net_total = $booking_fee + $doc_fee;
    //       $p_name = $_POST['pname'];
    //       $p_contact = $_POST['contact'];
    //       $p_nic = $_POST['nic'];
    //       $relationship = $_POST['relationship'];
    //       // print_r($p_name);die();

    //       $aptsqlupdate = "UPDATE tbl_docappointment 
    //                         SET pat_name = '$p_name',
    //                             relationship = '$relationship',
    //                             pat_nic = '$p_nic',
    //                             pat_contact = '$p_contact',
    //                             net_total = '$net_total',
    //                             docapt_status = 1
    //                         WHERE
    //                             docapt_id = '$lastId'";
        
    //       $aptupdateresult = mysqli_query($conn,$aptsqlupdate);
                       
    //       //updating no of patient in docsession table
    //       $new_no_of_apt = $row1['no_of_appointment'] + 1;
       
    //       $sqlupdate = "UPDATE tbl_docsession
    //                       SET no_of_appointment ='$new_no_of_apt' 
    //                       WHERE session_id = '$session_id'";
       
    //       $updateresult = mysqli_query($conn,$sqlupdate);

    //       //redirect to appointments
               
    //       if($aptupdateresult && $updateresult){
                   
    //         echo "<script> window.location.href='http://localhost/Care4you/patient/patient_docappointments.php';</script>";

    //       }else{
       
    //           echo "Error: " . $s . "<br>" . mysqli_error($conn);
    //           die();
       
    //       } 

    //   }

    // }

    if(isset($_POST['stripeToken'])){
      \Stripe\Stripe::setVerifySslCerts(false);
                        try {
                            $token=$_POST['stripeToken'];
    
      $data=\Stripe\Charge::create(array(
        "amount"=> $_SESSION['donating_amount'],
        "currency"=>"lkr",
        "description"=>"Cash Donation",
        "source"=>$token,
      ));
        echo "Successfull";

       if (isset($_POST['pname'])) {
        print_r($_POST['pname']);die();
       }
        exit();
    
    
    
      } catch(\Stripe\Exception\CardException $e) {
        $_SESSION['PaymentError'] = $e->getError()->message;
        echo "Card Fail";
        unset($_SESSION['donating_amount']);
    
        // print_r("A payment error occurred: {$e->getError()->message}");
      } catch (\Stripe\Exception\InvalidRequestException $e) {
        print_r("An invalid request occurred.");
        unset($_SESSION['donating_amount']);
    
      } catch (Exception $e) {
        print_r("Another problem occurred, maybe unrelated to Stripe.");
        unset($_SESSION['donating_amount']);
    
      }
    
      
    }
?>