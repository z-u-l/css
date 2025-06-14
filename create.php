<?php
// Disediakan oleh: Muhamad Zulhilmi Bin Zulkifli
// Tarikh: 12 Jun 2025
// Tujuan: Tambah Buku Baru

session_start();
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <style>
        /* CSS simple dan konsisten dengan halaman lain */
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
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        header h1 {
            font-size: 24px;
            margin: 0;
        }
        a.btn {
            padding: 8px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        a.btn:hover {
            background: #0056b3;
        }
        form {
            max-width: 800px;
            margin: auto;
        }
        .form-element {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }
        .form-element label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .form-element input, 
        .form-element select, 
        .form-element textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-element textarea {
            resize: vertical;
            min-height: 100px;
        }
        input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        @media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            a.btn {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Tambah Buku Baru</h1>
            <div>
                <a href="index.php" class="btn">Kembali</a>
            </div>
        </header>

        <form action="process.php" method="post">
            <div class="form-element">
                <label for="tajukBuku">Tajuk Buku:</label>
                <input type="text" id="tajukBuku" name="tajukBuku" required>
            </div>

            <div class="form-element">
                <label for="pengarang">Pengarang:</label>
                <input type="text" id="pengarang" name="pengarang">
            </div>

            <div class="form-element">
                <label for="jenisBuku">Jenis Buku:</label>
                <select id="jenisBuku" name="jenisBuku" required>
                    <option value="">-- Pilih jenis buku --</option>
                    <option value="Pendidikan Islam">Pendidikan Islam</option>
                    <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                    <option value="Pengembaraan">Pengembaraan</option>
                    <option value="Fiksyen">Fiksyen</option>
                </select>
            </div>

            <div class="form-element">
                <label for="keterangan">Keterangan:</label>
                <textarea id="keterangan" name="keterangan" required></textarea>
            </div>

            <div class="form-element">
                <input type="submit" name="create" value="Tambah Buku">
            </div>
        </form>
    </div>

</body>
</html>
