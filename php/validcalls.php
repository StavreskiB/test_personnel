<?php

require 'db_conn.php';
require 'deletecall.php';
require 'updatecall.php';

$sql = "SELECT dk.id_details, u.username, c.name_client, ct.type_call, dk.date_call, dk.duration, clt.type_client, dk.call_score
                FROM details_calls as dk
                inner join users as u on u.id_users = dk.name_users
                INNER JOIN client as c ON c.id_client = dk.name_client
                inner join call_type as ct on ct.id_call = dk.type_call
                inner join client_type as clt on clt.id_type = dk.type_client
                where dk.duration > 10;";

$result = $conn->query($sql);

echo'
<table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">User</th>
                        <th scope="col">Client</th>
                        <th scope="col">Client Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Type Of Call</th>
                        <th scope="col">External Call Score</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>';
                    $i = 1;
                    while($row = $result->fetch_assoc()) {

                        echo '<tr>
                            
                            <form method="post">
                                <th scope="col">'.$i.'</th>
                                    <d iv class="form-group d-none">
                                      <label for="id_det">ID</label>
                                      <input type="text" name="id_det"  class="form-control" id="id_det" value="'.$row["id_details"].'">
                                    </div>
                                </select>
                                <td scope="col">'.$row['username'].'</td>
                                <td scope="col">'.$row['name_client'].'</td>
                                <td scope="col">'.$row['type_client'].'</td>
                                <td scope="col">'.$row['date_call'].'</td>
                                <td scope="col">'.$row['duration'].'</td>
                                <td scope="col">'.$row['type_call'].'</td>
                                <td scope="col">'.$row["call_score"].'</td>
                                <td scope="col">
                                <button class="btn btn-dark" type="submit" name="delete" >Delete</button>
                                <button class="btn btn-dark" type="submit" name="update">Update</button>
                                </td>
                            </form>
                        </tr>';
                    $i++;
                    };

                echo'   
                    <div class="row justify-content-end"><button class="btn btn-dark mr-5" type="button" id="add" data-toggle="modal" data-target=".addmodal">Add new call</button>
                    </div>
                    <div class="modal fade addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row justify-content-center">
                                <div class="col-9 mt-3 mb-3">
                                    <form id="addcall" class="text-left mt-5 d-none" method="post">
                                        <div class="control-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="user">User</label>
                                                </div>
                                                <select class="custom-select" name="user">
                                                    <option selected></option> ';
                                                        require 'readusers.php';
                                                        echo'
                                                </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="client">Client</label>
                                                </div>
                                                <select class="custom-select" name="client">
                                                    <option selected></option>
                                                   ';
                                                        require 'readclient.php';
                                                    echo'
                                                </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="calltype">Call Type</label>
                                                </div>
                                                <select class="custom-select" name="calltype">
                                                    <option selected></option>';

                                                        require 'readtype.php';
                                                    echo'
                                                </select>
                                            </div>
                                            <div class="form-group mt-3">
                                                <span for="date">Date and time</span>
                                                <input type="text" class="form-control validated" name="date" id="date">
                                            </div>
                                            <div class="form-group">
                                                <span for="duration">Duration</span>
                                                <input type="number" class="form-control validated" name="duration" id="duration">
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="clienttype">Client type</label>
                                                </div>
                                                <select class="custom-select" name="clienttype">
                                                    <option selected></option>
                                                    ';
                                                        require 'readtypeclient.php';
                                                    echo'
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <span for="score">Score</span>
                                                <input type="number" class="form-control validated" name="score" id="score">
                                            </div>
                                        </div>
                                        <button type="submit" id="btnAddClient" name="btnAddClient" class="btn btn-primary float-right">Add Client</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </tbody>
            </table>';