<?php
require 'db.php';  // データベース接続
//1.POSTデータ取得
$id = $_GET['id'];

// データの削除
$stmt = $pdo->prepare("DELETE FROM bs_posts WHERE id =:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("read.php");
}
?>