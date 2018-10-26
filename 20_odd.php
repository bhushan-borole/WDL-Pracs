<!DOCTYPE html>
<html>
	<body>
		<?php
			echo "The Odd number between 1 and 20 are: <br><br>";
			for($i = 1; $i<21;$i++){
				if($i % 2 != 0){
					echo $i . " ";
				}
			}
		?>
	</body>
</html>