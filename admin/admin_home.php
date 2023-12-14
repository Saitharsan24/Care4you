<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>

<?php

    //Pending Session
    $PSsql = "SELECT status FROM tbl_docsession WHERE status = '0'";                                   
    $PSres = mysqli_query($conn, $PSsql);

    if($PSres == TRUE)
    {
        $PScount = mysqli_num_rows($PSres);
    }

    //Pending Lab Reports
    $sqlplr = "SELECT * FROM tbl_labappointment WHERE labapt_status = 2 AND labapt_date > CURDATE()";
    //echo $sqlplr;

    $resplr = mysqli_query($conn, $sqlplr);
    if ($resplr == TRUE) {
        $countplr = mysqli_num_rows($resplr);
    }

    //Pending Orders
    $NOsql = "SELECT * FROM tbl_neworder";                                   
    $NOres = mysqli_query($conn, $NOsql);

    if($NOres == TRUE)
    {
        $NOcount = mysqli_num_rows($NOres);
    }

    $POsql = "SELECT order_status FROM tbl_respondedorders WHERE order_status > 3 ";                                   
    $POres = mysqli_query($conn, $POsql);

    if($POres == TRUE)
    {
        $POcount = mysqli_num_rows($POres);
    }

    $sum = $NOcount + $POcount;

?>

<?php
$days = array();
for ($i = 0; $i < 7; $i++) {
    $days[date('D', strtotime("-$i day"))] = 0;
}
// print_r($days);die();
$sql = "SELECT COUNT(*) as count,tbl_docsession.date as date FROM tbl_docappointment
        INNER JOIN tbl_docsession ON tbl_docsession.session_id = tbl_docappointment.session_id
        WHERE tbl_docappointment.docapt_status <> 2
        GROUP BY DAY(tbl_docsession.date) ";

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




$days2 = array();
for ($i = 0; $i < 7; $i++) {
    $days2[date('D', strtotime("-$i day"))] = 0;
}
// print_r($days);die();
$sql = "SELECT COUNT(*) as count,orderdate as date FROM tbl_neworder
        WHERE order_status != 5
        AND order_status != 4
        GROUP BY DAY(orderdate) ";

$res = mysqli_query($conn, $sql);
// If the year and month of the donation is in the array, add the count to the array
while ($item = mysqli_fetch_assoc($res)) {
    $day2 = date('D', strtotime($item['date']));
    if (array_key_exists($day, $days)) {
        $days2[$day2] += $item['count'];
    }
}

$sql = "SELECT COUNT(*) as count,orderdate as date FROM tbl_respondedorders
        WHERE order_status != 5
        AND order_status != 4
        GROUP BY DAY(orderdate) ";

$res = mysqli_query($conn, $sql);
// If the year and month of the donation is in the array, add the count to the array
while ($item = mysqli_fetch_assoc($res)) {
    $day2 = date('D', strtotime($item['date']));
    if (array_key_exists($day, $days)) {
        $days2[$day2] += $item['count'];
    }
}

//Rename the key of the array to month plus year 
$days2 = array_combine(array_map(function ($key) {
    return date('D', strtotime($key));
}, array_keys($days2)), array_values($days2));

//Reverse the array to show the earliest month first
$days2 = array_reverse($days2);



$days3 = array();
for ($i = 0; $i < 7; $i++) {
    $days3[date('D', strtotime("-$i day"))] = 0;
}
// print_r($days);die();
$sql = "SELECT COUNT(*) as count,labapt_date as date FROM tbl_labappointment
        WHERE labapt_status != 3
        AND labapt_status != 4
        GROUP BY DAY(labapt_date) ";

$res = mysqli_query($conn, $sql);
// If the year and month of the donation is in the array, add the count to the array
while ($item = mysqli_fetch_assoc($res)) {
    $day3 = date('D', strtotime($item['date']));
    if (array_key_exists($day, $days)) {
        $days3[$day3] += $item['count'];
    }
}

//Rename the key of the array to month plus year 
$days3 = array_combine(array_map(function ($key) {
    return date('D', strtotime($key));
}, array_keys($days3)), array_values($days3));

//Reverse the array to show the earliest month first
$days3 = array_reverse($days3);


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
</head>

<body>
    <?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user"
                class="imgframe">
            <ul>
                <li><a href="admin_home.php">
                        <div class="highlighttext">Home</div>
                    </a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patient</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
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
                    <div class="graph-cont">
                        <div class="box-title" style="font-size:18px;font-weight:700;margin-top:10px;margin-bottom:10px;color:#4D4D4D;"> Weekly Summary </div>
                        <canvas id="home_chart" style="height:100px">
                            <script>

                                new Chart("home_chart", {
                                    type: "line",
                                    data: {
                                        labels: <?php
                                        $values = array_keys($days);
                                        echo json_encode($values);
                                        ?>,
                                        datasets: [{
                                            label: 'Completed Doctor Appointments',
                                            data: <?php
                                            $values = array_values($days);
                                            echo json_encode($values);
                                            ?>,
                                            borderColor: "#F7A4A4",
                                            fill: false
                                        }, {
                                            label: 'Completed Pharmacy Orders',
                                            data: <?php
                                            $values = array_values($days2);
                                            echo json_encode($values);
                                            ?>,
                                            borderColor: "#607EAA",
                                            fill: false
                                        }, {
                                            label: 'Completed Lab Appointments',
                                            data: <?php
                                            $values = array_values($days3);
                                            echo json_encode($values);
                                            ?>,
                                            borderColor: "#03C988",
                                            fill: false
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            display: true
                                        },
                                        scales: {
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Customer count'
                                                }
                                            }],
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Day'
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>


                        </canvas>

                    </div>
                    <div class="box-cont">
                        <div class="box-sub">
                            <div class="box-title"> Pending Sessions </div>
                            <div class="box-data"> <?php echo $PScount; ?> </div>
                        </div>
                        <div class="box-sub" style="margin-top: 6%;">
                            <div class="box-title"> Pending Lab Reports </div>
                            <div class="box-data"> <?php echo $countplr; ?> </div>
                        </div>
                        <div class="box-sub" style="margin-top: 6%;">
                            <div class="box-title"> Pending Orders </div>
                            <div class="box-data"> <?php echo $sum; ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>