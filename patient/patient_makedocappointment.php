<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?>

<?php 

    $sql1 = "SELECT * FROM tbl_doctor";
    $sql2 = "SELECT * FROM tbl_specializations";
    $sql3 = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id";

    $result1 = mysqli_query($conn,$sql1);
    $result2 = mysqli_query($conn,$sql2); 
    $result3 = mysqli_query($conn,$sql3);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
  </head>
  <body>
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        $(document).ready(function(){
          $("#doc_name").change(function(){
            var doc_name = $(this).val();
            var date_sel =$('#date-input').val();
            $.ajax({
              url: './search_Ajax/ajax.php',
              type: 'post',
              data: {doc: doc_name,
              dates: date_sel},
              success: function(response){
                            console.log(response);
                $("#specialization-select").html(response);
                $( "#here" ).load(window.location.href + " #here" );
              }
            });
          });
        });
      </script>
      <script>
        $(document).ready(function(){
          $("#specialization-select").change(function(){
            var specializations = $(this).val();
            var date_sel =$('#date-input').val();
            $.ajax({
              url: './search_Ajax/ajax.php',
              type: 'post',
              data: {spec: specializations,
                dates: date_sel},
              success: function(response){
                            console.log(response);
                $("#doc_name").html(response);       
                $( "#here" ).load(window.location.href + " #here" );
              }
            });
          });
        });
      </script>
      <script>
        $(document).ready(function(){
          $("#date-input").change(function(){
            var date_sel = $(this).val();
            var doc_name = $("#doc_name").val();
            var specializations =$("#specialization-select").val();
            $.ajax({
              url: './search_Ajax/ajax.php',
              type: 'post',
              data: {docid: doc_name,
              dates: date_sel,
            spec_doc: specializations},
              success: function(response){
                            console.log(response);
                            $( "#here" ).load(window.location.href + " #here" );
                // $("#doc_name").html(response);
              }
            });
          });
        });
      </script>


    <div class="main-div">
      <div class="home-left">
        <div class="nav-logo">
          <a href="./patient_home.php">
            <img src="../images/logo.png" alt="logo" />
          </a>
        </div>
        <div class="profile-image">
          <img src="../images/user.png" alt="profile-image" />
        </div>
        <div class="nav-links">
          <a href="./patient_home.php">Home</a>
          <a href="./patient_appointments.php"  style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical Records</a>
          <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
          <a href="./patient_viewprofile.php">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>

      <div class="home-right">
        <div class="content">

        <div class="back" onclick="location.href='patient_docappointments.php'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>

        <div class="apt-heading"><h2>Channel a Doctor</h2></div>
        <div class="search-apt">  
          <form action="#">

            <div class="search-row">
              <p class="form-text">Doctor Name:</p>
              <select id="doc_name" name="doc_name" >
                <option value="Select doctor name" selected disabled hidden>Select Doctor Name</option>

                <?php 
                  if($result1)
                  {
                    while ($row1 = mysqli_fetch_array($result1))
                    {  
                ?>
                      <option value="<?php echo $row1['doctor_id'] ?>"><?php echo $row1['doc_name'] ?></option>
                <?php    
                    }
                  }
                ?>  
              </select>
            </div>

            <div class="search-row">
              <p class="form-text">Specialization:</p>
              <select  id="specialization-select">
                <option value="Select doctor name" selected disabled hidden>Select specialization</option>

              <?php 
                  if($result2)
                  {
                    while ($row2 = mysqli_fetch_array($result2))
                    {  
                ?>
                      <option value="<?php echo $row2['specializations'] ?>"><?php echo $row2['specializations'] ?></option>
                <?php    
                    }
                  }
                ?>
              </select>
            </div>

            <div class="search-row">
                <p class="form-text">Date:</p>
                <input id="date-input" type="Date" class="signup-input" name="date-input"/>
            </div>

            <div class="clearfilt" style="font-size: 15px; color:#093e4e;">
              <a href="patient_makedocappointment.php">
                <i class="fa-solid fa-xmark" style="font-size: 15px;"></i>clear filter
              </a>
            </div>
            
          </form>
        </div>
        <div id="here">
        <table class="tbl-aptlist" >
          <thead>
              <tr>
                  <td>Doctor Name</td>
                  <td>Specialization</td>
                  <td>Date</td>
                  <td>Time</td>
                  <td></td>
              </tr>
          </thead>
          <tbody>
          <?php 
                if(isset($_SESSION['output']))
                {
                  if ($_SESSION['output']==0)
                  {
                    ?>
                    <tr>
                      <td colspan="5" class="nosessiontd"><div class="nosession">No Sessions Available</div></td>
                    </tr>
                    <?php
                    // echo 'nothing';
                    unset($_SESSION['output']);
                  }
                  else
                  {
                      foreach ($_SESSION['output'] as $row3)
                      {
                      if ($row3['no_of_appointment'] < 13 && $row3['status'] == 1) 
                        {
          ?>
                            <tr>
                              <td><?php echo $row3['doc_name'] ?></td>
                              <td><?php echo $row3['specialization'] ?></td>
                              <td><?php echo $row3['date'] ?></td>
                                      <?php  
                                          if($row3['time_slot']==0){
                                              $time="8am-10am";   
                                          }else if($row3['time_slot']==1){
                                              $time='10am-12pm';
                                          }else if($row3['time_slot']==2){
                                              $time='12pm-2pm';
                                          }else if($row3['time_slot']==3){
                                              $time='2pm-4pm';
                                          }else if($row3['time_slot']==4){
                                              $time='4pm-6pm';
                                          }else{   
                                              $time='6pm-8pm';
                                          } 
                                      ?>
                              <td><?php echo $time ?></td>
                              <td><a href="./patient_bookdoc1.php"><button class="book-btn"><span>Book Now</span></button></a></td>
                            </tr>
              <?php
                        }    
                      }
                      unset($_SESSION['output']);
                  }
                    
                }
                elseif($result3)
                {
              ?>
              <?php
                  while ($row3 = mysqli_fetch_array($result3))
                  {  
                    if ($row3['no_of_appointment'] < 13 && $row3['status'] == 1)
                    {
              ?>
                        <tr>
                          <td><?php echo $row3['doc_name'] ?></td>
                          <td><?php echo $row3['specialization'] ?></td>
                          <td><?php echo $row3['date'] ?></td>
                                      <?php  
                                          if($row3['time_slot']==0){
                                              $time="8am-10am";   
                                          }else if($row3['time_slot']==1){
                                              $time='10am-12pm';
                                          }else if($row3['time_slot']==2){
                                              $time='12pm-2pm';
                                          }else if($row3['time_slot']==3){
                                              $time='2pm-4pm';
                                          }else if($row3['time_slot']==4){
                                              $time='4pm-6pm';
                                          }else{   
                                              $time='6pm-8pm';
                                          } 
                                      ?>

                          <td><?php echo $time ?></td>
                          <td><a href="./patient_bookdoc1.php?id=<?Php echo $row3['session_id'] ?>"><button class="book-btn"><span>Book Now</span></button></a></td>
                        </tr>
              <?php
                    }    
                  }
                }
              ?>
          </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>