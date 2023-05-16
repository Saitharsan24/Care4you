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
  left: 50%;
  top: 50%;
  height: 80vh;
  width: 75vh;
  transform: translate(-40%, -50%);
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
  justify-content: center;
  align-items: center;
  padding: 20px 0 0 20px;
  border-radius: 50px;
  background-color: #fff;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  transform: translate(-40%, -50%) scale(1.2);
  
}

section.active .modal-box {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-40%, -50%) scale(1);
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

.cont{
  justify-content: center;
  align-items: center;
  margin-left:-20px;
  width: 90%;
  height: 65vh;
}
</style>

<section id="uploadOR">
    <span class="overlay" onclick="closePopup()"></span>

    <div class="modal-box">
        <img src="../images/docprescription/Order_06_02_23_08_56_41_PM.jpeg" alt="Prescription Loading Failed :(" class="cont">
        <button class="modbutton close-btn" style="margin-top: 10px;" onclick="closePopup()">Close</button>
    </div>
</section>


<section id="sessionaccept">
  <span class="overlay" onclick="closePopupSESA()"></span>

  <div class="modal-box" style="width:28%; height:45%; text-align: center; justify-content: center;align-items: center;">
  <i class="fa-solid fa-circle-question" style="color: #0e6680;margin-top:-20px; font-size:100px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Are you sure<br/>want to Accept the Session?</h3>

    <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
    <form method="post">
      <button class="button  close-btn " style="width:100px; background-color:#28ae28" onclick="closePopupSESA()" type="submit" name="confirmses">Yes</button>
      <button class="button  close-btn " style="width:100px;" onclick="closePopupSESA()" type="button">No</button>
    </form>
    </div>
  </div>
</section>


<section id="sessiondeny">
  <span class="overlay" onclick="closePopupSESD()"></span>

  <div class="modal-box" style="width:28%; height:45%; text-align: center; justify-content: center;align-items: center;">
    <i class="fa-solid fa-circle-question" style="color: #0e6680;margin-top:-20px; font-size:100px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Are you sure<br/>want to Cancel the Session?</h3>

    <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
    <form method="post">
      <button class="button  close-btn " style="width:100px; " onclick="closePopupSESD()" type="button">No</button>
      <button class="button  close-btn " style="width:100px; background-color:#dc1616" onclick="closePopupSESA()" type="submit" name="cancelses">Yes</button>
    </form>
    </div>
  </div>
</section>


<script>
function openPopup() {
  const section = document.getElementById("uploadOR");
  section.classList.add("active");
}

function closePopup() {
const section = document.getElementById("uploadOR");
section.classList.remove("active");
}

closeBtn.addEventListener("click", closePopup);
overlay.addEventListener("click", closePopup);



function openPopupSESA() {
  const section = document.getElementById("sessionaccept");
  section.classList.add("active");
}

function closePopupSESA() {
const section = document.getElementById("sessionaccept");
section.classList.remove("active");
}

function openPopupSESD() {
  const section = document.getElementById("sessiondeny");
  section.classList.add("active");
}

function closePopupSESD() {
const section = document.getElementById("sessiondeny");
section.classList.remove("active");
}
</script>

<?php 
  if(isset($_POST['confirmses'])){
    $session_id = $_GET['id'];
    //print_r($session_id);die();
    $sql = "UPDATE tbl_docsession SET status = 1 WHERE session_id='$session_id'";
    $result = mysqli_query($conn, $sql);

  }
  
  if(isset($_POST['cancelses'])){
    $session_id = $_GET['id'];
    //print_r($session_id);die();
    $sql = "UPDATE tbl_docsession SET status = 3 WHERE session_id='$session_id'";
    $result = mysqli_query($conn, $sql);
  }

?>