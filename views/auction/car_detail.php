<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <title>車両詳細</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/car_detail.css">
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
        <section id="car_detail_contents">
            <div id="car_name_flex">
                <!-- phpで代入 -->
                <h1><?php echo $select_top[0]['car_name'];?></h1>
                <!-- phpで代入 -->
                <p><?php echo $select_top[0]['drive_system'];?></p>
            </div>
            <div id="car_flex">
                <div id="car_images">
                    <!-- jsで表示する画像を切り替える -->
                    <p><img id="car_hero_img" src="../../cars/6/6_3.jpg" alt=""></p>
                    <div>
                        <p><img class="car_img" src="../../cars/6/6_1.jpg" alt=""></p>
                        <p><img class="car_img" src="../../cars/6/6_2.jpg" alt=""></p>
                        <p><img class="car_img" src="../../cars/6/6_3.jpg" alt=""></p>
                        <p><img class="car_img" src="../../cars/6/6_4.jpg" alt=""></p>
                    </div>
                </div>
                <div id="right_contents">
                    <div id="price_flex">
                        <!-- いらないかも -->
                        <div>
                            <p>即決価格<br><span class="red"><?php echo number_format($select_body[0]['buyout']); ?>円</span></p>
                        </div>
                    </div>
                    <table id="mini_detail">
                        <?php
                        foreach ($list as $key => $value) { ?>
                            <tr>
                                <td><?php echo $key; ?></td>
                                <td><?php echo $value; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div id = "favorite">
                        <?php if(isset($_COOKIE['id'])){
                            if($flag){?>
                            <button id="favorite_insert" value="<?php echo $car_id;?>">お気に入りに登録する</button>
                        <?php }else{ ?>
                            <button id="favorite_delete" value="<?php echo $car_id;?>">お気に入りに登録済</button>
                        <?php }
                        }?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h2>詳細スペック</h2>
            <table id="register_form">
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>メーカー名</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $maker; ?></p>
                    </td>
                </tr>
                <tr class="date_form form">
                    <td class="tb_left">
                        <p>ボディタイプ</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $body; ?></p>
                    </td>
                </tr>
                <tr class="radio_form form">
                    <td class="tb_left">
                        <p>ミッション</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $mission; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>カラー</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $color; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>出品日時</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $listing_date; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>評価点</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $point; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>車歴</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $car_history; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>修理歴</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $car_repair; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>乗車定員数</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $capacity; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>グレード</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $grade; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>ETC</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $etc; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>ナビ</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $navi; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>電動スライド</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $slide_door; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>禁煙車</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $smoke; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>ペットの同乗歴</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $pet; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>取扱説明書の有無</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $explanation; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>限定車</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $limited; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>寒冷地仕様</p>
                    </td>
                    <td class="tb_right">
                        <!-- phpで代入 -->
                        <p><?php echo $cold_car; ?></p>
                    </td>
                </tr>
            </table>
            <p><a href="../../public/auction/car_list.php">一覧に戻る</a></p>

        </section>
    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/auction/js/img_change.js"></script>
    <script src="../../public/auction/js/car_detail.js"></script>

</body>

</html>