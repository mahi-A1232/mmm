<?php
    $dbserverName="localhost";
    $dbuserName="root";
    $dbpassword="";
    $dbName="mahi";
    $conn=mysqli_connect($dbserverName,$dbuserName,$dbpassword,$dbName);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $bdgp=mysqli_real_escape_string($conn,$_POST['bloodgroup']);
    $phno=mysqli_real_escape_string($conn,$_POST['phno']);

    echo $name."<br>";
    echo $bdgp."<br>";
    echo $phno."<br>";


    $sql="INSERT INTO cse(name,bdgp,phno) values(?,?,?);";

    //create a prepared statement
    $stmt=mysqli_stmt_init($conn);
    //prepare the prepared statement
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Connection error";
    }else{
        mysqli_stmt_bind_param($stmt,"ssi",$name,$bdgp,$phno);
        mysqli_stmt_execute($stmt);
    }
?>