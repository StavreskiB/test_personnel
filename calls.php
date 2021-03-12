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

    <!-- Valid Calls-->
    <div class="row justify-content-center mt-5" id="details">
        <div class="col-11 text-center">
            <div style="height: 500px;overflow: scroll;">
                <!-- change height to increase the number of visible row  -->
                    <?php
                        require 'php/validcalls.php';
                    ?>
            </div>
        </div>
    </div>


<?php
require 'php/viewbutton.php';
?>





</body>
</html>