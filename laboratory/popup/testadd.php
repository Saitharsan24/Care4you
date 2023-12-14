<?php
if (isset($_POST['add-available'])) {
  $labaptid = (int)$_GET['id'];
  $labtestinsert = (int)$_POST['test_name'];
  // print_r($labtestinsert);die();

  $sql ="SELECT labapt_date FROM tbl_labappointment
      WHERE labapt_id = '$labaptid'";
      $aptdate = mysqli_query($conn, $sql);
      $appointment_date_obj = mysqli_fetch_assoc($aptdate);
      $labaptDate = $appointment_date_obj['labapt_date'];

      $date_apt = $labaptDate ;
      $test_id = $labtestinsert;
      $sql ="SELECT COUNT(tbl_addlabtest.addlabtest_id) AS tests_amount FROM tbl_addlabtest
      INNER JOIN tbl_labtests ON tbl_labtests.test_id = tbl_addlabtest.test_id
      INNER JOIN tbl_labappointment ON tbl_labappointment.labapt_id = tbl_addlabtest.labapt_id
      WHERE tbl_addlabtest.test_id = '$labtestinsert'
      AND tbl_labappointment.labapt_date ='$labaptDate'
      AND tbl_addlabtest.confirmation_status = 1";
      $sum = mysqli_query($conn, $sql);
      $sum_tests = mysqli_fetch_assoc($sum);

      $sql ="SELECT NumberOfTestsPerDay FROM tbl_labtests
      WHERE test_id = '$labtestinsert'";
      $max_tests = mysqli_query($conn, $sql);
      $max_no_of_test = mysqli_fetch_assoc($max_tests);
      // print_r((int)$sum_tests['tests_amount']."    ".$max_no_of_test['NumberOfTestsPerDay']);die();
      if ((int)$sum_tests['tests_amount'] < (int)$max_no_of_test['NumberOfTestsPerDay']) {
        $sql1 = "INSERT INTO tbl_addlabtest (labapt_id,test_id,confirmation_status)
                VALUES ('$labaptid','$labtestinsert','1')";
        $result1= mysqli_query($conn,$sql1);
        unset($_POST);
        echo '<script>window.location.href = ""</script>';
      } else {
        $sql1 = "INSERT INTO tbl_addlabtest (labapt_id,test_id,confirmation_status)
                VALUES ('$labaptid','$labtestinsert','0')";
        $result1= mysqli_query($conn,$sql1);
        unset($_POST);
        echo '<script>window.location.href = ""</script>';
      }
}

if (isset($_POST['add-unavailable'])) {
  $labaptid = (int)$_GET['id'];
  $testname = $_POST['test_name'];

  $sql1 = "INSERT INTO tbl_addlabtest (labapt_id,test_name,confirmation_status)
                VALUES ('$labaptid','$testname','0')";
        $result1= mysqli_query($conn,$sql1);
        unset($_POST);
        echo '<script>window.location.href = ""</script>';
}

 ?>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.buttons{
  margin-left:720px;
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

.modbutton:hover {
  background-color: #0D5C75;
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
  border-radius: 50px;
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
  margin: 0 10px;
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
  background-color: #fff;
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

.form-itm2 {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: right;
    margin: 0px 40px 25px 0px;
    font-weight: 550;
    font-size: 15px;
}

.form-itm2 input {
    width: 350px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 500;
    border: none;
    padding: 4px;
    padding-left: 20px;
}

.form-itm2 input[type="file"]{
    width: 350px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 500;
    border: none;
    padding: 0px;
}

.form-itm2 input[type="date"] {
    width: 350px;
    border-radius: 10px;
    font-size: 13px;
    color: #000;
    font-weight: 500;
    border: none;
    padding: 5px;
}

.form-itm2 select {
    width: 350px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 500;
    padding: 5px;
    border:1px solid black;
}

input:focus {
    outline: none;
}

.form-itm2 p {
    margin-right: 20px;
}

.form-content {
    height: 500px;
    width: 700px;
    border-radius: 25px;
    display: flex;
    flex-direction: column;
    color: #093e4e;
    margin: 40px 0px 0px 100px;
}

</style>

<!-- ------------------------------------------------------------------------- -->


<section id ="avaMed" > 
  <span class="overlay"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> ADD AVAILABLE TEST DETAILS </h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">
              <!-- <div class="form-itm2">
                <p>Test Name :</p>
                <input name="doctor_name" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" required>
              </div> -->

              <div class="form-itm2">
                <p>Test Name :</p>
                <select name="test_name" id="test_name" class="testselect">
                  <option value=""> Select Test Name </option>
                  <?php
                    $tstnamesql = "SELECT * FROM tbl_labtests;";
                    $tstNresult = mysqli_query($conn, $tstnamesql);
                    while ($row = mysqli_fetch_assoc($tstNresult)) {
                      $test_id= $row['test_id'];
                      $test_name =  $row['test_name'];
                      echo "<option value='".$row['test_id']."'>" . $row['test_name'] . "</option>";
                    }
                  ?>                               
                </select>
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button type="submit" class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="add-available">Add to Table</button>
                <button class="modbutton close-btn">Close</button>
              </div>
        </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<section id ="unavaMed" > 
  <span class="overlay"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> ADD UNAVAILABLE TEST DETAILS </h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">
              <!-- <div class="form-itm2">
                <p>Test Name :</p>
                <input name="doctor_name" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" required>
              </div> -->

              <div class="form-itm2">
                <p>Test Name :</p>
                <input type="text" name="test_name" id="test_name" class="testselect" style="background-color: #a5d1e1;">
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="add-unavailable">Add to Table</button>
                <button class="modbutton close-btn">Close</button>
              </div>
        </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup1() {
  const section1 = document.getElementById("avaMed");
  section1.classList.add("active");
}

const overlay1 = document.querySelector(".overlay"),
closeBtn1 = document.querySelector(".close-btn");

function closePopup1() {
const section1 = document.querySelector("section");
section1.classList.remove("active");
}

closeBtn1.addEventListener("click", closePopup1);
overlay1.addEventListener("click", closePopup1);
</script>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup2() {
  const section2 = document.getElementById("unavaMed");
  section2.classList.add("active");
}

const overlay2 = document.querySelector(".overlay"),
closeBtn2 = document.querySelector(".close-btn");

function closePopup2() {
const section2 = document.querySelector("section");
section2.classList.remove("active");
}

closeBtn2.addEventListener("click", closePopup2);
overlay2.addEventListener("click", closePopup2);
</script>