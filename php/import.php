<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap -->
    <script src="../bootstrap-4.3.1-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap-reboot.css">

</head>
<?php
require 'db_conn.php';

if(isset($_POST["import"]))
{

    $fileName = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($fileName, 'r');

        $flag = true;
        while (($column = fgetcsv($file, 10000, ',')) !== false) {
            if($flag) { $flag = false; continue; }

            $users[] = $column[0];
            $clients[] = $column[1];
            $client_type[] = $column[2];
            $call_type[] = $column[5];
        }

        $users = array_unique($users);
        $clients = array_unique($clients);
        $client_type = array_unique($client_type);
        $call_type = array_unique($call_type);


        $users_dlt = mysqli_query($conn, "delete from users");

        foreach ($users as $user) {
            $usimp = mysqli_query($conn, "Insert into users(id_users, username)
            values ('', '" . trim($user) . "')");
        }

        $client_dlt = mysqli_query($conn, "delete from client");

        foreach ($clients as $client) {
            $climp = mysqli_query($conn, "Insert into client(id_client, name_client)
            values ('', '" . trim($client) . "')");
        }

        $call_dlt = mysqli_query($conn, "delete from call_type");

        foreach ($call_type as $calls) {
            $cltimp = mysqli_query($conn, "Insert into call_type(id_call, type_call)
            values ('', '" . trim($calls) . "')");
        }

        $clientt_dlt = mysqli_query($conn, "delete from client_type");

        foreach ($client_type as $ctype) {
            $ctimp = mysqli_query($conn, "Insert into client_type(id_type, type_client)
            values ('', '" . trim($ctype) . "')");
        }

        $file2 = fopen($fileName, 'r');

        $call_dcalls = mysqli_query($conn, "delete from details_calls");
        $flag2 = true;
        while (($column2 = fgetcsv($file2, 10000, ',')) !== false) {
            if($flag2) { $flag2 = false; continue; }
            $insertQuery = "call insert_detail_call('".$column2[0]."', '".$column2[1]."', '".$column2[2]."' , '".$column2[3]."', '".$column2[4]."' , '".$column2[5]."', '".$column2[6]."')";
            $mysqli = mysqli_query($conn, $insertQuery);

        }

        header('Location: ../calls.php');
    }
}


?>
<body>
        <form action="" method="post" name="uploadcsv" enctype="multipart/form-data">
            <div>
                <label>Choose SCV File</label>
                <input type="file" name="file" accept=".csv">
                <button type="submit" name="import">Import</button>
            </div>
        </form>
</body>
</html>