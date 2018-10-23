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
	$n1 = $_POST["n1"];
	$n2 = $_POST["n2"];
	echo '<span> The Prime Numbers between ' . $n1 . ' and '.$n2.' are:</span>';

	echo "<br>";
	for($i = $n1; $i<=$n2; $i++){
		for($div=2; $div<$i; $div++){
			if($i%$div == 0)
				break;
		}
		if($div == $i)
			echo "<span>  ".$i."</span>";
	}

	?>
</body>
</html>