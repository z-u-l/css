<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Terperinci Mengenai Buku</title>

    <style>
        .book-details {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Keterangan Buku</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>

        <div class="book-details">
            <?php
            include("connect.php");
            $id = $_GET['id'];

            if ($id) {
                $sql = "SELECT * FROM rekod_buku WHERE id = $id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <h3>Tajuk Buku:</h3>
                        <p><?php echo $row["tajukBuku"]; ?></p>

                        <h3>Keterangan:</h3>
                        <p><?php echo $row["keterangan"]; ?></p>

                        <h3>Pengarang:</h3>
                        <p><?php echo $row["pengarang"]; ?></p>

                        <h3>Jenis Buku:</h3>
                        <p><?php echo $row["jenisBuku"]; ?></p>
                        <?php
                    }
                } else {
                    echo "<h3>Buku tidak dijumpai.</h3>";
                }
            } else {
                echo "<h3>Tiada buku dijumpai.</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
