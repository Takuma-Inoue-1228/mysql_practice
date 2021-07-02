<!doctype html>
<html lang= 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<pre>
<?php

  require ('dbconect.php');

  $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
  $statement->bindParam(1, $_POST['memo']);
  $statement->execute();
  echo '送信されました。';

?>

</pre>
<a href="index.php">一覧へ</a>
</main>
</body>    
</html>