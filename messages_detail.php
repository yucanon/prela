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
    <link href="./view/css/messages_detail.css" rel="stylesheet active">
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
<?php

session_start();

require_once("db.php");

if(isset($_POST['post-content'])) {

  $content = $mysqli->real_escape_string($_POST['content']);
  $from_user_id = $mysqli->real_escape_string($_POST['from_user_id']);
  $to_user_id = $mysqli->real_escape_string($_POST['to_user_id']);

  // POSTされた情報をDBに格納する
  $query = "INSERT INTO messages(content, from_user_id, to_user_id) VALUES('$content','$from_user_id','$to_user_id')";

  if($mysqli->query($query)){
  $url = $_SERVER['HTTP_REFERER'];
  header("Location: ".$url); 
  ?>
    <div class="alert alert-success" role="alert">メッセージを投稿しました。</div>
    <?php
  }else{ 
      ?>
    <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    <?php
  }
}
?>

    <!-- Navigation -->
    <!-- header -->
    <?php include('header.php'); ?>
    <!-- /header-->
    <!-- Page Content -->
    <div class="container">
          <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="./mypage.php" class="list-group-item">予約確認</a>
                    <a href="./profile_edit.php" class="list-group-item">プロフィール</a>
                    <a href="./messages.php" class="list-group-item active">メッセージ</a>
                </div>
            </div>
            <div class="col-md-9">
                    <div id="container">
<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_GET['myid']);
$user_id=$mysqli->real_escape_string($_GET['user_id']);
$query="SELECT * FROM users, messages WHERE users.id=messages.to_user_id ORDER BY messages.id ASC";
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
?>
                        <?php if($row['to_user_id'] === $myid && $row['from_user_id'] === $user_id){ ?>
                          <p class="message myself">
                            <span class="speaker-icon"><img src="./view/images/<?php h($profile_photo); ?>" alt="AI"></span>
                            <span class="speaker-name"><?php  ?></span>
                            <span class="message-content"><?php h($row['content']); ?></span>
                          </p>
                        <?php 
                          }else{
                        ?>
                      <?php 
                          }
                          ?>
                          <?php if($row['to_user_id'] === $user_id && $row['from_user_id'] === $myid){ ?>
                          <p class="message myself">
                            <span class="speaker-icon"><img src="./view/images/<?php h($profile_photo); ?>" alt="AI"></span>
                            <span class="speaker-name"><?php  ?></span>
                            <span class="message-content"><?php h($row['content']); ?></span>
                          </p>
                        <?php 
                          }else{
                        ?>
                      <?php 
                          }
                        }
                    }
                    mysql_free_result($result);
                      ?>
                    <div class="message_area">
                    　<p class="error_msg"><?php h($error_msg); ?></p>
                      <form action="messages_detail.php" method="post">
                        <textarea name="content" id="form" class="form" wrap="off"></textarea>
                        <input type="hidden" id="to_user_id" name ="to_user_id" class="btn btn-default" value="<?php h($myid)?>">
                        <input type="hidden" id="from_user_id" name ="from_user_id" class="btn btn-default" value="<?php h($user_id)?>">
                        <input type="submit" class="btn btn-default" name="post-content" value="送信">
                      </form>

                    </div>
          
                    <div class="pagetop"><a href="#chat-title">ページ最上部へ</a></div>
            </div>
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
