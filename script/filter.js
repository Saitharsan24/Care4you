
// phamrmacits filter functions

  function filterPharId() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("phar_id");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-pha");
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
  }    // filter function for pharmacist id

  function filterPharName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phar_name");
    console.log(input);
    filter = input.value.toUpperCase() ;
   
    table = document.getElementById("tbl-main-pha");
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
  }    //filter function for pharmacist name

  function filterPharStatus() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phar_status");
    filter = input.value.toUpperCase() ;
   
    table = document.getElementById("tbl-main-pha");
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
  }    //filter function for pharmacist status


// Assistant filter functions

  function filterAsstID() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("asst-id");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-asst");
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
  }     //filter function for Assistant ID
  

  function filterAsstName() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("asst-name");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-asst");
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
  }     //filter function for Assistant name

  
  function filterAsstStatus() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("asst-status");
    filter = input.value.toUpperCase() ;
    
    table = document.getElementById("tbl-main-asst");
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
  }     //filter function for Assistant name

  
// Doctor filter functions
function filterDoctorId() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-id");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
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
}   //doctor id filter function

function filterDoctorName() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-name");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
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
}   //doctor name filter function


function filterDoctorSpecialize() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-Specialize");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
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
}   //doctor specialization filter function


function filterDoctorSlmc() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-slmc");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
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
}   //doctor slmc number filter function


function filterDoctorStatus() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("doc-status");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-doc");
  tr = table.getElementsByTagName("tr");
  for (i = 2; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent.toUpperCase() || td.innerText.toUpperCase();
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {

        tr[i].style.display = "none";
      }
    }       
  }
}   //doctor account status filter function

// Lab tech filter functions
function filterLabId() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lab-id");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-lab");
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
}   //lab tech id filter function

function filterLabName() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lab-name");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-lab");
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
}  //lab tech name filter function


function filterLabStatus() {
    
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lab-status");
  filter = input.value.toUpperCase() ;
  table = document.getElementById("tbl-main-lab");
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
}  //lab tech status filter function


