<?php


  // ①DBへ接続
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

  // POSTでデータが送信された時のみSQLを実行する
  if (!empty($_POST)) {
      // $code= $_POST['code'];
      $sql = 'SELECT * FROM `survey` WHERE `code`= ?';
      $data[] = $_POST['code'];

        // SQLを実行
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);


        // データを取得する(echoの代わりに$...)
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $code = $rec['code'];
      $nickname =  $rec['nickname'];
      $email =  $rec['email'];
      $content = $rec['content'];
  }

  // ③DB切断
  $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>検索ページ</title>
  <meta charset="utf-8">
</head>
<body>
  <form method="post" action="">
    <p>検索したいcodeを入力してください。</p>
    <input name="code" type="text" style="width:100px"><br>
    <br>
    <input type="submit" value="検索">
  </form>

  <!-- 初期画面からエラーを消す。(コロン構文を使用) -->
  <?php if (!empty($_POST)): ?>
  <div>
    <p>code: <?php echo $code; ?></p>
    <p>nickname: <?php echo $nickname; ?></p>
    <p>email: <?php echo $email; ?></p>
    <p>content: <?php echo $content; ?></p>
  </div>
  <?php endif; ?>
</body>
</html>
