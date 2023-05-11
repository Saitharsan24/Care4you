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

</style>


<section id ="reshedule1"> 
  <span class="overlay"></span>

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
                      <tr>
                        <td>Dr. Sepalika Mendis</td>
                        <td>Cardiologist</td>
                        <td>10/05/2023</td>
                        <td>8.00 AM - 10.00 AM</td>
                        <td>
                          
                            <p class="book-btn" onclick="openPopup2()"><span>Book Now</span></p>
                          
                        </td>
                      </tr>
                    </tbody>
                </table>

            <div class="buttons">
            <button class="modbutton close-btn">Close</button>
            </div>
        </form>
    </div>
</section>

<section id ="reshedule2" > 
  <span class="overlay"></span>
    <div class="modal-box" style="width:50%; height:75%;" >
        <form action="" method="POST">
            <h1> Book New Doctor Appointment</h1>
            <div class="form-content" style="margin-left:-40px; margin-top:20px;">
              <div class="form-itm">
                <p>Doctor Name :</p>
                <input style="border:1px solid black" style="padding: 3px;" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Specialization :</p>
                <input style="border:1px solid black" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Date :</p>
                <input style="border:1px solid black" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Time :</p>
                <input style="border:1px solid black" type="text" value="" readonly>
              </div>

              <div class="form-itm">
                <p>Appointment No :</p>
                <input style="border:1px solid black" type="text" value="" readonly>
              </div>

              <div class="buttons" style="margin-left:600px; Margin-top:-0px;">
                <button class="modbutton close-btn">Close</button>
              </div>
        </div>
        </form>
    </div>
</section>

<section id="cancel">
  <span class="overlay" onclick="closePopupC()"></span>

  <div class="modal-box" style="width:28%; height:45%; text-align: center; justify-content: center;align-items: center;">
    <i class="fa-solid fa-circle-question" style="margin-top:-20px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Are you sure you want to <br/> Cancel your Appointment?</h3>

    <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
      <button class="button" style="width:100px;">Yes</button>
      <button class="button  close-btn " style="width:100px;" onclick="closePopupC()">No</button>
    </div>
  </div>
</section>


<script>

function openPopup() {
  const section = document.getElementById("reshedule1");
  section.classList.add("active");
}

const overlay = document.querySelector(".overlay"),
closeBtn = document.querySelector(".close-btn");

function closePopup() {
const section = document.querySelector("section");
section.classList.remove("active");
}

closeBtn.addEventListener("click", closePopup);
overlay.addEventListener("click", closePopup);

function openPopup2() {

  const section2 = document.getElementById("reshedule2");
  section2.classList.add("active");
  const section = document.getElementById("reshedule1");
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


</script>




<?php 
    

?>