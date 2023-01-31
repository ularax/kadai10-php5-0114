<?php

session_start();
require_once('../funcs.php');
login_check();

//1. POSTデータ取得
$id = $_POST['id'];
$pet = $_POST['pet'];
$item = $_POST['item'];
$comment = $_POST['comment'];
$img = '';

// imgがある場合
if (isset($_FILES['img']['name'])) {
    $fileName = $_FILES['img']['name'];
    $img = date('YmdHis') . '_' . $_FILES['img']['name'];
}

// 簡単なバリデーション処理。
if (trim($_POST['pet']) === '') {
    $err[] = '名前を確認してください。';
}
if (trim($_POST['item']) === '') {
    $err[] = '項目を確認してください。';
}
if (trim($_POST['comment']) === '') {
    $err[] = 'メモを確認してください';
}
if (!empty($fileName)) {
    $check =  substr($fileName, -3);
    if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
        $err[] = '画像の内容を確認してください。';
    }
}
// もしerr配列に何か入っている場合はエラーなので、redirect関数でindexに戻す。その際、GETでerrを渡す。
if (isset($err) && count($err) > 0) {
    redirect('index.php?error=1');
}
/**
 * (1)$_FILES['img']['tmp_name']... 一時的にアップロードされたファイル
 * (2)'../picture/' . $image...写真を保存したい場所。先にフォルダを作成しておく。
 * (3)move_uploaded_fileで、（１）の写真を（２）に移動させる。
 */
if (isset($_FILES['img']['name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], '../images/' . $img);
}

//2. DB接続します
require_once('../funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
if (isset($_FILES['img']['name'])) {
    $stmt = $pdo->prepare('UPDATE gs_bm_table
                        SET
                            pet = :pet,
                            item = :item,
                            comment = :comment,
                            img = :img,
                            date = sysdate()
                        WHERE id = :id;');
    $stmt->bindValue(':pet', $pet, PDO::PARAM_STR);
    $stmt->bindValue(':item', $item, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindValue(':img', $img, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
} else {
    //  画像がない場合imgは省略する。
    $stmt = $pdo->prepare('UPDATE gs_bm_table
                        SET
                            pet = :pet,
                            item = :item,
                            comment = :comment,
                            date = sysdate()
                        WHERE id = :id;');
    $stmt->bindValue(':pet', $pet, PDO::PARAM_STR);
    $stmt->bindValue(':item', $item, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
}

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    redirect('select.php');
}


?>
