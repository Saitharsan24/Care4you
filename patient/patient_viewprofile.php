<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/patient.css">

    <title>PAtient | View profile</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
            <li><a href="patient_home.php">Home</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Medical records</a></li>
                <li><a href="#">Lab reports</a></li>
                <li><a href="patient_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="#">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <img src="../images/user.png" alt="user" class="imgframe">
            <form >
    <div class="name-1">
        <label for="name" > Name: </lable>
            <input id="name" type="text" >
    </div>


    <div class="username-1">
        <label for="uname" >User name: </lable>
            <input id="uname" type="text" >
    </div>

        


    <div class="email-1">
        <label for="email" >Email address: </lable>
            <input id="email" type="text" >
    </div>

    <div class="nic-1">
        <label for="nic" >NIC Number: </lable>
            <input id="nic" type="text" >
    </div>

    <div class="age-1">
        <label for="age" >Age: </lable>
            <input id="age" type="text" >
    </div>

    <div class="con-1">
        <label for="con" >Contact Number: </lable>
            <input id="con" type="text" >
    </div>

    <div class="add-1">
        <label for="add" >Address: </lable>
            <input id="add" type="text" >
    </div>

</form>
            </div>
        </div>
    </div>
</body>
</html>