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
                <tr>
                    <td>Blood Culture</td>
                    <td>3000</td>
                    <td>
                        <a href="#">
                            <i class="fa-solid fa-xmark" style="color:red;"></i>
                        </a>
                    </td>
                </tr>
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
                <tr>
                    <td>Blood Culture</td>
                    <td>3000</td>
                    <td>
                        <a href="#">
                            <i class="fa-solid fa-xmark" style="color:red;"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            </table>


            <br />
            <div class="text">
                <form action="" method="POST">
                    &nbsp;&nbsp;&nbsp;Total Charge (Rs) : &nbsp;
                    <input type="number" class="nettotal" style="width: 330px; margin-right: 15px;" value="3500" readonly />
                </form>
                <?php 
                    if ($rowDetails['labapt_status']==2) {
                ?>
                    <style>
                        .btnpre:hover{
                            color: #012836;
                            background-color: #fff;
                            border: 2px solid #012836;
                            transition: 0.4s;
                        }

                        .btnpre{
                            width: 200px;
                            height: 40px;
                            color: #fff;
                            background-color: #0D5C75;
                            border: 1px solid #0D5C75;
                            padding: 2px;
                            border-radius: 25px;
                            cursor: pointer;
                            margin: 30px 0px 0px 150px;
                        }
                    </style>
                        <button class="btnpre" type="submit" name="des-upload"><i class="fa-solid fa-arrow-up-from-bracket"></i>upload Lab report</button></form>
                        &nbsp;
                <?php
                    }
                ?>
            </div>
        </div>