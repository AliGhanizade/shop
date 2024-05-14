<?php require "../controller/login.ctl.php"; ?>
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
    <form method=post>
      <div class="input-box">
      <input name=user type="text" placeholder="" required value="<?=htmlentities($logins["user"]??'')?>">
        <label>نام کاربری</label>
      </div>
      <div> <label class="danger"><?=$error["user"]??''?></label> </div>
      <div class="input-box">
      <input name=pass type="password" placeholder="" required value="<?=htmlentities($logins["pass"]??'')?>">
        <label>رمز</label>
      </div>
    <div> <label class="danger"><?=$error["pass"]??''?></label> </div>
      <button type="submit" class="btn">ورود</button>
      <div class="signup-link">
        <a href="sign-up.php">ساخت حساب</a>
      </div>
    </form>
  </div>

  
</body>
</html>
