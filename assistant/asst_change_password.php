<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>change_password</title>
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

</div>
<div class="change_password_1">
    change password
</div>
<form >
    <div class="old_password-1">
        <label for="oldpassword" > old password: </lable>
            <input id="name" type="text" >
    </div>


    <div class="new_passwoed-1">
        <label for="newpassword" >New password: </lable>
            <input id="newpassword" type="text" >
    </div>

        


    <div class="con_password">
        <label for="conpassword" >Conform passowrd: </lable>
            <input id="conpassword" type="text" >
    </div>

    
</form>

<a href="./signin.php" class="nav-signin"><div class="item5 active-btn">Sign In</div></a>
<div class="divider">
    <button type="button">Save</button>
</div>

        

</body>
</html>