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
  width: 500px;
  height: 400px;
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
  transform: translate(-67%, -50%) scale(1);
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

<section id="editpop">
  <span class="overlay" onclick="closePopupE()"></span>

  <div class="modal-box" style="text-align: center; justify-content: center;align-items: center; height:65%;">
    <i class="fa-solid fa-pen-to-square" style="color: #0d5c75;"></i> <br/>

    <form type="submit">
    <table class="viewtbl" style="width:95%;">
        
        <tr>
            <td class="typeR" style="width:50%; font-size:15px;">Appointment Status :</td>
            <td class="typeL" style="width:50%; font-size:15px;">
            
                <label class="switch">
                    <input type="checkbox" id="toggle" name="attendance">
                    <span class="slider round"></span>
                    <span id="toggle-text">Not Attended</span>
                </label>
                <script>
                    const toggle = document.getElementById("toggle");
                    const toggleText = document.getElementById("toggle-text");

                    toggle.addEventListener("change", function() {
                        if (this.checked) {
                            toggleText.textContent = "Attended";
                        } else {
                            toggleText.textContent = "Not Attended";
                        }  
                    });
                </script>
            </td>
        </tr>

        <tr>
            <td class="typeR" style="width:50%; font-size:15px;">Upload Prescription :</td>
                <td class="typeL" style="width:50%; font-size:15px;">
                <form method="POST">  
                <div class="type-file upload-input">
                    <input type="file" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription"/>
                </div>
            </td>
        </tr>

        <tr>
            <td class="typeR" style="width:50%; font-size:15px;">Other Remarks :</td>
            <td class="typeL" style="width:50%; font-size:15px;">
                <form method="POST">
                    <textarea class="textarea" name="asst-remark" id="address" placeholder="Enter Doctor Remarks Here"></textarea>
            </td>
        </tr>
    </table>
    

      <div class="buttons" style="display:flex; margin-left:80px; margin-top:20px;">
          <button class="button close-btn update" style="width:100px; background-color:#0C7516;" type="submit" name="update-pres">Update</button>
          <button class="button  close-btn " style="width:100px;" onclick="closePopupE()">Close</button>
      </div>
    </form>
  </div>
</section>

<section id="uploadsuccess">
  <span class="overlay" onclick="closePopupPU()"></span>

  <div class="modal-box" style="width:28%; height:45%; text-align: center; justify-content: center;align-items: center;">
    <i class="fa-solid fa-circle-check" style="color: #28ae28;margin-top:-20px;"></i> <br/>
    <h3 style="font-size:20px; font-weight:700;">Successfully<br/>uploaded prescription</h3>

    <div class="buttons" style="display:flex; margin-left:0px; margin-top:20px;">
      <button class="button  close-btn " style="width:100px;" onclick="closePopupPU()">Ok</button>
    </div>
  </div>
</section>


<script>
function openPopupE() {
    const sectionC = document.getElementById("editpop");
    sectionC.classList.add("active");
  }

  function closePopupE() {  
    console.log('Check');
  const sectionC = document.getElementById("editpop");
  sectionC.classList.remove("active");
  }


  function openPopupPU() {
    const sectionC = document.getElementById("uploadsuccess");
    sectionC.classList.add("active");
  }

  function closePopupPU() {  
    console.log('Check');
  const sectionC = document.getElementById("uploadsuccess");
  sectionC.classList.remove("active");
  }

</script>


<?php 

  if(isset($_POST['update-pres'])){

      $docapt_id = $_GET['id'];

        if(isset($_POST['attendance'])){
          $attended_check = 3;
      } else{
          $attended_check = 4;
      }
      
      $remarks = $_POST['asst-remark'];


      $sql = "UPDATE tbl_docappointment 
                  SET docapt_status = '$attended_check',
                      other_remark = '$remarks'
                  WHERE docapt_id = '$docapt_id'";  

      $result = mysqli_query($conn,$sql);

      if ($result) {
          // $_SESSION['pres-upload'] == 1;
          // echo "<script> window.location.href='http://localhost/Care4you/assistant/asst_viewappointment.php?id=$docapt_id';</script>";
          echo "<script>openPopupPU()</script>";
      }
  }

?>