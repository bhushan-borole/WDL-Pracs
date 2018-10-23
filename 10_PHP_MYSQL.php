<html>
    <body>
        <form name="product_form" action="10_PHP_MYSQL.php" method="post">
            <input type=submit name=insert value="Insert Prompt">
            <input type=submit name=update value="Update Prompt">
            <input type=submit name=delete value="Delete">
            <input type=submit name=display value="Display">
            <br>
            <div style="display:none" name="insert_fields" id="insert_fields">
                <br><br>
                <table>
                    <th align=center>
                        <td colspan=2><h4>Enter the details of Product :</h4></td>
                    </th>
                    <tr>
                        <td>Product Id : </td>
                        <td><input type=number name=id></td>
                    </tr>
                    <tr>
                        <td>Product Name : </td>
                        <td><input type=text name=name></td>
                    </tr>
                    <tr>
                        <td>Product Price : </td>
                        <td><input type=number name=price></td>
                    </tr>
                    <tr>
                        <td>Product Description : </td>
                        <td><input type=text name=desc></td>
                    </tr>
                </table>
                <input type=submit name="insert_added" value="insert">
            </div>
            <div style="display:none" name="update_fields" id="update_fields"><br><br>
                Enter the product id  : <input type=number name=u_id><br>
                Enter the product name: <input type=text name="u_name">
                <input type=submit name="update_added" value=update>
            </div>
            <div style="display:none" name="delete_fields" id="delete_fields"><br><br>
                Enter the product id  : <input type=number name=d_id><br>
                <input type=submit name="delete_added" value=delete>
            </div>
            <div style="display:none" name="display_fields" id="display_fields"><br><br>
                <h3>Product Table : </h3>
            </div>
        </form>
    </body>
    <?php
        const db_name = "wdl7";
        const db_uname = "root";
        const host = "localhost";
        const db_pswd = "";
        const json_file_name = "all_tables_json";     //This is name of the file in which all data will be stored.
                
        $table_names = array("event_details", "user", "room");      // names of all table.
        $table_jsons = array();                                     // array where jsons of all tables will be stored.
        
        function get_json_data($qry, $is_insert){
            $mysqli = new mysqli(host, db_uname, db_pswd, db_name);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $query = $qry;
            $result = $mysqli->query($query);
            
            if($is_insert == "dsp"){
                $data=array();
                while($r = mysqli_fetch_assoc($result)){
                    $data[] = $r;
                }
                return json_encode($data);
            }
            else{
                $msg = "";
                switch($is_insert){
                    case "i" : $msg = "Inserted"; break;
                    case "u" : $msg = "Updated"; break;
                    case "d" : $msg = "Deleted"; break;
                }
                echo "<script>alert(\"Data ".$msg." Successfully.\")</script>";
            }
            
        }
        function get_table_data_query($query, $is_insert){
            $result = json_decode(get_json_data($query, $is_insert), true);
            if($is_insert == "dsp"){return $result;}
        }
        if(isset($_POST["insert"])){
            echo "
                <script>
                    element = document.getElementById(\"insert_fields\");
                    element.style.display=\"block\";             
                </script>
            ";
        }
        if(isset($_POST["insert_added"])){
            get_table_data_query(" 
                INSERT INTO product_table
                VALUES(".$_POST["id"].", \"".$_POST["name"]."\", ".$_POST["price"].", \"".$_POST["desc"]."\");
                ", "i"
            );
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
            get_table_data_query(" 
                UPDATE product_table
                SET name=\"".$_POST["u_name"]."\"
                WHERE id=".$_POST["u_id"].";
                ", "u"
            );
        }
        if(isset($_POST["delete"])){
            echo "
                <script>
                    element = document.getElementById(\"delete_fields\");
                    element.style.display=\"block\";       
                </script>
            ";
        }
        if(isset($_POST["delete_added"])){
            get_table_data_query(" 
                DELETE FROM product_table
                WHERE id=".$_POST["d_id"].";
                ", "d"
            );
        }
        if(isset($_POST["display"])){
            echo "
                <script>
                    element = document.getElementById(\"display_fields\");
                    element.style.display=\"block\";       
                </script>
            ";
            $table = get_table_data_query("SELECT * FROM product_table;", "dsp");
            
            //https://stackoverflow.com/questions/4746079/how-to-create-a-html-table-from-a-php-array        
             if (count($table) > 0): ?>
                <table border="1">
                  <thead>
                    <tr>
                      <th><?php echo implode('</th><th>', array_keys(current($table))); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach ($table as $row): array_map('htmlentities', $row); ?>
                    <tr>
                      <td><?php echo implode('</td><td>', $row); ?></td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
                <?php endif; ?>
    <?php
        }
    ?>
</html>

<!-- 
description of the table
Field         Type
id          int(11)
name        varchar(30)
price       int(11)
description varchar(250)

-->