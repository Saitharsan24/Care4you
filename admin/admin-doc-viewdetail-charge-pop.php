<a href="#" onclick="openPopup1()"><i class="fa-solid fa-pen-to-square" style="color: #0D5C75; transition: color 0.2s;" onmouseover="this.style.color='#073645'" onmouseout="this.style.color='#0D5C75'"></i></a>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
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
  justify-content: center;
  align-items: center;
  max-width: 600px;
  width: 100%;
  max-height: 300px;
  height: 100%;
  padding: 30px 20px;
  border-radius: 24px;
  background-color: #fff;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  transform: translate(-50%, -50%) scale(1.2);
}

section.active .modal-box {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
}

.modal-box i.fa-solid.fa-sack-dollar {
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

</style>

<section id=section1>
  <a href="#" onclick="openPopup1()"></a>
  <span class="overlay"></span>

    <div class="modal-box">
    
        <form action="" method="POST">
          
            <i class="fa-solid fa-sack-dollar"></i>
            <h2> Enter New Doctor Charge (per session) </h2>
            <input type="number" step="500" name="charge" class="inputtab" value="<?php echo $row['charge']; ?>" placeholder="Enter New Doctor Charge per Session" />

            <div class="buttons">
            <button class="modbutton close-btn">Close</button>
            <button class="modbutton" type="submit" name="update_charge"  style="background-color: #008000; color: #fff;">Update</button>
            </div>

            <?php
                if(isset($_POST['update_charge']))
                {
                    $id = $_GET['id'];
                    $charge= $_POST['charge'];

                    $query = "UPDATE tbl_doctor SET charge='$charge' WHERE doctor_id=$id";
                    $resq=mysqli_query($conn,$query);

                    if($resq)
                    {
                        $_SESSION['update-mge'] = '<div class="success">Doctor Charges has Updated Successfully</div>';
                        echo "<script> window.location.href='http://localhost/Care4you/admin/admin-doc-view-detail.php?id=$id';</script>";
                    }
                    else
                    {
                        $_SESSION['update-mge'] = '<div class="error">Failed to Update Doctor Charges</div>';
                        echo "<script> window.location.href='http://localhost/Care4you/admin/admin-doc-view-detail.php?id=$id';</script>";
                    }
                }
            ?>

        </form>

    </div>
</section>

