
<?php  
    require('../config/constants.php');
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require '../libraries/PHPMailer/vendor/autoload.php';




  if(isset($_GET['session_id'])){
     $id=$_GET['session_id'];

     $query2 = "SELECT * FROM tbl_docappointment
  INNER JOIN tbl_docsession ON tbl_docsession.session_id = tbl_docappointment.session_id
  INNER JOIN tbl_doctor ON tbl_doctor.doctor_id = tbl_docsession.doctor_id
  INNER JOIN tbl_sysusers ON tbl_sysusers.userid = tbl_docappointment.created_by
  WHERE tbl_docappointment.session_id = '$id'";

$result2 = mysqli_query($conn, $query2);


      while($row2 = mysqli_fetch_assoc($result2)){

            //print_r($row2['email']);
            $email=$row2['email'];    // doctor mail
            $message="<b>Dear Customer,</b><br>

           <p> I am writing to inform you that the session you had scheduled Appointment id ". $row2['docapt_id'] ." on Appointment number ".$row2['docapt_no']." with ". $row2['doc_name'] . " on ". $row2['date'] ." at ". $row2['docapt_time']  ." has been cancelled by the admin of our system due to unforeseen circumstances. We apologize for any inconvenience this may have caused you.
            
            As you have made the payment for the session, we will initiate the refund process immediately. The amount will be credited back to the original mode of payment within 2 working days.</p>
            
          <p>   If you have any further queries regarding the refund process, please do not hesitate to contact us. We appreciate your patience and understanding in this matter.</p>
            
           <p> Thank you for choosing our platform, and we hope to be of service to you in the future.</p><br>
            
           <p> Best regards,</p>
            
            Admin of CARE FOR YOU";

           print_r($message);


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
               
               // header("Location: /Care4you/admin/admin-session-view.php?email=sent");

            } catch (Exception $e) {
                $emailNotFound = "The mail could not be sent. Try again! ".$mail->ErrorInfo;
                print_r($mail->ErrorInfo);

            }
           

      }  

     
     
    $query="SELECT * FROM tbl_docsession 
    INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
    INNER JOIN tbl_docappointment ON tbl_docappointment.session_id =  tbl_docsession.session_id
    INNER JOIN tbl_sysusers ON tbl_sysusers.userid=tbl_doctor.userid
    WHERE tbl_docsession.session_id = $id";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
     //  print_r($row);die();

   // time slot
   if( $row['time_slot']==0){
    $time='8am-10am';
  } elseif( $row['time_slot']==1){
    $time='10am-12pm';
  }elseif( $row['time_slot']==2){
    $time='12pm-2pm';
  }elseif( $row['time_slot']==3){
    $time='2pm-4pm';
  }elseif( $row['time_slot']==4){
    $time='2pm-6pm';
  }


    
                $email=$row['email'];    // doctor mail
                $message=
               "<b> Dear Doctor". $row['doc_name'].",</b></br>".
                
                "<p>We regret to inform you that the session scheduled for the following details:</p>
                
                <p>Time Slot:".$time."</p>
               <p> Room No:". $row['room_no']."</p>
                <p>Date: " .$row['date']."</p>

                <p>has been cancelled due to unforeseen circumstances. We apologize for any inconvenience this may have caused.
                
                Please let us know if you have any questions or concerns regarding this cancellation.</p>
                
                <p>Thank you for your understanding.</p></br>
                
                <p>Best regards,</p>
                
                Admin of Care for you";
                    
     
                
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
                    $emailNotFound = "The mail could not be sent. Try again! ".$mail->ErrorInfo;
                    print_r($mail->ErrorInfo);

                }
  }


  



 
  ?>
  
