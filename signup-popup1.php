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

/* pwd-forgetpassword.php CSS Starts */

.fgtpwd-wrapper {
    display: flex;
    flex-direction: column;
    margin: 40px;
    margin-left: 120px;
}

.fgtpwd-heading {
    color: #0C5C75;
    font-size: 30px;
    font-weight: 700;
}

.fgtpwd-txt{
    color: #000000;
    font-size: 15px;
}

.fgtpwd-input{
    margin-top: 10px;
    width: 400px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 1px 2px 2px 1px #1B7B99;
    padding: 10px;
    font-size: 15px;
    text-align: center;
    color: #303030;
    outline: none;
}

.fgtpwd-input::placeholder {
    text-align: center;
    font-size: 13px;
}

.btn_continue {
    /* margin-top: 30px; */
    background-color: #0C5C75;
    color: white;
    padding: 5px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.forgot-err-msg{
    color: red;
    font-size: 13px;
    margin-bottom: 0px;

}

.forgot-continue{
    margin-top: 10px;
}

/* pwd-forgetpassword.php CSS Ends */




/* pwd-verifyotp.php CSS Starts */

.otp-container {
    margin-top: 15px;
    display: flex;
    justify-content: center;
}
  
  .otp-input {
    width: 40px;
    height: 40px;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 20px;
    text-align: center;
    margin: 0 10px;
}
  
  .otp-input:focus {
    outline: none;
    border-color: #0C5C75;
}  

.opt-btn{
    margin-top: 20px;
}

.message-sent{
    font-size: 15px;
    color: green;
    font-weight: 500;
}

/* pwd-verifyotp.php CSS Ends */

</style>

<?php 
        ?>
        <section id="otp"  class="active">
        <span class="overlay"></span>

        <div class="modal-box" style="width:35%; height:52%; text-align: center; justify-content: center;align-items: center;">
        <i class="fa-solid fa-hourglass-half" style="margin-top:-20px;"></i> <br/>
            <h3 style="font-size:20px; font-weight:700;">
            Email Verification</h3> <br/>
            <h4>An One-Time Password (OTP) has been sent to your email. <br/> Please activate your account by verifying the OTP</h4>
            
                <form class="form-signin" method="POST">
                      <div class="otp-container">
                          <input type="text" class="otp-input" name="code1" maxlength="1" pattern="[0-9]{1}" onkeypress="return isNumberKey(event)" autofocus="true" required>
                          <input type="text" class="otp-input" name="code2" maxlength="1" pattern="[0-9]{1}" onkeypress="return isNumberKey(event)" >
                          <input type="text" class="otp-input" name="code3" maxlength="1" pattern="[0-9]{1}" onkeypress="return isNumberKey(event)" >
                          <input type="text" class="otp-input" name="code4" maxlength="1" pattern="[0-9]{1}" onkeypress="return isNumberKey(event)" >
                          <input type="text" class="otp-input" name="code5" maxlength="1" pattern="[0-9]{1}" onkeypress="return isNumberKey(event)" >
                          <input type="text" class="otp-input" name="code6" maxlength="1" pattern="[0-9]{1}" onkeypress="return isNumberKey(event)" >
                      </div>
                
                      <script>
                      //Disable entering any character other than numbers
                      function isNumberKey(evt){
                          var charCode = (evt.which) ? evt.which : event.keyCode;
                          if (charCode > 31 && (charCode < 48 || charCode > 57)){
                              return false;
                          }
                          return true;
                      }
                      </script>
                      
                      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                      <script>
                      $(document).ready(function(){
                          // Select all the OTP input fields
                          var otpInputs = $('.otp-input');
                          
                          // Add event listener on all the OTP input fields
                          otpInputs.on('input', function() {
                              // Get the current input field
                              var currentInput = $(this);
                              
                              // Check if the input field has a value
                              if(currentInput.val().length === 1) {
                                  // Get the index of the current input field
                                  var currentIndex = otpInputs.index(currentInput);
                                  
                                  // Move the focus to the next input field, if it exists
                                  if(currentIndex < otpInputs.length - 1) {
                                      otpInputs[currentIndex + 1].focus();
                                  }
                              }
                          });
                      });
                      </script>

              <div class="buttons" style="display:flex; margin-left:30px; margin-top:20px;">
                  <button class="button" style="width:100px;" type="submit" name="verify" >Verify OTP</button>
                  <button class="button  close-btn " V style="width:100px;" type="submit" name="cancel-verify">Cancel</button> 
              </div>
            </form>
        </div>
</section>


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

</script>

<?php

?>