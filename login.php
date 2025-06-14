<?php
session_start();
include 'connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple authentication
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Nama pengguna atau kata laluan salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f0f0; }
        .container { width: 300px; margin: 100px auto; background: white; padding: 20px; border-radius: 5px; }
        h2 { text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        .btn { background: #007bff; color: white; padding: 10px; border: none; cursor: pointer; width: 100%; }
        .btn:hover { background: #0056b3; }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Nama Pengguna" required>
            <input type="password" name="password" placeholder="Kata Laluan" required>
            <button type="submit" name="login" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
