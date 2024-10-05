<?php
//ローカルホストで仕様する場合のために残しておく
// $host = 'localhost';
// $dbname = 'beshift';
// $user = 'root';
// $pass = '';

//さくらサーバー用1 - Githubに上げない様に注意 -
$host = 'mysql80.beshift.sakura.ne.jp';
$dbname = 'beshift_bc_db';
$user = '*****';
$pass = '*****';

try {
  //Password:MAMP='root',XAMPP=''　MAMP = パスワードがroot
  $pdo = new PDO("mysql:dbname=$dbname;charset=utf8;host=$host",$user,$pass); //rootは固定　サクラの時は変更が必要！ 'パスワード入れる'
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage()); //エラーが表示される
  // DB_CONECTは自分で把握をするための文字、なくてもOK
  // exitを使うとここで止める
}

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    }

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

// 時間経過を表示する関数
date_default_timezone_set('Asia/Tokyo');
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $string = [
        'y' => '年',
        'm' => 'ヶ月',
        'd' => '日',
        'h' => '時間',
        'i' => '分',
        's' => '秒',
    ];
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '前' : '今';
}

// コメント数を取得する関数
function countComments($post_id) {
  global $pdo;
  $sql = "SELECT COUNT(*) FROM bs_comments WHERE post_id = :post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchColumn();
}


?>

