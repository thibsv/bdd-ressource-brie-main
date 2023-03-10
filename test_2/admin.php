<?php
include "./common/menu.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <title></title>
</head>

<body>
    <div class="container">
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#addnew">
                    Nouveaux
                </button>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th class="top-th">Id</th>
                        <th class="top-th">prenom</th>
                        <th class="top-th">nom</th>
                        <th class="top-th">adresse</th>
                        <th class="top-th">naissance</th>
                        <th class="top-th">tel</th>
                        <th class="top-th">mail</th>
                        <th class="top-th">Action</th>
                    </thead>
                    <?php
                    include "membres.php";
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include('add.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>