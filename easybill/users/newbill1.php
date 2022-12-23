<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");
        $vendor_id=$_SESSION['userid'];

        include('../database/db.php');

       $cname= $_POST["customername"];
       $ccontact= $_POST["customercontact"];
       $cemail= $_POST["customeremail"];
       $pid= $_POST["productname"];
       $pquantity= $_POST["productquantity"];
       $pprice= $_POST["productprice"];
       $totalamount=$_POST["totalamount"];


    $query = mysqli_query($con,"insert into bills(customername,customercontact,customeremail,vendorid,product_id,product_quantity,total_price) values('$cname','$ccontact','$cemail',$vendor_id,$pid,$pquantity,$totalamount)");
    if($query)
        header("location:dashboard.php");
?>