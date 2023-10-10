<?php
date_default_timezone_set('Asia/Tokyo');
require_once("getData.php");

// データ取得用クラスのインスタンス化
$data = new getData();

// ユーザ情報の取得
$userData = $data->getUserData();

// 記事情報の取得
$postData = $data->getPostData();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>4章チェックテスト</title>
    <link rel="stylesheet" href="style.css?version=1.1">
</head>
<body>
    <header>
        <img class = "logo clearfix" src="YI_logo.png" alt="YIロゴ">
        <div class = "top clearfix">
            <h1>ようこそ<?php echo $userData['last_name']; ?><?php echo $userData['first_name']; ?>さん</h1>
            <h2>最終ログイン日：<?php echo date('Y-m-d H:i:s', strtotime($userData['last_login']));?></h2>
        </div>
    </header>
    <main>
        <table>
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <?php
            foreach ($postData as $post) {
                $category = ($post['category_no'] == 1) ? '食事' : (($post['category_no'] == 2) ? '旅行' : 'その他');
                echo '<tr>';
                echo '<td>' . $post['id'] . '</td>';
                echo '<td>' . $post['title'] . '</td>';
                echo '<td>' . $category . '</td>';
                echo '<td>' . $post['comment'] . '</td>';
                echo '<td>' . $post['created'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </main>
    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>
