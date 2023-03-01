function filterPharName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phar_name");
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
  }

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
  }