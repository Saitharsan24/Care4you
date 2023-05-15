<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .buttons {
        margin-left: 720px;
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
        z-index: 9998;
        /* Set a lower z-index than the modal-box */
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

    .inputtab {
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

    .tbl-common {
        margin-left: 40px;
        /* width: 100%; */
        border-collapse: separate;
        border-spacing: 0 15px;
        font-size: 15px;
    }

    .tbl-common tr {
        background-color: #ffffff;
    }

    .tbl-common thead {
        position: sticky;
        top: 0;
        /* set the table heading to be fixed */
        z-index: 1;
        /* set a higher z-index to show the heading above the content */
    }

    .tbl-common thead td {
        color: #0D5C75;
        font-weight: 700;
        padding: 5px;
    }

    .tbl-common td {
        background-color: #fff;
        /*border:1px solid #b3adad;*/
        color: #000000;
        text-align: center;
        width: 300px;
        padding: 10px;
        padding-left: 0%;
        padding-right: 0%;
    }

    .tbl-common td:first-child,
    th:first-child {
        border-radius: 10px 0 0 10px;
    }

    .tbl-common td:last-child,
    th:last-child {
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

    .form-itm2 input[type="file"] {
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
        border: 1px solid black;
    }

    input:focus {
        outline: none;
    }

    .form-itm2 p {
        margin-right: 20px;
    }

    .form-content {
        height: 500px;
        width: 700px;
        border-radius: 25px;
        display: flex;
        flex-direction: column;
        color: #093e4e;
        margin: 40px 0px 0px 100px;
    }
</style>

<!-- ------------------------------------------------------------------------- -->


<section id="report">
    <span class="overlay" onclick="closePopupReport()"></span>
    <div class="modal-box" style="width:40%; height:35%;">
        <form action="" method="POST">
            <h1> Upload Lab Report to Completed Appointment </h1>
            <div class="form-content" style="margin-left:-130px; margin-top:20px;">

                <div class="form-itm2">
                    <p>Upload Lab Report :</p>
                    <input type="file" name="report" style="width:300px; padding:10px; border:1px solid #0D5C75;"
                        accept="image/*,.doc,.docx,.txt,.pdf">
                </div>

                <div class="buttons" style=" display: flex; margin-left:400px; margin-top:-0px;">
                    <button type="submit"
                    style="background-color: #28ae28; color: #fff;width: 100px; border-radius:10px; cursor:pointer;"
                    name="updateReport">upload</button>
                    <button class="modbutton close-btn">Close</button>
                </div>
            </div>
        </form>
    </div>
</section>


<!-- ------------------------------------------------------------------------- -->


<script>
    function openPopupReport() {
        const sectionReport = document.getElementById("report");
        sectionReport.classList.add("active");
    }

    const overlayReport = document.querySelector(".overlay"),
        closeBtnReport = document.querySelector(".close-btn");

    function closePopupReport() {
        const sectionReport = document.getElementById("report");
        sectionReport.classList.remove("active");
    }

    closeBtnReport.addEventListener("click", closePopupReport);
    overlayReport.addEventListener("click", closePopupReport);
</script>



<?php
if (isset($updateReport)) {

    if (isset($_FILES['report']['name'])) {

        //Upload the report
        //To upload the report we need the file name, source path and destination path

        //Get the report name
        $report_name = $_FILES['report']['name'];


        //Upload report only if report is selected
        if ($report_name != "") {
            //Auto Rename the report

            //Get the extension of the report
            $namarr = explode('.', $report_name);
            $ext = end($namarr);

            //Rename the report
            $report_name = "Report_" . "." . $ext;

            //Get the source path
            $source_path = $_FILES['report']['tmp_name'];

            //Give the destination path
            $destination_path = "../images/lab-reports/patient-report" . $report_name;

            //Upload the report
            $upload = move_uploaded_file($source_path, $destination_path);

            //Check whether the report is uploaded or not
            if ($upload == FALSE) {
                $_SESSION['upload'] = "Failed to upload Report! Please Retry";
                //Redirect to place order page
                // header('location:'.SITEURL.'/patient/patient_pharmorders.php'); 
                //Stop the process
                die();
            }

        }

    } else {
        //report not uploaded and report name is not set (Data can not save)
        $report_name = "";
    }

    $sqlreport = "UPDATE 'tbl_labappointment' SET 'labapt_status'='3', 'prescription_name'='$report_name' WHERE lab_apt_id = $lab_apt_id ";

}

?>