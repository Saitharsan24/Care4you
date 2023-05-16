<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('./patient_getinfo.php') ?>
<?php require '../libraries/PHPMailer/vendor/autoload.php'; ?>
<?php require '../libraries/PHPMailer/vendor/payment_config.php'; ?>


<?php
$order_id = $_GET['id'];
$order_status = $_GET['status'];

//getting order details
$sql = "SELECT * FROM tbl_respondedorders WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$respond_date = $row['responddate'];
$respond_time = $row['respondtime'];

//getting medicine details 
$sql1 = "SELECT * FROM tbl_addmedicine WHERE order_id = '$order_id'";
$result1 = mysqli_query($conn, $sql1);


//getting patient email
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/patient.css" />
  <title>Home</title>
  <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include('patient_getinfo.php') ?>
  <div class="main-div">
    <div class="home-left">
      <div class="nav-logo">
        <a href="./patient_home.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="profile-image">
        <img src="../images/user.png" alt="profile-image" />
      </div>
      <div class="nav-links">
        <a href="./patient_home.php">Home</a>
        <a href="./patient_appointments.php">Appointments</a>
        <a href="./patient_pharmorders.php" style="color: #0c5c75; font-weight: bold">Orders</a>
        <a href="./patient_medicalrecords.php">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="./patient_viewprofile.php">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">

      <a href="./patient_pharmorderViewDetails.php?id=<?php echo $order_id ?>&status=<?php echo $order_status ?>">
        <div class="back">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>
      </a>

      <div class="view-order-heading">
        <h2>My Order Review</h2>
      </div>
      <div class="view-review-details">

        <div class="view-orderreview-row">Order ID : <div>
            <?php echo ' ' . $order_id; ?>
          </div>
        </div>
        <div class="view-orderreview-row">Reviewed date : <div>
            <?php echo ' ' . $respond_date . '  ' . $respond_time; ?>
          </div>
        </div>
        <div class="view-orderreview-row">Available medicines :<div></div>
        </div>
        <table class="tbl-addmed">
          <thead>
            <tr>
              <td>Drug Name</td>
              <td>Unit Price (Rs.)</td>
              <td>Quantity</td>
              <td>Total (Rs.)</td>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($result1) == 0) { ?>
              <tr>
                <td colspan=4>No Stock available</td>
              </tr>
            <?php } else {

              while ($row1 = mysqli_fetch_array($result1)) {
                ?>
                <tr>
                  <td style="font-size: 12px;">
                    <?php echo $row1['drugname']; ?>
                  </td>
                  <td style="font-size: 12px;">
                    <?php echo $row1['unitprice']; ?>
                  </td>
                  <td style="font-size: 12px;">
                    <?php echo $row1['quantity']; ?>
                  </td>
                  <td style="font-size: 12px;">
                    <?php echo $row1['total']; ?>
                  </td>
                </tr>
              <?php }
            }
            ?>

          </tbody>

        </table>
        <div class="view-orderreview-row">Net amount :<div>
            <?php echo ' Rs.' . $row['nettotal']; ?>
          </div>
        </div>
        <div class="view-orderreview-row">
          <p>Unavailable medicines :
          <div>
            <?php echo $row['unavailablemedicines']; ?>
          </div>
          </p>
        </div>
      </div>

      <div class="view-orderreview-btn">
        <div class="">
          <?php
          if ($row['order_status'] == 1 && (int) $row['nettotal'] != 0) {
            ?>
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="<?php echo $_SESSION['public_key'] ?>" data-amount="<?php echo $row['nettotal'] * 100 ?>"
              data-name="CareForYou Payment" data-description="Make laboratory appointment payment" data-currency="lkr"
              data-image="../images/logoicon.png" data-email="<?php echo $email ?>">
              </script>
          <?php
          }
          ?>
        </div>
      </div>
    </div>

  </div>
</body>

</html>


<?php
if (isset($_POST['stripeToken'])) {
  \Stripe\Stripe::setVerifySslCerts(false);
  try {
    $token = $_POST['stripeToken'];

    $data = \Stripe\Charge::create(
      array(
        "amount" => $_SESSION['donating_amount'],
        "currency" => "lkr",
        "description" => "Cash Donation",
        "source" => $token,
      )
    );
    echo "Successfull";

    if (isset($_POST['pname'])) {
      print_r($_POST['pname']);
      die();
    }
    exit();



  } catch (\Stripe\Exception\CardException $e) {
    $_SESSION['PaymentError'] = $e->getError()->message;
    echo "Card Fail";
    unset($_SESSION['donating_amount']);

    // print_r("A payment error occurred: {$e->getError()->message}");
  } catch (\Stripe\Exception\InvalidRequestException $e) {
    print_r("An invalid request occurred.");
    unset($_SESSION['donating_amount']);

  } catch (Exception $e) {
    print_r("Another problem occurred, maybe unrelated to Stripe.");
    unset($_SESSION['donating_amount']);

  }


}
?>