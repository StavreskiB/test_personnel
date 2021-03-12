<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="bootstrap-4.3.1-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css">

    <link rel="stylesheet" href="custom_css/style.css">
    <script src="script.js"></script>

</head>
<body>

<?php

require 'php/db_conn.php';
require 'php/addform.php';
require 'php/userstable.php';

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Personnel Test</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item navbar-light">
                <a class="nav-link text-white" href="calls.php">Details Calls</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="users.php">Users</a>
            </li>
        </ul>
    </div>
</nav>


<?php
require 'php/viewbutton.php';
?>


<!-- Users -->
<div class="row justify-content-center mt-5 mb-5" id="users">
    <div class="col-6 text-center">
        <div style="height: 500px;overflow: scroll;">
            <!-- change height to increase the number of visible row  -->
            <table class="table table-striped table-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                require 'php/userstable.php';
                $i = 0;
                while($row = $result->fetch_assoc()) {
                    echo '
                            <form method="post">
                                 <tr>
                                    <td class="col d-none">
                                        <input type="text" class="d-none" name="idusers" value="'.$row["id_users"].'">
                                    </td>
                                    <td class="col d-none">
                                        <input type="text" class="d-none" name="username" value="'.$row["username"].'">
                                    </td>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$row['username'].'</td>
                                    <td>
                                        <button class="btn btn-dark" type="submit" name="view">View</button>
                                    </td>
                                 </tr>
                            </form>';
                    $i ++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
while($row = $result->fetch_assoc()) {
    echo '
        <div class="modal fade" id="myModal'.$row['id_users'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <h4>User: </h4>
                                <h4>Bojan Stavreski</h4>
                                <h4>Score: </h4>
                                <h4> 3838</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="table text-center">
                                <table class="table table-striped table-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User</th>
                                            <th scope="col">External Call Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>  
    '; };
?>

</body>
</html>