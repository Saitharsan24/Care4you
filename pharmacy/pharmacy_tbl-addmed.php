    <div class="containorSRLast">
        <button class="btn-gray">
            <a href="<?php echo SITEURL;  ?>pharmacy/pharmacy_addmedicine.php?id=<?php echo $order_id;?>">
                + Add Medicine
            </a>
        </button>
        <table class="tbl-addmed">
            <thead>
                <tr>
                    <td>Drug Name</td>
                    <td>Unit Price (Rs.)</td>
                    <td>Quantity</td>
                    <td>Total (Rs.)</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                <?php
                    //Query to get all data from tbl_addmedicine table
                    $sql = "SELECT * FROM tbl_addmedicine WHERE order_id=$order_id";

                    //Exeute the Query                                    
                    $res = mysqli_query($conn, $sql);

                    //Check Query executed or not
                    if($res == TRUE){

                        //Count rows in tbl_addmedicine table
                        $count = mysqli_num_rows($res);     //funtion to get all rows in tbl_addmedicine table
                        
                        //Check the number of rows
                        if($count > 0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {

                                //Use while loop to get all data in tbl_addmedicine table
                                $drugname = $rows['drugname'];
                                $unitprice = $rows['unitprice'];
                                $quantity = $rows['quantity'];
                                $total = $rows['total'];

                                //Display the Values in Table
                                ?>
                                
                                <tr>
                                    <td><?php echo $drugname ?></td>
                                    <td><?php echo $unitprice ?></td>
                                    <td><?php echo $quantity ?></td>
                                    <td><?php echo $total ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL; ?>/pharmacy/pharmacy_respondeddrugdelete.php?order_id=<?php echo $order_id;?>&drugname=<?php echo $drugname;?>&quantity=<?php echo $quantity;?>">
                                        <i class="fa-solid fa-xmark" style="color:red;"></i>
                                    </a>
                                    </td>
                                </tr>
                                
                                <?php

                            }

                        }
                        else
                        {
                            //Have no data in tbl_addmedicine table
                        }
                    }

                ?>
            </tbody>
        </table>
        <br/>
        <div class="text">
        <form action="" method="POST">
        Unavailable Medicines :
        <textarea name="unavailablemedicines" id="unavailablemedicines" cols="50" rows="2"></textarea>
        <br/> <br/>
        &emsp; &emsp; &emsp; &nbsp; Net Total (Rs) :
        <input type="number" class="nettotal" readonly/> 
        <br/> <br/>
        <button class="btn-respond" type="submit" name="sendrespond">
            <span>Send Respond &nbsp;</span>
        </button>
        </form>
        </div>
    </div>