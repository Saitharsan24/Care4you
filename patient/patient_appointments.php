<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?>

<?php 

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM  
    tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
    INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
    INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid 
    INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
    AND created_by = '$user_id' 
    AND docapt_status = 1";
    
    $result = mysqli_query($conn,$sql);
    
    // Create an array to store the events
    $appointments = [];

    // Fetch appointments from the database

    // Iterate through the result set and convert data into FullCalendar event format
    while ($row = mysqli_fetch_assoc($result)) {
    
        // Combine appointment date and time into a single datetime string
        $startDateTime = $row['date'] . ' ' . $row['docapt_time'];

        //adding title
        $title = 'Dooctor appointment - Appointment no: '.$row['docapt_no'];

        $appointment = [
            'id' => $row['docapt_id'],
            'title' => $title,
            'start' => $startDateTime,
            'extendedProps' => [
                'appointmentNumber' => $row['docapt_no'],
                'personName' => $row['doc_name']
            ],
            'color' => '#FF0000' // Set a custom color for the event
        ];

        // Add additional properties as needed
        // $event['color'] = '#ff0000'; // Set a custom color

        $appointments[] = $appointment;
    }
  
    // Convert the events array to JSON format
    //$eventsJson = json_encode($events);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
    <script>
          
          document.addEventListener('DOMContentLoaded', function() {
              var calendarEl = document.getElementById('calendar');

               var appointments = <?php echo json_encode($appointments); ?>;

              var events = appointments.map(function(appointment) {
                return {
                  id: appointment.id,
                  title: appointment.title,
                  start: appointment.start_date,
                  end: appointment.end_date,
                  // Additional event properties
                  appointmentNumber: appointment.appointment_number,
                  personName: appointment.person_name,
                  color: appointment.color
                };
              });

              var calendar = new FullCalendar.Calendar(calendarEl, {
              // Other options and settings...
                events: appointments,
                validRange: function(nowDate) {
                  return {
                  start: nowDate // Start from the current date
                  };
                },
              });
              
          calendar.render();
          });

    </script>

    <style>
      .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: none;
      }
      .fc-event {
        cursor: pointer;
      }
    </style>

  </head>

  <body>
    <div class="main-div">
      <div class="home-left">
        <div class="nav-logo">
          <a href="./patient_home.php">
            <img src="../images/logo.png" alt="logo" />
          </a>
        </div>
        <div class="profile-image">
          <img src="../images/user.png" alt="profile-image" />
        </div>
        <div class="nav-links">
          <a href="./patient_home.php">Home</a>
          <a href="./patient_appointments.php" style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical Records</a>
          <a href="./patient_doctorlist.php">Doctors</a>
          <a href="#">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="text-content">
          <div class="appointments-head"><h2>My Appointments</h2></div>
        </div>
        <div class="appointment-page-content">
          
          <div class="appointment-right-page-content">
            <div class="mk-apt-btn common-apt"><a href="./patient_docappointments.php"><button class="btn-mkdcapt"><span>Doctor appointment</span></button></a></div>
              <div class="appointments-divider"></div>
            <div class="mk-apt-btn common-apt"><a href="./patient_labappointments.php"><button class="btn-mkdcapt"><span>Lab appointment</sapn></button></a></div>
          </div>
          
          <div class="appointment-left-page-content">
              <div id='calendar'></div>
              <div id="event-details-popup" class="popup">
                <div id="event-details-content"></div>
              </div>
          </div> 
        </div>
      </div>
    </div>
  </body>
</html>
