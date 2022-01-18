<?php
	include "../connection.php";
	$result = mysqli_query($con,"select username from donor where username = '".$_POST['username']."' ");
	$cnt = mysqli_num_rows($result);
	print($cnt);
?>