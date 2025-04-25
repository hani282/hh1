<?php include('db.php'); ?>
<form method="post">
  <input type="text" name="username" placeholder="اسم المستخدم" required>
  <input type="password" name="password" placeholder="كلمة المرور" required>
  <button type="submit">تسجيل</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    echo "تم التسجيل بنجاح";
}
?>