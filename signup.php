<?php include('./config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign Up</title>
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
                    <div class="nav-item item4"><a href="./contactus.php">Contact Us</a></div>   
                </div>  
                <a href="./signin.php" class="nav-signin"><div class="item5"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Sign In</div></a>
                <div class="divider"></div>
                <a href="./signup.php" class="nav-signin"><div class="item5"><i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Sign Up</div></a>
            </div>
        </div>
    </div>
    <div class="bottom">
    <form method="POST" id="signup">

    <div class="signup-heading">
        <h2 class="signup-heading1">Sign Up</h2>
        <p class="signup-heading2">Fill your detials to get registered</p>
    </div>

    <!-- Form step1 -->
    <div class="wrapper-signup">

        <div class="step step1">

            <!--Row 01-->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">First Name</p>
                    <input type="text" class="signup-input" name="fname" pattern="[a-zA-Z]{1,50}" placeholder="Ex: Amal" required="" autofocus="true" title="Please enter a valid First Name that only contain letters!"/>
                </div>

                <div class="row-item">
                    <p class="form-text">Last Name</p>
                    <input type="text" class="signup-input" name="lname" pattern="[a-zA-Z]{1,50}" placeholder="Ex: Perera" required="" title="Please enter a valid Last Name that only contain letters!"/>
                </div>
            </div>

            <!--Row 02-->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">Gender</p>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Not Given">Preferred not to Say</option>
                    </select>
                </div>

                <div class="row-item">
                    <p class="form-text">Date of Birth</p>
                    <!-- Maximum allowed date to 18 years ago from the current date -->
                    <input type="Date" class="signup-input" name="dateofbirth" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>"  required="" />
                </div>
            </div>

            <!--Row 03-->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">NIC Number</p>
                    <input type="text" class="signup-input" name="nic" pattern="[0-9]{9}[Vv0-9]{1,3}" placeholder="Ex: 200017172432" required="" />
                </div>

                <div class="row-item">
                    <p class="form-text">Contact Number</p>
                    <input type="text" class="signup-input" name="contactnumber" pattern="[0-0]{1}[0-9]{9}" placeholder="Ex: 0771234567" required="" />
                </div>
            </div>

            <!-- Row 04 -->
            <div class="signup-address">
                <p class="form-text">Address</p>
                <textarea class="textarea" name="address" id="address" cols="66" rows="3" placeholder="Type your address here" required=""></textarea>
            </div>

            <!-- Row 05 -->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">Email Address</p>
                    <input type="email" class="signup-input" name="email" pattern="^[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="Ex: example@gmail.com" required="" /><br />
                </div>

                <div class="row-item">
                    <p class="form-text">Username</p>
                    <!-- This pattern ensures that the username 
                    - starts with a letter, 
                    - is at least 8 characters long,
                    - contains only letters, numbers, underscores, and hyphens -->
                    <input type="text" class="signup-input" name="username" pattern="^[a-zA-Z][a-zA-Z0-9_-]{7,15}$" placeholder="" required="" title="Please enter a Username that starts with a letter & minimum 8 characters!"/><br />
                </div>
            </div>

            <!-- Row 06 -->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">Password</p>
                    <!-- This pattern ensures that the password 
                    - contain one or more uppercase characters, 
                    - contain one or more lowercase characters,
                    - contain one or more numeric values,
                    - contain one or more special characters,
                    - at least 8 characters long -->
                    <input type="password" class="signup-input" name="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[!@#$%^&*()_+])[A-Za-z0-9!@#$%^&*()_+]{8,}$" placeholder="Enter a password" required="" oninvalid="setCustomValidity('Please enter a Password\n- contain one or more uppercase characters\n- contain one or more lowercase characters\n- contain one or more numeric values\n- contain one or more special characters\n- at least 8 characters long')" onchange="try{setCustomValidity('')}catch(e){}"/><br />
                </div>

                <div class="row-item">
                    <p class="form-text">Confirm Password</p>
                    <input type="password" class="signup-input" name="confirmpassword"  placeholder="Confirm Password" required="" /><br />
                </div>
            </div>

        </div>

    </div>

    <div class="btn-signup">
        <button type="submit" class="btn signin">Sign Up</button>
    </div>

    </form>

    </div>

</body>

</html>

<?php

    // $fname = "";
    // $lname = "";
    // $gender = "";
    // $dob = "";
    // $nic = "";
    // $contact = "";
    // $address = "";
    // $email = "";
    // $username = "";
    // $password = "";
    // $confirmpassword = "";

    // if(isset($_POST['submit']))
    // {
    //     $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    //     $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    //     $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    //     $dob = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
    //     $nic = mysqli_real_escape_string($conn, $_POST['nic']);
    //     $contact = mysqli_real_escape_string($conn, $_POST['contactnumber']);
    //     $address = mysqli_real_escape_string($conn, $_POST['address']);
    //     $email = mysqli_real_escape_string($conn, $_POST['email']);
    //     $username = mysqli_real_escape_string($conn, $_POST['username']);
    //     $password = mysqli_real_escape_string($conn, $_POST['password']);
    //     $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

    //     // Check if the password and confirm password fields match
    //     if ($password !== $confirmpassword) {
    //         $_SESSION['signup_error'] = "Password and Confirm Password fields do not match.";
    //         $_SESSION['signup_fname'] = $fname;
    //         $_SESSION['signup_lname'] = $lname;
    //         $_SESSION['signup_gender'] = $gender;
    //         $_SESSION['signup_dob'] = $dob;
    //         $_SESSION['signup_nic'] = $nic;
    //         $_SESSION['signup_contact'] = $contact;
    //         $_SESSION['signup_address'] = $address;
    //         $_SESSION['signup_email'] = $email;
    //         $_SESSION['signup_username'] = $username;
    //         header("Location: signup.php");
    //         exit();
    //     }
    //     else {
    //         // Insert the user data into the database
    //         $sql = "INSERT INTO tbl_users SET
    //                 first_name='$fname',
    //                 last_name='$lname',
    //                 gender='$gender',
    //                 dob='$dob',
    //                 nic='$nic',
    //                 contact='$contact',
    //                 address='$address',
    //                 email='$email',
    //                 username='$username',
    //                 password='$password'";

    //         $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //         if($res==TRUE)
    //         {
    //             $_SESSION['signup_success'] = "Registration Successful. Please Sign In.";
    //             header("Location: signin.php");
    //         }
    //         else
    //         {
    //             $_SESSION['signup_error'] = "Registration Failed. Please try again.";
    //             header("Location: signup.php");
    //         }
    //         exit();
    //     }
    // }
?>