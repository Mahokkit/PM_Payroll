<?php
function getDbConnection() {
    $conn = mysqli_connect("localhost", "root", "root", "payroll");
    if(!$conn)
    {
        die("Unable to connect to database: " . mysqli_connect_error());
    }

    return $conn;
}

function setDbDisconnection($conn){
    mysqli_close($conn);
}