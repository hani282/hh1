<?php session_start(); include('db.php'); ?>
<form method="post">
  <input type="text" name="username" placeholder="اسم المستخدم" required>
  <input type="password" name="password" placeholder="كلمة المرور" required>
  <button type="submit">دخول</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed);
        $stmt->fetch();
        if (password_verify($pass, $hashed)) {
            $_SESSION['user_id'] = $id;
            header("Location: wallet.php");
        } else echo "كلمة المرور غير صحيحة";
    } else echo "المستخدم غير موجود";
}
?>