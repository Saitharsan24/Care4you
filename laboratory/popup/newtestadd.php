<?php 
  if(isset($_POST['upload'])){
    $test_name = $_POST['test_name'];
    $duration = $_POST['duration'];
    $charge = $_POST['charge'];
    $prerequirement = $_POST['prerequirement'];    
    $NumberOfTestsPerDay = $_POST['NumberOfTestsPerDay'];

    $sqlinsert = "INSERT INTO tbl_labtests (test_name,duration,charge,prerequirement,NumberOfTestsPerDay)
                      VALUES ('$test_name','$duration','$charge','$prerequirement','$NumberOfTestsPerDay')";
    $results = mysqli_query($conn,$sqlinsert);
    if ($results) {
      $_SESSION['addLabTest'] = 1;
      
    }
    
    
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
  <span class="overlay"></span>
    <div class="modal-box" style="width:50%; height:70%;" >
        <form action="" method="POST">
            <h1 style="text-align:center;"> Add New Lab Test</h1>
            <div class="form-content" style="margin-left:-10px; margin-top:20px;">

              <div class="form-itm2">
                <p>Test Name :</p>
                <input name="test_name" class="padding" style="border:1px solid black" style="padding: 3px;" type="text">
              </div>
              <div class="form-itm2">
                <p>Test Duration (in Minutes):</p>
                <input name="duration" class="padding" style="border:1px solid black" style="padding: 3px;" type="text">
              </div>
              <div class="form-itm2">
                <p>Test Charge (Rs.):</p>
                <input name="charge" class="padding" style="border:1px solid black" style="padding: 3px;" type="text">
              </div>
              <div class="form-itm2">
                <p> Pre Requirements for Test :</p>
                <input name="prerequirement" class="padding" style="border:1px solid black" style="padding: 3px;" type="text">
              </div>
              <div class="form-itm2">
                <p>Number of Tests per Day :</p>
                <input name="NumberOfTestsPerDay" class="padding" style="border:1px solid black" style="padding: 3px;" type="text">
              </div>

              <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;width: 150px;" name="upload" type="submit">Add Test</button>
                <button class="modbutton close-btn" type="button">Close</button>
              </div>
            </div>
        </form>
    </div>
</section>

<section id="addedtest">
  <span class="overlay" onclick="closePopupAT()"></span>

  <div class="modal-box" style="width:28%; height:45%; text-align: center; justify-content: center;align-items: center;">
    <i class="fa-solid fa-circle-check" style="color: #28ae28;margin-top:-20px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Successfully<br/>sent response to the patient</h3>

    <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
      <button class="button  close-btn " style="width:100px;" onclick="closePopupAT()">Ok</button>
    </div>
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
const section1 = document.querySelector("section");
section1.classList.remove("active");
}

closeBtn1.addEventListener("click", closePopup1);
overlay1.addEventListener("click", closePopup1);



function openPopupAT() {
    const sectionC = document.getElementById("addedtest");
    sectionC.classList.add("active");
  }

  function closePopupAT() {  
    console.log('Check');
  const sectionC = document.getElementById("addedtest");
  sectionC.classList.remove("active");
  }



</script>


