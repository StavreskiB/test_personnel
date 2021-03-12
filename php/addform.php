<?php

require 'php/db_conn.php';

if (isset($_POST['btnAddClient'])) { //check if form was submitted

        $user = $_POST["user"];
        $client = $_POST["client"];
        $calltype = $_POST["calltype"];
        $date = $_POST["date"];
        $duration = $_POST["duration"];
        $score = $_POST["score"];
        $clienttype = $_POST["clienttype"];


        if(empty($user) || empty($client) || empty($calltype) || empty($date) || empty($duration) || empty($score) || empty($clienttype))
        {
            echo "<script type='text/javascript'>alert('Wrong input');</script>";
        }
        else{

        //get id from client
        $queryClient = "SELECT id_client FROM client where name_client = '".$client."'";
        $resultClient = $conn->query($queryClient);
        while ($row = $resultClient->fetch_assoc()) {
            $id_client = $row["id_client"];
        }


        //get id from user
        $queryUser = "SELECT id_users FROM users where username = '".$user."'";
        $resultUser = $conn->query($queryUser);
        while ($row = $resultUser->fetch_assoc()) {
            $id_user = $row["id_users"];
        }

        //get id from type client
        $queryType = "SELECT id_type FROM client_type where type_client = '".$clienttype."'";
        $resultType = $conn->query($queryType);
        while ($row = $resultType->fetch_assoc()) {
            $id_type_client = $row["id_type"];
        }

        //get id from call type
        $queryType = "SELECT id_call FROM call_type where type_call = '".$calltype."'";
        $resultType = $conn->query($queryType);
        while ($row = $resultType->fetch_assoc()) {
            $id_type_call = $row["id_call"];
        }


        $details = mysqli_query($conn, "Insert into details_calls(id_details, name_users, name_client, type_client, date_call, duration, type_call, call_score)
            values ('', '" . $id_user . "', '" . $id_client . "' , '" .$id_type_client. "', '" .$date. "', '" .$duration. "', '" . $id_type_call . "', '" .$score. "')");

    }

}

