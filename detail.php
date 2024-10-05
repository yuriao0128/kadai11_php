<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$id = $_GET["id"];
require 'db.php';  // データベース接続

//２．データ登録SQL作成
$sql = "SELECT * FROM bs_posts WHERE id=:id";
$stmt = $pdo->prepare("$sql");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$post =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
$json = json_encode($post,JSON_UNESCAPED_UNICODE);
?>

<!-- 左側のバーをinclude -->
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<div class="main-content">
<h2 class="topic-title">イベントを編集する</h2>
<form method="POST" action="update.php">
    <input type="text" name="title" value="<?=$post["title"]?>" required  class="form-input"><br>
    <textarea name="body" required  class="form-textarea"><?=$post["body"]?></textarea><br>
    <input type="hidden" name="id" value="<?=$post["id"]?>">
    <input type="submit" value="更新" class="form-submit">
</form>
</div>

</body>
</html>

