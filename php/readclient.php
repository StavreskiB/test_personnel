<?php
require 'db_conn.php';

$sql = "SELECT * from client";
$result= $conn->query($sql);



    while($row = $result->fetch_assoc()) {
        echo'
        <option value = "'.$row["name_client"].'" >'.$row["name_client"].'</option >';
    }