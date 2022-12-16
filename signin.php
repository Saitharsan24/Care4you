<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>SignIn</title>
</head>

<body>

    <!-- Nav bar -->
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
                <div class="item5 active-btn">Sign In</div>
            </a>
            <div class="divider"></div>
            <a href="./signup.php" class="nav-signin">
                <div class="item6">Sign Up</div>
            </a>
        </div>
    </div>

    <!-- Sign in form -->
    <div class="wrapper">
        <form method="POST" id="signin" class="form-signin">
            <h2 class="form-signin-heading">Sign In</h2>

            <p class="form-signin-username">User Name</p>
            <input type="text" class="form-control" name="username" placeholder="User name" required autofocus="true" /><br />

            <p class="form-signin-password">Password</p>
            <input type="password" class="form-control" name="password" placeholder="Password" required />

            <div class="forgot-password">
                <a href="" class="forgot-password">Forgot password?</a>
            </div>

            <br />
            <br />

            <a href="./signup.php" class="donothave-account">Do not have an account?</a>

            <button class="btn signin" type="submit" name="signin">Sign In</button>
        </form>
    </div>

</body>

</html>

<?php

    include('./database/connection.php');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    //getting data from the user
    $username = validate($_REQUEST['username']);
    $password = validate($_REQUEST['password']);

    if (empty($username)) {
        echo "<script> alert('Username cannot be empty!')</script>";
        exit();
    } else if (empty($password)) {
        echo "<script> alert('Username cannot be empty!')</script>";
        exit();
    }

    //matching the data with the database data
    $query = "SELECT * FROM users_login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $username && $row['password'] === $password) {
            echo "Logged In!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            header("Location: signup.php");
            exit();
        }
    }
    else {
        header("Location: signin.php");
        exit();
    }
}

?>