<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
		<form action="11_select_delete.php" method="post">
			<input type="submit" name="delete" value="Delete">
            <input type="submit" name="display" value="Display">
            <div style="display:none" name="delete_fields" id="delete_fields"><br><br>
                Enter the student id  : <input type=number name=d_id><br>
                <input type=submit name="delete_added" value=delete>
            </div>
            <div style="display:none" name="display_fields" id="display_fields"><br><br>
                <h3>Product Table : </h3>
            </div>
		</form>
	</body>

	<?php
		const db_name = "student_db";
        const db_uname = "root";
        const host = "localhost";
        const db_pswd = "";

        $conn = mysqli_connect(host, db_uname, db_pswd);
        mysqli_select_db($conn, db_name);

        if(isset($_POST["delete"])){
            echo "
                <script>
                    element = document.getElementById(\"delete_fields\");
                    element.style.display=\"block\";       
                </script>
            ";
        }
        if(isset($_POST["delete_added"])){
        	$query = "DELETE FROM student WHERE pid=".$_POST["d_id"]."";
            if(mysqli_query($conn, $query)){
            	echo "<script>alert(\"Data Deleted\")</script>";
            }
        }

        if(isset($_POST["display"])){
        	echo "
                <script>
                    element = document.getElementById(\"display_fields\");
                    element.style.display=\"block\";       
                </script>
            ";

            $query = "SELECT * FROM student;";
            $data = mysqli_query($conn, $query);
            echo "<table>
            	    <tr>
            	    	<th> PID </th>
            			<th> Name </th>
            			<th> Roll No. </th>
            		</tr>";
            while($info = mysqli_fetch_array($data)){
            	echo "<tr>";
            	echo "<td>".$info['pid']."</td>";
            	echo "<td>".$info['name']."</td>";
            	echo "<td>".$info['roll']."</td>";
            	echo "</tr>";
            }
            echo "</table>";
        }
	?>
</html>

<!-- 
Table Details
    Coloumn_Name        DataType
1)     pid             varchar(50)
2)     name            varchar(50)
3)     roll             int

-->