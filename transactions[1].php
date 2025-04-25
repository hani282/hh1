<?php session_start(); include('db.php');
if (!isset($_SESSION['user_id'])) die("يرجى تسجيل الدخول.");
$id = $_SESSION['user_id'];
$res = $conn->query("SELECT * FROM transactions WHERE sender = $id ORDER BY created_at DESC");
while ($row = $res->fetch_assoc()) {
    echo "إلى: {$row['receiver']} - المبلغ: {$row['amount']} - في: {$row['created_at']}<br>";
}
?>