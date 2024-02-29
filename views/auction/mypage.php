<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/mypage.css">
</head>

<body>
    <header>
        <div id="header_flex">
            <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
            <form action="" method="get">
                <input id="search_box" type="text">
                <input id="search_button" type="submit" value="検索" maxlength="255">
            </form>
            <div id="header_icons">
                <p><img src="../../public/auction/img/material/bell.svg" alt=""></p>
                <!-- ログイン状態で切り替え -->
                <!-- <p><img src="../../public/auction/img/material/login.svg" alt=""></p> -->
                <p><img src="../../public/auction/img/material/logout.svg" alt=""></p>
                <!-- ユーザアイコン(画像はcssのbackground-imgで指定) -->
                <div id="header_user_icon"><img src="../../users/icon/4560209144081.jpg" alt=""></div>
            </div>
        </div>
    </header>
    <main>
        <h1>マイページ</h1>
        <ul>
            <li class="link_btn"><a href="">会員情報変更</a></li>
            <li class="link_btn"><a href="">落札済み車両</a></li>
            <li class="link_btn"><a href="">お気に入り</a></li>
            <li class="link_btn"><a href="">閲覧履歴</a></li>
            <li id="withdrawal"><a href="">退会希望の方はこちら</a></li>
        </ul>
    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./auction/js/postAddress.js"></script>
</body>

</html>