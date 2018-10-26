<?php  
$a = array("Anna", "Brittany", "Cassandra");

$q = $_REQUEST['q'];
$q = strtolower($q);

if(!$q){
    // replace empty with blank
    $q = ' ';
}

$hint = '';
foreach($a as $val){
    if(stristr($val, $q)){
        $hint .= $val . ', ';
    }
}

echo ($hint == '')? 'no results': $hint;

?>