
<?php  
    include('../config/constants.php');
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require '../libraries/PHPMailer/vendor/autoload.php';




  if(isset($_SESSION['doc_id'])){
     $id=$_SESSION['doc_id'];
    
    
    $query = "SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid WHERE doctor_id=$id"; // fetch the details from table tbl_doctor and tbl_sysusers
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $email=$row['email'];
                $message="dshbuybfuybufyb";   
     
//                 $query_1="SELECT tbl_docsession.session_id, tbl_docsession.date, tbl_docsession.time_slot, tbl_docsession.room_no, tbl_docsession.assistant_id, tbl_doctor.doc_name, tbl_doctor.contact_number, tbl_doctor.slmc_number, tbl_doctor.charge 
// FROM tbl_docsession 
// INNER JOIN tbl_doctor 
// ON tbl_docsession.doctor_id = tbl_doctor.doctor_id 
// WHERE tbl_docsession.doctor_id = [insert your doctor_id here]; "
   // $query_1="SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id WHERE doctor_id=$id";
    //$result = mysqli_query($conn, $query);
    //$row = mysqli_fetch_array($result);
   // print_r($row);die();
                
                
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                  
                    //Server settings
                    $mail->isSMTP();                                     //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                            //Enable SMTP authentication
                    $mail->Username   = 'care4u.242000@gmail.com';       //SMTP username
                    $mail->Password   = 'zycbeglgbinzqlgh';                  //SMTP password
                    $mail->SMTPSecure = 'tls';                           //Enable implicit TLS encryption
                    $mail->Port       = 587;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('care4u.242000@gmail.com', 'Admin');
                    $mail->addAddress('laxshan1906@gmail.com','');                       //Add a recipient 
                    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Session Confirmation';
                    $mail->Body    = 'Your OTP code for password reset is:';
                
                    $mail->send();
                    
                    echo 'Message has been sent';

                    
                    // Redirect the user to the OTP verification page
                    header('location:'.SITEURL.'.admin/admin-session-view.php');
                    exit();

                } catch (Exception $e) {
                    $emailNotFound = "The OTP could not be sent. Try again! ".$mail->ErrorInfo;
                }
  }
  ?>
  
