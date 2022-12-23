<?php
            session_start();
            
                    $link=mysqli_connect("localhost","root","","easybill");
                    $vid=$_POST["vendor"];
                    $pd=$_POST["pd"];
                    if($vid!="")
                     {
                    $res=mysqli_query($link,"select price from products where id=$vid and productname=$pd");
                    $row=mysqli_fetch_array($res);
                    echo "<input type='number'    value=$row[0] id='total1'>";
                }
?>