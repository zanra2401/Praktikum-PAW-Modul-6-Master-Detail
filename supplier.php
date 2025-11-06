<?php 
    require_once "./core/conn.php";
    require_once "./include/helper/helper.php";
    $active = "supplier";
    $supplier = getData($conn, "SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <script defer src="./package/jquery/jquery.js"></script>
    <script defer src="./js/sidebar.js"></script>
    <script defer src="./js/main.js"></script>
    <link rel="stylesheet" href="./package/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/pelanggan.css">
    <link rel="stylesheet" href="./css/main.css">
    <script defer src="./package/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <?php if (isset($_SESSION["notif"])): ?>
        <?php
             require_once "include/notif/notif.php";
             unset($_SESSION["notif"]);
        ?>
    <?php endif; ?>

    <div class="wrapper d-flex align-items-stretch" style="overflow: hidden;">        
    <?php require_once __DIR__ . "/include/sidebar.php" ?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5" style="overflow: auto; height: 100vh;">
        <div style="margin-bottom: 20px;">
            <a href="" class="btn btn-primary">Tambah Data</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplier as $s): ?>
                    <tr>
                        <td><?= $s["nama"] ?></td>
                        <td><?= $s["telp"] ?></td>
                        <td><?= substr($s["alamat"], 0, 20) ?></td>
                        <td>
                            <a href="/MasterDetail/supplier_detail.php?id=<?= $s['id'] ?>" class="btn btn-primary">
                                Detail
                            </a>
                            <a href="/MasterDetail/proses/supplier/hapus.php?id=<?= $s['id'] ?>" class="btn btn-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>