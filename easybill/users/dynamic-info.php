<?php
            session_start();
            
                    $link=mysqli_connect("localhost","root","","easybill");
                    $pid=$_GET["pid"];
                    if($pid!="")
                     {
                    $res=mysqli_query($link,"select price from products where id=$pid");
                    $row=mysqli_fetch_array($res);
                echo "<input type='number' readonly name='productprice' id='productprice1' value='$row[0]' name='productprice'>";
                }
?>