<?php

require 'db_conn.php';

$sql = "SELECT * from call_type";
$result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        echo'
        <option value = "'.$row["type_call"].'" >'.$row["type_call"].'</option >';
    }