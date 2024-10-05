<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB接続
include('db.php');

// POSTデータが送信された場合
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $id = $_POST["id"];
    $user_id = 1; // ここでユーザーIDを取得

    // データベースに新規投稿を追加
    $sql ="UPDATE bs_posts SET title=:title,body=:body,user_id=:user_id WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':body', $body, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
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