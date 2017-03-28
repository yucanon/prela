<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="uftf-8">
<title>新規登録確認画面</title>
<link href="view/css/sanitize.css" rel="stylesheet">
<link href="view/css/bootstrap.min.css" rel="stylesheet">  
<link rel="stylesheet" href="view/css/font-awesome.css">
<link href="view/css/common.css" rel="stylesheet">
<link href="view/css/sign_up.css" rel="stylesheet">
<link href="./view/css-search/common-search.css" rel="stylesheet">
<script src="view/js/vendor/jquery-1.10.2.min.js"></script>

</head>
<body>

<?php

session_start();

require_once("db.php");

if(isset($_POST['signup'])) {

  $real_name = $mysqli->real_escape_string($_POST['real_name']);
  $mail = $mysqli->real_escape_string($_POST['mail']);
  $password = $mysqli->real_escape_string($_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  // POSTされた情報をDBに格納する
  $query = "INSERT INTO users(real_name, mail, password) VALUES('$real_name','$mail','$password')";

  if($mysqli->query($query)){  
    ?>
    <div class="alert alert-success" role="alert">登録しました</div>
    <?php }else{ 
      ?>
    <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    <?php
  }
}
?>

<?php include("header.php"); ?>

<div id="page">
<div class="container">
<h1>新規会員登録確認画面</h1>
<div class="row">
<div class="col-sm-12">
<form action="sign_up_finished.php" class="form-horizontal" method="post">
<div class="form-group">
<label for="input-name" class="col-sm-2 control-label">お名前</label>
<div class="col-sm-10"><p><?php echo htmlspecialchars($_POST["real_name"], ENT_QUOTES);?></p><input type="hidden" name="real_name" value="<?php echo htmlspecialchars($_POST["real_name"], ENT_QUOTES);?>">
</div></div>

<div class="form-group">
<label for="input-name" class="col-sm-2 control-label">メールアドレス</label>
<div class="col-sm-10"><p><?php echo htmlspecialchars($_POST["mail"], ENT_QUOTES);?></p><input type="hidden" name="mail" value="<?php echo htmlspecialchars($_POST["mail"], ENT_QUOTES);?>">
</div></div>

<div class="form-group">
<label for="input-name" class="col-sm-2 control-label">パスワード</label>
<div class="col-sm-10"><p><?php echo htmlspecialchars($_POST["password"], ENT_QUOTES);?></p><input type="hidden" name="password" value="<?php echo htmlspecialchars($_POST["password"], ENT_QUOTES);?>">
</div></div>

<div class="form-group">
<label for="input-name" class="col-sm-2 control-label">学生または社会人選択</label>
<div class="col-sm-10"><p><?php echo htmlspecialchars($_POST["stuorworker"], ENT_QUOTES);?></p><input type="hidden" name="stuorworker" value="<?php echo htmlspecialchars($_POST["stuorworker"], ENT_QUOTES);?>">
</div></div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" name="signup" class="btn btn-default" value="登録する">
<a href="sign_up.php" class="btn btn-default">戻る</a>
</div></div></form>
</div></div></div>




