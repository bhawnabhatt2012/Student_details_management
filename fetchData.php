<?php
    $con=mysqli_connect("localhost","root","","dbmsProject");
    $sql="select * from student";
    $result=mysqli_query($con,$sql);
    $count= mysqli_num_rows($result);
    $a=array();
    $b=array();
    $c=array();
    for($i=0;$i<$count;$i++)
    {
     $data=mysqli_fetch_array($result);
     for($j=0;$j<7;$j++)
     {
        $b=array($data[$j]); 
        $c=array_merge($c,$b);
        $b=array();
     }        
     $a=array_merge($a,$c);
     $c=array();     
    }
    $response=json_encode($a);
    echo $response;
?>