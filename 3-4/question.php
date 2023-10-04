<?php
//POST送信で送られてきた名前を受け取って変数を作成
$name = $_POST['name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$ports = ["80", "22", "20", "21"];
$langs = ["PHP", "Python", "JAVA", "HTML"];
$commands = ["join", "select", "insert", "update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$correctAnswers = ["port" => "80", "lang" => "HTML", "command" => "select"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>問題</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>お疲れ様です<!--POST通信で送られてきた名前を出力--><?php echo $name;?>さん</p>
    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="post">
    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
    foreach ($ports as $port) {
        echo '<input type="radio" name="port" value="' . $port . '"> ' . $port;
    }
    ?>
    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
    foreach ($langs as $lang) {
        echo '<input type="radio" name="lang" value="' . $lang . '"> ' . $lang;
    }
    ?>
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
    foreach ($commands as $command) {
        echo '<input type="radio" name="command" value="' . $command . '"> ' . $command;
    }
    ?>
    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <input type="hidden" name="correctAnswer" value="<?php echo htmlspecialchars(json_encode($correctAnswers)); ?>">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <br>
    <input type="submit" value="回答する">
</form>
</body>
</html>