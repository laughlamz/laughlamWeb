<?php
	require "dbCon.php";
?>

<?php
  $qrUpD1 = "
    UPDATE device_table SET device2 = (0)
  ";
  $qrUpD2 = mysqli_query($conn, $qrUpD1);
?>