<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">

<div class="logo">
<img src="../images/logo.png"/>
 </div>

<div class="profile">
    <img src="../images/profile.png"/>
</div>

    <div class="home">
        <a href="admin_home.php">
    <label>Home</label>
        </a>
    </div>

    <div class="session">
        <a href="admin-session.php">
    <label>Sessions</label>
        </a>
    </div>

    <div class="view-patient">
        <a href="#">
    <label>View patient</label>
        </a>
    </div>


    <div class="view-order">
        <a href="#">
    <label>View orders</label>
        </a>
    </div>

    
    <div class="view-appointment">
        <a href="#">
    <label>View Appointments</label>
        </a>
    </div>

    <div class="report">
        <a href="#">
    <label>Reports</label>
        </a>
    </div>

    
    <div class="system-user">
        <a href="#">
    <label>System users</label>
        </a>
    </div>


    <div class="view-profile">
        <a href="admin-view.php">
    <label>View Profile</label>
        </a>
    </div>


    <div class="signout">
    
        <a href="#">
            <label>Sign Out</label>   
        </a>
   </div>
</div>
<!-- navgation-->

<div class="Profile-2">
    <img src="../images/profile.png"/>
</div>

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

<a href="./signin.php" class="nav-signin"><div class="item5 active-btn">Sign In</div></a>
<div class="divider">
    <button type="button" onclick="location.href='admin_Editprofile.php';">Edit Profile</button>
</div>

</body>
</html>