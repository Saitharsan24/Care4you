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


<section id ="duration" > 
  <span class="overlay" onclick="closePopup1()"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> Update Test Duration (in Minutes)</h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">

              <div class="form-itm2">
                <p>Test Duration :</p>
                <input name="duration" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" value="<?php echo $duration; ?>">
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" type="submit" style="background-color: #28ae28; color: #fff;width: 150px;" name="update1">Update</button>
                <button class="modbutton close-btn">Close</button>
              </div>
            </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<section id ="charge" > 
  <span class="overlay" onclick="closePopup2()"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> Update Test Charge </h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">

              <div class="form-itm2">
                <p>Test Charge :</p>
                <input name="charge" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" value="<?php echo $charge; ?>">
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="update2">Update</button>
                <button class="modbutton close-btn">Close</button>
              </div>
            </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<section id ="prerequirement" > 
  <span class="overlay" onclick="closePopup3()"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> Update Pre-Requirements for Test </h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">

              <div class="form-itm2">
                <p>Pre-Requirements :</p>
                <input name="prerequirement" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" value="<?php echo $prerequirement; ?>">
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="update3">Update</button>
                <button class="modbutton close-btn">Close</button>
              </div>
            </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<section id ="NumberOfTestsPerDay" > 
  <span class="overlay" onclick="closePopup4()"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> Update Number of Tests per Day </h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">

              <div class="form-itm2">
                <p>Number of Tests :</p>
                <input name="NumberOfTestsPerDay" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" value="<?php echo $NumberOfTestsPerDay; ?>">
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="update4">Update</button>
                <button class="modbutton close-btn">Close</button>
              </div>
            </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<section id ="PreRe" > 
  <span class="overlay" onclick="closePopup5()"></span>
    <div class="modal-box" style="width:40%; height:35%;" >
        <form action="" method="POST">
            <h1> Update Prescription Requirements </h1>
            <div class="form-content" style="margin-left:-100px; margin-top:20px;">

              <div class="form-itm2" >
                <p>Prescription :</p>
                <!-- <input name="PreRe" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" value="<?php //echo $NumberOfTestsPerDay; ?>"> -->
                <input type="radio" id="req" name="PreRe" value="1">
                Required
                <input type="radio" id="notreq" name="PreRe" value="0">
                Not Required              
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="update5">Update</button>
                <button class="modbutton close-btn">Close</button>
              </div>
            </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup1() {
  const section1 = document.getElementById("duration");
  section1.classList.add("active");
}

const overlay1 = document.querySelector(".overlay"),
closeBtn1 = document.querySelector(".close-btn");

function closePopup1() {
const section1 = document.getElementById("duration");
section1.classList.remove("active");
}

closeBtn1.addEventListener("click", closePopup1);
overlay1.addEventListener("click", closePopup1);
</script>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup2() {
  const section2 = document.getElementById("charge");
  section2.classList.add("active");
}

const overlay2 = document.querySelector(".overlay"),
closeBtn2 = document.querySelector(".close-btn");

function closePopup2() {
const section2 = document.getElementById("charge");
section2.classList.remove("active");
}

closeBtn2.addEventListener("click", closePopup2);
overlay2.addEventListener("click", closePopup2);
</script>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup3() {
  const section3 = document.getElementById("prerequirement");
  section3.classList.add("active");
}

const overlay3 = document.querySelector(".overlay"),
closeBtn3 = document.querySelector(".close-btn");

function closePopup3() {
const section3 = document.getElementById("prerequirement");
section3.classList.remove("active");
}

closeBtn3.addEventListener("click", closePopup3);
overlay3.addEventListener("click", closePopup3);
</script>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup4() {
  const section4 = document.getElementById("NumberOfTestsPerDay");
  section4.classList.add("active");
}

const overlay4 = document.querySelector(".overlay"),
closeBtn4 = document.querySelector(".close-btn");

function closePopup4() {
const section4 = document.getElementById("NumberOfTestsPerDay");
section4.classList.remove("active");
}

closeBtn4.addEventListener("click", closePopup4);
overlay4.addEventListener("click", closePopup4);
</script>


<!-- ------------------------------------------------------------------------- -->


<script>
function openPopup5() {
  const section5 = document.getElementById("PreRe");
  section5.classList.add("active");
}

const overlay5 = document.querySelector(".overlay"),
closeBtn5 = document.querySelector(".close-btn");

function closePopup5() {
const section5 = document.getElementById("PreRe");
section5.classList.remove("active");
}

closeBtn5.addEventListener("click", closePopup5);
overlay5.addEventListener("click", closePopup5);
</script>



<?php 
  if(isset($update1)){

    $duration = $_POST['duration'];

    $test_id = $_GET['test_id'];
    $sql1 = "UPDATE tbl_tbl_labtests SET duration = '$duration'
            WHERE test_id = '$test_id'";

    $results1 = mysqli_query($conn,$sql1);

    if($results1 == TRUE){
      echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_testview.php?id=" . $test_id . "';</script>";
    }

  }

  if(isset($update2)){

    $charge = $_POST['charge'];

    $test_id = $_GET['test_id'];
    $sql2 = "UPDATE tbl_tbl_labtests SET charge = '$charge'
            WHERE test_id = '$test_id'";

    $results2 = mysqli_query($conn,$sql2);

    if($results2 == TRUE){
      echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_testview.php?id=" . $test_id . "';</script>";
    }

  }

  if(isset($update3)){

    $prerequirement = $_POST['prerequirement'];

    $test_id = $_GET['test_id'];
    $sql3 = "UPDATE tbl_tbl_labtests SET prerequirement = '$prerequirement'
            WHERE test_id = '$test_id'";

    $results3 = mysqli_query($conn,$sql3);

    if($results3 == TRUE){
      echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_testview.php?id=" . $test_id . "';</script>";
    }

  }

  if(isset($update4)){

    $NumberOfTestsPerDay = $_POST['NumberOfTestsPerDay'];

    $test_id = $_GET['test_id'];
    $sql4 = "UPDATE tbl_tbl_labtests SET NumberOfTestsPerDay = '$NumberOfTestsPerDay'
            WHERE test_id = '$test_id'";

    $results4 = mysqli_query($conn,$sql4);

    if($results4 == TRUE){
      echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_testview.php?id=" . $test_id . "';</script>";
    }

  }

  if(isset($update5)){

    $PreRe = $_POST['PreRe'];

    $test_id = $_GET['test_id'];
    $sql5 = "UPDATE tbl_tbl_labtests SET prescription  = '$PreRe'
            WHERE test_id = '$test_id'";

    $results5 = mysqli_query($conn,$sql5);

    if($results5 == TRUE){
      echo "<script> window.location.href='http://localhost/Care4you/laboratory/lab_testview.php?id=" . $test_id . "';</script>";
    }

  }

?>