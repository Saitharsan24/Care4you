<?php include('./config/constants.php')?>
<html>
    <body>
    <?php 
        if(isset($_SESSION['upload']))
        {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
        }
        if(isset($_SESSION['add-order']))
        {
            echo $_SESSION['add-order'];
            unset($_SESSION['add-order']);
        }
    ?>
        <form action="" method="POST" enctype="multipart/form-data">

            Name<br>
            <input type="text" name="pname" required/><br>
            Address<br>
            <input type="text" name="paddress" required/><br>
            Contact Number<br>
            <input type="tel" name="contactnumber" pattern="[0-0]{1}[0-9]{9}" required/><br>
            Prescription<br> 
            <input type="file" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription" required/><br>
            Remarks<br>
            <textarea name="remarks" cols="44" rows="3"></textarea>

            <br><br><br>
            <button type="submit" name="order">Place Order</button>

        </form>
    </body>
</html>

<?php

    //Check whether the Place Order button is clicked
    if(isset($_POST['order']))
    {
        //echo "Button Clicked";

        //Get the order placed date
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d/m/Y');
        $time = date('h:i:sA');
        //echo "DATE - ".$date;
        //echo "TIME - ".$time;

        //Get the order details from the form
        $pname = $_POST['pname'];
        $paddress = $_POST['paddress'];
        $contactnumber = $_POST['contactnumber'];
        $remarks = $_POST['remarks'];

        //Check whether the prescription is uploaded or not
            //print_r($_FILES['prescription']);
            //die(); //Break the code to prevent data insertion
        
            if(isset($_FILES['prescription']['name']))
            {
                //Upload the prescription
                //To upload the prescription we need the file name, source path and destination path

                //Get the prescription name
                $prescription_name = $_FILES['prescription']['name'];

                //Upload prescription only if prescription is selected
                if($prescription_name != "")
                {
                    //Auto Rename the Prescription

                    //Get the extension of the prescription
                    $ext = end(explode('.',$prescription_name));

                    //Rename the prescription
                    $prescription_name = "Order_".date('d_m_y_h_i_s_A').".".$ext;

                    //Get the source path
                    $source_path = $_FILES['prescription']['tmp_name'];

                    //Give the destination path
                    $destination_path = "./images/pharmacy-orders/".$prescription_name; //***path should change here

                    //Upload the prescription
                    $upload = move_uploaded_file($source_path,$destination_path);

                    //Check whether the prescription is uploaded or not
                    if($upload == FALSE)
                    {
                        $_SESSION['upload'] = "Failed to upload Prescription! Please Retry";
                        //Redirect to place order page
                        header('location:'.SITEURL.'temp.php'); //***page name should change here
                        //Stop the process
                        die();
                    }

                } 

            }
            else
            {
                //Prescription not uploaded and prescription name is not set (Data can not save)
                $prescription_name = "";
            }
                    

        //SQL Query to insert Order to database
        $sql = "INSERT INTO tbl_neworder SET
                pname = '$pname',
                paddress = '$paddress',
                contactnumber = '$contactnumber',
                prescription_name = '$prescription_name',
                remarks = '$remarks',
                orderdate = '$date',
                ordertime = '$time'
                ";

        //Execute the query and Save order details in database
        $res = mysqli_query($conn ,$sql);

        //Check the execution of query
        if($res == TRUE)
        {
            //Query executed and order details saved in database
            $_SESSION['add-order'] = "<div class='success'>Order placed successfully</div>";
            //Redirect to home page
            header('location:'.SITEURL.'temp.php'); //***page name should change here
        }
        else
        {
            //Failed to execute the query
            $_SESSION['add-order'] = "<div class='error'>Failed to place order</div>";
            //Redirect to placeorder page
            header('location:'.SITEURL.'temp.php'); //***page name should change here
        }
    } 

?>
