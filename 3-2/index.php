<?php
  //商品の税込価格を計算しましょう
  //①税率を定数TAXで作成しましょう。消費税は10%とします。
  define("TAX", 0.1);

  //②商品の情報を連想配列に入れましょう。
  $products = ["鉛筆" => 100, "消しゴム" => 150, "物差し" => 500];

  //③税率を計算する関数を用意します。
  //引数には値段を受け取り、税込価格を返答します。
  function taxInPrice($products) {
    return $products * (1 + TAX);
  }

  //④繰り返し文を使って画面に指定の文字を表示しましょう！
  foreach ($products as $productName => $productPrice) {
  $taxInproductPrice = taxInPrice($productPrice);
  echo "{$productName}の税込み価格は{$taxInproductPrice}円です";
  echo '<br>';
  }