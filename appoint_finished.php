<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>予約依頼完了</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="./view/css/sanitize.css" rel="stylesheet">
  <link href="./view/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="./view/css/font-awesome.css">
  <link href="./view/css/common.css" rel="stylesheet">
  <link href="./view/css/appoint.css" rel="stylesheet">
  <link href="./view/css-search/common-search.css" rel="stylesheet">
  <script type="text/javascript">
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

if(isset($_POST['appoint_end'])) {

  $title = $mysqli->real_escape_string($_POST['title']);
  $day = $mysqli->real_escape_string($_POST['day']);
  $start_time = $mysqli->real_escape_string($_POST['start_time']);
  $end_time = $mysqli->real_escape_string($_POST['end_time']);
  $place = $mysqli->real_escape_string($_POST['place']);
  $message = $mysqli->real_escape_string($_POST['message']);
  $to_user_id = $mysqli->real_escape_string($_POST['to_user_id']);
  $from_user_id = $mysqli->real_escape_string($_POST['from_user_id']);

  // POSTされた情報をDBに格納する
  $query = "INSERT INTO matchings(title, day, start_time, end_time, place, message, to_user_id, from_user_id, accept_kbn) VALUES('$title','$day','$start_time', '$end_time','$place','$message', '$to_user_id', '$from_user_id', '0')";

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

<?php include('header.php'); ?>
  <div id="page">
    <div class="container">
      <h1>予約依頼送信完了</h1>
      <a href="index.php" class="btn btn-default back_profile">最初のページに戻る</a> 
    </div><!-- /container -->
  </div><!-- /page -->
  <!-- footer -->
  <?php include('../include/view/footer.php'); ?>
  <!-- /footer-->
  <script src="./view/js/jquery-1.11.3.min.js"></script>
  <script src="./view/js/bootstrap.min.js"></script>
</body>
</html>