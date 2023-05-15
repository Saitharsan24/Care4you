function filterTestName() {
    var input, filter, table, tr, td, i, txtValue;
  
    input = document.getElementById("test_name");
    filter = input.value.toUpperCase();            //the value of input
  
    table = document.getElementById("tbl-common");
    tr = table.getElementsByTagName("tr");          // the getElementsByTagName() function is used to assign the tags in a array
    for (i = 1; i < tr.length; i++) {
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
  }    