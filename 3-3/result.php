<?php
// タイムゾーンを日本時間に設定
date_default_timezone_set('Asia/Tokyo');

//②フォームからのデータを受け取ります
$name = $_GET['name'];
$number = $_GET['number'];

//③受け取った数字に1~6までのランダムな数字を掛け合わせて
//変数に入れてください
$randomNumber = rand(1, 6);
$result = $number * $randomNumber;

//④掛け合わせた数字の結果によっておみくじを選び、変数に入れます
if ($result >= 1 && $result <= 10) {
    $fortune = "凶";
} elseif ($result >= 11 && $result <= 15) {
    $fortune = "小吉";
} elseif ($result >= 16 && $result <= 20) {
    $fortune = "中吉";
} elseif ($result >= 21 && $result <= 25) {
    $fortune = "吉";
} elseif ($result >= 26 && $result <= 36) {
    $fortune = "大吉";
} else {
    $fortune = "残念";
}

//⑤今日の日付と、名前、番号、おみくじ結果を表示しましょう
$date = date('Y-m-d H:i:s');
    echo "{$date}<br>";
    echo "名前は{$name}です。<br>";
    echo "番号は{$result}です。<br>";
    echo "結果は{$fortune}です。<br>";