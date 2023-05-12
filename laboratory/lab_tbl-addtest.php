        <button class="btn-gray" style="width:250px;cursor:pointer;" onclick="openPopup1()" >
                + Add Available Tests
        </button>
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

        <button class="btn-gray" style="width:250px;cursor:pointer;" onclick="openPopup2()" >
            <a href="#">
                + Add Unavailable Tests
            </a>
        </button>
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


        <br/>
        <div class="text">
        <form action="" method="POST">
        Unavailable Tests :
        <textarea name="unavailablemedicines" id="unavailablemedicines" cols="50" rows="2"></textarea>
        <br/> <br/>
        <button class="btn-respond" type="submit" name="sendrespond">
            <span>Send Respond &nbsp;</span>
        </button>
        </form>
        </div>
    </div>