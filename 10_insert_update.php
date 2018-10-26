<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
		<form name="student" action="10_insert_update.php" method="post">
			<input type="submit" name="insert" value="Insert">
			<input type="submit" name="update" value="Update">
			<br><br>
			<div style="display:none" name="insert_fields" id="insert_fields">
                <br><br>
                <table>
                    <th align=center>
                        <td colspan=2><h4>Enter the Student Details :</h4></td>
                    </th>
                    <tr>
                        <td>Enter Pid : </td>
                        <td><input type=number name=pid></td>
                    </tr>
                    <tr>
                        <td>Enter Name : </td>
                        <td><input type=text name=name></td>
                    </tr>
                    <tr>
                        <td>Enter Roll No. : </td>
                        <td><input type=text name=roll></td>
                    </tr>
                </table>
                <input type=submit name="insert_added" value="insert">
            </div>

            <div style="display:none" name="update_fields" id="update_fields"><br><br>
                Enter the student pid  : <input type=number name=u_id><br>
                Enter the student roll no. : <input type=number name="u_roll">
                <input type=submit name="update_added" value=update>
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

        if(isset($_POST["insert"])){
            echo "
                <script>
                    element = document.getElementById(\"insert_fields\");
                    element.style.display=\"block\";             
                </script>
            ";
        }

        if(isset($_POST["insert_added"])){
            $query = "INSERT INTO student VALUES(".$_POST["pid"].", \"".$_POST["name"]."\", ".$_POST["roll"].");";
            if(mysqli_query($conn, $query)){
                echo "<script>alert(\"Data Inserted\")</script>";
            }
        }

        if(isset($_POST["update"])){
            echo "
                <script>
                    element = document.getElementById(\"update_fields\");
                    element.style.display=\"block\";
                </script>
            ";
        }

        if(isset($_POST["update_added"])){
            $query = "UPDATE student SET roll=".$_POST["u_roll"]." WHERE pid='".$_POST["u_id"]."';";
            if(mysqli_query($conn, $query)){
                echo "<script>alert(\"Data Updated\")</script>";
            }
            else{
                echo $query;
            }
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