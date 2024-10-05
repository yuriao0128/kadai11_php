<?php
require 'db.php';  // データベース接続

//２．データ登録SQL作成
$sql = "SELECT * FROM bs_posts ORDER BY created_at DESC";
$stmt = $pdo->prepare("$sql");
$status = $stmt->execute(); //true or false

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$posts =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>


<!-- 左側のバーをinclude -->
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<div class="main-content">
<h2 class="fixed-header">イベントに参加しよう</h2>
<ul class="topic-list">
    <?php foreach ($posts as $post): ?>
        <li>
            <div class="topic-header">
            <strong><?=h($post['title']) ?></strong>
            <span><?= time_elapsed_string($post['created_at']) ?></span>
            </div>
                <div class="topic-body-short">
                <?=nl2br(h($post['body'])) ?>
                </div>

            <!-- コメント数の表示 -->
            <div class="comment-count">
                <i class="fas fa-comments"></i> <!-- FontAwesomeのコメントアイコン -->
                <?= countComments($post['id']) ?>件のコメント
            </div>

            <div class="topic-footer">
            <div class="left">
            <a href="post.php?id=<?= $post['id'] ?>">詳細を見る</a>
            </div>

            <div class="right">
            <a href="detail.php?id=<?= $post['id'] ?>"><i class="fas fa-edit"></i></a> <!-- 更新アイコン -->
            <a href="delete.php?id=<?= $post['id'] ?>"><i class="fas fa-trash"></i></a> <!-- 削除アイコン -->
            </div>

            </div>
        </li>
    <?php endforeach; ?>
</ul>
</div>