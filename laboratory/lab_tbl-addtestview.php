<div style="font-size:12px; margin-bottom:-5px; font-weight:600;color: #0D5C75;"> Available Tests </div>
<table class="tbl-addmed">
    <thead>
        <tr>
            <td>Test Name</td>
            <td>Test Charge (Rs.)</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php 
        $labapt_id = $_GET['id'];

        $sqladtest = "SELECT * FROM tbl_addlabtest WHERE labapt_id = $labapt_id AND confirmation_status = 1 "; 
        //echo print_r($sqladtest) ;

        $res5 = mysqli_query($conn, $sqladtest);

        if($res5 == TRUE)
        {
            //Count rows in tbl_neworder table
            $count = mysqli_num_rows($res5);
            //Check whther data available in database
            if($count > 0)
            {
                //Data available in database
                while($row2 = mysqli_fetch_assoc($res5))
                {
                    $test_id = $row2['test_id'];
                    //echo "row-".$test_id;
                    $atsql = "SELECT test_name, charge FROM tbl_labtests  WHERE test_id = $test_id";
                    //echo $atsql;
                    //echo print_r($atsql) ;
                    $atres = mysqli_query($conn, $atsql);
                    //echo print_r($atres) ;
                    
                    if($atres == TRUE)
                    {
                        //Count rows in tbl_neworder table
                        $count2 = mysqli_num_rows($atres);
                        
                        if($count2 == 1){
                            while($row9 = mysqli_fetch_assoc($atres))
                            {
                            $tname = $row9['test_name'];
                            $chrg = $row9['charge'];
                            ?><tr>
                                <td><?php echo $tname; ?></td>
                                <td><?php echo $chrg; ?></td>
                                <td>
                                </td>
                            </tr><?php }
                        }
                    }
                }
            }
        }

    ?>
    </tbody>
</table>

<br>

<div style="font-size:12px; margin-bottom:-5px; font-weight:600;color: #0D5C75;"> Unvailable Tests </div>
<table class=" tbl-addmed">
    <thead>
        <tr>
            <td>Test Name</td>
            <td>Test Charge (Rs.)</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php 
        $labapt_id = $_GET['id'];

        $sqladnottest = "SELECT * FROM tbl_addlabtest WHERE labapt_id = $labapt_id AND confirmation_status = 0 "; 
        //echo print_r($sqladtest) ;

        $res6 = mysqli_query($conn, $sqladnottest);

        if($res6 == TRUE)
        {
            //Count rows in tbl_neworder table
            $countt = mysqli_num_rows($res6);
            //Check whther data available in database
            if($countt > 0)
            {
                //Data available in database
                while($row22 = mysqli_fetch_assoc($res6))
                {
                    $testN = $row22['test_name'];
                    $chrg2 = "N/A";
                    ?>
                        <tr>
                            <td><?php echo $testN; ?></td>
                            <td><?php echo $chrg2; ?></td>
                            <td>
                            </td>
                        </tr>
                    <?php
                }
            }
        }

    ?>
    </tbody>
</table>


<br />
<div class="text">
    <form action="" method="POST">
        &nbsp;&nbsp;&nbsp;Total Charge (Rs) : &nbsp;
        <input type="number" class="nettotal" style="width: 330px; margin-right: 15px;" value="3500" readonly />
    </form>
    <?php
    if ($rowDetails['labapt_status'] == 2) {
        ?>
        <button class="upload" type="submit" name="des-upload" onclick="openPopupReport()">
            <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Upload Lab Report
        </button>
        <?php include('./popup/upload-report.php');?>
    </form>
        &nbsp;
        <?php
    }
    ?>
</div>
</div>