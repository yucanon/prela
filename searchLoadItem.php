<?php 
error_reporting(0);
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
?>

<div class="col-md-9">
<h3>プロフィール一覧</h3>

<div class ="form_group">
<div class="thumbnail">
<?php
session_start();
require_once("db.php");

if($_POST['search'] && $_POST['stu']){
$keyword=$mysqli->real_escape_string($_POST['keyword']);
$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users WHERE real_name AND user_name AND mail AND comment AND profile_photo AND stuorworker='学生' Like '$keyword'";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
  	$profile_photo=$row["profile_photo"];
  	$user_id=$row["id"];
?>
<div class="panel panel-default">
<div class="pannel-heading"><a href="profile.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">
<br>
<img src="view/images/<?php h($profile_photo); ?>" width="200px" height="100px">
</a></div>
<div class="panel-body">
<?php
echo $mail=$row["mail"];
?>
<br>
<?php
echo $real_name=$row["real_name"];
?>
</div></div>
<?php
}
}
mysql_free_result($result);




}else{
$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users ORDER BY id";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
  	$profile_photo=$row["profile_photo"];
  	$user_id=$row["id"];
?>
<div class="panel panel-default">
<div class="pannel-heading"><a href="profile.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">
<br>
<img src="view/images/<?php h($profile_photo); ?>" width="200px" height="100px">
</a></div>
<div class="panel-body">
<?php
echo $mail=$row["mail"];
?>
<br>
<?php
echo $real_name=$row["real_name"];
?>
</div></div>
<?php
}
}
}
mysql_free_result($result);
?>
</div>





