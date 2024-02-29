<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>落札済み車両一覧</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/favorite.css">
</head>

<body>
    <header>
        <div id="header_flex">
            <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
            <form action="car_itirann.php" method="post">
                <input id="search_box" type="text" name="serach">
                <input id="search_button" type="submit" value="検索" maxlength="255">
            </form>
            <div id="header_icons">
                <p><img src="../../public/auction/img/material/bell.svg" alt=""></p>
                <!-- ログイン状態で切り替え -->
                <p><img src="../../public/auction/img/material/login.svg" alt=""></p>
                <!-- <p><img src="../../public/auction/img/material/logout.svg" alt=""></p> -->
                <!-- ユーザアイコン(画像はcssのbackground-imgで指定) -->
                <div id="header_user_icon"><img src="../../users/icon/4560209144081.jpg" alt=""></div>
            </div>
        </div>
    </header>
    <main>
        <h1>落札済みの車両はこちら</h1>
        <div class="car_list">
            <div class="car">
                <a href="">
                    <!-- 画像のディレクトリはPHPで作成 -->
                    <p><img src="../../cars/6/6_1.jpg" alt=""></p>
                    <p class="maker">メーカ名あああああああ</p>
                    <p class="car_kind">車種名ままままま</p>

                </a>
            </div>
            <div class="car">
                <a href="">
                    <!-- 画像のディレクトリはPHPで作成 -->
                    <p><img src="../../cars/6/6_1.jpg" alt=""></p>
                    <p class="maker">メーカ名あああああああ</p>
                    <p class="car_kind">車種名ままままま</p>

                </a>
            </div>
            <div class="car">
                <a href="">
                    <!-- 画像のディレクトリはPHPで作成 -->
                    <p><img src="../../cars/6/6_1.jpg" alt=""></p>
                    <p class="maker">メーカ名あああああああ</p>
                    <p class="car_kind">車種名ままままま</p>

                </a>
            </div>
            <div class="car">
                <a href="">
                    <!-- 画像のディレクトリはPHPで作成 -->
                    <p><img src="../../cars/6/6_1.jpg" alt=""></p>
                    <p class="maker">メーカ名あああああああ</p>
                    <p class="car_kind">車種名ままままま</p>

                </a>
            </div>
            <div class="car">
                <a href="">
                    <!-- 画像のディレクトリはPHPで作成 -->
                    <p><img src="../../cars/6/6_1.jpg" alt=""></p>
                    <p class="maker">メーカ名あああああああ</p>
                    <p class="car_kind">車種名ままままま</p>

                </a>
            </div>
        </div>

    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/auction/js/left_justified.js"></script>
</body>

</html>