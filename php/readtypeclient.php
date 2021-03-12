<?php

require 'db_conn.php';

$sql = "SELECT * from client_type";
$result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        echo'
        <option value = "'.$row["type_client"].'" >'.$row["type_client"].'</option >';
    }