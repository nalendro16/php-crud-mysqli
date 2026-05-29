<?php
require_once 'Connection.php';
require_once 'Motor.php';

$database = new Database();
$db = $database->getConnection();
$motor = new MotorYamaha($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipe = $_POST['tipe_motor'];
    $warna = $_POST['warna'];
    $cc = $_POST['cc_mesin'];

    if ($motor->create($tipe, $warna, $cc)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Wah, gagal menambah data motor nih.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Motor</title>
    <style>
        
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .form-container h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
        }

        
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Motor Baru</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Tipe Motor</label>
                <input type="text" name="tipe_motor" placeholder="Contoh: NMAX" required>
            </div>

            <div class="form-group">
                <label>Warna</label>
                <input type="text" name="warna" placeholder="Contoh: Hitam" required>
            </div>

            <div class="form-group">
                <label>Kapasitas Mesin (CC)</label>
                <input type="number" name="cc_mesin" placeholder="Contoh: 155" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">Simpan</button>
                <a href="index.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>