<?php
// confirm.phpの中身は、ほとんどpost.phpに似ています。
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
login_check();

// post受け取る
$pet = $_POST['pet'];
$item = $_POST['item'];
$comment = $_POST['comment'];
$_SESSION['post']['pet'] = $_POST['pet'];
$_SESSION['post']['item'] = $_POST['item'];
$_SESSION['post']['comment'] = $_POST['comment'];

// var_dump($_FILES);

// if (isset($_FILES['img']['name'])) {
if ($_FILES['img']['name'] !=="") {
    $file_name = $_SESSION['post']['file_name'] = $_FILES['img']['name'];
    $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);
    $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);
} else {
    $file_name = $_SESSION['post']['file_name'] = '';
    $image_data = $_SESSION['post']['image_data'] = '';
    $image_type = $_SESSION['post']['image_type'] = '';
}

// 簡単なバリデーション処理。
if (trim($pet) === '' || trim($item) === '' || trim($comment) === '') {
    redirect('index.php?error');
}
if (!empty($file_name)) {
    $extension = substr($file_name, -3);
    if ($extension != 'jpg' && $extension != 'gif' && $extension != 'png') {
       redirect('index.php?error=1');
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('確認画面')?>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">メモリスト</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>

    <!-- errorを受け取ったら、エラー文出力。 -->

    <form method="post" action="register.php" enctype="multipart/form-data" class="mb-3">
    <legend class="legend">PetCare</legend>
    <table class="form">
        <tr>
            <dl>
                <td>
                    <dt class="form-title"><label for="pet">名前：</label></dt>
                </td>
                <td>
                    <dd>
                        <input type="hidden" name="pet" value="<?= $pet ?>" class="form-content">
                        <p><?= $pet ?></p>
                    </dd>
                </td>
            </dl>
        </tr>
        <tr>
            <dl>
                <td>
                    <dt class="form-title"><label for="pet">項目：</label></dt>
                </td>
                <td>
                    <dd>
                        <input type="hidden" name="item" value="<?= $item ?>" class="form-content">
                        <p><?= $item ?></p>
                    </dd>
                </td>
            </dl>
        </tr>
        <tr>
            <dl>
                <td>
                    <dt class="form-title"><label for="comment">メモ：</label></dt>
                </td>
                <td>
                    <dd>
                        <input type="hidden" name="comment" value="<?= $comment ?>" class="form-content" >
                        <p><?= nl2br($comment) ?></p>
                    </dd>
                </td>
            </dl>
        </tr>
        <tr>
            <dl>
                <td>
                    <dt class="form-title"><label for="img">画像：</label></dt>
                </td>
                <td>
                    <dd>
                        <?php if ($image_data) :?>
                        <img src="image.php">
                        <?php endif; ?>
                        <input type="file" name="img" id="img" class="form-content">
                    </dd>
                </td>
            </dl>
        </tr>
    <table class="button">
        <tr>
            <td><input class="submit" type="submit" value="登録する"></input></td>
            <td><a href="index.php?re-register=true" class="button submit">前の画面に戻る</a></td>
        </tr>
    </table>
    </form>
</body>
</html>

