<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>admin-home</title>
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

<div class="view">Session details of session ID</details> -<div class="id"> 01</div> </div>

<div class="main_content-view-app"> 
        <form>
        <div class="doctor_name-1">
        <label for="doc-name" >Doctor Name: </lable>
            <input id="doc-name" type="text" >
    </div>

    <div class="date-1">
        <label for="date" >Date: </lable>
            <input id="date" type="date" >
    </div>

    <div class="time-1">
        <label for="time" >Time: </lable>
            <input id="doc-name" type="time" >
    </div>
    <div class="no_patient-1">
        <label for="no-patient" >Assistant ID: </lable>
            <input id="no-patient" type="number" >
    </div>
    <div class="room_no-1">
        <label for="room" >Room number: </lable>
            <input id="room" type="text" >
    </div>
</form>
    </div>
    <button class="edit_button-view" onclick="location.href='admin-edit-appointment.php'">Edit Session</button>
    <button class="back_button-view-app" onclick="location.href='admin-session.php'">Back</button>

</body>
</html>