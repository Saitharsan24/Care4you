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
        <a href="admin-view-profile.php">
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


<div class="change_profile">
     Change password
  </div>
<form >

   <div class="oldpassword-1">
        <label for="oldpassword" >Old password: </lable>
            <input id="oldpassword" type="text" >
    </div>

        


    <div class="newpassword-1">
        <label for="newpassword" >New password: </lable>
            <input id="newpassowrd" type="text" >
    </div>

    <div class="conformpassword-1">
        <label for="conformpassword" >Conform password: </lable>
            <input id="conformpassword" type="text" >
    </div>

</form>

<a href="./signin.php" class="nav-signin"><div class="item5 active-btn">Sign In</div></a>
<div class="divider-save">
    <button type="button">Save</button>
</div>
<div class="divider-back">
    <button type="button">Back</button>
</div>

</body>
</html>