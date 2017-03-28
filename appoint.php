<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>予約依頼</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="./view/css/sanitize.css" rel="stylesheet">
  <link href="./view/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="./view/css/font-awesome.css">
  <link href="./view/css/common.css" rel="stylesheet">
  <link href="./view/css/appoint.css" rel="stylesheet">
  <link rel="stylesheet" href="./view/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="./view/css/bootstrap-timepicker.css">
  <link href="./view/css-search/common-search.css" rel="stylesheet">
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

</head>
<body>

<?php include('header.php'); ?>

<?php
session_start();
require_once("db.php");

$myid=$mysqli->real_escape_string($_GET['myid']);
$user_id=$mysqli->real_escape_string($_GET['user_id']);
?>
  <!-- /header-->
  <div id="page">
    <div class="container">

      <h1>予約依頼フォーム</h1>
      <div class="row">
        <div class="col-sm-10">
          <form action="appoint_confirm.php" class="form-horizontal" method="post">
            <div class="form-group">
              <label for="input-date" class="col-sm-2 control-label">タイトル</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="input-title" value="<?php h($title); ?>" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="input-date" class="col-sm-2 control-label">日付</label>
              <div class="col-sm-10">
                <input type="text" name="day" class="form-control" id="input-date" placeholder="日付" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="input-start-time" class="col-sm-2 control-label">開始時間</label>
              <div class="col-sm-10">
                <input type="text" name="start_time" class="form-control" id="input-start-time" placeholder="開始時間" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="input-end-time" class="col-sm-2 control-label">終了時間</label>
              <div class="col-sm-10">
                <input type="text" name="end_time" class="form-control" id="input-end-time" placeholder="終了時間" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="input-place" class="col-sm-2 control-label">場所</label>
              <div class="col-sm-10">
                <input type="text" name="place" class="form-control" id="input-place" placeholder="場所" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="input-message" class="col-sm-2 control-label">メッセージ</label>
              <div class="col-sm-10">
                <textarea name="message" class="form-control" id="input-message"　rows="40" cols="10"></textarea>
              </div>
            </div>
            
            <input type="hidden" id="to_user_id" name ="to_user_id" class="btn btn-default" value="<?php h($myid)?>">
            <input type="hidden" id="from_user_id" name ="from_user_id" class="btn btn-default" value="<?php h($user_id)?>">

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="送信">
              </div>
            </div>
          </form>
        </div>
      </div>

    </div><!-- /container -->

  </div><!-- /page -->
  <!-- footer -->
  <?php include('../include/view/footer.php'); ?>
  <!-- /footer-->

</body>
</html>