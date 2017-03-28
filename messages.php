<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>メッセージ</title>

    <!-- Bootstrap Core CSS -->
    <link href="./view/css/sanitize.css" rel="stylesheet">
    <link href="./view/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./view/css/font-awesome.css">
    <link href="./view/css/common.css" rel="stylesheet">
    <link href="./view/css/messages.css" rel="stylesheet active">
    <link href="./view/css-search/common-search.css" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
<?php
function h($str){
  echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
</script>
</head>

<body>

    <!-- Navigation -->
    <!-- header -->
    <?php include('header.php'); ?>
    <!-- /header-->
    <!-- Page Content -->
    <div class="container">
          <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="mypage.php" class="list-group-item">予約確認</a>
                    <a href="profile_edit.php" class="list-group-item">プロフィール</a>
                    <a href="messages.php" class="list-group-item active">メッセージ</a>
                </div>
            </div>
            <div class="col-md-9">
<?php
session_start();
require_once("db.php");

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
                    <div class="thumbnail">
                        <div class="caption-full">
                            <h4><?php h($row['real_name']) ?>さんからのメッセージ
                            </h4>
                            <div class="thumbnail-box clearfix">
                                <div class="thumbnail-photo">
                                  <img src="./view/images/<?php h($row['profile_photo']); ?>" width="100px" height="100px">
                                </div>
                                <div class="thumbnail-info">
                                    <p>送信者名 ：<a href="messages_detail.php?myid=<?php h($myid); ?>&user_id=<?php h($user_id); ?>"><?php h($row['real_name']); ?></a></p>
                               </div>
                            </div>
                       </div>
                    </div>
                <?php 
                }
            }
            mysql_free_result($result);
                ?>
            </div>
          </div>
    <!-- /.container -->
    </div>
    <!-- footer -->
    <?php include('../include/view/footer.php'); ?>
    <!-- /footer-->
    <!-- jQuery -->
    <script src="./view/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./view/js/bootstrap.min.js"></script>

</body>

</html>
