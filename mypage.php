<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>マイページ</title>
<link href="view/css/sanitize.css" rel="stylesheet">
<link href="view/css/bootstrap.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="./view/css/font-awesome.css">
<link href="view/css/common.css" rel="stylesheet">
<link href="view/css/mypage.css" rel="stylesheet">
<link href="./view/css-search/common-search.css" rel="stylesheet">

<script src="./view/js/vendor/jquery-1.10.2.min.js"></script>
<script src="./view/js/jquery.js"></script>
    <script>
        $(function () {
            var $tabMenu = $('.tab-menu').children();
            var $tabContent = $('.tab-content').children();
            var activeClass = 'active';

            $tabMenu.first().addClass(activeClass);
            $tabContent.not(':first').hide();

            $tabMenu.on('click keydown', function (e) {
                var index = $(this).index();
                if ($(this).hasClass(activeClass) || e.keyCode === 9) {
                    return;
                }
                $tabMenu.removeClass(activeClass);
                $(this).addClass(activeClass);
                $tabContent.hide().eq(index).fadeIn();
            });
        });
    </script>
<script>
<?php
function h($str){
	echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
</script>

</head>
<body>

<?php include("header.php"); ?>

<br><br><br>

<div class="container">
<div class="row" style="margin-left:-90px;">
<div class="col-md-3">
<div class="list-group">
<a href="mypage.php" class="list-group-item active">予約確認</a>
<a href="profile_edit.php" class="list-group-item">プロフィール編集</a>
<a href="messages.php" class="list-group-item">メッセージ</a>
</div>
</div>

<div class="col-md-9">
<ul class="tab-menu">
<li tabindex="0">承認待ち</li>
<li tabindex="0">確定済み</li>
<li tabindex="0">否認済み</li>
<li tabindex="0">期限切れ</li>
</ul>

<div class="tab-content">
<div class="wait clearfix">

<?php

session_start();
require_once("db.php");

if(isset($_POST['accept_permit'])) {

  $myid=$mysqli->real_escape_string($_SESSION['id']);
  $matchings_id=$mysqli->real_escape_string($_POST['matchings_id']);
  $change_status = $mysqli->real_escape_string($_POST['change_status']);

  $query = "UPDATE matchings SET accept_kbn='$change_status' WHERE matchings_id='$matchings_id'";

  if($mysqli->query($query)){  
    ?>
    <div class="alert alert-success" role="alert">承認または否認しました</div>
    <?php }else{ 
      ?>
    <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    <?php
  }
}
?>


<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users, matchings WHERE users.id=matchings.to_user_id AND from_user_id='$myid' AND accept_kbn='0' ORDER BY matchings_id DESC";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
    $mail=$row["mail"];
    $real_name=$row["real_name"];
    $from_user_id=$row["from_user_id"];
    $id=$row["matchings_id"];
    $user_id=$row["id"];
?>

<?php if($row['from_user_id'] === $myid){ ?>
<div class="thumbnail">
<div clas="caption-full">
<h4><?php h($row['real_name']) ?>さんからのご依頼</h4>
<div class="thumbnail-photo">
<img src="view/images/<?php h($row['profile_photo']); ?>" width="100px" height="100px">
</div>
<div class="thumbnail-info">
<p>依頼者名: <a href="profile.php?user_id=<?php h($row['to_user_id']); ?>"><?php h($row['real_name']); ?></a></p>
<p><a href="appoint_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>&matchings_id=<?php h($row['matchings_id']); ?>">依頼の詳細を見る</a></p>

<?php } ?>
<?php if ($row['accept_kbn'] === '1'){ ?>
<p>予約確定済み:  <a href="messages_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">メッセージをして詳細を決める</a></p>
<?php }else{ ?>
<div class="post_area clearfix">
<form method="post" action="mypage.php">
<td><input type="submit" name="accept_permit" value="承認" class="btn btn-warning"></td>
<input type="hidden" name="change_status" value="1">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
<form method="post" action="mypage.php">
<td><input type="submit" name="accept_permit" value="否認" class="btn btn-warning"></td>
<input type="hidden" name="change_status" value="2">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
</div>
<?php
}
?>
</div></div></div>
<?php 
}
}
mysql_free_result($result);
?>
</div>









<div class="kakutei clearfix">
<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users, matchings WHERE users.id=matchings.to_user_id AND from_user_id='$myid' AND accept_kbn='1' ORDER BY matchings_id DESC";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
    $mail=$row["mail"];
    $real_name=$row["real_name"];
    $from_user_id=$row["from_user_id"];
    $id=$row["matchings_id"];
    $user_id=$row["id"];
?>

<?php if($row['from_user_id'] === $myid){ ?>
<div class="thumbnail">
<div class="caption-full">
<h4><?php h($row['real_name']) ?>さんからのご依頼</h4>
<div class="thumbnail-photo">
<img src="./view/images/<?php h($row['profile_photo']); ?>" width="100px" height="100px"></div>
<div class="thumbnail-info">
<p>依頼者名: <a href="profile.php?user_id=<?php h($row['to_user_id']) ?>"><?php h($row['real_name']); ?></a></p>
<p><a href="appoint_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>&matchings_id=<?php h($row['matchings_id']); ?>">依頼の詳細を見る</a></p>

<?php } ?>
<?php if ($row['accept_kbn'] === '1') { ?>
<p>予約確定済み:  <a href="messages_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">メッセージをして詳細を決める</a></p>
<?php } else { ?>
<div class="post_area clearfix">
<form method="post" action="mypage.php">
<td><input type="submit" value="承認" class="btn btn-warning"></td>
<input type="hidden" name="change_status" value="1">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
<form method="post" action="mypage.php">
<td><input type="submit" value="否認" class="btn btn-success"></td>
<input type="hidden" name="change_status" value="2">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
</div>                       
<?php 
}
?>
</div></div></div>
<?php 
}
}
mysql_free_result($result);
?>
</div>








<div class="hinin clearfix">
<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users, matchings WHERE users.id=matchings.to_user_id AND from_user_id='$myid' AND accept_kbn='2' ORDER BY matchings_id DESC";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
    $mail=$row["mail"];
    $real_name=$row["real_name"];
    $from_user_id=$row["from_user_id"];
    $id=$row["matchings_id"];
    $user_id=$row["id"];
?>

<?php if($row['from_user_id'] === $myid){ ?>
<div class="thumbnail">
<div class="caption-full">
<h4><?php h($row['real_name']) ?>さんからのメッセージ</h4>
<div class="thumbnail-photo">
<img src="view/images/<?php h($row['profile_photo']); ?>">
</div>
<div class="thumbnail-info">
<p>依頼者名: <a href="profile.php?user_id=<?php h($row['to_user_id']); ?>"><?php h($row['real_name']); ?></a></p>
<p><a href="appoint_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>&matchings_id=<?php h($row['matchings_id']); ?>">依頼の詳細を見る</a></p>

<?php } ?>
<?php if($row['accept_kbn'] === '2'){ ?>
<p>否認済み</p>
<?php }else{ ?>
<div class="post_area clearfix">
<form method="post" action="mypage.php">
<td><input type="submit" value="承認" class="btn btn-warning"></td>
<input type="hidden" name="change_status" value="1">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
<form method="post" action="mypage.php">
<td><input type="submit" value="否認" class="btn btn-success"></td>
<input type="hidden" name="change_status" value="2">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
</div>                       
<?php } ?>
</div></div></div>
<?php 
}
}
mysql_free_result($result);
?>
</div>






<div class="expire clearfix">
<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users, matchings WHERE users.id=matchings.to_user_id AND from_user_id='$myid' AND accept_kbn='3' ORDER BY matchings_id DESC";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
    $mail=$row["mail"];
    $real_name=$row["real_name"];
    $from_user_id=$row["from_user_id"];
    $id=$row["matchings_id"];
    $user_id=$row["id"];
?>

<?php if($row['from_user_id'] === $myid){ ?>
<div class="thumbnail">
<div class="caption-full">
<h4><?php h($row['real_name']) ?>さんからのご依頼</h4>
<div class="thumbnail-photo">
<img src="./view/images/<?php h($row['profile_photo']); ?>" width="100px" height="100px">
</div>
<div class="thumbnail-info">
<p>依頼者名: <a href="./profile.php?user_id=<?php h($row['to_user_id']) ?>"><?php h($row['real_name']); ?></a></p>
<p><a href="appoint_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>&matchings_id=<?php h($row['matchings_id']); ?>">依頼の詳細を見る</a></p>

<?php } ?>
<?php if ($row['accept_kbn'] === '3') { ?>
<p>期限切れ</p>
<?php } else { ?>
<div class="post_area clearfix">
<td><input type="submit" value="承認" class="btn btn-warning"></td>
<input type="hidden" name="change_status" value="1">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
<form method="post" action="./mypage.php">
<td><input type="submit" value="否認" class="btn btn-success"></td>
<input type="hidden" name="change_status" value="2">
<input type="hidden" name="matchings_id" value="<?php h($row['matchings_id']); ?>">
</form>
</div>                       
<?php } ?>
</div>
</div>
</div>
<?php 
}
}
mysql_free_result($result);
?>
</div></div></div>
</div>
</div>
</div>


</body></html>





