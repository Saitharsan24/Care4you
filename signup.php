<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>SignUp</title>
</head>

<body>

    <!-- Nav bar-->
    <div class="navbar">
        <a href="./index.php"><img src="./images/logo.png" alt="logo" class="logo"></a>
        <div class="nav-link">
            <div class="normal-link">
                <div class="nav-item item1 active-home"><a href="./index.php">Home</a></div>
                <div class="nav-item item2"><a href="./services.php">Services</a></div>
                <div class="nav-item item3"><a href="./about.php">About</a></div>
                <div class="nav-item item4"><a href="./contactus.php">Contact Us</a></div>
            </div>
            <a href="./signin.php" class="nav-signin">
                <div class="item5">Sign In</div>
            </a>
            <div class="divider"></div>
            <a href="./signup.php" class="nav-signin">
                <div class="item6 active-btn">Sign Up</div>
            </a>
        </div>
    </div>


    <!--Signup form-->
    <form method="POST" id="signup">

        <div class="signup-heading">
            <h2 class="signup-heading1">Sign Up</h2>
            <p class="signup-heading2">Fill your detials to get registered</p>
        </div>

        <!-- Form step1 -->
        <div class="wrapper-signup">

            <div class="step step1">

                <!--row 01-->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">First Name</p>
                        <input type="text" class="signup-input" name="first_name" placeholder="Ex: John" required="" autofocus="true" />
                    </div>

                    <div class="row-item">
                        <p class="form-text">Last Name</p>
                        <input type="text" class="signup-input" name="last_name" placeholder="Ex: Doe" required="" />
                    </div>
                </div>

                <!--row 02-->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">Gender</p>
                        <select name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Female">Preferred not to say</option>
                        </select>
                    </div>

                    <div class="row-item">
                        <p class="form-text">Date of Birth</p>
                        <input type="Date" class="signup-input" name="date_of_birth" value=" " required="" />
                    </div>
                </div>

                <!--row 03-->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">NIC Number</p>
                        <input type="text" class="signup-input" name="nic_no" placeholder="Ex: 200017172432" required="" />
                    </div>

                    <div class="row-item">
                        <p class="form-text">Phone Number</p>
                        <input type="text" class="signup-input" name="phone_no" placeholder="Ex: 0771234567" required="" />
                    </div>
                </div>

                <!-- row 04 -->
                <div class="signup-address">
                    <p class="form-text">Address</p>
                    <input type="text" class="signup-input address-input" name="address_line1" placeholder="Line 01" required="" />
                    <input type="text" class="signup-input address-input" name="address_line2" placeholder="Line 02" required="" />
                    <input type="text" class="signup-input address-input" name="address_line3" placeholder="Line 03" />
                </div>

                <!-- row 05 -->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">Email address</p>
                        <input type="email" class="signup-input" name="email" placeholder="Ex: abc@hotmail.com" required="" /><br />
                    </div>

                    <div class="row-item">
                        <p class="form-text">User Name</p>
                        <input type="text" class="signup-input" name="username" placeholder="" required="" /><br />
                    </div>
                </div>

                <!-- row 06 -->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">Password</p>
                        <input type="password" class="signup-input" name="pass_word" placeholder="" required="" /><br />
                    </div>

                    <div class="row-item">
                        <p class="form-text">Confirm Password</p>
                        <input type="password" class="signup-input"  placeholder="" required="" /><br />
                    </div>
                </div>

            </div>

        </div>

        <div class="btn-signup">
            <button type="submit" class="btn signin">Sign Up</button>
        </div>

    </form>

    <script src="./script/main.js"></script>
</body>

</html>

<?php

include('./config/constants.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $nic_no = $_POST['nic_no'];
    $phone_no = $_POST['phone_no'];
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $address_line3 = $_POST['address_line3'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['pass_word'];


    $sql = "INSERT INTO patients (patient_firstname,patient_lastname,gender,dateofbirth,nic_no,phone_no,address_line1,address_line2,address_line3,email,username,pass_word) VALUES ('$first_name','$last_name','$gender','$date_of_birth','$nic_no','$phone_no', '$address_line1', '$address_line2', '$address_line3', '$email', '$username', '$password')";
    $result = mysqli_query($conn, $sql);
}



?>