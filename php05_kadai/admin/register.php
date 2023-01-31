<?php

session_start();
require_once('../funcs.php');
login_check();

$pet = $_POST['pet'];
$item = $_POST['item'];
$comment  = $_POST['comment'];
$img = '';

//画像がある場合、画像データをimagesフォルダに格納し、画像パスをデータベースに保存する。
//Macはimagesフォルダの書き込み権限を変更すること。
if ($_SESSION['post']['image_data'] !== "") {
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
    file_put_contents("../images/$img", $_SESSION['post']['image_data']);
}

// 簡単なバリデーション処理追加。
if (trim($pet) === '' || trim($item) === '' || trim($comment) === '') {
    redirect('index2.php?error');
}
if (isset($_SESSION['post']['image_data'])) {
    file_put_contents('../images/' . $img, $_SESSION['post']['image_data']);
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_bm_table(
                            pet, item, comment, img, date
                        )VALUES(
                            :pet, :item, :comment, :img, sysdate()
                        )');
$stmt->bindValue(':pet', $pet, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('select.php');
}
