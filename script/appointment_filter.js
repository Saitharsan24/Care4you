// admin doc appointment filter functions

function filterReferenceNO() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("ref_no");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-app");
    tr = table.getElementsByTagName("tr");
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for referance no

  function filterPatientName() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("patient_name");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-app");
    tr = table.getElementsByTagName("tr");
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for referance no

  function filterDate() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("date");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-app");
    tr = table.getElementsByTagName("tr");
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for referance no

  function filterStatus() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("appt_status");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-app");
    tr = table.getElementsByTagName("tr");
    for (i = 2; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      if (td) {
        txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
        if (txtValue.indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {

          tr[i].style.display = "none";
        }
      }       
    }
  }    // filter function for referance no
