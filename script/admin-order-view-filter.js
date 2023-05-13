// admin-order-view.php filter functions

function filterOrderId() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("order_id");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-order");
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
  }    // filter function for order id



function filterPhoneNo() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("contact_no");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-order");
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
  }    // filter function for phone number

  function filterStatus() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("order_status");
    filter = input.value.toUpperCase() ;            //the value of input
    
    table = document.getElementById("tbl-main-order");
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
  }    // filter function for phone number
