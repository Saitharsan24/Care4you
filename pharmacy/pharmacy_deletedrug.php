<?php
    
    //Include constants.php
    include('../config/constants.php');

    //Get the id
    $id = $_GET['id'];

    //Create SQL query
    $sql = "DELETE FROM tbl_medicine WHERE medicine_id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check the query execution
    if($res==TRUE)
    {
        //echo "Drug Deleted";
        //create session varibale to disply message
        $_SESSION['delete'] = "<div class='success'>Drug deleted Successfully</div>";
        header("location:".SITEURL.'pharmacy/pharmacy_stock.php');
        
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Falied to delete Drug</div>";
        header("location:".SITEURL.'pharmacy/pharmacy_stock.php');
    }

?>