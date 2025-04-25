<?php session_start(); include('db.php');
if (!isset($_SESSION['user_id'])) die("يرجى تسجيل الدخول أولًا.");
?>
<h1>مرحبا بك في محفظتك</h1>
<a href="transfer.php">تحويل الأموال</a>
<a href="transactions.php">عرض العمليات</a>
<a href="logout.php">تسجيل الخروج</a>