<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>プロフィール編集</title>
    <!-- Custom CSS -->
    <link href="view/css/sanitize.css" rel="stylesheet">
    <link href="view/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="view/css/font-awesome.css">
    <link href="view/css/common.css" rel="stylesheet">
    <link href="view/css/profile_edit.css" rel="stylesheet">
    <link href="./view/css-search/common-search.css" rel="stylesheet">

    <!-- Custom JS-->  
    <script src="view/js/vendor/jquery-1.10.2.min.js"></script>
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


<?php
session_start();
require_once("db.php");

if(isset($_POST['password-edit'])){
  if(empty($_POST['new_password'])){
  ?>
  <div class="alert alert-danger" role="alert">パスワードの更新に失敗しました。もう一度やり直してください</div>
  <?php
}else{
  $new_password=$mysqli->real_escape_string($_POST['new_password']);
  $new_password= password_hash($new_password, PASSWORD_DEFAULT);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET password='$new_password' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新が失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">パスワードの更新をしました　<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
}
?>


<?php
session_start();
require_once("db.php");

if(!empty($_POST['mail']) && isset($_POST['profile-edit'])){
  $mail=$mysqli->real_escape_string($_POST['mail']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET mail='$mail' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">メールアドレスの更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>



<?php
session_start();
require_once("db.php");

if(!empty($_POST['real_name']) && isset($_POST['profile-edit'])){
  $real_name=$mysqli->real_escape_string($_POST['real_name']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET real_name='$real_name' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">名前の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>



<?php
session_start();
require_once("db.php");

if(!empty($_POST['comment']) && isset($_POST['profile-edit'])){
  $comment=$mysqli->real_escape_string($_POST['comment']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET comment='$comment' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">簡単自己紹介の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>




<?php
session_start();
require_once("db.php");

if(!empty($_POST['sex']) && isset($_POST['profile-edit'])){
  $sex=$mysqli->real_escape_string($_POST['sex']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET sex='$sex' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">性別の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>




<?php
session_start();
require_once("db.php");

if(!empty($_POST['age']) && isset($_POST['profile-edit'])){
  $age=$mysqli->real_escape_string($_POST['age']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET age='$age' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">年齢の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>





<?php
session_start();
require_once("db.php");

if(!empty($_POST['live_place']) && isset($_POST['profile-edit'])){
  $live_place=$mysqli->real_escape_string($_POST['live_place']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET live_place='$live_place' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">現在移住地の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>





<?php
session_start();
require_once("db.php");

if(!empty($_POST['from_place']) && isset($_POST['profile-edit'])){
  $from_place=$mysqli->real_escape_string($_POST['from_place']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET from_place='$from_place' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">出身地の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>




<?php
session_start();
require_once("db.php");

if(!empty($_POST['comment_detail']) && isset($_POST['profile-edit'])){
  $comment_detail=$mysqli->real_escape_string($_POST['comment_detail']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET comment_detail='$comment_detail' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">自己紹介詳細の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>




<?php
session_start();
require_once("db.php");

if(!empty($_POST['record']) && isset($_POST['profile-edit'])){
  $record=$mysqli->real_escape_string($_POST['record']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET record='$record' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">実績の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>



<?php
session_start();
require_once("db.php");

if(!empty($_POST['schedule']) && isset($_POST['profile-edit'])){
  $schedule=$mysqli->real_escape_string($_POST['schedule']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET schedule='$schedule' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">スケジュールの更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>




<?php
session_start();
require_once("db.php");

if(!empty($_POST['request']) && isset($_POST['profile-edit'])){
  $request=$mysqli->real_escape_string($_POST['request']);
  $id=$mysqli->real_escape_string($_SESSION['id']);

  $query="UPDATE users SET request='$request' WHERE id='$id'";
  $result=$mysqli->query($query);
  if(!$result){
    print("更新に失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }else{
    ?>
    <div class="alert alert-success" role="alert">依頼リクエスト条件の更新をしました<a href="index.php">トップページに戻る</a></div>
    <?php
  }
}
?>






<?php
if(isset($_POST["upfile-submit"])){
if(is_uploaded_file($_FILES["upfile"]["tmp_name"])){
  if(move_uploaded_file($_FILES["upfile"]["tmp_name"], 'view/images/' . basename($_FILES["upfile"]["name"]))){
    $upfile=$mysqli->real_escape_string($_FILES["upfile"]["name"]);
    $id=$mysqli->real_escape_string($_SESSION['id']);
    $query="UPDATE users SET profile_photo='$upfile' WHERE id='$id'";
    $mysqli->query($query);
    ?>
    <div class="alert alert-success" role="alert"><?php echo $_FILES["upfile"]["name"] . "をアップロードしました。"; ?></div>
    <?php
  }else{
    ?><div class="alert alert-danger" role="alert">アップロードが失敗しました</div><?php
  }
}else{
  ?><div class="alert alert-danger" role="alert">ファイルが選択されていません</div><?php
}
}
?>

<?php
$id=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users WHERE id='$id'";
$result=$mysqli->query($query);
if(!$result){
  print("更新が失敗しました" . $mysqli->$error);
  $mysqli->close();
  exit();
}else{
  while($row=$result->fetch_assoc()){
    $profile_photo=$row['profile_photo'];
  }
}
?>


<?php
session_start();
require_once("db.php");

$id=$mysqli->real_escape_string($_SESSION['id']);
$query="SELECT * FROM users WHERE id=$id";
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
    $comment=$row["comment"];
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
                      
    <!-- Navigation -->
    <!-- header -->
    <!-- /header-->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="mypage.php" class="list-group-item">予約確認</a>
                    <a href="profile_edit.php" class="list-group-item active">プロフィール編集</a>
                    <a href="messages.php" class="list-group-item">メッセージ</a>
                </div>
            </div>
            <div class="col-md-9">
                <h3>プロフィール写真</h3>
                <div class ="form_group">
                  <div class="thumbnail-photo">
                    <img src="view/images/<?php h($profile_photo); ?>" width="100px" height="100px">
                  </div>

                  <div class="form">
                    <form enctype="multipart/form-data" method="post" action="profile_edit.php">
                      <label class="control-label">プロフィール写真選択(jpgのみ対応)</label>
                      <input class="upfile" type="file" name="upfile" />              
                      <input type="submit" class="btn btn-success" name="upfile-submit" value="保存" />
                    </form>
                  </div>

                </div>
                <h3>パスワード編集</h3>
            　　<form action="profile_edit.php" class="form-horizontal" method="post">
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">現在のパスワード</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" class="form-control" id="input-user-password" value="" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">新パスワード</label>
                  <div class="col-sm-10">
                    <input type="password" name="new_password" class="form-control" id="input-user-password" value="" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">新パスワード（確認用）</label>
                  <div class="col-sm-10">
                    <input type="password" name="new_password_re" class="form-control" id="input-user-password" value="" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-success" name="password-edit" value="保存">
                  </div>
                </div>
　　　　　　　　　</form>
                <h3>プロフィール設定、編集</h3>
            　　<form action="./profile_edit.php" class="form-horizontal" method="post">
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">名前</label>
                  <div class="col-sm-10">
                    <input type="text" name="real_name" class="form-control" id="input-user-name" value="<?php h($real_name); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">メールアドレス</label>
                  <div class="col-sm-10">
                    <input type="text" name="mail" class="form-control" id="input-user-name" value="<?php h($mail); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-date" class="col-sm-2 control-label">性別</label>
                  <div class="col-sm-10">
                    <input type="text" name="sex" class="form-control" id="input-sex" value="<?php h($sex); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-time" class="col-sm-2 control-label">年齢</label>
                  <div class="col-sm-10">
                    <input type="text" name="age" class="form-control" id="input-age" value="<?php h($age); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">現在移住地</label>
                  <div class="col-sm-10">
                    <input type="text" name="live_place" class="form-control" id="input-place" value="<?php h($live_place); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">出身地</label>
                  <div class="col-sm-10">
                    <input type="text" name="from_place" class="form-control" id="input-place" value="<?php h($from_place); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">スケジュール</label>
                  <div class="col-sm-10">
                    <input type="text" name="schedule" class="form-control" id="input-place" value="<?php h($schedule); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">依頼リクエスト条件</label>
                  <div class="col-sm-10">
                    <input type="text" name="request" class="form-control" id="input-place" value="<?php h($request); ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">簡単自己紹介<br>３０字程度</label>
                  <div class="col-sm-10">
                    <textarea name="comment" class="form-control" id="input-place"><?php h($comment) ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">自己紹介詳細</label>
                  <div class="col-sm-10">
                    <textarea name="comment_detail" class="form-control" id="input-place"><?php h($comment_detail) ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-hour" class="col-sm-2 control-label">実績</label>
                  <div class="col-sm-10">
                    <textarea name="record" class="form-control" id="input-place"><?php h($record) ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-success" name="profile-edit" value="保存">
                  </div>
                </div>
　　　　　　　　　</form>
            </div>
        </div>
    </div>

    <!-- /.container -->
    <!-- Footer -->
    <?php include('../include/view/footer.php'); ?>
    <!-- /Footer-->
    <!-- jQuery -->
    <script src="./view/js/jquery.js"></script>

</body>

</html>
