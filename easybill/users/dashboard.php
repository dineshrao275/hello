<?php
    session_start();
    if(!isset($_SESSION['userid']))
       header("location:../login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <?php  include('./sidebar.php'); ?>
    <section class="container-fluid profile-home mt-5">
        <div class="row">
            <div class="card col-sm-3 bg-primary m-2">
                <h2 class=" text center   card-heading">Monthly Sale </h2>
                <hr class="bg-success">
                <h4 class="text-center text-white"><span class="text-info ">&#8377;</span> 20000</h4>
            </div>
            <div class="card col-sm-3 bg-secondary m-2">
                <h2 class=" text center   card-heading">Today's Sale </h2>
                <hr class="bg-dark">
                <h4 class="text-center  text-white"><span class="text-info ">&#8377;</span> 20000</h4>
            </div>
            <div class="card col-sm-2 bg-success m-2">
                <h2 class=" text center   card-heading">Products </h2>
                <hr class="bg-success">
                <h4 class="text-center text-white">30</h4>
            </div>
            <div class="card col-sm-2 bg-danger m-2">
                <h2 class=" text center   card-heading">Bills </h2>
                <hr class="bg-success">
                <h4 class="text-center text-white">200</h4>
            </div>
            <div class="card col-sm-2 bg-primary m-2">
                <h2 class=" text center   card-heading">Catagories </h2>
                <hr class="bg-success">
                <h4 class="text-center text-white">20</h4>
            </div>
           
        </div>
    </section>
</body>
</html>