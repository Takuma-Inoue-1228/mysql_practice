<?php

// 1.DB接続
// 2.データを取得する
// 3.カテゴリー名を取得

// 1.DB接続
// 引数：なし
// 返り値：DBへの接続結果
function dbConnect()
{
  $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
  $user = 'blog_user';
  $pass = '1228';

  try {
    $dbh = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
  } catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage();
    exit();
  }
  return $dbh;
}

// 2.データを取得する
// 引数：なし
// 返り値：取得したデータ
function getAllBlog()
{
  $dbh = dbConnect();
  // 1.SQLの準備
  $sql = 'SELECT * FROM blog';
  // 2.SQLの実行
  $stmt = $dbh->query($sql);
  // 3.SQLの結果を受け取る
  // 以下fetchAll
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
  $dbh = null;
}

//取得したデータを表示
$blogData = getAllBlog();

// 3.カテゴリー名を取得
// 引数：数字
// 返り値：カテゴリーの文字列
function setCategoryName($category)
{
  if ($category === '1') {
    return 'ブログ';
  } elseif ($category === '2') {
    return '仕事';
  } else {
    return 'それ以外';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ一覧</title>
</head>

<body>
  <h2>ブログ一覧</h2>
  <table>
    <tr>
      <th>No</th>
      <th>タイトル</th>
      <th>カテゴリ</th>
    </tr>
    <?php foreach ($blogData as $columun) : ?>
      <tr>
        <td><?php echo $columun['id'] ?></td>
        <td><?php echo $columun['title'] ?></td>
        <td><?php echo setCategoryName($columun['category']) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>