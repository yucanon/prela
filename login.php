<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="uftf-8">
<title>ログイン</title>
<link href="view/css/sanitize.css" rel="stylesheet">
<link href="view/css/bootstrap.min.css" rel="stylesheet">  
<link rel="stylesheet" href="view/css/font-awesome.css">
<link href="view/css/common.css" rel="stylesheet">
<link href="view/css/sign_up.css" rel="stylesheet">
<script src="view/js/vendor/jquery-1.10.2.min.js"></script>

</head>
<body>

<div id="sign_up">
<h3 class="login">ログイン</h3>
<form id="loginForm" name="loginForm" action="index.php" method="post">
<div class="form-group">
    <input type="mail"  class="form-control" name="mail" placeholder="メールアドレス" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="パスワード" required>
  </div>
  <button type="submit" class="btn btn-default" name="login">ログインする</button>
</form>
</div>



<br><br><br>
<h4>ログイン後について</h4>
<div class="explanation">
<p>ログイン成功されると、トップページにリダイレクトし、マイページを閲覧できるようになります。</p>
<p>失敗されると、再び同じ画面に戻ります</p>
</div>

</body>

