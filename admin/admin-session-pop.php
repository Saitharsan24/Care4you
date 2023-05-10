<!DOCTYPE html>
<head>
<link rel="stylesheet" href="../css/admin-session-pop.css">
</head>
<body>
  
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="" method="POST">
  
    <div class="container">
      <h1><?php echo $status ?> Session</h1>
      <p>Are you sure you want to <?php echo $status ?>?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">OK</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>