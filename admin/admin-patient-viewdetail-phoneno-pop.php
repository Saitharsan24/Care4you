<i onclick="openPopup1()" class="fa-solid fa-pen-to-square" style="color: #0D5C75; transition: color 0.2s;"
  onmouseover="this.style.color='#073645'" onmouseout="this.style.color='#0D5C75'"></i>

<section id="section1">
  <a href="#" onclick="openPopup1()"></a>
  <span class="overlay"></span>

  <div class="modal-box" style="width:30%;height:40%;padding:10px;">

    <form action="" method="POST">
    <i class="fa-solid fa-square-phone" style="margin-left:130px; font-size: 110px;"></i> <br /><br />
      Enter New Contact Number
      <input type="text" class="inputtab" name="contact_number" value="<?php echo '0' . $row['contact'] ?>" />

      <div class="buttons" style="margin-top: 50px;margin-left: 70px;">
        <button class="modbutton close-btn">Close</button>
        <button type="submit" class="modbutton" name="update_contact">Update</button>
      </div>

      <?php
      if (isset($_POST['update_contact'])) {
        $id = $_GET['id'];
        $contact = $_POST['contact_number'];

        $query = "UPDATE tbl_patient SET `contact`='$contact' WHERE p_id=$id";
        $resq = mysqli_query($conn, $query);

        if ($resq) {
          $_SESSION['update-mge'] = '<div class="success">Contact Number Updated Successfully</div>';
          echo "<script> window.location.href='http://localhost/Care4you/admin/admin-patient-view-detail.php?id=$id';</script>";
        } else {
          $_SESSION['update-mge'] = '<div class="error">Failed to Update Contact Number</div>';
          echo "<script> window.location.href='http://localhost/Care4you/admin/admin-patient-view-detail.php?id=$id';</script>";
        }
      }
      ?>

    </form>

  </div>
</section>