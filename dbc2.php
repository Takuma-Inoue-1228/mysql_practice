<?php 

$dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
$user = 'blog_user';
$pass = '1228';

try{
  $dbh = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ]);
  // echo '接続成功';
  // 1.SQLの準備
  $sql = 'SELECT * FROM blog';
  // 2.SQLの実行
  $stmt = $dbh->query($sql);
  // 3.SQLの結果を受け取る

  // 以下fetchAll
  // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // public PDOStatement::fetchAll(int $mode = PDO::FETCH_DEFAULT): array

  // 以下fetch
  // public PDOStatement::fetch(int $mode = PDO::FETCH_DEFAULT, int $cursorOrientation = PDO::FETCH_ORI_NEXT, int $cursorOffset = 0): mixed
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  var_dump($result);
  $dbh = null;
}catch(PDOException $e) { 
  echo '接続失敗'. $e->getMessage();
  exit();
}

?>