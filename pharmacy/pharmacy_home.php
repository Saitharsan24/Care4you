<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php
$userid = $_SESSION['user_id'];
$meds = array();
// print_r($days);die();
$sql = "SELECT * FROM tbl_medicine";

$res = mysqli_query($conn, $sql);
// If the year and month of the donation is in the array, add the count to the array
while ($item = mysqli_fetch_assoc($res)) {
    $key = $item['med_name'];
    $meds[$key] = $item['quantity'];
}

//Rename the key of the array to month plus year 
$meds = array_combine(array_map(function ($key) {
    return $key;
}, array_keys($meds)), array_values($meds));

//Reverse the array to show the earliest month first
$meds = array_reverse($meds);


?>

<?php

    //New Order Count
    $NOsql = "SELECT * FROM tbl_neworder";                                   
    $NOres = mysqli_query($conn, $NOsql);

    if($NOres == TRUE)
    {
        $NOcount = mysqli_num_rows($NOres);
    }

    //Completed Order Count
    $COsql = "SELECT order_status FROM tbl_respondedorders WHERE order_status = 3 ";                                   
    $COres = mysqli_query($conn, $COsql);

    if($COres == TRUE)
    {
        $COcount = mysqli_num_rows($COres);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css">
    <title>Pharmacy</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
</head>

<body>
    <?php include('pharmacy_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="pharmacy_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <?php
                // if (isset($_SESSION['login'])) {
                //     echo $_SESSION['login'];
                //     unset($_SESSION['login']);
                
                // }
                // if (isset($_SESSION['no-login-message'])) {
                //     echo $_SESSION['no-login-message'];
                //     unset($_SESSION['no-login-message']);
                
                // }
                ?>
                <div class="welcometext">Welcome <div class="usernametext">
                        <?php echo $_SESSION['user']; ?>
                    </div>
                </div>
                <div class="flex-cont">
                    <div class="graph-container">
                        <div class="box-title"> Medicine Stock </div>
                        <canvas id="home_chart" style="height:100px">
                            <script>
                                var ctx = document.getElementById('home_chart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php
                                        // Get the keys, and print them out.
                                        $keys = array_keys($meds);
                                        echo json_encode($keys);
                                        ?>,
                                        datasets: [{
                                            label: 'Medicine Quantity',
                                            data:
                                                <?php
                                                $values = array_values($meds);
                                                echo json_encode($values);
                                                ?>,
                                            backgroundColor: [
                                                '#0D5C75'
                                            ],
                                            //Barwidth
                                            //backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),

                                            borderRadius: 8,
                                            borderSkipped: false,
                                            barpercentage: 1,
                                            borderWidth: 2,

                                            borderSkipped: false,
                                            hoverOffset: 4
                                        }]
                                    },


                                    options: {

                                        title: {
                                            display: true,
                                            text: 'Medicine Quantity',
                                            // Align the chart title to the top left
                                            position: 'top',
                                            fontSize: 34,
                                            fontColor: '#000000',
                                            fontFamily: 'Poppins',
                                            fontStyle: 'bold'
                                        },
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        scales: {
                                            x: {

                                                grid: {
                                                    display: false,
                                                    tickBorderDash: [10, 15]

                                                }
                                            },
                                            y: {
                                                grid: {
                                                    borderDash: [8, 4],
                                                    display: true,
                                                    tickBorderDash: [10, 15]
                                                },
                                                ticks: {
                                                    beginAtZero: true
                                                },

                                            }
                                        }
                                    }
                                });
                            </script>

                        </canvas>
                    </div>
                    <div class="box-cont">
                        <div class="box-sub">
                            <div class="box-title"> New Orders </div>
                            <div class="box-data"> <?php echo $NOcount; ?> </div>
                        </div>
                        <div class="box-sub" style="margin-top: 12%;">
                            <div class="box-title"> Orders Completed </div>
                            <div class="box-data"> <?php echo $COcount; ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>