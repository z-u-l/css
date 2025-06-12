<?php include 'config.php'; ?>

<h2>Tambah Pengguna Baru</h2>
<form method="POST">
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit" name="submit">Simpan</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();

    echo "Pengguna berjaya ditambah! <a href='index.php'>Lihat Senarai</a>";
}
?>
