<?php
    $con=mysqli_connect("localhost","root","","dbmsProject");
    $rollNo=$_POST["rollNo"];
    $studentName=$_POST["studentName"];
    $dept=$_POST["dept"];
    $toc=$_POST["toc"];
    $dbms=$_POST["dbms"];
    $algo=$_POST["algo"];
    $networks=$_POST["networks"];
    $sql="insert into student (rollNo,studentName,dept,toc,dbms,algo,networks) values ('$rollNo','$studentName','$dept','$toc','$dbms','$algo','$networks')";
    mysqli_query($con,$sql);
    echo "Success";

?>