<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php
$userid = $_SESSION['user_id'];
$days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[date('D', strtotime("-$i day"))] = 0;
        }
        // print_r($days);die();
        $sql = "SELECT tbl_docsession.no_of_appointment as count,tbl_docsession.date FROM tbl_docsession
                INNER JOIN tbl_doctor ON tbl_doctor.doctor_id = tbl_docsession.doctor_id
                WHERE tbl_doctor.userid = '$userid'
                GROUP BY DAY(tbl_docsession.date) ";
        
        $res = mysqli_query($conn, $sql);
        // If the year and month of the donation is in the array, add the count to the array
        while ($item =  mysqli_fetch_assoc($res)) {
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css">
    <link rel="stylesheet" href="../css/doctor-home.css">
    <title>Doctor</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
</head>
<body>
<?php include('doctor_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/doctor/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="doctor_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="doctor_session.php">Sessions</a></li>
                <li><a href="doctor_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);

                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);

                }
            ?>
            <div class="welcometext">Welcome <div class="usernametext"><?php echo $_SESSION['user']; ?></div></div>
            
            </div>
            <div class="sub_content">
                <div  class="left_sub_content">
                    <div class="first_left_sub_content">
                        <div class="chart_container">
                            <p class="chart_title">No of appointsment this week</p>
                            <canvas id="chart_id" style="height:100px">
                                            <script>
                                                var ctx = document.getElementById('chart_id').getContext('2d');
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
                                                                '#0D5C75',
                                                                '#0D5C75',
                                                                '#0D5C75',
                                                                '#0D5C75',
                                                                '#0D5C75',
                                                                '#0D5C75',
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
                                                            text: 'No of appointments',
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
                                                                    tickBorderDash: [10,15]
                                                                    
                                                            }
                                                            },
                                                            y: {
                                                                grid: {
                                                                    borderDash: [8, 4],
                                                                    display: true,
                                                                    tickBorderDash: [10,15]
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
                    </div>
                    <div class="second_left_sub_content"></div>
                </div>
                <div  class="right-sub_content"></div>

            </div>
        </div>
    </div>
</body>
</html>