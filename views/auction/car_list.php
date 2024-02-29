<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>車両一覧</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/car_list.css">
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
        <h1>検索結果</h1>
        <?php if ($_SESSION['auction'] == '0') { ?>
            <!-- オークション中のみ -->
            <section id="auction_now">
                <!-- 検索結果の中で、オークション開催中の車両はここに表示 -->
                <h2>オークション開催中の車両はこちら</h2>
                <div class="car_list">
                    <?php if (empty($auction_list)) { ?>
                        <p>検索結果に該当する車両がありません</p>
                    <?php } else { ?>
                        <?php foreach ($auction_list as $key => $value) { ?>
                            <div class="car">
                                <a href="../../public/auction/car_detail.php?id=<?php echo $value['car_id']; ?>">
                                    <!-- 画像のディレクトリはPHPで作成 -->
                                    <p><img src="../../cars/<?php echo $value['car_id']; ?>/<?php echo $value['car_id']; ?>_<?php echo $auction_img[$key][0]['img_id']; ?>.<?php echo $auction_img[$key][0]['ext']; ?>" alt=""></p>
                                    <!-- 車両名 -->
                                    <p class="maker">車両名:<?php echo $value['car_name']; ?></p>
                                    <!-- 価格 -->
                                    <p>価格:<?php echo number_format($value['listing_price']); ?>円</p>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </section>
        <?php } else if ($_SESSION['auction'] == '1') { ?>
            <!-- オークション外のみ-->
            <section id="not_auction">
                <!-- オークション中じゃないものはこっち -->
                <div class="car_list">
                    <?php if (empty($car_list)) { ?>
                        <p>検索結果に該当する車両がありません</p>
                    <?php } else { ?>
                        <?php foreach ($car_list as $key => $value) { ?>
                            <div class="car">
                                <a href="../../public/auction/car_detail.php?id=<?php echo $value['car_id']; ?>">
                                    <!-- 画像のディレクトリはPHPで作成 -->
                                    <p><img src="../../cars/<?php echo $value['car_id']; ?>/<?php echo $value['car_id']; ?>_<?php echo $car_img[$key][0]['img_id']; ?>.<?php echo $car_img[$key][0]['ext']; ?>" alt=""></p>
                                    <!-- 車両名 -->
                                    <p class="maker">車両名:<?php echo $value['car_name']; ?></p>
                                    <!-- 価格 -->
                                    <p>価格:<?php echo number_format($value['listing_price']); ?>円</p>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </section>
        <?php } else { ?>
            <!-- 両方 -->
            <section id="auction_now">
                <!-- 検索結果の中で、オークション開催中の車両はここに表示 -->
                <h2>オークション開催中の車両はこちら</h2>
                <div class="car_list">
                    <?php if (empty($auction_list)) { ?>
                        <p>検索結果に該当する車両がありません</p>
                    <?php } else { ?>
                        <?php foreach ($auction_list as $key => $value) { ?>
                            <div class="car">
                                <a href="../../public/auction/car_detail.php?id=<?php echo $value['car_id']; ?>">
                                    <!-- 画像のディレクトリはPHPで作成 -->
                                    <p><img src="../../cars/<?php echo $value['car_id']; ?>/<?php echo $value['car_id']; ?>_<?php echo $auction_img[$key][0]['img_id']; ?>.<?php echo $auction_img[$key][0]['ext']; ?>" alt=""></p>
                                    <!-- 車両名 -->
                                    <p class="maker">車両名:<?php echo $value['car_name']; ?></p>
                                    <!-- 価格 -->
                                    <p>価格:<?php echo number_format($value['listing_price']); ?>円</p>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </section>
            <section id="not_auction">
                <!-- オークション中じゃないものはこっち -->
                <div class="car_list">
                    <?php if (empty($car_list)) { ?>
                        <p>検索結果に該当する車両がありません</p>
                    <?php } else { ?>
                        <?php foreach ($car_list as $key => $value) { ?>
                            <div class="car">
                                <a href="../../public/auction/car_detail.php?id=<?php echo $value['car_id']; ?>">
                                    <!-- 画像のディレクトリはPHPで作成 -->
                                    <p><img src="../../cars/<?php echo $value['car_id']; ?>/<?php echo $value['car_id']; ?>_<?php echo $car_img[$key][0]['img_id']; ?>.<?php echo $car_img[$key][0]['ext']; ?>" alt=""></p>
                                    <!-- 車両名 -->
                                    <p class="maker">車両名:<?php echo $value['car_name']; ?></p>
                                    <!-- 価格 -->
                                    <p>価格:<?php echo number_format($value['listing_price']); ?>円</p>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>
    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/auction/js/left_justified.js"></script>
</body>

</html>