<?php
    require_once "./core/conn.php";
    require_once "./include/helper/helper.php";

    $sql = "SELECT * FROM barang WHERE supplier_id = {$supplier['id']}";
    $barang = getData($conn, $sql);
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama Barang</th>
            <th scope="col">harga</th>
            <th scope="col">stok</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang as $b): ?>
            <tr>
                <td><?= $b["nama_barang"] ?></td>
                <td><?= $b["harga"] ?></td>
                <td><?= $b["stok"] ?></td>
                <td>
                    <a href="/MasterDetail/proses/supplier/hapus_barang.php?id=<?= $b['id'] ?>" class="btn btn-danger">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>