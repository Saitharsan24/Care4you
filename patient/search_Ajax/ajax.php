<?php
    session_start();
    
    //Create constants to store non repeating values
    define('SITEURL','http://localhost/Care4you/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','care4you');
    
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_error($conn)); //Database Connection
   
    $db_select = mysqli_select_db($conn, DB_NAME) or  die(mysqli_error($conn)); //Selecting Database

    if(isset($_POST['doc'])){
        $date = $_POST['dates'];
        $doc_id = $_POST['doc'];
        $sql1 = "SELECT * FROM tbl_doctor
        WHERE doctor_id = '$doc_id'";
        if($_POST['dates'] == NULL){
            $out = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id WHERE tbl_doctor.doctor_id = '$doc_id'";
        }
        else{
            $out = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id WHERE tbl_doctor.doctor_id = '$doc_id' AND tbl_docsession.date ='$date'";
        }
       
        $outputObj= mysqli_query($conn,$out);
        if ($outputObj->num_rows == 0) {
            $_SESSION['output'] = 0;
        } else {
            while($row = mysqli_fetch_array($outputObj)){
                $data = array('doc_name' => $row['doc_name'], 'specialization' => $row['specialization'], 'date' => $row['date'], 'time_slot' => $row['time_slot'],'no_of_appointment' =>$row['no_of_appointment']);
                $props[] = $data;
                // $output = array_merge($output,$data);
            };
            $_SESSION['output'] = $props;    
        }

        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_array($result1);
       
        echo "<option value='".$row1['specialization']."' selected>".$row1['specialization']."</option>";
        
        
    }else if (isset($_POST['spec'])){
        $spec_name = $_POST['spec'];
        $sql1 = "SELECT * FROM tbl_doctor
        WHERE specialization = '$spec_name'";

        $result1 = mysqli_query($conn,$sql1);
        if ($result1->num_rows == 0) {
            echo "<option value='".$row1['doctor_id']."' selected disabled hidden>No Doctors Available</option>";
        } else {
            echo "<option value='".$row1['doctor_id']."' selected disabled hidden>Select A Doctor</option>";
            while ($row1 = mysqli_fetch_array($result1)) {  
                echo "<option value='".$row1['doctor_id']."'>".$row1['doc_name']."</option>";
            }
        }
    }
    else if(isset($_POST['dates'])){
        $date = $_POST['dates'];
        $doc_id = $_POST['docid'];
    
        if($_POST['doc'] == NULL){
            $out = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id WHERE tbl_docsession.date = '$date'";
        }
        else{
            $out = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id WHERE tbl_docsession.doctor_id = '$doc_id' AND tbl_docsession.date ='$date'";
        }
       
        $outputObj= mysqli_query($conn,$out);
        if ($outputObj->num_rows == 0) {
            $_SESSION['output'] = 0;
        } else {
            while($row = mysqli_fetch_array($outputObj)){
                $data = array('doc_name' => $row['doc_name'], 'specialization' => $row['specialization'], 'date' => $row['date'], 'time_slot' => $row['time_slot'],'no_of_appointment' =>$row['no_of_appointment']);
                $props[] = $data;
                // $output = array_merge($output,$data);
            };
            $_SESSION['output'] = $props;    
        }
    }
        
    
    
//   echo "<option value='".$_POST['doc']."' selected>".$_POST['doc']."</option>";





?>