<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <title>ログイン</title>
</head>

<body>
    
    <header>
        <nav class="navbar navbar-default">PetCare</nav>
    </header>

    <!-- login_act.php は認証処理用のPHPです。 -->
    <form name="form1" method="post" action="login_act.php">
    <table class="form">
        <tr>
            <dl>
                <td>
                    <dt class="form-title"><label for="title">ユーザーID：</label></dt>
                </td>
                <td>
                    <dd><input type="text" name="lid" id="title" class="form-content"></dd>
                </td>
            </dl>
        </tr>
        <tr>
            <dl>
                <td>
                <dt class="form-title"><label for="url">パスワード：</label></dt>
                    </td>
                <td>
                    <dd><input type="password" name="lpw" id="url" class="form-content"></dd>
                </td>
            </dl>
        </tr>
        <tr class="button">
            <td><input class="submit" type="submit" value="ログイン" /></td>
        </tr>
    </table>
    </form>
</body>
</html>
