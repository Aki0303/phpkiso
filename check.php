  <?php
    $nickname = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $content = htmlspecialchars($_POST['content']);

    // ニックネームチェック echoの代わりに$キーを入力
    if ($nickname == '') {
      $nickname =  'ニックネームが入力されていません。';
    } else {
      $nickname = 'ようこそ' . $nickname . '様';
    }
    // メールアドレス
    if ($email == '') {
      $email = 'メールアドレスが入力されていません。';
    } else {
      $email = 'メールアドレス：' . $email;
    }

    // お問い合わせ内容
    if ($content == '') {
      $content = 'お問い合わせ内容が入力されていません。';
    } else {
      $content = 'お問い合わせ内容：' . $content;
    }
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>入力内容確認</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>入力内容確認</h1>
  <p><?php echo $nickname ?></p>
  <p><?php echo $email ?></p>
  <p><?php echo $content ?></p>

  <form method="post" action="thanks.php">
    <input type="hidden" name="nickname" value="<?php echo htmlspecialchars($_POST['nickname']); ?>">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
    <input type="hidden" name="content" value="<?php echo htmlspecialchars($_POST['content']); ?>">

    <input type="button" onclick="history.back()" value="戻る">
    <!-- $nickname でちゃんと表示されないのは、すでに文字列が入っているから。 -->
    <?php if ($_POST['nickname'] != '' && $_POST['email'] !=''&& $_POST['content'] != '') { ?>
      <input type="submit" value="OK">
    <?php } ?>
  </form>
</body>
</html>