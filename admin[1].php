<?php
session_start();
$password = 'admin123';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['pass'] === $password) $_SESSION['admin'] = true;
  elseif (isset($_SESSION['admin']) && isset($_POST['fee'])) {
    file_put_contents("fee.txt", $_POST['fee']);
  }
}
?>
<?php if (!isset($_SESSION['admin'])): ?>
<form method="post"><input type="password" name="pass" placeholder="كلمة مرور المدير"><button>دخول</button></form>
<?php else: ?>
<form method="post"><input type="text" name="fee" placeholder="رسوم التحويل الجديدة"><button>تحديث</button></form>
<a href="transactions.php">سجل العمليات</a>
<?php endif; ?>