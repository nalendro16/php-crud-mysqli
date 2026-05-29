<?php
require_once 'Connection.php';
require_once 'Motor.php';


$database = new Database();
$db = $database->getConnection();
$motor = new MotorYamaha($db);
$stmt = $motor->read();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stok Motor Yamaha</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        
        .btn-add {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .btn-add:hover { background-color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

    <h2>Daftar Stok Motor Yamaha</h2>
    
    <a href="add.php" class="btn-add">+ Tambah Data Baru</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipe Motor</th>
                <th>Warna</th>
                <th>Kapasitas Mesin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['tipe_motor'] . "</td>";
                    echo "<td>" . $row['warna'] . "</td>";
                    echo "<td>" . $row['cc_mesin'] . " cc</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn-action btn-edit'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn-action btn-delete' onclick=\"return confirm('Yakin mau hapus data ini?');\">Delete</a>
                          </td>";
                    echo "</tr>";

                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>Belum ada data motor di database.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>