
// admin-patient-view.php filter functions

function filterPatientId() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("patient_id");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-patient");
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
  }    // filter function for patient id


  function filterPatientName() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("patient_name");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-patient");
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
  }    // filter function for patient name

  
  function filterContactNo() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("contact_no");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-patient");
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
  }    // filter function for patient name

   
  function filterAccountStatus() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("account_status");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-patient");
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
  }    // filter function for contact number

