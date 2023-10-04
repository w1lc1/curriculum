<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$name = $_POST['name'];
$portAnswer = $_POST['port'];
$langAnswer = $_POST['lang'];
$commandAnswer = $_POST['command'];
$correctAnswer = json_decode($_POST['correctAnswer'], true);
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function checkAnswer($userAnswer, $correctAnswer) {
    if ($userAnswer == $correctAnswer) {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>回答</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <p><!--POST通信で送られてきた名前を表示--><?php echo $name;?>さんの結果は・・・？</p>
    <p>①の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php checkAnswer($portAnswer, $correctAnswer['port']); ?>
    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php checkAnswer($langAnswer, $correctAnswer['lang']); ?>
    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php checkAnswer($commandAnswer, $correctAnswer['command']); ?>
</body>
</html>