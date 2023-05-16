<?php
    if(isset($_SESSION['user'])) //User is logged in 
    {
        //Get the username
        $user  = $_SESSION['user'];
        //echo $user;
        //Query to get userid from tbl_sysusers
        $sql23 = "SELECT userid,email FROM tbl_sysusers WHERE username='$user' ";
        //echo $sql;
        //Exeute the Query                                    
        $res23 = mysqli_query($conn, $sql23);

        //Check Query executed or not
        if($res23 == TRUE)
        {
            $count23 =mysqli_num_rows($res23);
            if($count23 == 1)
            {
                $rowdet = mysqli_fetch_assoc($res23);
                $userid = $rowdet['userid'];
                $email = $rowdet['email'];
            }
        }

        //Query to get all data from tbl_pharmacist
        $sql24 = "SELECT * FROM tbl_patient WHERE userid=$userid";
        //Exeute the Query                                    
        $res24 = mysqli_query($conn, $sql24);

        //Check Query executed or not
        if($res24 == TRUE)
        {
            $count24 =mysqli_num_rows($res24);
            if($count24 == 1)
            {
                $rowdet2 = mysqli_fetch_assoc($res24);
                $p_id = $rowdet2['p_id'];
                $userid = $rowdet2['userid'];
                $first_name = $rowdet2['first_name'];
                $last_name = $rowdet2['last_name'];
                $gender = $rowdet2['gender'];
                $dob = $rowdet2['dob'];
                $nic = $rowdet2['nic'];
                $contact = $rowdet2['contact'];
                $address = $rowdet2['address'];
                $profile_picture = $rowdet2['profile_picture'];
                $fullname = $first_name." ".$last_name;
                
            }
        }
    }
?>