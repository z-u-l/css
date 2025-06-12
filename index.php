<?php include 'config.php'; ?>

<h2>Senarai Pengguna</h2>
<a href="create.php">➕ Tambah</a>
<table border="1" cellpadding="5" cellspacing="0">
<tr><th>ID</th><th>Nama</th><th>Email</th><th>Tarikh</th><th>Tindakan</th></tr>

<?php
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");

while ($row = $result->fetch_assoc()):
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['created_at'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Padam data ini?')">Padam</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
