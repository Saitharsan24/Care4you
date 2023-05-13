
<?php  
    require('../config/constants.php');
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require '../libraries/PHPMailer/vendor/autoload.php';




  if(isset($_GET['doc_id'])){
     $id=$_GET['doc_id'];
   // print_r($id);die();
    
    $query = "SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid WHERE doctor_id=$id"; // fetch the details from table tbl_doctor and tbl_sysusers
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $email=$row['email'];    // doctor mail
                $message="session cancelled" ;   
     
                
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                   
                    //Server settings
                    $mail->isSMTP(); 
                    $mail->Mailer = "smtp";                                    //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                            //Enable SMTP authentication
                    $mail->Username   = 'care4u.242000@gmail.com';       //SMTP username
                    $mail->Password   = 'zycbeglgbinzqlgh';                  //SMTP password
                    $mail->SMTPSecure = 'tls';                           //Enable implicit TLS encryption
                    $mail->Port       = 587;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    //Recipients
                    $mail->setFrom('care4u.242000@gmail.com', 'Admin');
                    $mail->addAddress($email);                       //Add a recipient 
                    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Session Cancelled';
                    $mail->Body    = $message;
                    $mail->send();
                   
                    header("Location: /Care4you/admin/admin-session-view.php?email=sent");

                } catch (Exception $e) {
                    $emailNotFound = "The OTP could not be sent. Try again! ".$mail->ErrorInfo;
                    print_r($mail->ErrorInfo);

                }
  }
 
  ?>
  
