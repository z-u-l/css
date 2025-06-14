<?php
// Disediakan oleh: Muhamad Zulhilmi Bin Zulkifli
// Tarikh: 12 Jun 2025
// Tujuan: Paparan senarai buku

session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Buku</title>
    <style>
        /* Disediakan oleh: Muhamad Zulhilmi Bin Zulkifli */
        /* Tarikh: 12 Jun 2025 */
        /* Styling asas dan responsif ringkas */

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        #button {
            padding: 8px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        #button:hover {
            background: #0056b3;
        }

        .alert {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        table th {
            background: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            color: #fff;
            margin: 0 2px;
            display: inline-block;
            font-size: 13px;
        }

        .btn-info { background: #17a2b8; }
        .btn-warning { background: #ffc107; color: #000; }
        .btn-danger { background: #dc3545; }

        .btn:hover {
            opacity: 0.8;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            #button {
                margin-top: 10px;
            }

            table th, table td {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Senarai Buku</h1>
        <a href="create.php" id="button">Tambah Buku</a>
    </header>

    <?php
    if (isset($_SESSION["create"])) {
        echo '<div class="alert">'.$_SESSION["create"].'</div>';
        unset($_SESSION["create"]);
    }

    if (isset($_SESSION["update"])) {
        echo '<div class="alert">'.$_SESSION["update"].'</div>';
        unset($_SESSION["update"]);
    }

    if (isset($_SESSION["delete"])) {
        echo '<div class="alert">'.$_SESSION["delete"].'</div>';
        unset($_SESSION["delete"]);
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tajuk Buku</th>
                <th>Pengarang</th>
                <th>Jenis</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM rekod_buku";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['tajukBuku']."</td>";
                echo "<td>".$row['pengarang']."</td>";
                echo "<td>".$row['jenisBuku']."</td>";
                echo "<td>";
                echo "<a href='view.php?id=".$row['id']."' class='btn btn-info'>Lihat</a>";
                echo "<a href='edit.php?id=".$row['id']."' class='btn btn-warning'>Edit</a>";
                echo "<a href='delete.php?id=".$row['id']."' class='btn btn-danger' onclick='return confirm(\"Anda pasti nak padam?\")'>Padam</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
