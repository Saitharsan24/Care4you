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
  padding: 20px;
  /* padding: 20px 0 0 20px; */
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

.modal-box h4 {
  font-size: 15px;
  font-weight: 500;
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
    if(isset($_SESSION['data-inserted']))
    {
        ?>
        <section id="otp"  class="active">
        <span class="overlay"></span>

        <div class="modal-box" style="width:32%; height:48%; text-align: center; justify-content: center;align-items: center;">
            <i class="fa-solid fa-thumbs-up" style="margin-top:-20px;"></i> <br/>
            <h3 style="font-size:20px; font-weight:700;">
            Registration Successful!</h3> <br/>
            <h4>An One-Time Password (OTP) has been sent to your email. <br/> Please activate your account by verifying the OTP</h4> 
            
            <form action="" method="post">
            <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
                <button class="button" style="width:100px;" type="button" >Yes</button>
                <button class="button  close-btn " V style="width:100px;" type="submit" name="cancel-verify">No</button> 
            </div>
            </form>
        </div>
        </section>
        <?php
        unset($_SESSION['data-inserted']);

    }
?>

<!-- <script>
    function openPopupC() {
    const sectionC = document.getElementById("otp");
    sectionC.classList.add("active");
  }

  function closePopupC() {  
  console.log('Check');
  const sectionC = document.getElementById("otp");
  sectionC.classList.remove("active");
  }
</script> -->

<script>
function openPopupOTP() {
  const section = document.getElementById("otp");
  section.classList.add("active");
}

const overlay = document.querySelector(".overlay"),
closeBtn = document.querySelector(".close-btn");

function closePopupOTP() {
const section = document.querySelector("section");
section.classList.remove("active");
}

closeBtn.addEventListener("click", closePopupOTP);
overlay.addEventListener("click", closePopupOTP);
</script>