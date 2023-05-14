<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<?php

$days = array();
for ($i = 0; $i < 7; $i++) {
    $days[date('D', strtotime("-$i day"))] = 0;
}
// print_r($days);die();
$sql = "SELECT COUNT(*) as count,labapt_date as date FROM tbl_labappointment
                GROUP BY DAY(labapt_date) ";

$res = mysqli_query($conn, $sql);
// If the year and month of the donation is in the array, add the count to the array
while ($item = mysqli_fetch_assoc($res)) {
    $day = date('D', strtotime($item['date']));
    if (array_key_exists($day, $days)) {
        $days[$day] += $item['count'];
    }
}

//Rename the key of the array to month plus year 
$days = array_combine(array_map(function ($key) {
    return date('D', strtotime($key));
}, array_keys($days)), array_values($days));

//Reverse the array to show the earliest month first
$days = array_reverse($days);


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lab.css">
    <title>Laboratory</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
</head>

<body>
    <?php include('lab_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">
                        <div class="highlighttext">Home</div>
                    </a></li>
                <li><a href="lab_newappointments.php">New Appointments</a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);

                }
                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);

                }
                ?>
                <div class="welcometext">Welcome <div class="usernametext">
                        <?php echo $_SESSION['user']; ?>
                    </div>
                </div>
                <div class="flex-cont">
                    <!-- <div class="btm-box box-title" style="font-size: 30px;"> Today Appointments : 15</div> -->
                    <div class="left-cont">
                        <div class="box-title"> <i class="fa-solid fa-calendar-day" style="font-weight: 650;font-size: 45px;margin-top: 32px;"></i> </div>
                        <div class="box-title" style="margin-top: 1%"> Today </div>
                        <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('d/m/Y');
                        ?>
                        <div class="box-data" style="font-size: 30px; margin-top: 10% ;" > <?php echo $date; ?> </div>
                        <div class="box-title" style="margin-top: 25% ;font-size: 25px; color:#4D4D4D;" > Today Appointments </div>
                        <div class="box-data" style="font-size: 100px;margin-top: 20%;"> 10 </div>
                    </div>
                    <div class="graph-cont">
                        <div class="graph-home">
                            <canvas id="home_chart" style="height:95%;">
                                <script>
                                    var ctx = document.getElementById('home_chart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: <?php
                                            // Get the keys, and print them out.
                                            $keys = array_keys($days);
                                            echo json_encode($keys);
                                            ?>,
                                            datasets: [{
                                                label: 'No of appointments',
                                                data:
                                                    <?php
                                                    $values = array_values($days);
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
                                                text: 'Appointment Summary',
                                                // Align the chart title to the top left
                                                position: 'top',
                                                fontSize: 35,
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
                            <div style="font-size:18px;font-weight:700;margin-top:10px;margin-bottom:10px;color:#4D4D4D;"> Weekly Lab Appointments Summary </div>
                        </div>
                    </div>
                    <div class="box-cont">
                        <div class="box-sub">
                            <div class="box-title"> Pending to Respond </div>
                            <div class="box-data"> 05 </div>
                        </div>
                        <div class="box-sub" style="margin-top: 8%;">
                            <div class="box-title"> Pending Reports </div>
                            <div class="box-data"> 10 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>