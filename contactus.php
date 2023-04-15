<?php include ('./config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"> 
    <title>Contact Us</title>
    <link rel="icon" type="images/x-icon" href="./images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="top">
        <div class="navbar">
            <a href="./index.php"><img src="./images/logo.png" alt="logo" class="logo"></a>
            <div class="nav-link">
                <div class="normal-link">
                    <div class="nav-item item1"><a href="./index.php">Home</a></div>
                    <div class="nav-item item2"><a href="./services.php">Services</a></div>
                    <div class="nav-item item3"><a href="./about.php">About</a></div>
                    <div class="nav-item item4"><a href="./contactus.php" class="active-link">Contact Us</a></div>   
                </div>  
                <a href="./signin.php" class="nav-signin"><div class="item5"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Sign In</div></a>
                <div class="divider"></div>
                <a href="./signup.php" class="nav-signin"><div class="item5"><i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Sign Up</div></a>
            </div>
        </div>
    </div>
    <div class="bottom">

    <div class="background">
        <div class="contact-container">
            <div class="screen">
                <div class="screen-header">
                    <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                        <div class="screen-header-button maximize"></div>
                        <div class="screen-header-button minimize"></div>
                    </div>
                    <div class="screen-header-right">
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                    </div>
                </div>

                <div class="screen-body">
                    <div class="screen-body-item left">
                        <?php 
                            if(isset($_SESSION['contact']))
                            {
                                echo $_SESSION['contact'];
                                unset($_SESSION['contact']);

                            }
                        ?>
                        <div class="app-title">
                            <span>CONTACT</span>
                            <span>US</span>
                        </div>
                        <div class="app-content">
                            We are here to help you in any way we can, <br/>and we would love to hear from you.
                            <br/><br/>
                            <a href="#"><i class="fa-brands fa-square-facebook iconstyle"></i></a> &emsp;
                            <a href="#"><i class="fa-brands fa-square-instagram iconstyle"></i></a> &emsp;
                            <a href="#"><i class="fa-brands fa-square-twitter iconstyle"></i></a>
                        </div>
                        <div class="app-gmail"><a href="mailto:care4you@gmail.com"><i class="fa-solid fa-envelope"></i></a> &nbsp; Gmail Info : <a href="mailto:care4you@gmail.com">care4you@gmail.com</a></div>
                        <div class="app-contact"><i class="fa-solid fa-phone"></i> &nbsp; Contact Info : +94 112 220 666 </div>
                    </div>

                    <div class="screen-body-item">
                        <form action="" method="POST">
                        <div class="app-form">
                            <div class="app-form-group">
                                <input type="text" class="app-form-control" placeholder="Name" name="name">
                            </div>
                            <div class="app-form-group">
                                <input type="email" class="app-form-control" placeholder="Email Address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}.$" required="">
                            </div>
                            <div class="app-form-group">
                                <input type="text" class="app-form-control" placeholder="Contact Number" name="contactnumber" pattern="[0-0]{1}[0-9]{9}">
                            </div>
                            <div class="app-form-group message">
                                <span>
                                <textarea class="app-form-control msg-textarea" placeholder="Message" cols="5" row="2" name="message" required=""></textarea>
                                </span>
                            </div>
                            <div class="app-permission">
                                <input type="checkbox" class="app-permission checkbox" name="agree" value="1">
                                I consent to the storage of my data in accordance with the privacy policy*
                            </div>
                            <br />
                            <div class="app-form-group buttons">
                                <button type="reset" class="app-form-button">Cancel</button>
                                <button type="submit" class="app-form-button" name="send">Send</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
</body>
</html>

<?php

    //Process the value from form and save it in Database

    //Check Submit Button is Clicked or Not?

    if(isset($_POST['send']))
    {
        //Send Button is Clicked
        //echo "<p>Button Clicked</p>";

        if (isset($_POST['agree']) && $_POST['agree'] == '1')
        {
            //Step 01 - Get the data from the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contactnumber = $_POST['contactnumber'];
            $message = $_POST['message'];

            //Step 02 - SQL Query to save the data in Database
            $sql = "INSERT INTO tbl_contactus SET 
                    name = '$name',
                    email ='$email',
                    contactnumber = '$contactnumber',                
                    message = '$message'
                    ";
            //echo $sql;
            
            $res = mysqli_query($conn , $sql) or die(mysqli_error($conn));

            //Step 03 - Check data is inserted (Query executed) or not & Disply Message
            if($res == TRUE){

                //Data inserted
                //echo "Data Inserted";

                //Create Session Variable to display message
                $_SESSION['contact'] = '<div class="success"> Your Message Recorded Successfully</div>';
                //Redirect to the pharmacy_respond.php page
                // header("location:".SITEURL.'contactus.php');
                echo "<script> window.location.href='http://localhost/Care4you/contactus.php';</script>";

            }
            else{

                //Data not inserted
                //echo "Fail to Insert Data";

                //Create Session Variable to display message
                $_SESSION['contact'] = '<div class="error"> Failed to Send Your Message</div>';
                //Redirect to the pharmacy_respond.php page
                // header("location:".SITEURL.'contactus.php');
                echo "<script> window.location.href='http://localhost/Care4you/contactus.php';</script>";

            }
        }

        else
        {
            //Data not inserted
            //echo "Fail to Insert Data";

            //Create Session Variable to display message
            $_SESSION['contact'] = '<div class="error">Try again after agreeing Privacy Policies</div>';
            //Redirect to the pharmacy_respond.php page
            // header("location:".SITEURL.'contactus.php');    
            echo "<script> window.location.href='http://localhost/Care4you/contactus.php';</script>";
        }

    }

?>