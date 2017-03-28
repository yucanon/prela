<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="uftf-8">
<title>新規登録画面</title>
<link href="view/css/sanitize.css" rel="stylesheet">
<link href="view/css/bootstrap.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="view/css/font-awesome.css">
<link href="view/css/common.css" rel="stylesheet">
<link href="view/css/sign_up.css" rel="stylesheet">
<link href="./view/css-search/common-search.css" rel="stylesheet">
<script src="view/js/vendor/jquery-1.10.2.min.js"></script>

</head>
<body>


<?php include('header.php'); ?>

<div class="container">
<h1>新規登録フォーム</h1>
<div class="row">
<div class="col-sm-12">
<form action="sign_up_confirm.php" method="post" class="form-horizonal">
<div class="form-group">
<label for="input-name" class="col-sm-2 control-label">お名前</label>
<div class="col-sm-10">
<input type="text" name="real_name" id="real_name" placeholder="お名前" required="required" class="form-control">
</div></div>

<div class="form-group">
<label for="input-name" class="col-sm-2 control-label">メール</label>
<div class="col-sm-10">
<input type="text" name="mail" placeholder="メールアドレス" class="form-control" id="mail" required="required">
</div></div>

<div class="form-group">
<label for="input-message" class="col-sm-2 control-label">パスワード</label>
<div class="col-sm-10">
<input type="password" name="password" placeholder="パスワード" class="form-control" id="input-password" rows="10" cols="10">
</div></div>

<div class="form-group">
<label for="input-message" class="col-sm-2 control-label">学生or社会人</label>
<div class="col-sm-10" class="form-control">
<input type="radio" name="stuorworker" value="学生">学生
<input type="radio" name="stuorworker" value="社会人">社会人
</div></div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-default signup-margin" value="送信">
</div></div>
</form></div></div></div></body></html>




