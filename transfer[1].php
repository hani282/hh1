<?php session_start(); include('db.php');
if (!isset($_SESSION['user_id'])) die("يرجى تسجيل الدخول أولًا.");
$fee = floatval(file_get_contents("fee.txt"));
?>
<form method="post">
  <input type="text" name="to" placeholder="اسم المستلم" required>
  <input type="number" name="amount" placeholder="المبلغ" step="0.01" required>
  <button type="submit">تحويل</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from = $_SESSION['user_id'];
    $to = $_POST['to'];
    $amount = floatval($_POST['amount']);
    $total = $amount + $fee;
    $stmt = $conn->prepare("INSERT INTO transactions (sender, receiver, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $from, $to, $total);
    $stmt->execute();
    echo "تم التحويل بنجاح برسوم $fee";
}
?>