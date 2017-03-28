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
    <link href="./view/css/appoint_fixed.css" rel="stylesheet">

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

    <!-- Navigation -->
    <!-- header -->
    <?php include('../include/view/header.php'); ?>
    <!-- /header-->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="./mypage.php" class="list-group-item active">予約確認</a>
                    <a href="./profile_edit.php" class="list-group-item">プロフィール編集</a>
                    <a href="./upload.php" class="list-group-item">写真アップロード</a>
                    <a href="./messages.php" class="list-group-item">メッセージ</a>
                </div>
            </div>
            <div class="col-md-9">
            <div class="col-md-9">
            　　<form action="./appoint_detail.php" class="form-horizontal" method="post">
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">日程</label>
                  <div class="col-sm-10">
                    <p><?php h($day); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">開始時間</label>
                  <div class="col-sm-10">
                    <p><?php h($start_time); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">終了時間</label>
                  <div class="col-sm-10">
                    <p><?php h($end_time); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">場所</label>
                  <div class="col-sm-10">
                    <p><?php h($place); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">価格</label>
                  <div class="col-sm-10">
                    <p><?php h($price); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">交通費等</label>
                  <div class="col-sm-10">
                    <p><?php h($options); ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">本文</label>
                  <div class="col-sm-10">
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
