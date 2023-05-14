

function filterDrugName() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("drug_name");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main");
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
  }    