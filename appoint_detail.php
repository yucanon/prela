<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>予約詳細画面</title>
    <!-- Custom CSS -->
<link href="./view/css/sanitize.css" rel="stylesheet">
  <link href="./view/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="./view/css/font-awesome.css">
  <link href="./view/css/common.css" rel="stylesheet">
  <link href="./view/css/appoint.css" rel="stylesheet">
  <link rel="stylesheet" href="./view/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="./view/css/bootstrap-timepicker.css">
  <link href="./view/css-search/common-search.css" rel="stylesheet">
    <link href="./view/css/appoint_detail.css" rel="stylesheet">

    <!-- Custom JS-->  
    <script src="./view/js/jquery-1.11.3.min.js"></script>
    <script src="./view/js/moment.js"></script>
    <script src="./view/js/bootstrap-datepicker.js"></script>
    <script src="./view/js/bootstrap-datepicker.ja.js"></script>
    <script type="text/javascript">
    $(function() {
      $('#input-day').datepicker({
        format: 'yyyy/mm/dd',
        language: 'ja'
      });
    });
    </script>  
    <script >
    $(document).ready(function(){
       $('.kensu').each(function(){
            //表示するカウント数はどこかに仕込んでおくとして
            var count = $('.notice_kensu').attr('value');
            //var count = $(this).attr('count');
            //カウント表示の要素を追加する
            if(count != 0){
                if(count > 99) count = '99+';
                $(this).wrap($('<span>').css({'position':'relative'}))
                    .parent().append($('<span>').addClass("circle").html(count));
            }
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

<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_GET['myid']);
$user_id=$mysqli->real_escape_string($_GET['user_id']);
$matchings_id=$mysqli->real_escape_string($_GET['matchings_id']);
$query="SELECT * FROM users, matchings WHERE users.id=matchings.to_user_id AND matchings_id='$matchings_id'";
$result=mysql_query($query);
if(!$result){
  print("読み込みに失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
    $title=$row['title'];
    $day=$row["day"];
    $start_time=$row["start_time"];
    $end_time=$row["end_time"];
    $place=$row["place"];
    $message=$row["message"];
?>
<?php
}
}
mysql_free_result($result);
?>
<?php include('header.php'); ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="./mypage.php" class="list-group-item active">予約確認</a>
                    <a href="./profile_edit.php" class="list-group-item">プロフィール編集</a>
                    <a href="./messages.php" class="list-group-item">メッセージ</a>
                </div>
            </div>
            <div class="col-md-9">
            　　<form action="appoint_detail.php" class="form-horizontal" method="post">
                <div class="form-group">
                  <label for="input-date" class="col-sm-3 control-label">タイトル</label>
                  <div class="col-sm-9">
                    <p><?php h($title); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-3 control-label">日程</label>
                  <div class="col-sm-9">
                    <p><?php h($day); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-3 control-label">開始時間</label>
                  <div class="col-sm-9">
                    <p><?php h($start_time); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-3 control-label">終了時間</label>
                  <div class="col-sm-9">
                    <p><?php h($end_time); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-3 control-label">場所</label>
                  <div class="col-sm-9">
                    <p><?php h($place); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-3 control-label">本文</label>
                  <div class="col-sm-9">
                    <p><?php h($message); ?></p> 
                  </div>
                </div>
                
                <!--<input type="hidden" name="yoyaku_id" value="<?php h($yoyaku_id)?>">-->
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-success" href="./mypage.php">戻る</a>
                  </div>
                </div>
                
                </div>  
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <?php include('../include/view/footer.php'); ?>
    <!-- /Footer-->

</body>

</html>
