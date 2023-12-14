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
                <li><a href="admin-reports.php"> <div class="highlighttext">Reports</div></a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
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
                     <div style="background-color: #ffffff;color: #000000;font-size: 20px;font-weight: 500;width:400px">
                        <label style="margin-top: 10px; margin-bottom:10px;">Select system user type:</label>
                        <form action="" method="POST">
                        <select name="role" id="">
                            <option value="" hidden>Select system user</option>
                            <option value="Patient">Patient</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Pharmacist">Pharmacist</option>
                            <option value="Assistant">Assistant</option>
                            <option value="Lab">Lab Technician</option>
                        </select>

                        <label style="margin-top:20px; margin-bottom:10px;">Select from date:</label>
                        <input name="from-date" class="" type="date">

                        <label style="margin-top:20px; margin-bottom:10px;">Select to date:</label>
                        <input name="to-date" type="date">
                    </div>
                </div>
                <button type="submit" name="generate" class="reg-foot pha">
                    <span>Generate report&nbsp;</span>
                </button>
                </form>
            </div>
        </div>
</body>

</html>

<?php 
if (isset($_POST['generate'])) {
    // print_r($_POST);die();
    $to = $_POST['to-date'];
    $from =$_POST['from-date'];
    if ($_POST['role'] == 'Patient') {
        $query="SELECT * FROM tbl_patient 
        WHERE acc_createdate <= '$to'
        AND acc_createdate >= '$from' ";
        $output = mysqli_query($conn, $query);
        
    
?>
<script>
        
            pdf = new jsPDF;
            // Set the font size and font family
            pdf.setFontSize(16);
            

            // Define the text to center
            var text = "Details of patients";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos = (pdf.internal.pageSize.width - textWidth) / 7;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos, 10);

            // Define the table columns and data
            let columns1 = ["First Name", "Last Name" ,"Gender","DOB","NIC","Contact Number","Address"];
            let data1 = [
                <?php 
                while ($donation = mysqli_fetch_array($output)) {
                    echo '["' . $donation['first_name'] . '", "' . $donation['last_name']  . '", "' . $donation['gender']  . '", "' . $donation['dob']  . '", "' . $donation['nic']  . '", "' . $donation['contact']  . '", "' . $donation['address']  . '"],';
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

            var filename = 'Patient details report.pdf';
            pdf.save(filename);
                

            
        
    </script>   
<?php 
} 
else if ($_POST['role'] == 'Pharmacist') {
        $query="SELECT * FROM tbl_pharmacist 
        WHERE acc_createdate <= '$to'
        AND acc_createdate >= '$from' ";
        $output = mysqli_query($conn, $query);
        
    
?>
<script>
        
            pdf = new jsPDF;
            // Set the font size and font family
            pdf.setFontSize(16);
            

            // Define the text to center
            var text = "Details of pharmacists";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos = (pdf.internal.pageSize.width - textWidth) / 3;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos, 10);

            // Define the table columns and data
            let columns1 = ["Full Name", "NIC" ,"Contact Number"];
            let data1 = [
                <?php 
                while ($donation = mysqli_fetch_array($output)) {
                    echo '["' . $donation['fullname'] . '", "' . $donation['nic']  . '", "' . $donation['contact_number']  . '"],';
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

            var filename = 'Pharmacist Details report.pdf';
            pdf.save(filename);
                

            
        
    </script>   
<?php 
} else if ($_POST['role'] == 'Doctor') {
        $query="SELECT * FROM tbl_doctor 
        WHERE acc_createdate <= '$to'
        AND acc_createdate >= '$from' ";
        $output = mysqli_query($conn, $query);
    
?>
<script>
        
            pdf = new jsPDF;
            // Set the font size and font family
            pdf.setFontSize(16);
            

            // Define the text to center
            var text = "Details of doctors";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos = (pdf.internal.pageSize.width - textWidth) / 6;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos, 10);

            // Define the table columns and data
            let columns1 = ["Doctor Name","Contact Number","SLMC Number","Charge","Specialization","nic"];
            let data1 = [
                <?php 
                while ($donation = mysqli_fetch_array($output)) {
                    // print_r($donation);die();
                    echo '["' . $donation['doc_name'] . '", "' . $donation['contact_number']  . '", "' . $donation['SLMC_number']  . '", "' . $donation['charge']  . '", "' . $donation['specialization']  . '", "' . $donation['nic']  . '"],';
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

            var filename = 'Doctor details report.pdf';
            pdf.save(filename);
                

            
        
    </script>   
<?php 
} 
else if ($_POST['role'] == 'Assistant') {
        $query="SELECT * FROM tbl_assistant 
        WHERE acc_createdate <= '$to'
        AND acc_createdate >= '$from' ";
        $output = mysqli_query($conn, $query);
    
?>
<script>
        
            pdf = new jsPDF;
            // Set the font size and font family
            pdf.setFontSize(16);
            

            // Define the text to center
            var text = "Details of assistants";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos = (pdf.internal.pageSize.width - textWidth) / 6;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos, 10);

            // Define the table columns and data
            let columns1 = ["Assistant Name","Contact Number","nic"];
            let data1 = [
                <?php 
                while ($donation = mysqli_fetch_array($output)) {
                    // print_r($donation);die();
                    echo '["' . $donation['name'] . '", "' . $donation['phoneno']  . '", "' . $donation['nic']  . '"],';
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

            var filename = 'Assistant details report.pdf';
            pdf.save(filename);
                

            
        
    </script>   
<?php 
} 
else if ($_POST['role'] == 'Lab') {
        $query="SELECT * FROM tbl_labtec 
        WHERE acc_createdate <= '$to'
        AND acc_createdate >= '$from' ";
        $output = mysqli_query($conn, $query);
    
?>
<script>
        
            pdf = new jsPDF;
            // Set the font size and font family
            pdf.setFontSize(16);
            

            // Define the text to center
            var text = "Details of lab technicians";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos = (pdf.internal.pageSize.width - textWidth) / 6;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos, 10);

            // Define the table columns and data
            let columns1 = ["Full Name","Contact Number","nic"];
            let data1 = [
                <?php 
                while ($donation = mysqli_fetch_array($output)) {
                    // print_r($donation);die();
                    echo '["' . $donation['fullname'] . '", "' . $donation['contact_number']  . '", "' . $donation['nic']  . '"],';
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

            var filename = 'Lab technicians details report.pdf';
            pdf.save(filename);
                

            
        
    </script>   
<?php 
}
 
}

?>

