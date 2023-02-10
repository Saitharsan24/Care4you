<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Edit profile</title>
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
                <a href="asst_home.php">
            <label>Home</label>
                </a>
            </div>
        
            <div class="session">
                <a href="asst_session.php">
            <label>Sessions</label>
                </a>
            </div>
        
            <div class="view-profile">
                <a href="asst_view.php">
            <label>View Profile</label>
                </a>
            </div>
    

            <div class="signout">
            
                <a href="#">
                    <label>Sign Out</label>   
                   
                </a>
               
           </div>
        </div>

 <div class="Profile-2">
    <img src="./image/profile.png"/>
</div>
  <div class="change_profile">
     change profile picture
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

    <div class="con-1">
        <label for="con" >Contact Number: </lable>
            <input id="con" type="text" >
    </div>
</form>
<div class="change_password">
    <a href="asst_change_password.php">
        <label>change password</label>   
       
    </a>
</div>

<a href="./signin.php" class="nav-signin"><div class="item5 active-btn">Sign In</div></a>
<div class="divider">
    <button type="button" >Save changes</button>
</div>

<div class="divider_2">
    <button type="button" onclick="location.href = './asst_view.php';">Back</button>
</div>
        

</body>
</html>