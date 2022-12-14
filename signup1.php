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
            <a href="./signup1.php" class="nav-signin">
                <div class="item6 active-btn">Sign Up</div>
            </a>
        </div>
    </div>


    <!--Signup form-->
    <form>

        <!-- Form step1 -->
        <div class="wrapper-signup">

            <div class="signup-heading">
                <h2 class="signup-heading1">Sign Up</h2>
                <p class="signup-heading2">Fill your detials to get registered</p>
            </div>

            <div class="step step1">

                <!--row 01-->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">First Name</p>
                        <input type="text" class="signup-input" placeholder="Ex: John" required="" autofocus="true" />
                    </div>

                    <div class="row-item">
                        <p class="form-text">Last Name</p>
                        <input type="text" class="signup-input" placeholder="Ex: Doe" required="" />
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
                        <input type="Date" class="signup-input" value=" " required="" />
                    </div>
                </div>

                <!--row 03-->
                <div class="signup-row">
                    <div class="row-item">
                        <p class="form-text">NIC Number</p>
                        <input type="text" class="signup-input" placeholder="Ex: 200017172432" required="" />
                    </div>

                    <div class="row-item">
                        <p class="form-text">Phone Number</p>
                        <input type="text" class="signup-input" placeholder="Ex: 0771234567" required="" />
                    </div>
                </div>

                <!-- row 04 -->
                <div class="signup-address">
                    <p class="form-text">Address</p>
                    <input type="text" class="signup-input address-input" placeholder="Line 01" required="" />
                    <input type="text" class="signup-input address-input" placeholder="Line 02" required="" />
                    <input type="text" class="signup-input address-input" placeholder="Line 03" />
                </div>

                <button type="button" class="btn signin btn-nxt">Next</button>

            </div>

            <!-- Form step2 -->

            <div class="step step2 active">

                <!-- row 05 -->
                <div class="row-item">
                    <p class="form-text">User Name</p>
                    <input type="text" class="signup-input" name="firstName" placeholder="" required="" /><br />
                </div>

                <!-- row 06 -->
                <div class="row-item">
                    <p class="form-text">Password</p>
                    <input type="text" class="signup-input" name="firstName" placeholder="" required="" /><br />
                </div>

                <!-- row 07 -->
                <div class="row-item">
                    <p class="form-text">Confirm Password</p>
                    <input type="text" class="signup-input" name="firstName" placeholder="" required="" /><br />
                </div>

                <div>
                    <button type="button" class="btn signin btn-prev">Back</button>
                    <button type="submit" class="btn signin">Sign Up</button>
                </div>

            </div>
        </div>

    </form>

    <script src="./script/main.js"></script>
</body>

</html>