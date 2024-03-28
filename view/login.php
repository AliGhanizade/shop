<?php require "../login.php"; ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ورود</title>
  <link rel="stylesheet" href="styleforlogin.css">

</head>
<body dir="rtl">

<div class="container">
  <div class="login-box">
    <h2>ورود</h2>
    <form action="#">
      <div class="input-box">
        <input type="text" required>
        <label>نام کاربری</label>
      </div>
      <div class="input-box">
        <input type="password" required>
        <label>رمز</label>
      </div>
    <div>
      <label class="danger">پسورد درست نیست</label>
    </div>
      <button type="submit" class="btn">ورود</button>
      <div class="signup-link">
        <a href="sign-up.html">ساخت حساب</a>
      </div>
    </form>
  </div>

  
</body>
</html>
