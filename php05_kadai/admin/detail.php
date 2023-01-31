<?php
session_start();

// 1. ログインチェク処理 loginCheck()
require_once('../funcs.php');
require_once('../common/head_parts.php');
login_check();

$id = $_GET['id'];

//1.  DB接続します
require_once('../funcs.php');
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
//SQLエラー関数：sql_error($stmt)*** function化する！***
    sql_error($stmt);
    } else {
    //データが取得できた場合の処理
    $result = $stmt->fetch();
  }
  ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('編集画面')?>
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

<?php if (isset($_GET['error'])): ?>
    <p class="text-danger">記入内容を確認してください</p>
<?php endif;?>

<form method="post" action="update.php">
<legend class="legend">PetCare</legend>
<table class="form">
    <tr>
        <dl>
            <td>
                <dt class="form-title">
                    <label for="pet">名前：</label>
                </dt>
            </td>
            <td>
                <dd>
                    <input type="text" name="pet"
                    value="<?= $result['pet']?>" class="form-content">
                </dd>
            </td>
        </dl>
    </tr>
    <tr>
        <dl>
            <td>
                <dt class="form-title">
                    <label for="item">項目：</label>
                </dt>
            </td>
            <td>
                <dd>
                    <input type="text" name="item"
                    value="<?= $result['item']?>" class="form-content">
                </dd>
            </td>
        </dl>
    </tr>
    <tr>
        <dl>
            <td>
                <dt class="form-title">
                    <label for="comment">メモ：</label>
                </dt>
            </td>
            <td>
                <dd>
                    <Textarea name="comment" id="comment" class="form-content"><?= $result['comment']?>
                    </textArea>
                </dd>
            </td>
        </dl>
    </tr>
    <tr>
        <dl>
            <td>
                <dt class="form-title">
                    <label for="img">画像：</label>
                </dt>
            </td>
            <td>
                <dd>
                    <?php if ($image_data) :?>
                    <div class="mb-3">
                    <img src="image.php">
                    </div>
                    <?php endif; ?>
                    <input type="file" name="img" id="img" class="form-content">
                </dd>
            </td>
        </dl>
    </tr>
    <!--typeを書き換えられないようにするためフロントに見せないよう、hiddenにすること-->
    <input type="hidden" name="id" value="<?= $result['id']?>">
</table>
<table class="button">
    <tr>
        <td><input class="submit" type="submit" value="更新する"></input></td>
        <td><input class="reset" type="reset" value="リセット"></input></td>
    </tr>
</table>
</form>
</body>
</html>

