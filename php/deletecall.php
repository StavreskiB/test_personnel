<?php

require 'db_conn.php';

if (isset($_POST['delete']))
{

    $id_details = $_POST["id_det"];

    $queryClient = "delete from details_calls where id_details ='".$id_details."'";
    $resultClient = $conn->query($queryClient);

}