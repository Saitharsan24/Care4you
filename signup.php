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
                    <div class="nav-item item1"><a href="./index.php" class="active-link">Home</a></div>
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
                    <input type="text" class="signup-input" name="first_name" placeholder="Ex: Amal" required="" autofocus="true" />
                </div>

                <div class="row-item">
                    <p class="form-text">Last Name</p>
                    <input type="text" class="signup-input" name="last_name" placeholder="Ex: Perera" required="" />
                </div>
            </div>

            <!--Row 02-->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">Gender</p>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Female">Preferred not to Say</option>
                    </select>
                </div>

                <div class="row-item">
                    <p class="form-text">Date of Birth</p>
                    <input type="Date" class="signup-input" name="date_of_birth"  required="" />
                </div>
            </div>

            <!--Row 03-->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">NIC Number</p>
                    <input type="text" class="signup-input" name="nic_no" pattern="[0-9]{9}[Vv0-9]{1,3}" placeholder="Ex: 200017172432" required="" />
                </div>

                <div class="row-item">
                    <p class="form-text">Phone Number</p>
                    <input type="text" class="signup-input" name="phone_no" pattern="[0-0]{1}[0-9]{9}" placeholder="Ex: 0771234567" required="" />
                </div>
            </div>

            <!-- Row 04 -->
            <div class="signup-address">
                <p class="form-text">Address</p>
                <textarea name="address" id="address" cols="69" rows="3" placeholder="Type your address here"></textarea>
            </div>

            <!-- Row 05 -->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">Email Address</p>
                    <input type="email" class="signup-input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}.$" placeholder="Ex: example@gmail.com" required="" /><br />
                </div>

                <div class="row-item">
                    <p class="form-text">User Name</p>
                    <input type="text" class="signup-input" name="username" placeholder="" required="" /><br />
                </div>
            </div>

            <!-- Row 06 -->
            <div class="signup-row">
                <div class="row-item">
                    <p class="form-text">Password</p>
                    <input type="password" class="signup-input" name="password" placeholder="" required="" /><br />
                </div>

                <div class="row-item">
                    <p class="form-text">Confirm Password</p>
                    <input type="password" class="signup-input" name="confirmpassword"  placeholder="" required="" /><br />
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