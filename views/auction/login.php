<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/login.css">
</head>

<body>
    <header>
        <div id="header_flex">
            <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
            <!-- <form action="" method="get">
                <input id="search_box" type="text">
                <input id="search_button" type="submit" value="検索" maxlength="255">
            </form> -->
            <div id="header_icons">
                <!-- <p><img src="../../public/auction/img/material/bell.svg" alt=""></p> -->
                <!-- ログイン状態で切り替え -->
                <p><img src="../../public/auction/img/material/login.svg" alt=""></p>
                <!-- <p><img src="../../public/auction/img/material/logout.svg" alt=""></p> -->
                <!-- ユーザアイコン(画像はcssのbackground-imgで指定) -->
                <!-- <div id="header_user_icon"><img src="../../users/icon/4560209144081.jpg" alt=""></div> -->
            </div>
        </div>
    </header>
    <main>
        <div id="top_text">
            <h1>ログイン</h1>
        </div>
        <form action="../../public/auction/login.php" method="post">
            <table id="register_form">
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>ログインID</p>
                    </td>
                    <td class="tb_right">
                        <input type="text" name="id" placeholder="ログインIDを入力してください" autocomplete="off" required maxlength="255" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['id']) ? $err['id'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>パスワード</p>
                    </td>
                    <td class="tb_right">
                        <input type="password" name="pass" placeholder="パスワードを入力してください" autocomplete="off" required minlength="4" maxlength="20">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['pass']) ? $err['pass'] : ''; ?></p>
                    </td>
                </tr>
            </table>
            <p class="member_register_link"><a href="">新規会員登録はこちら→</a></p>
            <input id="submit" type="submit" name="btn" value="ログインする">
        </form>

    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
    <script src="../../public/auction/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/auction/js/icon_register.js"></script>
</body>

</html>