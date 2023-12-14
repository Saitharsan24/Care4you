<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-report.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"
        integrity="sha512-JtgP5ehwmnI6UfiOV6U2WzX1l6D1ut4UHZ4ZiPw89TXEhxxr1rdCz88IKhzbm/JdX9T34ZsweLhMNSs2YwD1Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>

</head>



<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">
                        <div class="highlighttext">System Users</div>
                    </a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="back" onclick="location.href='admin-reports.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="reg-heading">
                    <i class="fa-solid fa-clipboard-list" style="font-size: 45px;font-weight: 800;"></i>
                    &nbsp;Report Generation
                </div>
                
                <div class="reg-container">
                    <div style="  background-color: #ffffff;color: #000000;font-size: 20px;font-weight: 500;width:400px">
                        <form action="" method="POST">
                        <label style="margin-top:-150px; margin-bottom:10px;">Select month:</label>
                        <select name="month" id="">
                            <option value="" hidden>Select month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <button name="generate" class="reg-foot pha">
                    <span>Generate report&nbsp;</span>
                </button>
                </form>
            </div>
        </div>
</body>
<?php 
if (isset($_POST['generate'])) {
    $month = $_POST['month'];
        $query="SELECT * FROM tbl_respondedorders 
        WHERE order_status = '2'";
        $output = mysqli_query($conn, $query);
        // $donation = mysqli_fetch_array($output); 
        // // $order_date = strtotime($donation['orderdate']);
        // $date = date("m", $order_date);
        // print_r($date);die();

        
    
?>
<script>
        
            pdf = new jsPDF;
            // Set the font size and font family
            pdf.setFontSize(16);
            

            // Define the text to center
            var text = "Order Details";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos = (pdf.internal.pageSize.width - textWidth) / 8;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos, 10);

            // Define the table columns and data
            let columns1 = ["Patient Name", "Patient Address" ,"Cotact Number","Remarks","Order Date","Order Time","Net Total","NIC"];
            let data1 = [
                <?php 
                while ($donation = mysqli_fetch_array($output)) {
                    $order_date = strtotime($donation['orderdate']);
                    $date = date("d", $order_date);
                    if ($date == $month) {
                         echo '["' . $donation['pname'] . '", "' . $donation['paddress']  . '", "' . $donation['contactnumber']  . '", "' . $donation['remarks']  . '", "' . $donation['orderdate']  . '", "' . $donation['ordertime']  . '", "' . $donation['nettotal']  . '", "' . $donation['nic']  . '"],';
                    }
                   
                } ?>
                
            ];

            // Add the table to the PDF using the autoTable method
            pdf.autoTable({
                head: [columns1],
                body: data1,
                startY: 20,
                headStyles: {
                    fillColor: [13, 92, 117], // Red color
                    textColor: [255, 255, 255] // White text

                }

            });

            var filename = 'Order details report.pdf';
            pdf.save(filename);
                

            
        
    </script>   
<?php 
} ?>
</html>

