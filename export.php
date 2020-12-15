<?php
require_once "db-con.php";


$export_data=$pdo->query("SELECT * FROM locotracteur");


$fileName = "locotracteur" . rand(1,100) . ".xls";
 
if ($export_data) {
    function filterData(&$str) {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
 
    // headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");
 
    $flag = false;
    foreach($export_data as $row) {
        if(!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";
    }
    exit;           
}


?>