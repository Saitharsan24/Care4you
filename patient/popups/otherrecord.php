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


</style>

<section id ="uploadOR" > 
  <span class="overlay"></span>
    <div class="modal-box" style="width:45%; height:65%;" >
        <form action="" method="POST">
            <h1> Upload New Medical Record </h1>
            <div class="form-content" style="margin-left:-70px; margin-top:20px;">
              <div class="form-itm2">
                <p>Doctor Name :</p>
                <input name="doctor_name" class="padding" style="border:1px solid black" style="padding: 3px;" type="text" required>
              </div>

              <div class="form-itm2">
                <p>Record Type :</p>
                <select name="rtype" id="rtype">
                  <option value="Doctor Prescription">Doctor Prescription</option>
                  <option value="Lab Report">Lab Report</option>
                </select>
              </div>

              <div class="form-itm2">
                <p>Upload Record :</p>
                <input style="border:1px solid black" accept="image/*,.doc,.docx,.txt,.pdf" type="file" name="record">
              </div>

              <div class="form-itm2">
                <p>Issued Date :</p>
                <input style="border:1px solid black" type="Date" name="issuedate">
              </div>

              <div class="form-itm2">
                <p>Description :</p>
                <input style="border:1px solid black" class="des" type="text" name="description">
              </div>

              <div class="buttons" style=" display: flex; margin-left:500px; margin-top:-0px;">
                <button class="modbutton" style="background-color: #28ae28; color: #fff;" name="upload">Upload</button>
                <button class="modbutton close-btn">Close</button>
              </div>
        </div>
        </form>

        <?php
          //Check whether the Place Order button is clicked
          if(isset($_POST['upload']))
          {
              
              include('patient_getinfo.php');
              //Get the details from the form
              $doctor_name = $_POST["doctor_name"];
              $rtype = $_POST["rtype"];
              $record_name = $_FILES["record"]["name"];
              $issueddate = $_POST["issueddate"];
              $description = $_POST["description"];
              
              echo $doctor_name;
              echo $rtype;
              echo $record_name;
              echo $issueddate;
              echo $description;


              //Check whether the record is uploaded or not
                  //print_r($_FILES['record']);
                  //die(); //Break the code to prevent data insertion
              
                  if(isset($_FILES['record']['name']))
                  {
                    
                      //Upload the record
                      //To upload the record we need the file name, source path and destination path

                      //Get the record name
                      $record_name = $_FILES['record']['name'];

                      //Upload record only if record is selected
                      if($record_name != "")
                      {
                          //Auto Rename the record

                          //Get the extension of the record
                          $ext = end(explode('.',$record_name));

                          //Rename the record
                          $record_name = $p_id."_Record_".date('dmyhisA').".".$ext;

                          //Get the source path
                          $source_path = $_FILES['record']['tmp_name'];

                          //Give the destination path
                          $destination_path = "../images/patient-records/".$record_name; 

                          //Upload the record
                          $upload = move_uploaded_file($source_path,$destination_path);

                          //Check whether the record is uploaded or not
                          if($upload == FALSE)
                          {
                              $_SESSION['upload'] = "Failed to upload record! Please Retry";
                              //Redirect to place order page
                              // header('location:'.SITEURL.'/patient/patient_pharmorders.php'); 
                              //Stop the process
                              die();
                          }

                      } 

                  }
                  else
                  {
                      //record not uploaded and record name is not set (Data can not save)
                      $record_name = "";
                  }

                  echo $record_name;
                  
                  
          } 
        ?>
    </div>
</section>

<script>
function openPopup() {
  const section = document.getElementById("uploadOR");
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
</script>
