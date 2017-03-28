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
  $stuorworker = $mysqli->real_escape_string($_POST['stuorworker']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  // POSTされた情報をDBに格納する
  $query = "INSERT INTO users(real_name, mail, password, stuorworker) VALUES('$real_name','$mail','$password', '$stuorworker')";

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
<h1 style="margin-left:-10px;">新規会員登録申請完了</h1>
<br>
<p>登録申請ありがとうございました。</p>
<p><a href="search.php">早速相手を探してみましょう！</a></p>
<p><a href="index.php">ログインしてマイページでプロフィールの詳細を設定しましょう！</a></p>
<a href="index.php" class="btn btn-default btn_top" style="margin-left:-1px;">戻る</a>

</div></div></body></html>




