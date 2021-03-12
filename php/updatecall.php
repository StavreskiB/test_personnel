<?php

if (isset($_POST['update'])) {

    $id_details = $_POST["id_det"];

    $sql2 = "SELECT dk.id_details, u.username, c.name_client, ct.type_call, dk.date_call, dk.duration, clt.type_client, dk.call_score
                FROM details_calls as dk
                inner join users as u on u.id_users = dk.name_users
                INNER JOIN client as c ON c.id_client = dk.name_client
                inner join call_type as ct on ct.id_call = dk.type_call
                inner join client_type as clt on clt.id_type = dk.type_client
                where dk.id_details = '" . $id_details . "';";

    $result2 = $conn->query($sql2);



    echo'
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Score</th>
                        <th scope="col">User</th>
                        <th scope="col">Client</th>
                        <th scope="col">Client type</th>
                        <th scope="col">Type Of Call</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>';
                        $i = 0;
                        while($row2 = $result2->fetch_assoc()) {
                         echo '
                       <tr>
                            <form method="post">
                               <td scope="col">
                                    <input type="text" name="upddate" value="'.$row2["date_call"].'">
                                </td>
                                <td scope="col">
                                    <input type="text" name="updduration" value="'.$row2["duration"].'">
                                </td>
                                <td scope="col">
                                    <input type="text" name="updscore" value="'.$row2["call_score"].'">
                                </td>
                                <td scope="col">
                                    <select class="custom-select" name="upduser">
                                           <option selected value="'.$row2["username"].'">'.$row2["username"].'</option> ';
                                           require 'readusers.php';
                                    echo'
                                     </select>
                                </td>
                                <td scope="col">
                                     <select class="custom-select" name="updclient">
                                         <option selected>'.$row2["name_client"].'</option>';
                                          require 'readclient.php';
                                    echo'
                                     </select>
                                </td>
                                <td scope="col">
                                    <select class="custom-select" name="updclienttype">
                                         <option selected>'.$row2["type_client"].'</option>';
                                               require 'readtypeclient.php';
                                        echo'
                                     </select>
                                </td>
                                <td scope="col">
                                    <select class="custom-select selected" name="updtypecall">
                                        <option value="'.$row2["type_call"].'">'.$row2["type_call"].'</option> ';
                                                require 'readtype.php';
                                        echo'
                                     </select>
                                </td>
                                <td scope="col d-none">
                                    <input type="text" class="d-none" name="iddetails" value="'.$row2["id_details"].'">
                                </td>
                                <td scope="col">
                                    <button class="btn btn-dark" type="submit" name="updCall">Update</button>
                                </td>
                            </form>
                       </tr>';
                        };
                         echo'       
                    </div>
                </tbody>
            </table>';
}

if (isset($_POST['updCall'])) {
    $id = $_POST["iddetails"];
    $user = $_POST["upduser"];
    $client = $_POST["updclient"];
    $clienttype = $_POST["updclienttype"];
    $calltype = $_POST["updtypecall"];
    $date = $_POST["upddate"];
    $score = $_POST["updscore"];
    $duration = $_POST["updduration"];





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


        $details = mysqli_query($conn, " UPDATE details_calls 
                set name_users = '".$id_user."', name_client = '".$id_client."' , type_client = '".$id_type_client."', date_call = '".$date."', duration = '".$duration."', type_call = '".$id_type_call."', call_score = '".$score."'
                WHERE id_details = '".$id."';");


}
