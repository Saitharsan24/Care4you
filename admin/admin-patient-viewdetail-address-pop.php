<a href="#" onclick="openPopup2()"><i class="fa-solid fa-pen-to-square" style="color: #0D5C75; transition: color 0.2s;"
    onmouseover="this.style.color='#073645'" onmouseout="this.style.color='#0D5C75'"></i></a>

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
    z-index: 9999;
    /* Set a higher z-index than the rest of the page */
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
    z-index: 8;
    /* Set a lower z-index than the modal-box */
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

  .modal-box i {
    margin-top: 30px;
    margin-left: 80px;
    font-size: 70px;
    color: #0e6680;
    margin-bottom: -15px;

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

  .inputtab {
    margin-bottom: -100px;
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

<section id="section2">
  <a href="#" onclick="openPopup2()"></a>
  <span class="overlay"></span>

  <div class="modal-box" style="width:25%;height:40%;">

    <form action="" method="POST">

      <i class="fa-solid fa-map-location-dot"></i>
      <h2> Enter New Address </h2>
      <input type="text" step="500" name="address" class="inputtab" value="<?php echo $row['address'] ?>"
        placeholder="Enter New address" />

      <div class="buttons" style="margin-top:-7px;">
        <button class="modbutton close-btn">Close</button>
        <button class="modbutton" type="submit" name="update_address"
          style="background-color: #008000; color: #fff;">Update</button>
      </div>

      <?php
      if (isset($_POST['update_address'])) {
        $id = $_GET['id'];
        $address = $_POST['address'];

        $query = "UPDATE tbl_patient SET address='$address' WHERE p_id=$id";
        $resq = mysqli_query($conn, $query);

        if ($resq) {
          $_SESSION['update-mge'] = '<div class="success">Doctor Address has Updated Successfully</div>';
          echo "<script> window.location.href='http://localhost/Care4you/admin/admin-patient-view-detail.php?id=$id';</script>";
        } else {
          $_SESSION['update-mge'] = '<div class="error">Failed to Update Doctor Address</div>';
          echo "<script> window.location.href='http://localhost/Care4you/admin/admin-patient-view-detail.php?id=$id';</script>";
        }
      }
      ?>

    </form>

  </div>
</section>