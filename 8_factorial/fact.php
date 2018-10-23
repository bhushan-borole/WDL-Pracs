<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
    margin:50px 0; 
    padding:0;
    text-align:center;
	}
	</style>
</head>
<body>

	<?php
	$fact = 1;
	$n1 = $_POST["n1"];
	for($i = $n1; $i>0; $i--){
		$fact = $fact * $i;
	}
	echo $fact;

	?>
</body>
</html>