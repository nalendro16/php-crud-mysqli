<?php
require_once 'Connection.php';
require_once 'Motor.php';

$database = new Database();
$db = $database->getConnection();
$motor = new MotorYamaha($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID tidak ditemukan.');
$data_saat_ini = $motor->getById($id);
if(!$data_saat_ini) {
    die("Error: Data motor tidak ditemukan di database.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipe = $_POST['tipe_motor'];
    $warna = $_POST['warna'];
    $cc = $_POST['cc_mesin'];

    if ($motor->update($id, $tipe, $warna, $cc)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Stok Motor</title>
    <style>
        * { box-sizing: border-box; font-family: sans-serif; }
        body { background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-container { background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 450px; }
        .form-container h2 { text-align: center; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .button-group { display: flex; gap: 15px; margin-top: 20px; }
        .btn { flex: 1; padding: 10px; border: none; border-radius: 5px; cursor: pointer; text-align: center; text-decoration: none; color: white; font-weight: bold; }
        .btn-submit { background-color: #28a745; }
        .btn-cancel { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Motor</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Tipe Motor</label>
                <input type="text" name="tipe_motor" value="<?php echo $data_saat_ini['tipe_motor']; ?>" required>
            </div>

            <div class="form-group">
                <label>Warna</label>
                <input type="text" name="warna" value="<?php echo $data_saat_ini['warna']; ?>" required>
            </div>

            <div class="form-group">
                <label>Kapasitas Mesin (CC)</label>
                <input type="number" name="cc_mesin" value="<?php echo $data_saat_ini['cc_mesin']; ?>" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">Update Data</button>
                <a href="index.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>