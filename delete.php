<?php
require_once 'Connection.php';
require_once 'Motor.php';

$database = new Database();
$db = $database->getConnection();
$motor = new MotorYamaha($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
   if ($motor->delete($id)) {
         header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data motor.";
    }
} else {
    
    header("Location: index.php");
    exit;
}
?>