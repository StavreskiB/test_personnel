<?php
if (isset($_POST["view"])) {

    $id = $_POST["idusers"];
    $username = $_POST["username"];


    $sql = "select  AVG(call_score) 
             from details_calls
            where name_users = '".$id."';";


    $result = $conn->query($sql);





    $sql2 = "SELECT dk.id_details, u.username, c.name_client, ct.type_call, dk.date_call, dk.duration, clt.type_client, dk.call_score
                FROM details_calls as dk
                inner join users as u on u.id_users = dk.name_users
                INNER JOIN client as c ON c.id_client = dk.name_client
                inner join call_type as ct on ct.id_call = dk.type_call
                inner join client_type as clt on clt.id_type = dk.type_client
                where dk.duration > 10 
                order by date_call desc limit 5";


    $result2 = $conn->query($sql2);

            $i = 0;
            while($row = $result->fetch_assoc()) {
            echo'
            <div class="row justify-content-center mt-5">
                <div class="col-5">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Username</th>
                          <th scope="col">Average score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">'.$i.'</th>
                          <th>'.$username.'</th>
                          <th>'.$row["AVG(call_score)"].'</th>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            ';
                $i++;
            };


        $j = 0;
        while($row2 = $result2->fetch_assoc()) {
            echo'
         <div class="row justify-content-center">
              <div class="col-10 text-center">
                <table class="table text-center mt-5">
                  <thead>
                    <tr>
                       <th scope="col">#</th>
                       <th scope="col">User</th>
                       <th scope="col">Client</th>
                       <th scope="col">Client Type</th>
                       <th scope="col">Date</th>
                       <th scope="col">Duration</th>
                       <th scope="col">Type Of Call</th>
                       <th scope="col">External Call Score</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <th scope="row">'.$j.'</th>
                        <td>'.$username.'</td>
                        <td>'.$row2['name_client'].'</td>
                        <td>'.$row2['type_client'].'</td>
                        <td>'.$row2['date_call'].'</td>
                        <td>'.$row2['duration'].'</td>
                        <td>'.$row2['type_call'].'</td>
                        <td>'.$row2["call_score"].'</td>
                    </tr>
                  </tbody>
                </table>
             </div>
        </div>
    ';
        $j++;
    };


};
