<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
login_check();

$pet = '';
$item = '';
$comment = '';

if (isset($_SESSION['post']['pet'])) {
    $pet = $_SESSION['post']['pet'];
}
if (isset($_SESSION['post']['item'])) {
    $item = $_SESSION['post']['item'];
}
if (isset($_SESSION['post']['comment'])) {
    $comment = $_SESSION['post']['comment'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('登録画面')?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">ブログ画面へ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- // もしURLパラメータがある場合 -->
    <?php if (isset($_GET['error'])) : ?>
        <p class='text-danger'>記入内容を確認してください。</p>
    <?php endif ?>

    <form method="POST" action="confirm.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="pet" class="form-label">名前</label>
            <input type="text" class="form-control" name="pet"
            id="pet" aria-describedby="pet"
            value="<?= $pet ?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>
        <div class="mb-3">
            <label for="item" class="form-label">項目</label>
            <input type="text" class="form-control" name="item"
            id="item" aria-describedby="item"
            value="<?= $item ?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">メモ</label>
            <textArea type="text" class="form-control" name="comment"
            id="comment" aria-describedby="comment"
            rows="4" cols="40"><?= $comment ?></textArea>
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">画像</label>
            <input type="file" name="img">
        </div>

        <button type="submit" class="btn btn-primary">投稿する</button>
    </form>
</body>
</html>
