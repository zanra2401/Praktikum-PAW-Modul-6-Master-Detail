<?php 
    require_once "./core/conn.php";
    require_once "./include/helper/helper.php";
    $active = "supplier";

    $id = $_GET["id"];

    $supplier = getData($conn, "SELECT * FROM supplier WHERE id = $id");
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
        <form action="./proses/supplier/update.php" method="POST">

                <div class="row g-3">

                    <input type="hidden" id="id" name="id" value=<?= isset($_GET["id"]) ? $_GET["id"] : "" ?> >

                    <div class="col-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input style="border: 1px solid rgb(206, 212, 218);" type="text" name="nama" value="<?= $supplier["nama"] ?>" class="form-control" id="nama"
                        required>
                    </div>
                    <div class="col-6">
                        <label for="nama" class="form-label">Telp</label>
                        <input style="border: 1px solid rgb(206, 212, 218);" type="text" name="telp" value="<?= $supplier["telp"] ?>" class="form-control" id="telp"
                        required>
                    </div>
                    <div class="col-12">
                        <label for="nama" class="form-label">Telp</label>
                        <textarea class="form-control" style="border: 1px solid rgb(206, 212, 218);" name="alamat" id="alamat"><?= $supplier["alamat"] ?></textarea>
                    </div>
                </div>

                <div style="width: 100%; display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                    <a type="button" class="btn btn-danger" href=<?= isset($pelanggan) ? "/MasterDetail/proses/transaksi/delete.php?delete=true&id={$_GET["id"]}" : "#" ?>>
                        Hapus
                    </a>
                    <a type="button" class="btn btn-secondary" href="/MasterDetail/supplier.php">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
            </form>
    </div>
</body>
</html>