<?php
    $con=mysqli_connect("localhost","root","","dbmsProject");
    $rollNo=$_POST["rollNo"];
    $studentName=$_POST["studentName"];
    $dept=$_POST["dept"];
    $toc=$_POST["toc"];
    $dbms=$_POST["dbms"];
    $algo=$_POST["algo"];
    $networks=$_POST["networks"];
    $sql="UPDATE student SET studentName='$studentName',dept='$dept',toc='$toc',dbms='$dbms',algo='$algo',networks='$networks' WHERE rollNo='$rollNo'";
    mysqli_query($con,$sql);
    echo "Updated Successfully";

?>