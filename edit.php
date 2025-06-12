<?php include 'config.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$data = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);
    $stmt->execute();

    echo "Data dikemaskini! <a href='index.php'>Kembali</a>";
    exit;
}
?>

<h2>Edit Pengguna</h2>
<form method="POST">
    Nama: <input type="text" name="name" value="<?= $data['name'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>" required><br>
    <button type="submit" name="update">Kemaskini</button>
</form>
