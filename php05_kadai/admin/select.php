<?php

//1.  DB接続します
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
login_check();

//２．データ取得SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();

//３．データ表示
$view='';
if ($status==false) {
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
}else{

//4.テーブル表示
  $view .= '<table border="1" width=100% ><tbody>';
  $view .= '<tr>
    <th class="header">登録日時</th>
    <th class="header">更新日時</th>
    <th class="header">名前</th>
    <th class="header">項目</th>
    <th class="header">メモ</th>
    <th class="header">画像</th>
    <th class="header">編集</th>
    <th class="header">削除</th>
    </tr>';

//5.テーブル中身（while文でデータを最後まで抽出する）
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr>';

      $view .= '<th class="date">';
        $view .= h($result['date']);
      $view .= '</th>';

      $view .= '<th class="date">';
        $view .= h($result['update_time']);
      $view .= '</th>';

      $view .= '<th>';
        $view .= h($result['pet']);
      $view .= '</th>';

      $view .= '<th>';
        $view .= h($result['item']);
      $view .= '</th>';

      $view .= '<th>';
        $view .= h($result['comment']);
      $view .= '</th>';

      $view .= '<th>';
        $view .= h($result['img']);
      $view .= '</th>';

      $view .= '<th class="delete">';
        $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        $view .= '[編集]';
        $view .= '</a>';
      $view .= '</th>';

      $view .= '<th class="delete">';
        $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        $view .= '[削除]';
        $view .= '</a>';
      $view .= '</th>';

    $view .= '<tr>';
    $pdo = null;

  }
  $view .= '</table></tbody>';
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>メモリスト</title>
<link href="../css/main.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="main">

<header>
  <nav class="navbar navbar-default">
      <div class="container-fluid">
          <div class="navbar-header"><a class="navbar-brand" href="index.php">登録画面</a></div>
          <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
      </div>
  </nav>
</header>
<header>
  <nav class="navbar navbar-default">メモリスト</nav>
</header>

<!-- Main[Start] -->
<div class="jumbotron">
    <div class="container text-center"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>

