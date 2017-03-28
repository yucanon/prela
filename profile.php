<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="./view/css/sanitize.css" rel="stylesheet">
<link href="./view/css/bootstrap.min.css" rel="stylesheet">  
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
<link href="./view/css/common.css" rel="stylesheet">
<link href="./view/css-search/common-search.css" rel="stylesheet">
<link href="./view/css/profile.css" rel="stylesheet">
<script src="./view/js/jquery-1.11.3.min.js"></script>
<script src="./view/js/moment.js"></script>
<script src="./view/js/bootstrap.min.js"></script>
<script src="./view/js/bootstrap-datepicker.js"></script>
<script src="./view/js/bootstrap-datepicker.ja.js"></script>
<script src="./view/js/bootstrap-timepicker.js"></script>

<script type="text/javascript">
<?php
function h($str){
  echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
</script>
<title>プロフィール</title>

<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_GET['myid']);
$user_id=$mysqli->real_escape_string($_GET['user_id']);
$query="SELECT * FROM users WHERE id='$user_id'";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
    $profile_photo=$row["profile_photo"];
    $mail=$row["mail"];
    $real_name=$row["real_name"];
    $stuorworker=$row["stuorworker"];
    $sex=$row["sex"];
    $age=$row["age"];
    $live_place=$row["live_place"];
    $from_place=$row["from_place"];
    $comment_detail=$row["comment_detail"];
    $record=$row["record"];
    $schedule=$row["schedule"];
    $request=$row["request"];
?>
<?php
}
}
mysql_free_result($result);
?>
</head>
<body>
<!-- Navigation -->
<?php include('header.php'); ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <div class="title"><?php h($real_name); ?>さんのページ</div>
 
            <!-- Preview Image -->
            <img class="profile_photo" src="view/images/<?php h($profile_photo); ?>" width="300px" height="200px">

            <hr>

            <!-- Post Content -->
            <p class="lead">情報<p>
            <hr>
            <p>区分：<?php h($stuorworker); ?>　　　性別：<?php h($sex); ?>　　　年齢：<?php h($age); ?>　　　現在移住地：<?php h($live_place); ?>　　　出身地：<?php h($from_place); ?></p>                
            <hr>          
            <p class="lead">自己紹介<p>
            <hr>
            <p><?php h($comment_detail); ?></p>
            <hr>
            <p class="lead">実績<p>
            <hr>          
            <p><?php h($record); ?></p>
            

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-lg-12">
            <!-- Blog Categories Well -->
            <div class="mt60"></div>
            <div class="well">
            <img class="profile_photo" src="view/images/<?php h($profile_photo); ?>">
                <br><br><br>
                <h4>スケジュール</a></h4>
      			<div class="calender"> 
                    <div class="thumbnail">
                        <div class="caption-full">
                        <?php h($schedule); ?>
                        </div>
                    </div>
                </div>

                <br>
                <h4>依頼リクエスト条件</h4>
                <form action="appoint.php" method="post">
                    <div class="request" style="background-color:#FFFFFF;">
                    <br>
                        <p><?php h($request); ?></p>
                        <br>
                        <div class="apply_button">
                        <?php if(isset($_SESSION["id"])){ ?>
                          <a href="appoint.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>" class="btn btn-primary">申し込む</a>
                          <a href="messages_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>" class="btn btn-primary">メッセージを送る</a>
                        <?php }else{ ?>
                          <a href="sign_up.php" class="btn btn-primary">新規会員登録</a>
                        <?php } ?>
                     </div>
                 </form>
                </div>
            </div>
            <!-- Side Widget Well -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- Footer -->
<?php include('../include/view/footer.php'); ?>
</body>

</html>
