
// phamrmacits filter functions

  function filterPharId() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("phar_id");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-pha");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
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
  }    // filter function for pharmacist id

  function filterPharName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phar_name");
    console.log(input);
    filter = input.value.toUpperCase() ;
   
    table = document.getElementById("tbl-main-pha");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
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
  }    //filter function for pharmacist name

  function filterPharStatus() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phar_status");
    filter = input.value.toUpperCase() ;
   
    table = document.getElementById("tbl-main-pha");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
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
  }    //filter function for pharmacist status


// Assistant filter functions
  function filterAsstID() {
    
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("asst-id");
    filter = input.value.toUpperCase() ;
    table = document.getElementById("tbl-main-asst");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
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
  }           //filter function for Assistant ID
  
  function filterAsstName() {
    
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("asst-name"); 
    filter = input.value.toUpperCase() ;
   
    table = document.getElementById("tbl-main-asst");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
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
  }               //filter function for Assistant Name

  
  function filterAsstStatus() {
    
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("asst-status"); 
    filter = input.value.toUpperCase() ;
   
    table = document.getElementById("tbl-main-asst");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
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
  }                //filter function for Assistant Status


  
// Doctor filter functions
function filterDoctorId() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-id");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
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
}   //doctor tech id filter function

function filterDoctorName() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-name");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
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
}   //doctor tech id filter function


// Lab tech filter functions
function filterLabId() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lab-id");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-lab");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
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
}   //lab tech id filter function

function filterLabName() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lab-name");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-lab");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
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
}  //lab tech name filter function


function filterLabStatus() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lab-status");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-lab");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
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
}  //lab tech status filter function


