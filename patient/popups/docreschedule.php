<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.buttons{
  margin-left:720px;
  gap: 70px;

}

.modbutton {
  width: 100px;
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #0e6680;
  border-radius: 6px;
  cursor: pointer;
}

.update-btn{
  width: 150px;
  height:40px;
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #28ae28;
  border-radius: 6px;
  cursor: pointer;
  margin-left: -50px;
}

.back-btn{
  width: 150px;
  height:40px;
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  padding: 8px 0px 0px 40px;
  border: none;
  background: #093e4e;
  border-radius: 6px;
  cursor: pointer;
  margin-left: -50px;
}

.close-btn{
  width: 150px;
  height:40px;
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #BD1010;
  border-radius: 6px;
  cursor: pointer;
  margin-left: -50px;
}

.close-btn:hover{
  background-color: #db1616;
  transition: .3s;
}

.back-btn:hover{
  background-color: #107c9d;
  transition: .3s;
}

.update-btn:hover{
  background-color: #26c826;
  transition: .3s;
}

.modal-box {
  display: block;
  position: fixed;
  left: 60%;
  top: 50%;
  transform: translate(-60%, -50%);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  z-index: 9999; /* Set a higher z-index than the rest of the page */
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.3);
  opacity: 0;
  pointer-events: none;
  filter: blur(8px);
  backdrop-filter: blur(8px);
  z-index: 9998; /* Set a lower z-index than the modal-box */
}


section.active .overlay {
  opacity: 1;
  pointer-events: auto;
}

.modal-box {
  display: flex;
  flex-direction: column;
  width: 900px;
  height: 600px;
  padding: 20px 0 0 20px;
  border-radius: 24px;
  background-color: #fff;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  transform: translate(-65%, -50%) scale(1.2);
  
  
}

section.active .modal-box {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-65%, -50%) scale(1);
}

.modal-box i.fa-solid.fa-sack-dollar {
  font-size: 70px;
  color: #0e6680;
}

.modal-box h1 {
  margin-top: 30px;
  margin-left: 50px;
  font-size: 30px;
  font-weight: 700;
  color: #333;
}

.modal-box h2 {
  margin-top: 20px;
  font-size: 25px;
  font-weight: 500;
  color: #333;
}

.modal-box h3 {
  font-size: 16px;
  font-weight: 400;
  color: #333;
  text-align: center;
}

.modal-box .buttons {
  margin-top: 25px;
}

.modal-box button {
  font-size: 14px;
  padding: 6px 12px;
}

.inputtab{
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 14px;
  position: relative;
  width: 100%;
  overflow: hidden;
  outline: 0;
}

.search-row {
    display: flex;
    flex-direction: row;
    justify-content: right;
    margin-bottom: 20px;
    color: #093e4e;
    font-weight: 600;
    align-items: center;
}

.apt-heading {
    font-size: 25px;
    margin: 30px 0px 20px 80px;
    color: #093e4e;
}

.search-row select {
    width: 350px;
    border-radius: 10px;
    margin-left: 20px;
    font-size: 16px;
    border: none;
    padding: 8px;
}

.search-row input {
    width: 350px;
    margin-left: 20px;
    border-radius: 10px;
    font-size: 16px;
    border: none;
    padding: 8px;
}

.search-row input:focus {
    outline: none;
}

.search-row select:focus {
    outline: none;
}

.tbl-common{
  margin-left: 40px;
  /* width: 100%; */
  border-collapse: separate;
  border-spacing: 0 15px;
  font-size: 15px;
}
  
.tbl-common tr{
  background-color: #ffffff;
}

.tbl-common thead{
  position: sticky;
  top: 0; /* set the table heading to be fixed */
  z-index: 1; /* set a higher z-index to show the heading above the content */
}

.tbl-common thead td{
  color: #0D5C75;
  font-weight: 700;
  padding: 5px;
}

.tbl-common td{
  background-color: #D4FAFC;
  /*border:1px solid #b3adad;*/
  color: #000000;
  text-align: center;
  width: 300px;
  padding: 10px;
  padding-left: 0%;
  padding-right: 0%;
}

.tbl-common td:first-child, th:first-child {
  border-radius: 10px 0 0 10px;
}

.tbl-common td:last-child, th:last-child {
  border-radius: 0 10px 10px 0;
}
.button {
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #0e6680;
  border-radius: 6px;
  cursor: pointer;
}

.button:hover {
  background-color: #0D5C75;
}

.modal-box i {
  font-size: 70px;
  color: #0e6680;
}
.modal-box h2 {
  margin-top: 20px;
  font-size: 25px;
  font-weight: 500;
  color: #333;
}
.modal-box h3 {
  font-size: 16px;
  font-weight: 400;
  color: #333;
  text-align: center;
}
.modal-box .buttons {
  margin-top: 25px;
}
.modal-box button {
  font-size: 14px;
  padding: 6px 12px;
  margin: 0 10px;
}

</style>


<?php 
      //selcting available doc sessions for rescheduling
      $rescheduledoc_id = $_SESSION['reschedule'];
      $resdocapt_id = $_SESSION['res_apt_id'];
      $currentSessId = $_SESSION['current_sessionid'];

      unset($_SESSION['reschedule']);
      unset($_SESSION['res_apt_id']);
      unset($_SESSION['current_sessionid']);

?>


<section id="cancel">
  <span class="overlay" onclick="closePopupC()"></span>

  <div class="modal-box" style="width:28%; height:45%; text-align: center; justify-content: center;align-items: center;">
    <i class="fa-solid fa-circle-question" style="margin-top:-20px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Are you sure you want to <br/> Cancel your Appointment?</h3>
    
    <form action="" method="post">
      <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
        <button class="button" style="width:100px;" type="submit" name="cancel-apt">Yes</button>
        <button class="button  close-btn " style="width:100px;" onclick="closePopupC()">No</button> 
      </div>
    </form>
  </div>
</section>

<section id="recordacess">
  <span class="overlay" onclick="closePopupREC()"></span>

  <div class="modal-box" style="width:38%; height:45%; text-align: center; justify-content: center;align-items: center;">
    <i class="fa-solid fa-circle-question" style="margin-top:-20px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Are you sure you want to <br/> give permissoin to doctor to access your records?</h3>
    
    <form action="" method="post">
      <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
        <button class="button" style="width:100px;" type="submit" name="yes-record">Yes</button>
        <button class="button  close-btn " style="width:100px;" onclick="closePopupREC()">No</button> 
      </div>
    </form>
  </div>
</section>



<section id ="reshedule2" > 
  <span class="overlay" onclick="closePopupW2()"></span>
    <div class="modal-box" style="width:50%; height:75%;" >
        <form action="" method="POST">
            <h1> Book New Doctor Appointment</h1>
            <div class="form-content" style="margin-left:-40px; margin-top:20px;">
              <div class="form-itm">
                <p>Doctor Name :</p>
                <input id="doc_name" style="border:1px solid black" style="padding: 3px;" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Specialization :</p>
                <input id="Specialization" style="border:1px solid black" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Date :</p>
                <input id="Date" style="border:1px solid black" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Time :</p>
                <input id="Time" style="border:1px solid black" type="text" name="apttime" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Appointment No :</p>
                <input id="Appointment" style="border:1px solid black" name="aptno" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <input id="sessionid" style="border:1px solid black" name="sessionid" type="text" value="" hidden>
              </div>

              <div class="buttons" style="margin-left:450px; Margin-top:10px; width: 200px; display:flex; flex-direction:row; justify-content:space-between;">
              <p class="back-btn" id="backBtn" onclick="openPopup3()">Back</p>  
              <button class="update-btn" type="submit" name="scheduleupdate">Update</button>
              </div>
        </div>
        </form>
    </div>
</section>

<section id ="reshedule1"> 
  <span class="overlay" onclick="closePopup()"></span>

    <div class="modal-box">
        
        <form action="" method="POST">
          
            <h1> Reshedule Doctor Appointment</h1>
                <table class="tbl-common" style="width:90%;">
                    <thead>

                      <tr>
                        <td style="width:25%;">Doctor Name</td>
                        <td style="width:14%;">Specialization</td>
                        <td style="width:16%;">Date</td>
                        <td style="width:25%;">Time</td>
                        <td style="width:20%;"></td>
                      </tr>

                    </thead>

                    <tbody>                    
                    <?php 
                        //Getting all session of particular doctor and wxcept currently booked session
                        $sqlReschedule = "SELECT * FROM tbl_docsession 
                                            INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
                                            AND tbl_docsession.doctor_id = '$rescheduledoc_id'";

                        $resulReschedule = mysqli_query($conn,$sqlReschedule);


                        //printing each row of doctor sessions
                        while($rowReschedule= mysqli_fetch_assoc($resulReschedule)){
                            if ($rowReschedule['no_of_appointment'] < 13 && $rowReschedule['status'] == 1 && $rowReschedule['session_id'] != $currentSessId){ 
                            $session_id = $rowReschedule['session_id'];  
                    ?>      
                          <tr>
                            <td><?php echo $rowReschedule['doc_name'] ?></td>
                            <td><?php echo $rowReschedule['specialization'] ?></td>
                            <td><?php echo $rowReschedule['date'] ?></td>
                                      <?php
                                          if($rowReschedule['time_slot']==0){
                                              $time="8am-10am";   
                                          }else if($rowReschedule['time_slot']==1){
                                              $time='10am-12pm';
                                          }else if($rowReschedule['time_slot']==2){
                                              $time='12pm-2pm';
                                          }else if($rowReschedule['time_slot']==3){
                                              $time='2pm-4pm';
                                          }else if($rowReschedule['time_slot']==4){
                                              $time='4pm-6pm';
                                          }else{   
                                              $time='6pm-8pm';
                                          } 
                                      ?>                              
                            <td><?php echo $time ?></td>

                                  <?php // checking for appointment number and time for rescheduling

                                          $sql = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";

                                          $result = mysqli_query($conn, $sql);

                                          if ($result) {

                                            //getting variables from database
                                            $row = mysqli_fetch_assoc($result);
                                            $timeslot = $row['time_slot'];
                                            $noofapt = $row['no_of_appointment'];

                                            //to find the timeslot
                                            if ($timeslot == 0) {
                                              $starttime = strtotime('08:00:00');
                                            } else if ($timeslot == 1) {
                                              $starttime = strtotime('10:00:00');
                                            } else if ($timeslot == 2) {
                                              $starttime = strtotime('12:00:00');
                                            } else if ($timeslot == 3) {
                                              $starttime = strtotime('14:00:00');
                                            } else if ($timeslot == 4) {
                                              $starttime = strtotime('16:00:00');
                                            } else {
                                              $starttime = strtotime('18:00:00');
                                            }

                                            //Code for available appointment number
                                            $aptnosql = "SELECT docapt_id,docapt_no, docapt_status,my_other,docapt_flag FROM tbl_docappointment WHERE session_id ='$session_id'";
                                            $aptnoresult = mysqli_query($conn,$aptnosql);
                                            
                                            if(mysqli_num_rows($aptnoresult) != 0){
                                                  
                                                    $flag = 0;
                                                                    
                                                    while ($aptnorow = mysqli_fetch_assoc($aptnoresult)) {
                                                      
                                                        for($i = 1; $i < 13; $i++){
                                                          if($aptnorow['docapt_no'] == $i && $aptnorow['docapt_status'] == 2 && $aptnorow['docapt_flag']==0){
                                                            $apt_no = $i;
                                                            $flag= 1;
                                                            $apt_id = $aptnorow['docapt_id'];
                                                            $sqlupdateflag = "UPDATE tbl_docappointment
                                                                                  SET docapt_flag ='1' 
                                                                                  WHERE docapt_id = '$apt_id'";
                                                            break;
                                                          }
                                                        }
                                                      
                                                      if($flag == 1){
                                                        break;
                                                      }
                                                    }

                                                    if($flag == 0){
                                                      $apt_no = $noofapt + 1;
                                                    }  

                                            } else {
                                                $apt_no = 1;
                                            }         

                                            //code for appointment time
                                            $apt_dur = 600;
                                            $apt_time = $starttime + (($apt_no-1) * $apt_dur);
                                            $apt_time_format = date('h:i A', $apt_time);
                                          }
                                  ?>

                            <td>
                                <!-- Passing data to next popup -->
                                <p class="book-btn" onclick="
                                document.getElementById('doc_name').value ='<?php echo $rowReschedule['doc_name'] ?>' ;
                                document.getElementById('Specialization').value ='<?php echo $rowReschedule['specialization'] ?>' ;
                                document.getElementById('Date').value ='<?php echo $rowReschedule['date'] ?>' ;
                                document.getElementById('Time').value ='<?php echo $apt_time_format ?>' ;
                                document.getElementById('Appointment').value ='<?php echo $apt_no ?>' ;
                                document.getElementById('sessionid').value ='<?php echo $rowReschedule['session_id'] ?>' ;
                                openPopup2()"><span>Book Now</span></p>
                              
                            </td>
                    <?php 
                          }
                        }
                    ?>    
                          </tr>
                    </tbody>
                </table>

            <div class="buttons">
            <button class="close-btn" onclick="closePopup()">Close</button>
            </div>
        </form>
    </div>
</section>



<script>
  function openPopup() {
    const section = document.getElementById("reshedule1");
    section.classList.add("active");
  }

  function closePopup() {
  const section = document.getElementById("reshedule1");
  section.classList.remove("active");
  }

  function closePopupW2() {
    const section = document.getElementById("reshedule2");
    section.classList.remove("active");
  }

  function openPopup2() {
  
    const section2 = document.getElementById("reshedule2");
    section2.classList.add("active");
    const section = document.getElementById("reshedule1");
    section.classList.remove("active");
  
  }

  function openPopup3() {
  
  const section2 = document.getElementById("reshedule1");
  section2.classList.add("active");
  const section = document.getElementById("reshedule2");
  section.classList.remove("active");

  }


  function openPopupC() {
    const sectionC = document.getElementById("cancel");
    sectionC.classList.add("active");
  }

  function closePopupC() {  
    console.log('Check');
  const sectionC = document.getElementById("cancel");
  sectionC.classList.remove("active");
  }

  function openPopupREC() {
    const sectionC = document.getElementById("recordacess");
    sectionC.classList.add("active");
  }

  function closePopupREC() {  
    console.log('Check');
  const sectionC = document.getElementById("recordacess");
  sectionC.classList.remove("active");
  }

</script>


<?php 
  if(isset($_POST['scheduleupdate'])){


      //getting session_id from POST Method
      $newsession_id = $_POST['sessionid'];
      $newapt_no = $_POST['aptno'];
      $newapt_time = $_POST['apttime'];
      //echo "<script> console.log($currentSessId) </script>";die();

      //getting detials from old appointment 
      $issetquery = "SELECT * FROM tbl_docappointment WHERE docapt_id = '$resdocapt_id'";
      
      $issetresults = mysqli_query($conn,$issetquery);
      $issetrow = mysqli_fetch_assoc($issetresults);

      if(isset($issetrow['pat_name'])){
        $pat_name = $issetrow['pat_name'];
      }else{
        $pat_name = "";
      }

      if(isset($issetrow['relationship'])){
        $relation = $issetrow['relationship'];
      }else{
        $relation = "";
      }

      if(isset($issetrow['pat_nic'])){
        $pat_nic = $issetrow['pat_nic'];
      }else{
        $pat_nic = "";
      }

      if(isset($issetrow['pat_contact'])){
        $pat_contact = $issetrow['pat_contact'];
      }else{
        $pat_contact = "";
      }
     
      $my_other = $issetrow['my_other'];
      $net_total = $issetrow['net_total'];

      $userid = $_SESSION['user_id'];
    

      //Setting old appointment to cancelled
      $query1 = "UPDATE tbl_docappointment 
                    SET docapt_status = 2
                    WHERE docapt_id = '$resdocapt_id'";
      $results1 = mysqli_query($conn,$query1);


      //creating new appointment for reschedule
      $query2 = "INSERT INTO tbl_docappointment (session_id,docapt_time,docapt_no,docapt_status,pat_name,relationship,pat_nic,pat_contact,created_by,my_other,net_total)
      VALUES ('$newsession_id','$newapt_time','$newapt_no','1','$pat_name','$relation','$pat_nic','$pat_contact','$userid','$my_other','$net_total')";

      $result2 = mysqli_query($conn,$query2);


      //updating new session no of patient +1
      $sqlNewUpdate = "UPDATE tbl_docsession
                      SET no_of_appointment = no_of_appointment + 1 
                      WHERE session_id = '$newsession_id'";

      $resultNewUpdate = mysqli_query($conn,$sqlNewUpdate);


      //updating old session no of patient to -1


      $sqlOldUpdate = "UPDATE tbl_docsession
                      SET no_of_appointment = no_of_appointment - 1 
                      WHERE session_id = '$currentSessId'";

      $resultOldUpdate = mysqli_query($conn,$sqlOldUpdate);

      $_SESSION['reschedulesuccess'] = 1;
      echo "<script>
                window.location.href='http://localhost/Care4you/patient/patient_docappointments.php';
            </script>";

  }
  


  if(isset($_POST['cancel-apt'])){
    
    $cancelapt_id = $_GET['id'];
    
    //updating the appointment to cancelled
    $cancelaptsql = "UPDATE tbl_docappointment
                        SET docapt_status = 2 
                        WHERE docapt_id = '$cancelapt_id'";

    $cancelResult = mysqli_query($conn,$cancelaptsql);

    //changing the no of patients by -1
    $sqlOldUpdate = "UPDATE tbl_docsession
                      SET no_of_appointment = no_of_appointment - 1 
                      WHERE session_id = '$currentSessId'";

      $resultOldUpdate = mysqli_query($conn,$sqlOldUpdate);
    

    $_SESSION['cancelaptsuccess'] = 1;
    echo "<script>
              window.location.href='http://localhost/Care4you/patient/patient_docappointments.php';
          </script>";
  }



  if(isset($_POST['yes-record'])){

      $docapt_id = $_GET['id'];
      $sql = "UPDATE tbl_docappointment SET record_access = 1
                WHERE docapt_id = '$docapt_id'";

      $resutls = mysqli_query($conn, $sql);
      $_SESSION['record-accessok'] = 1;
  }
?>
  
