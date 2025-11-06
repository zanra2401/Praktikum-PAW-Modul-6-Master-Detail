<?php

function getData($conn, $sql) {
    $query = mysqli_query($conn, $sql);

    $hasil = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $hasil[] = $row;
    }

    if (count($hasil) == 1) {
        return $hasil[0];
    }

    return $hasil;
}