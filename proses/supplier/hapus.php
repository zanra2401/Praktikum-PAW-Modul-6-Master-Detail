<?php

require_once "../../core/conn.php";
require_once "../../include/helper/helper.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "DELETE FROM supplier WHERE id = $id";

    try {
        mysqli_query($conn, $sql);
        header("Location: /MasterDetail/supplier.php");
    } catch (Exception $err) {
        header("Location: /MasterDetail/supplier.php");
    }

}