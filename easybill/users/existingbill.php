<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");
        $vendor_id=$_SESSION['userid'];

        include('../database/db.php');

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Bill</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>

    
$(document).ready(function() {
    $('#billTable').DataTable();
});

</script>
</head>
<body>
    <?php 
        include("./sidebar.php");
    ?>
            <div class="container-fluid mt-5 existing-bill-table p-2">
                <table id="billTable" class="table">
                    <thead>
                        <tr>
                            <th>Bill ID</th>
                            <th>Customer Name</th>
                            <th>Customer Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            $query= mysqli_query($con,"select * from bills where vendorid=$vendor_id");
                            while ($row=mysqli_fetch_array($query)) {
                            ?>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><a href="printbill.php"><i class="fa-solid fa-print"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>

</body>
</html>