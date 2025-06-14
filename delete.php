<?php
session_start();
include 'connect.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM rekod_buku WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['delete'] = "Buku berjaya dipadam.";
} else {
    $_SESSION['delete'] = "Gagal memadam buku.";
}

header("Location: index.php");
exit();
?>
