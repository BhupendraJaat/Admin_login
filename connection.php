<?php

$conn = mysqli_connect("localhost", "root", "", "admintest");

if (mysqli_connect_error()) {
    echo "can not connect to db";
    exit();
}

?>