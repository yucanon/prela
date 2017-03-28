<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>検索</title>
 	<link rel="stylesheet" href="view/css/bootstrap.min.css">
 	<link rel="stylesheet" href="view/css-search/search.css">
    <link rel="stylesheet" href="view/css-search/hamburger.css">
    <link rel="stylesheet" href="./view/css/font-awesome.css">
    <link href="./view/css-search/common-search.css" rel="stylesheet">
 	<script src="view/js/jquery-1.11.3.min.js"></script>
 	<script src="view/js/bootstrap.min.js"></script>
 	<script src="view/js-search/masonry.pkgd.min.js"></script>
    <script src="view/js-search/imagesloaded.pkgd.min.js"></script>
   <!-- <script src="view/js-search/jquery.infinitescroll.min.js"></script> -->
    <script src="view/js-search/search.js"></script>
    <script src="view/js-search/hamburger.js"></script>
    <script>
<?php
function h($str){
  echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
</script>
</head>
<body>
	<?php include('header.php'); ?>
    <br><br><br><br><br><br>
    <div class="hamburgerSpacer"></div>
	<div class="searchMain">
		<div class="container-fluid">
        <div class="">
			<div id="searchArea" class="col-xs-12 col-md-3 searchBorderRight">
				 <form class="form-horizonal" action="search.php" method="post">
                    <div class="formItem col-xs-12" id="formKeywordArea">
                     	<div class="col-xs-12">
                        	<label class="control-label">keyword</label>
                        </div>
                        <div class="col-xs-12">
                            <input type="text" name="keyword" class="form-control" placeholder="キーワードで探す">
                        </div>
                    </div>
                    <div class="formItem" id="formJobArea">
                    	<div class="col-xs-12">
                        <label class="control-label" for="job">ユーザー種別</label>
                        <input type="hidden" name="job" value="" id="job">
                        </div>
                        <div class="col-xs-12　btn-toolbar">
                            <div class="btn-group btnSpacer">
  								<input type="radio" name="stuorworker" value="学生">学生
                  <input type="radio" name="stuorworker" value="社会人">社会人
  							</div>
                        </div>
                    </div>
        			<div class="formItem">
                        <div class="col-xs-12">
                            <input type="submit" class="btn myBtnSearch pull-right" name="search" value="検索">
                        </div>
                    </div>
                 </form>
			</div>  
			<div class="col-xs-12 col-md-9">
                <p><a id="nowloading" class="loading"><i class="fa fa-spinner fa-spin"></i>読み込み中...</a></p>
                <div id="masonryContainer">


<div class="form_group">
<div class="thumbnail">
<?php
session_start();
require_once("db.php");

if($_POST['keyword'] && $_POST['stuorworker']){
$stuorworker=$mysqli->real_escape_string($_POST['stuorworker']);
$keyword=$mysqli->real_escape_string($_POST['keyword']);
$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users WHERE stuorworker='$stuorworker' OR real_name Like '%$keyword%'";
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
<div class="panel panel-default col-md-4">
<div class="pannel-heading"><a href="profile.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">
<br>
<img src="view/images/<?php h($profile_photo); ?>" width="200px" height="100px">
</a></div>
<div class="panel-body">
<?php h($row["real_name"]); ?>
<div class="stuorworker" style="background-color:#FF236B; color:white; border-radius:3px; width:50px; height:20px; text-align:center; float:right;">
<?php h($row["stuorworker"]); ?>
</div>
<br><br>
<?php h($row["comment"]); ?>
</div></div>
<?php
}
}
mysql_free_result($result);




}elseif($_POST['stuorworker']){
$stuorworker=$mysqli->real_escape_string($_POST['stuorworker']);
$keyword=$mysqli->real_escape_string($_POST['keyword']);
$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users WHERE stuorworker='$stuorworker'";
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
<div class="panel panel-default col-md-4">
<div class="pannel-heading"><a href="profile.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">
<br>
<img src="view/images/<?php h($profile_photo); ?>" width="200px" height="100px">
</a></div>
<div class="panel-body">
<?php h($row["real_name"]); ?>
<div class="stuorworker" style="background-color:#FF236B; color:white; border-radius:3px; width:50px; height:20px; text-align:center; float:right;">
<?php h($row["stuorworker"]); ?>
</div>
<br><br>
<?php h($row["comment"]); ?>
</div></div>
<?php
}
}
mysql_free_result($result);




}else{
$keyword=$mysqli->real_escape_string($_POST['keyword']);
$myid=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users WHERE real_name Like '%$keyword%' OR stuorworker LIKE '%$keyword%' ORDER BY id";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
    $profile_photo=$row["profile_photo"];
    $user_id=$row["id"];
    $real_name=$row["real_name"];
?>
<div class="panel panel-default col-md-4">
<div class="pannel-heading"><a href="profile.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>">
<br>
<img src="view/images/<?php h($profile_photo); ?>" width="200px" height="100px">
</a></div>
<div class="panel-body">
<?php h($row["real_name"]); ?>
<div class="stuorworker" style="background-color:#FF236B; color:white; border-radius:3px; width:50px; height:20px; text-align:center; float:right;">
<?php h($row["stuorworker"]); ?>
</div>
<br><br>
<?php h($row["comment"]); ?>
</div></div>
<?php
}
}
}
mysql_free_result($result);
?>
</div>


                </div>
                <p>検索結果は以上です</p>
                
            </div>
		</div>
        </div>
    <a href="#" id="topIconLink"><div id="topIcon">
    </div></a>
</body>
</html>