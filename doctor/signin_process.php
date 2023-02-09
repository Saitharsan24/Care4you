<?php 

session_start(); 
include "dbconnection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);

       return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: ../signin.php?error=Username is required");
        exit();

    }else if(empty($pass)){
        header("Location: ../signin.php?error=Password is required");
        exit();

    }else{
        $sql = "SELECT * FROM doctors WHERE d_uname='$uname' AND d_pass='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['d_uname'] === $uname && $row['d_pass'] === $pass) {
                echo "Logged in!";
                $_SESSION['uname'] = $row['d_uname'];
                $_SESSION['id'] = $row['d_id'];
                $_SESSION['logged'] = TRUE;

                header("Location: doctorHome.php");
                exit();

            }else{
                header("Location: ../signin.php?error=Incorect User name or password");
                exit();
            }

        }else{
            header("Location: ../signin.php?error=Incorect User name or password");

            exit();

        }
    }

}else{
    header("Location: ../signin.php");
    exit();

}