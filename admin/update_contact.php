<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Contact Number</title>
</head>
<body>
  <h1>Update Contact Number</h1>

  <?php
  if(isset($_POST['update_contact']))
  {
    $id = $_GET['id'];
    $contact=$_POST['contact'];

    $query = "UPDATE tbl_patient SET `contact`='$contact' WHERE p_id=$id";
    $res=mysqli_query($conn,$query);

    if($res)
    {
      echo "<script>window.close();</script>";
      echo "<script>alert('Contact number updated successfully.');</script>";
    }
    else
    {
      echo "<script>alert('Failed to update contact number.');</script>";
    }
  }
  ?>

  <form method="post">
    <label for="contact">Contact Number:</label>
    <input type="text" name="contact" required><br><br>

    <input type="submit" name="update_contact" value="Update">
  </form>
</body>
</html>