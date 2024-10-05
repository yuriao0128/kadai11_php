<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';  // データベース接続
// POSTの詳細ページ（post.php）

// 投稿を取得
$post_id = $_GET['id'];
$sql ="SELECT * FROM bs_posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    exit("エラー: 指定された投稿が見つかりません。");
}

// コメントを追加
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['comment']) || empty($_POST['comment'])) {
        exit("エラー: コメントが入力されていません。");
    }   

    $comment = $_POST['comment'];
    $user_id = 1; // ユーザーID
    $stmt = $pdo->prepare("INSERT INTO bs_comments (post_id, user_id, comment) VALUES (?, ?, ?)");
    $stmt->execute([$post_id, $user_id, $comment]);
    header('Location: post.php?id=' . $post_id);
}

// コメントを取得
$stmt = $pdo->prepare("SELECT * FROM bs_comments WHERE post_id = ?");
$stmt->execute([$post_id]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- 左側のバーをinclude -->
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>


<div class="main-content">
<ul class="topic-list">
<h2 class="topic-title"><?=h($post['title']) ?></h2>
<div class="topic-body">
<li><?=nl2br(h($post['body'])) ?></li>
</div>
</ul>
<!-- 改行を反映にnl2brを仕様 -->

<ul class="comment-list">
    <?php foreach ($comments as $comment): ?>
        <li>
            <div class="comment-header">
            <div class="left">
            <i class="fas fa-user"></i>
            <strong><?= h($comment['user_id']) ?></strong> <!-- 仮にユーザー名を表示 -->
            </div>
            <div class="right">
            <span class="comment-time"><?= h(time_elapsed_string($comment['created_at'])) ?></span> <!-- コメント時間 -->
            </div>
        </div>
            <p class="comment-body"><?= nl2br(h($comment['comment'])) ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<form method="POST" action=""  class="fixed-comment-form">
    <label></label>
    <textarea name="comment" required class="form-textarea" placeholder="コメントを入力"></textarea><br>
    <input type="submit" value="投稿" class="form-submit">
</form>
</div>
