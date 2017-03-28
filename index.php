<DOCTYPE html>
<html lang="ja">
<head>
<title>Prela</title>
<meta charset="utf-8">
<link rel="stylesheet" href="view/css/font-awesome.css">
<link rel="stylesheet" href="./view/css/normalize.css">
<link rel="stylesheet" href="./view/css/common_top.css">
<link rel="stylesheet" href="./view/css-search/common-search.css">
<link rel="stylesheet" type="text/css" href="./view/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="./view/css/slick-theme.css"/>
<link rel="stylesheet" href="./view/css/index.css">
<link rel="stylesheet" href="./view/css/normalize.css">
<link href="view/css/bootstrap.min.css" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./view/js/jquery-1.11.3.min.js"></script>
<script src="./view/lib/placeholders.min.js"></script>
<script src="./view/js/slick/slick.js"></script>
<script src="./view/js/login.js"></script>
<script src="./view/js/effect.js"></script>
<script src="./view/js/jquery.lightbox_me.js"></script>

</head>

<body id="top">

<?php
session_start();
require_once("db.php");

if(isset($_POST['login'])) {

  $real_name = $mysqli->real_escape_string($_POST['real_name']);
  $mail = $mysqli->real_escape_string($_POST['mail']);
  $password = $mysqli->real_escape_string($_POST['password']);

  $query= "SELECT * FROM users WHERE mail='$mail'";
  $result=$mysqli->query($query);
  if(!$result){
    print("ログインが失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }
  while($row=$result->fetch_assoc()){
    $hashed_pass=$row['password'];
    $id=$row['id'];
  }
  $result->close();

  if(password_verify($password, $hashed_pass)){
    $_SESSION['id'] = $id;
    header("Location: index.php");
    exit();
  }else { ?>
    <div class="alert alert-danger" role="alert">メールアドレスとパスワードが一致しません。</div>
  <?php
  header("Location: index.php");
}
}
?>


<?php include('header_top.php'); ?>

<section class="header">
<img src="view/images/toplady.jpg" id="mainvisual" width="100%" height="800px">

<div class="buttons">
<a class="button button_sp" href="search.php"><span class="click_sp">検索画面</span></a>
<div class="button button-showy button_sp" onClick="login();">
<input type="submit" id="login" name="login" value="ログイン">
</div>
</div>

</section>

<section class="about" id="concept">
<p class="heading" style="font-size:50px; margin-top:200px;">Prelaとは</p>
<p class="about-text" style="font-size:25px;">
女子学生が自分の働き方を体現する<br>
女性の社会人のロールモデルと出会い、<br>
女子学生が自分の将来を考えるきっかけを作るためのアプリ
</p>
</section>

<section class="about" id="step">
<p class="heading" style="font-size:50px; margin-bottom:100px; margin-top:200px;">使い方</p>
<image src="view/images/waytouse.jpg" width="90%">
</section>

<section class="about" id="step">
<p class="heading" style="font-size:50px; margin-bottom:100px; margin-top:200px;">企業掲載</p>
<br>
<image src="view/images/pluscolor.png" heught="100px" width="30%" style="margin-right:30px;">
<image src="view/images/circulation.jpg" height="100px" width="30%">
</section>

<footer id="footer_pc" style="background-color:#FF236B;">
<div class="row">
<div class="col-lg-12">
<ul class="footer-word">
<li><a href="#">サービス</a></li>
<li><a href="#concept">prelaとは</a></li>
<li><a href="#step">使い方</a></li>
</ul>

<div class="sns">
<a href="https://twitter.com/prela_funish">
<i class="fa fa-twitter" aria-hidden="true"></i>
</a>
</div>
<p class="copyright">All Rights Reserved by Prela</p>
</div>
</div>
</footer>

</body></html>

