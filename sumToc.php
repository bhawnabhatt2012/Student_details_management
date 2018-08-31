<?php
    $con=mysqli_connect("localhost","root","","dbmsProject");
    $sql="Select SUM(toc) FROM student";
    $query=mysqli_query($con,$sql);
    $data=mysqli_fetch_array($query);
    echo $data[0]; 

?>