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
    
    $results = mysqli_query($conn, $sql);

    // Prepare an array to store the events
    $events = array();
    
    // Loop through the query results and create events
    while ($row = mysqli_fetch_assoc($results)) {

      $startDateTime = $row['date'] . ' ' . $row['docapt_time'];

      $event = array(
        'id' => $row['docapt_id'],
        'title' => 'Doctor appointment - Appointment ID' . $row['docapt_id'],
        'start' => $startDateTime,
        'doctor' => $row['doc_name'],
        'appointmentNumber' => $row['docapt_no'],
        'color' => '#FF0000' // Set the color for the event, e.g., red
     );

    $events[] = $event;
}

header('Content-Type: application/json');
json_encode($events);

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

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>


    <script>
        $(document).ready(function() {
            // Initialize the calendar
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                // Fetch events from PHP script
                events: 'fetch_events.php',
                // Handle event click
                eventClick: function(calEvent, jsEvent, view) {
                    // Show the popup with event details
                    showEventPopup(calEvent);
                }
            });
        });

        // Function to show the event popup
        function showEventPopup(event) {
            // Create the HTML content for the popup
            var popupContent = '<h3>' + event.title + '</h3>' +
                '<p><strong>Doctor:</strong> ' + event.doctor + '</p>' +
                '<p><strong>Appointment Time:</strong> ' + event.start.format('YYYY-MM-DD HH:mm') + '</p>' +
                '<p><strong>Appointment Number:</strong> ' + event.appointmentNumber + '</p>';

            // Show the popup
            var popup = $('<div/>', {
                class: 'event-popup',
                html: popupContent
            }).appendTo('body');

            // Close the popup when clicked outside or on close button
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.event-popup').length) {
                    popup.remove();
                }
            });
        }
    </script>
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
