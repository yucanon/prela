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

<?php
session_start();

// logout.php?logoutにアクセスしたユーザーをログアウトする
if(isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("Location: index.php");
} else {
  header("Location: index.php");
}
?>

</body>

