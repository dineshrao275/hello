<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");
        $vendor_id=$_SESSION['userid'];

        include('../database/db.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>New Bill</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src='https://code.jquery.com/jquery-3.3.1.js'></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="../css/style.css">

		<script>
		  function dynamic_info()
   {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","dynamic-info.php?pid="+document.getElementById("productname").value,false);

    xmlhttp.send(null);
    document.getElementById("productprice").innerHTML=xmlhttp.responseText;
   }
		</script>
   <script>
$(document).ready(function()
{
	$("#productname").change(function()
	{
		var productname1=this.value;
		var vendor=document.mine.vendor_id.value;
		
			$.post("total1.php",{pd:productname1,vendor:vendor},function(data)
			{
				$("#total").html(data).show();
	
			});	
	});
});
</script>
<script>
$(document).ready(function()
{
	$("#productquantity").change(function()
	{
		var productquantity=this.value;
		var productprice=document.mine.productprice.value;
		$.post("total.php",{pq:productquantity,pr:productprice},function(data)
			{
				$("#total").html(data).show();
	
			});
	});
});
</script>
	</head>
	<body >
		<input type="hidden" name='vendor_id' value="<?php echo $vendor_id ?>">
    <?php include("./sidebar.php"); ?>
	<div class="container newbill">
    <form name='mine' action="newbill1.php" method="post" class='newbill-form' id="insert-form">

        <div class="new-bill-heading">
            <h2 class="text-primary p-5 font-weight-bold">Make New Bill</h2>
        </div>

        <fieldset>

            <legend> Customer Details</legend>
            <div class="col-sm-4 m-auto">
                <label  class="form-label">Customer Name</label>
                <input type="text" class="form-control"  name='customername' placeholder="ie. Prakash sahu"
                    required>
            </div>
            <div class="col-sm-4 m-auto">
                <label  class="form-label">Customer Mobile</label>
                <input type="text" class="form-control"  name='customercontact' placeholder="Mobile no."
                    required>
            </div>
            <div class="col-sm-4 m-auto">
                <label  class="form-label">Customer Email</label>
                <input type="text" class="form-control"  name='customeremail' placeholder="abc@gmail.com"
                    required>
            </div>
        </fieldset>
        <br>
        <br>
			<div class="card">
				<div class="card-header">Enter Product Details</div>
				<div class="card-body">

					
						<div class="table-repsonsive">
							<span id="error"></span>
							<table class="table table-bordered" id="product_table">
								<thead>
								<tr class="bg-success">
									<th class=" text-center text-white">Product Name</th>
									<th class=" text-center text-white"> Quantity</th>
									<th class=" text-center text-white">Price</th>
                                    <th class=" text-center text-white">Total</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<select onChange="dynamic_info()" name="productname" id="productname" class="form-control selectpicker" data-live-search="true"  >
												<option selected>Select product </option>
											<?php 
											$query=mysqli_query($con,"select id,productname,price from products where vendorid=$vendor_id");
											while($row=mysqli_fetch_array($query)) {
										echo "<option value='$row[0]'>$row[1]</option>";
											}

											?>
										</select>
									</td>
									<td>
										<input  type="number" value=1 min=1  id="productquantity" name="productquantity" required>
									</td>
									<td id="productprice">
										
										
										<input type="number" readonly id="productprice1" name="productprice" required>
									</td>
									<td id ="total">
										<input type="number" readonly   id="total1" name="totalamount" required>
									</td>
									</tr>
								</tbody>
							</table>
							<div align="center">
								<input type="submit" name="submit" id="submit_button" class="btn btn-outline-success " onclick='window.print()' value="Print" />
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
</body>
</html>

