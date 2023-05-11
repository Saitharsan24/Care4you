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
    
    $appointments = []; // Array to store the formatted appointment data

    // Fetch appointments from the database
    // Assuming you have retrieved the appointments from your tables
    foreach ($result as $appointmentData) {
      $appointments[] = [
        'id' => $appointmentData['docapt_no'], // Add the ID of the appointment
        'title' => $appointmentData['doc_name'],
        'start' => $appointmentData['date'],
        'time' => $appointmentData['docapt_time'],
        'color' => '#FF0000', // Add the desired color for the event
    
  ];

  $appointmentsJson = json_encode($appointments);
}

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
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              events: <?php echo $appointmentsJson; ?>,
              eventClick: function(info) {
                // Retrieve the event data
                var event = info.event;
                var eventId = event.id;
                var eventTitle = event.title;
                var eventStart = event.start;
                var eventColor = event.color;
                var eventTime = event.extendedProps.time; // Retrieve the additional property: description

                // Create the event details HTML content
                var eventDetailsHTML = '<h2>' + eventTitle + '</h2>' +
                  '<p><strong>Start:</strong> ' + eventStart + '</p>' +
                  '<p><strong>Description:</strong> ' + eventTime + '</p>';

                // Show the popup with event details
                var popup = document.getElementById('event-details-popup');
                var popupContent = document.getElementById('event-details-content');
                popupContent.innerHTML = eventDetailsHTML;
                popup.style.display = 'block';

                // Prevent the default behavior (e.g., navigating to event URL)
                info.jsEvent.preventDefault();
              }
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
          <a href="./patient_medicalrecords.php">Medical records</a>
          <!-- <a href="./patient_doctorlist.php">View doctors</a> -->
          <a href="#">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="text-content">
          <div class="appointments-head"><h2>My Appointments</h2></div>
        </div>
        
          <div class="myapt-containor">
            <div class="apt-consub1">
                <div id='calendar'></div>
                <div id="event-details-popup" class="popup">
                  <div id="event-details-content"></div>
                </div>
            </div>
            <div class="apt-consub2">
            <div class="mk-apt-btn common-apt">
              <a href="./patient_docappointments.php">
                <button class="btn-mkdcapt"  style="font-size: 18px;">
                  <span>Doctor Appointments</span>
                </button>
              </a>
            </div>
              <div class="appointments-divider"></div>
            <div class="mk-apt-btn common-apt">
              <a href="./patient_labappointments.php">
                <button class="btn-mkdcapt" style="font-size: 18px;">
                  <span>Lab Appointments</sapn>
                </button>
              </a>
            </div>
            </div>
          </div>

      </div>
    </div>
  </body>
</html>
