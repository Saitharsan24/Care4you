
<?php  
    require('../config/constants.php');
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require '../libraries/PHPMailer/vendor/autoload.php';




  if(isset($_GET['doc_id'])){
     $id=$_GET['doc_id'];        //get the doc_id useing get
    $sessionid=$_SESSION['session_id'];  //get the session id useing session variable
    
    $query1="SELECT* FROM tbl_docsession";
    $result1 = mysqli_query($conn, $query1);
    $row1=mysqli_fetch_array($result1);
//print_r($row1);die();


    $query = "SELECT * FROM tbl_doctor INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid WHERE doctor_id=$id"; // fetch the details from table tbl_doctor and tbl_sysusers
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);


                //time slot
              if( $row1['time_slot']==0){
                $time='8am-10am';
              } elseif( $row1['time_slot']==1){
                $time='10am-12pm';
              }elseif( $row1['time_slot']==2){
                $time='12pm-2pm';
              }elseif( $row1['time_slot']==3){
                $time='2pm-4pm';
              }elseif( $row1['time_slot']==4){
                $time='2pm-6pm';
              }

                $email=$row['email'];
                $message="<b>Dear Doctor " . $row['doc_name'].",</b></br>" .

                "<p>I hope this email finds you well. As an administrator for our scheduling system, I would like to request your confirmation for a session that has been created on our platform.
                
                The session is scheduled for the following details:</p> </br>".
                
                "<p>Time Slot:". $time. "</p>".
                "<p>Room No:" . $row1['room_no']. "</p>".
                "<p>Date:". $row1['date'].  "</p>".
                "<p>Please confirm your availability for the above-mentioned session by replying to this email with your confirmation or any necessary changes that need to be made.</p>
                
               <p> Thank you for your cooperation in advance.</p>"."<br>".
                
                "<p>Best regards,"."<br>".
                
                "Admin</p>"  ;
                 
                
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
                    $mail->Subject = 'Session Confirmation';
                    $mail->Body    = $message;
                    $mail->send();
                   
                    header("Location: /Care4you/admin/admin-session-view.php?email=sent");

                } catch (Exception $e) {
                    $emailNotFound = "The OTP could not be sent. Try again! ".$mail->ErrorInfo;
                    print_r($mail->ErrorInfo);

                }
  }
 
  ?>
  
