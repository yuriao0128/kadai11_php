<?php
<<<<<<< HEAD
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
=======

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB接続
include('db.php');

// POSTデータが送信された場合
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = 1; // ここでユーザーIDを取得

    // データベースに新規投稿を追加
    $sql ="INSERT INTO bs_posts (user_id, title, body) VALUES (:user_id,:title,:body)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':body', $body, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute(); //ここで初めてSQLが設定される！ true or false

    //４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL:ERROR:".$error[2]); //2列目が認識できるエラー
  }else{
    //５．read.phpへリダイレクト
    header('Location: read.php');
    exit();
  }
}
?>

<!-- 左側のバーとヘッダーをinclude -->
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<div class="main-content">
<h2 class="topic-title">イベントを企画する</h2>

<form method="POST" action="">
    <input type="text" name="title" required class="form-input" placeholder="タイトルを入力"><br>
    <textarea name="body" required class="form-textarea"></textarea><br>
    <input type="submit" value="投稿" class="form-submit">
</form>
</div>
  
</body>
</html>

>>>>>>> af43cd1 (Initial commit of kadai09 project)
