<?php

require_once('../funcs.php');
session_start();
login_check();

$pdo = db_conn();
$id = $_GET['id'];

// 1. まず保存された画像があれば削除する。
// (1)まず画像があるか確認
$stmt = $pdo->prepare("SELECT img FROM gs_bm_table WHERE id=" . $id . ';');
$status = $stmt->execute();

// (2)もし画像がある場合
if ($status) {
    $result = $stmt->fetch();
    $imgName = $result['img'];
    // unlink()で削除
    unlink('../images/' . $imgName);
}

// 3. データの削除
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>
