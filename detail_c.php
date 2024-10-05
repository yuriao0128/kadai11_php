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

// データ取得
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$post) {
    exit("該当の投稿が見つかりません。");
}

// もしコメントが別のテーブルにある場合は、コメントの取得をここで行います。
// 例: コメントが別のテーブルに格納されていると仮定して
$comment_sql = "SELECT * FROM bs_comments WHERE post_id = :id";
$comment_stmt = $pdo->prepare($comment_sql);
$comment_stmt->bindValue(':id', $id, PDO::PARAM_INT);
$comment_status = $comment_stmt->execute();

if ($comment_status == false) {
    $error = $comment_stmt->errorInfo();
    exit("SQL_ERROR: " . $error[2]);
}

// コメントデータを取得
$comment = $comment_stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>


<div class="main-content">
<h2 class="topic-title"><?=h($post['title']) ?></h2>
<div class="topic-body">
<?=nl2br(h($post['body'])) ?>


<form method="POST" action="post.php">
    <label>コメントを更新:</label>
    <textarea name="comment" id="comment"required class="form-textarea"><?=$comment["comment"]?></textarea><br>
    <input type="hidden" name="id" value="<?=$comment["id"]?>">
    <input type="submit" value="更新" class="form-submit">
</form>
</div>
  
</body>
</html>

