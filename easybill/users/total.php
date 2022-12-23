<?php
            session_start();
            
                    $pq=$_POST["pq"];
                    $pr=$_POST["pr"];
                        $total=$pq * $pr;
                        echo "<input type='number' readonly name='totalamount'  value=$total id='total1'>";
                    
?>