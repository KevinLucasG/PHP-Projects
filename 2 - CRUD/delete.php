<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servename = "localhost";
    $username = "root";
    $password = "password";
    $database = "myshop";

    //Create connection
    $conn = new mysqli($servename, $username, $password, $database);
    $sql = "DELETE FROM clients WHERE id=$id";
    $conn->query($sql);
}

header("location: index.php");
exit;
