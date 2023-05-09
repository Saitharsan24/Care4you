<?php
    
    //Include constants.php
    include('../config/constants.php');

    //Get the id
    $order_id = $_GET['order_id'];
    $drugname = $_GET['drugname'];
    $quantity = $_GET['quantity'];

    //Create SQL query
    $delsql = "DELETE FROM tbl_addmedicine WHERE order_id='$order_id' AND drugname ='$drugname'";

    //Execute the query
    $delres = mysqli_query($conn, $delsql);

    //Check the query execution
    if($delres==TRUE)
    {
        //Re Adding Drugs to stock
        $selsql = "SELECT quantity FROM tbl_medicine WHERE med_name='$drugname' ";
        $selres = mysqli_query($conn, $selsql);
        if($selres == TRUE)
        {
            $count =mysqli_num_rows($selres);
            if($count == 1)
            {
                $row = mysqli_fetch_assoc($selres);
                $current_qty = $row['quantity'];
            }
        }

        $newqty = $current_qty + $quantity;

        //Updated stock with removed quantity of drug
        $updtsql = "UPDATE tbl_medicine SET 
                    quantity = '$newqty'
                    WHERE med_name ='$drugname'
                    ";
        //echo $sql;

        $updtres = mysqli_query($conn , $updtsql) or die(mysqli_error($conn));

        
        $updtsql = "UPDATE tbl_medicine WHERE order_id='$order_id' AND drugname ='$drugname'";

        //echo "Drug Deleted";
        //create session varibale to disply message
        $_SESSION['deldrug'] = "";
        header("Location: ".SITEURL."pharmacy/pharmacy_respond2.php?id=".$order_id);
        
    }
    else
    {
        $_SESSION['deldrug'] = "";
        header("Location: ".SITEURL."pharmacy/pharmacy_respond2.php?id=".$order_id);
    }

?>