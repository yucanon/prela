<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>予約依頼入力確認</title>
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

<?php include('header.php'); ?>
  <div id="page">
    <div class="container">
      <h1>予約依頼入力確認</h1>
      
      <div class="row">
        <div class="col-sm-10">
          <form action="appoint_finished.php" class="form-horizontal" method="post">
            <div class="form-group">
              <label for="input-title" class="col-sm-2 control-label">タイトル</label>
              <div class="col-sm-10"><p><?php h($_POST["title"]) ?></p><input type="hidden" name="title" value="<?php h($_POST["title"]) ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="input-date" class="col-sm-2 control-label">日付</label>
              <div class="col-sm-10"><p><?php h($_POST["day"]) ?></p><input type="hidden" name="day" value="<?php h($_POST["day"]) ?>">
              </div>
            </div>
            <div class="form-group">        
              <label for="input-start-time" class="col-sm-2 control-label">開始時間</label>
              <div class="col-sm-10"><p><?php h($_POST["start_time"]) ?></p><input type="hidden" name="start_time" value="<?php h($_POST["start_time"]) ?>">
              </div>
            </div>
            <div class="form-group">        
              <label for="input-end-time" class="col-sm-2 control-label">終了時間</label>
              <div class="col-sm-10"><p><?php h($_POST["end_time"]) ?></p><input type="hidden" name="end_time" value="<?php h($_POST["end_time"]) ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="input-place" class="col-sm-2 control-label">場所</label>
              <div class="col-sm-10"><p><?php h($_POST["place"]) ?></p><input type="hidden" name="place" value="<?php h($_POST["place"]) ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="input-message" class="col-sm-2 control-label">本文</label>
              <div class="col-sm-10"><p><?php h($_POST["message"]) ?></p><input type="hidden" name="message" value="<?php h($_POST["message"]) ?>">
              </div>
            </div>

            <input type="hidden" id="to_user_id" name ="to_user_id" class="btn btn-default" value="<?php h($_POST['to_user_id'])?>">
            <input type="hidden" id="from_user_id" name ="from_user_id" class="btn btn-default" value="<?php h($_POST['from_user_id'])?>">

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="appoint_end" class="btn btn-default" value="申し込む">
                <a href="appoint.php" class="btn btn-default">戻る</a>
              </div>
            </div>  
          </form>
        </div>
      </div>

    </div><!-- /container -->
  </div><!-- /page -->
  </div><!-- /page -->
  <!-- footer -->
  <?php include('../include/view/footer.php'); ?>
  <!-- /footer-->
  <script src="./view/js/jquery-1.11.3.min.js"></script>
  <script src="./view/js/bootstrap.min.js"></script>
</body>
</html>