<?php
//index.phpがpost.phpの機能を兼ねている

// 1. ログインチェク処理 loginCheck()
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
login_check();

$pet = '';
$item = '';
$comment = '';
$image_data = '';

if (isset($_SESSION['post']['pet'])) {
    $pet = $_SESSION['post']['pet'];
}
if (isset($_SESSION['post']['item'])) {
    $item = $_SESSION['post']['item'];
}
if (isset($_SESSION['post']['comment'])) {
    $comment = $_SESSION['post']['comment'];
}
if (isset($_SESSION['post']['image_data'])) {
    $image_data = $_SESSION['post']['image_data'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('登録画面')?>
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

<form method="post" action="confirm.php" enctype="multipart/form-data">
<legend class="legend">PetCare</legend>
<table class="form">
    <tr>
        <dl>
            <td>
                <dt class="form-title"><label for="pet">名前：</label></dt>
            </td>
            <td>
                <dd>
                    <select name="pet" id="pet" class="form-content" value="<?= $pet ?>">
                        <option value="">--- ペットの名前を選んでください（入力必須） ---</option>
                        <option value="LOLA">LOLA</option>
                        <option value="ROCCO">ROCCO</option>
                        <option value="LULU">LULU</option>
                        <option value="LUKE">LUKE</option>
                    </select>
                </dd>
            </td>
        </dl>
    </tr>
    <tr>
        <dl>
            <td>
            <dt class="form-title"><label for="item">項目：</label></dt>
                </td>
            <td>
                <dd>
                    <select name="item" id="item" class="form-content">
                        <option value="">--- 項目を選んでください（入力必須） ---</option>
                        <option value="ごはん">ごはん</option>
                        <option value="くすり">くすり</option>
                        <option value="うんち">うんち</option>
                        <option value="おしっこ">おしっこ</option>
                        <option value="おさんぽ">おさんぽ</option>
                        <option value="嘔吐">嘔吐</option>
                        <option value="病院">病院</option>
                        <option value="トリミング">トリミング</option>
                        <option value="トレーニング">トレーニング</option>
                        <option value="ホテル">ホテル</option>
                        <option value="その他">その他</option>
                    </select>
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
                <dd><Textarea name="comment" id="comment" class="form-content" placeholder="入力必須"></textArea></dd>
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
                <?php if ($image_data): ?>
                <img src="image.php">
                <?php endif;?>
                <input type="file" name="img" id="img" class="form-content">
                </dd>
            </td>
        </dl>
    </tr>

</table>
<table class="button">
        <tr>
            <td><input class="submit" type="submit" value="登録する"></input></td>
            <td><input class="reset" type="reset" value="リセット"></input></td>
        </tr>
</table>
</form>
    <!-- Main[End] -->
</body>
</html>
