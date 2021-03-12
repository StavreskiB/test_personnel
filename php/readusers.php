<?php

require 'db_conn.php';

$sql = "SELECT * from users";
$result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        echo'
        <option value = "'.$row["username"].'" >'.$row["username"].'</option >';
    }
