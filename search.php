<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'db.php';  // データベース接続

$search_results = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['keyword'])) {
    $keyword = "%" . $_GET['keyword'] . "%";

    // トピックをキーワードで検索するSQL
    $sql = "SELECT * FROM bs_posts WHERE title LIKE ? OR body LIKE ? ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$keyword, $keyword]);

    $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 結果があった場合、件数を表示するメッセージ
    if (!empty($search_results)) {
        $message = count($search_results) . "件のキーワードが含まれるトピックがありました。";
    } else {
        $message = '該当するトピックはありませんでした。';
    }
}
?>
    <!-- 左側のバーをinclude -->
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

    <!-- メインコンテンツ -->
    <div class="main-content">
        <h2 class="topic-title">イベントを検索</h2>

        <form method="GET" action="search.php">
            <input type="text" name="keyword" placeholder="キーワードを入力" class="form-input" required>
            <input type="submit" value="検索" class="form-submit">
        </form>

        <?php if ($message): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <!-- 検索結果を表示 -->
        <ul class="topic-list">
            <?php foreach ($search_results as $result): ?>
                <li>
                    <div class="topic-header">
                        <strong><?= htmlspecialchars($result['title']) ?></strong>
                        <span><?= time_elapsed_string($result['created_at']) ?></span>
                    </div>
                    <div class="topic-body-short">
                        <?= nl2br(htmlspecialchars($result['body'])) ?>
                    </div>
                    <div class="topic-footer">
                        <a href="post.php?id=<?= $result['id'] ?>" class="detail-link">詳細を見る</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

</body>
</html>

