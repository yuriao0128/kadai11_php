<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>ログイン</title>
</head>
<body>

<!-- 左側のバーとヘッダーをinclude -->
<?php include('top_header.php'); ?>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid">
PW:<input type="password" name="lpw">
<input type="submit" value="ログイン">
<a href="user.php"><p>新規登録はこちら</p></a>
</form>


</body>
</html>