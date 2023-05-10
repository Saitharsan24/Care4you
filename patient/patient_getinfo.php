<?php
    if(isset($_SESSION['user'])) //User is logged in 
    {
        //Get the username
        $user  = $_SESSION['user'];
        //echo $user;
        //Query to get userid from tbl_sysusers
        $sql = "SELECT userid,email FROM tbl_sysusers WHERE username='$user' ";
        //echo $sql;
        //Exeute the Query                                    
        $res = mysqli_query($conn, $sql);

        //Check Query executed or not
        if($res == TRUE)
        {
            $count =mysqli_num_rows($res);
            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);
                $userid = $row['userid'];
                $email = $row['email'];
            }
        }

        //Query to get all data from tbl_pharmacist
        $sql2 = "SELECT * FROM tbl_patient WHERE userid=$userid";
        //Exeute the Query                                    
        $res2 = mysqli_query($conn, $sql2);

        //Check Query executed or not
        if($res2 == TRUE)
        {
            $count2 =mysqli_num_rows($res2);
            if($count2 == 1)
            {
                $row2 = mysqli_fetch_assoc($res2);
                $p_id = $row2['p_id'];
                $userid = $row2['userid'];
                $first_name = $row2['first_name'];
                $last_name = $row2['last_name'];
                $gender = $row2['gender'];
                $dob = $row2['dob'];
                $nic = $row2['nic'];
                $contact = $row2['contact'];
                $address = $row2['address'];
                $profile_picture = $row2['profile_picture'];
                
            }
        }
    }
?>