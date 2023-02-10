<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Session</title>
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
<!--navbar-->
    <div class="table-1">
          <table>
            <tr class="head">
                <th class="th-1">Session ID</th>
                <th>Doctor Name</th>
                <th>Session Time</th>
                <th>No.of.Patient</th>
                <th>Room No.</th>
                <th class="th-2"> </th>
            </tr>
            <tr class="body-1">
              <td class="td-1">01</td>
              <td>Dr.Nuwan Fonseka</td>
              <td>7.00 a.m</td>
              <td>20</td>
              <td>1</td>
              <td class="td-2"><button class="button">view appointmets</button></td>
            </tr>
          </table>
        </div>
</body>
</html>