<?php
session_start();
include("delta_config.php");



$conn = OpenCon();
$id = 40 ;
$_SESSION['admin']=$id;
$ls_name = "ls";
$ls_value = md5($_SESSION['admin'].time());


?>



<!DOCTYPE html>
<html>
<body>

<div id="result"></div>

<script>
// Check browser support
if (typeof(Storage) !== "undefined") {
  // Store
  localStorage.setItem("<?php echo $ls_name; ?>", "<?php echo $ls_value; ?>");
  console.log("stored");
  // Retrieve
  document.getElementById("result").innerHTML = localStorage.getItem("<?php echo $ls_name ;?>");
} else {
  document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
}
</script>

</body>
</html>




<?php

        
        

?>

