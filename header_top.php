
  <?php
session_start();
require_once("db.php");

if(isset($_POST['login'])) {

  $real_name = $mysqli->real_escape_string($_POST['real_name']);
  $mail = $mysqli->real_escape_string($_POST['mail']);
  $password = $mysqli->real_escape_string($_POST['password']);

  $query= "SELECT * FROM users WHERE mail='$mail'";
  $result=$mysqli->query($query);
  if(!$result){
    print("ログインが失敗しました" . $mysqli->$error);
    $mysqli->close();
    exit();
  }
  while($row=$result->fetch_assoc()){
    $hashed_pass=$row['password'];
    $id=$row['id'];
  }
  $result->close();

  if(password_verify($password, $hashed_pass)){
    $_SESSION['id'] = $id;
    header("Location: index.php");
    exit();
  }else { ?>
    <div class="alert alert-danger" role="alert">メールアドレスとパスワードが一致しません。</div>
  <?php
  header("Location: index.php");
}
}
?>




<header class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#FF236B;">
    <div class="h-outer clearfix">
        <div class = "header-left">
          <h1>
            <a href="index.php"><img src="view/images/prelalogo.jpg" alt="ロゴ"></a>
          </h1>
          <div id="error">
            <span><?php echo $errorMessage; ?></span>
          </div>
        </div>
        <nav class = "header-right">
          <ul>
            <li><a href="search.php"><i class="fa fa-search fa-gray" aria-hidden="true"></i><span>検索画面</span></a></li>
            <?php if(isset($_SESSION["id"])){ ?>
              <li><a href="mypage.php"><i class="fa fa-cog fa-gray" aria-hidden="true"></i><span>マイページ</span></a></li>
            <?php
            }else{
            ?>
              <li><a href="sign_up.php"><i class="fa fa-file-text-o fa-gray" aria-hidden="true"></i><span>新規登録</span></a></li>
            <?php
            }
            ?>
            <?php if(isset($_SESSION["id"])){ ?>
              <li><a href="logout.php?logout"><i id="fa2" class="fa fa-sign-out fa-green" aria-hidden="true"></i><span>ログアウト</span></a></li>
            <?php
            }else{
            ?>
              <li><a href="#" onClick="login();"><i id="fa" class="fa fa-sign-in fa-green" aria-hidden="true"></i><span onClick="login();">ログイン</span></a></li>
            <?php
            }
            ?>
            <!--  
            <li><img id="bellicon" src="./view/images/bell.png" alt="通知アイコン"><span><?php echo $new_yoyaku ?></span></li>
            <li><img id="mailicon" src="./view/images/mail.png" alt="メールアイコン"></li>
            -->
          </ul>
        </nav>
    </div>





<div id="sign_up">
<h3 class="login">ログイン</h3>
<form id="loginForm" name="loginForm" action="index.php" method="post">
<div class="form-item">
    <input type="mail"  class="form-control" name="mail" placeholder="メールアドレス" required>
  </div>
  <div class="form-item">
    <input type="password" class="form-control" name="password" placeholder="パスワード" required>
  </div>
  <div class="button-panel">
  <input type="submit" class="login" style="background-color:#FF236B;" name="login" value="ログイン">
</div>
</form>
</div>

</header>
<script src="./view/js/login.js"></script>