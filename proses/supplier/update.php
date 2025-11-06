<?php

require_once "../../core/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];

    try {
        $sql = "UPDATE supplier 
        SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE id = $id";
        mysqli_query($conn, $sql);
        header("Location: /MasterDetail/supplier_detail.php?id=$id");
    } catch(Exception $err) {
        header("Location: /MasterDetail/supplier_detail.php?id=$id");
    }


}