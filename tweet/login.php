<?php


require_once 'h.php';

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// セッションを開始

session_start();

// 一人目のユーザーの登録
$userid[] = 'admin';
$username[] = 'テストユーザ１';
// パスワード[pass1]をpassword_hash()関数でハッシュ化
$hash[] = '$2y$10$MeurUlzg8gzCHKYkDMrz/.9/3eq2qxI.GyBFy65F8BFym2/YS67dq';
// 二人目のユーザーの登録
$userid[] = 'test';
$username[] = 'テストユーザ２';
// パスワード[pass2]をpassword_hash()関数でハッシュ化
$hash[] = '$2y$10$Jb/beQEUPERIYRyzsZUcT.9U9qsLqQLOXQXaKJrjlIQwRreTkKns6';
// エラーメッセージの変数を初期化
$error = '';

// 認証済みかどうかのセッション変数を初期化
if (isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
} else {
    $_SESSION['auth'] = null;
}




if (isset($_POST['userid']) && isset($_POST['password'])) {
    foreach ($userid as $key => $value) {
        if (
            $_POST['userid'] === $userid[$key] &&
            // 入力されたパスワード文字列とハッシュ化済みパスワードを照合
            password_verify($_POST['password'], $hash[$key])
        ) {
            // セッション固定化攻撃を防ぐため、セッションIDを変更
            session_regenerate_id(true);
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $username[$key];
            break;
        }
    }

    if ($_SESSION['auth'] === false) {
        $error = 'ユーザーIDかパスワードに誤りがあります';
    }
}
if ($_SESSION['auth'] !== true) {
    ?>
    <!DOCTYPE html>
    <html lang="ja">

    <head>


        <meta name="theme-color" content="#2196f3" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--PWA動作用マニフェスト-->
        <link rel="manifest" href="manifest.json">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- TKK CSS -->
        <link rel="stylesheet" href="css/tkk.css">
        <!--icon-->
        <link rel="apple-touch-icon" sizes="180x180" href="images/icon-192x192.png">
        <title>保険日記システム</title>

    </head>

    <body>


        <div class="container">

            <div id="login">







                <div class="card">
                    <h5 class="card-header bg-info text-white text-center py-4"><strong>保険日記(LOGINTEST)</strong></h5>
                    <div class="card-body px-lg-5 pt-0">

                        <form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="post">
                            <label for="materialLoginFormEmail">ユーザID</label>
                            <input type="text" name="userid" class="form-control">
                            <label for="materialLoginFormPassword">パスワード</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <button class="btn btn-outline-info rounded-pill btn-block my-4 " type="submit" name="submit">ログイン</button>
                            <div class="text-center">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="toggleable">
                <input class="toggleable__control hidden--visually" id="toggleable1" type="checkbox" />
                <label class="toggleable__label" for="toggleable1">
                    取扱い説明書
                </label>
                <div class="toggleable__content">あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ
                    <button class="btn btn-info" id="btn_update">キャッシュ更新</button></div>
            </div>

            
            <?php
                    if ($error) {
                        // エラー文がセットされていれば赤色で表示
                        echo '<p style="color:red;">' . h($error) . '</p>';
                    }
                    ?>

        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!--PWA動作用スクリプト　＊一番最後-->
    <script src="tkkpwa.js"></script>






    </body>

    </html>
<?php
    // スクリプトを終了し、認証が必要なページが表示されないようにする
    exit();
}
