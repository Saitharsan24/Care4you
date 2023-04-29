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

        //Query to get all data from tbl_assistant
        $sql2 = "SELECT * FROM tbl_assistant WHERE userid=$userid";
        //Exeute the Query                                    
        $res2 = mysqli_query($conn, $sql2);

        //Check Query executed or not
        if($res2 == TRUE)
        {
            $count2 =mysqli_num_rows($res2);
            if($count2 == 1)
            {
                $row2 = mysqli_fetch_assoc($res2);
                $assistant_id = $row2['assistant_id'];
                $userid = $row2['userid'];
                $fullname = $row2['name'];
                $nic = $row2['nic'];
                $contact_number = $row2['phoneno'];
                $profile_picture = $row2['profile_picture'];
                
            }
        }
    }
?>