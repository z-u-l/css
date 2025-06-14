<?php
include('connect.php');
if (isset($_POST["create"])) {
    $tajukBuku = mysqli_real_escape_string($conn, $_POST["tajukBuku"]);
    $jenisBuku = mysqli_real_escape_string($conn, $_POST["jenisBuku"]);
    $pengarang = mysqli_real_escape_string($conn, $_POST["pengarang"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);

    $sqlInsert = "INSERT INTO rekod_buku(tajukBuku, pengarang, jenisBuku, keterangan) VALUES ('$tajukBuku', '$pengarang', '$jenisBuku', '$keterangan')";
    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "Buku berjaya ditambah!";
        header("Location:index.php");
    } else {
        die("Terdapat masalah.");
    }
}

if (isset($_POST["edit"])) {
    $tajukBuku = mysqli_real_escape_string($conn, $_POST["tajukBuku"]);
    $jenisBuku = mysqli_real_escape_string($conn, $_POST["jenisBuku"]);
    $pengarang = mysqli_real_escape_string($conn, $_POST["pengarang"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
    $sqlUpdate = "UPDATE rekod_buku SET tajukBuku = '$tajukBuku', jenisBuku = '$jenisBuku', pengarang = '$pengarang', keterangan = '$keterangan' WHERE id = '$id'";
    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Buku berjaya dikemas kini!";
        header("Location:index.php");
    } else {
        die("Terdapat masalah.");
    }
}
?>