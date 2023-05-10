
// admin-doc-view.php page filter functions

function filterSessionId() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("session_id");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-session");
    tr = table.getElementsByTagName("tr");          // the getElementsByTagName() function is used to assign the tags in a array
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {              //indexOf() function is used to give index value of an array          
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for session_id


  


function filterDoctorName() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("doctor_name");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-session");
    tr = table.getElementsByTagName("tr");          // the getElementsByTagName() function is used to assign the tags in a array
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {              //indexOf() function is used to give index value of an array          
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for doctor name

  


function filterRoomNo() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("room_no");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-session");
    tr = table.getElementsByTagName("tr");          // the getElementsByTagName() function is used to assign the tags in a array
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {              //indexOf() function is used to give index value of an array          
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for room number


  

function filterSessionStatus() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("session_status");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-session");
    tr = table.getElementsByTagName("tr");          // the getElementsByTagName() function is used to assign the tags in a array
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {              //indexOf() function is used to give index value of an array          
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for session status

  
