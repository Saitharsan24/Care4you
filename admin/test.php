<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="admin-session.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <?php
            //select
            $sql="SELECT column1, column2, ...
             FROM table_name
             WHERE condition";             // select with where condition

             $sql="SELECT * FROM Products
              WHERE Price > 30";
              
              $sql="SELECT * FROM Products
              WHERE Price != 18";       //not equal
               
               $sql="SELECT * FROM Products
               WHERE Price BETWEEN 50 AND 60";

               $sql="SELECT * FROM Customers
               WHERE City LIKE 's%'";       //Search for a pattern


                  $sql="SELECT * FROM Customers
                  WHERE City IN ('Paris','London')";   //To specify multiple possible values for a column

                   
                  $sql="SELECT column1, column2, ...
                  FROM table_name
                  WHERE condition1 AND condition2 AND condition3 ...";  //select and 
 

                    $sql="SELECT * FROM Customers
                    WHERE Country='Germany' AND City='Berlin'";

                       $sql="SELECT * FROM Customers
                       WHERE City='Berlin' OR City='München'";

                     $sql="SELECT * FROM Customers
                      WHERE NOT Country='Germany'";


                    $sql="SELECT * FROM Customers
                   WHERE Country='Germany' AND (City='Berlin' OR City='München')";

                   $sql="SELECT * FROM Customers
                   WHERE NOT Country='Germany' AND NOT Country='USA'";


                      //insert
                      $sql="INSERT INTO table_name (column1, column2, column3, ...)
                      VALUES (value1, value2, value3, ...)";

                      $sql="INSERT INTO Customers (CustomerName, City, Country)
                      VALUES ('Cardinal', 'Stavanger', 'Norway')";  //Insert Data Only in Specified Columns

                          
                     //update
                         $sql="UPDATE Customers
                         SET ContactName='Juan'";   

                         $sql="UPDATE Customers
                         SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                         WHERE CustomerID = 1";

                  
                      //delete
                     $sql="DELETE FROM table_name WHERE condition";

                     $sql="DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste'";




                     $sql="SELECT MAX(column_name)
                     FROM table_name
                     WHERE condition";





?>

         
<form>
  <input type="radio" id="html" name="fav_language" value="HTML">
  <label for="html">HTML</label><br>
  <input type="radio" id="css" name="fav_language" value="CSS">
  <label for="css">CSS</label><br>
  <input type="radio" id="javascript" name="fav_language" value="JavaScript">
  <label for="javascript">JavaScript</label>
</form> 

<form>
  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> I have a bike</label><br>
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
  <label for="vehicle2"> I have a car</label><br>
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
  <label for="vehicle3"> I have a boat</label>
</form>

<form action="/action_page.php">
  <label for="cars">Choose a car:</label>
  <select id="cars" name="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
  <input type="submit">
</form>




            </span>
            </div>
        </div>
    </div>
</body>
</html>