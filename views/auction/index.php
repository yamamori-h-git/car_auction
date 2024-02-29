<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録ページ</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/index.css">
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
        <!-- オークション画像一覧へのリンク書く -->
        <a href="">
            <div id="hero_img"></div>
        </a>
        <section>
            <h2>中古車を検索する</h2>
            <form action="../../public/auction/car_list.php" method="post">
                <table id="register_form">
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>メーカー</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="maker" id="maker">
                                    <option value="" selected>すべてのメーカー</option>
                                    <?php for ($i = 0; $i < count($select); $i++) { ?>
                                        <option value="<?php echo $select[$i]['maker']; ?>"><?php echo $select[$i]['maker']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>車種</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="kind" id="kind">
                                    <option value="">すべての車種</option>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form double_form">
                        <td class="tb_left">
                            <p>年式</p>
                        </td>
                        <td class="tb_right">
                            <div class="form_flex">
                                <div class="select">
                                    <select name="model_year_min">
                                        <option value="" selected>下限無し</option>
                                        <?php for ($i = 2023; $i > 1980; $i--) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>年</option>
                                        <?php } ?>
                                    </select>
                                    <div class="triangle"></div>
                                </div>
                                <span>～</span>
                                <div class="select">
                                    <select name="model_year_max">
                                        <option value="" selected>上限無し</option>
                                        <?php for ($i = 2023; $i > 1980; $i--) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>年</option>
                                        <?php } ?>
                                    </select>
                                    <div class="triangle"></div>
                                </div>

                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>カラー</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="color">
                                    <option value="" selected>全選択</option>
                                    <?php for ($i = 0; $i < count($select); $i++) { ?>
                                        <option value="<?php echo $select[$i]['color_name']; ?>"><?php echo $select[$i]['color_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form double_form">
                        <td class="tb_left">
                            <p>価格</p>
                        </td>
                        <td class="tb_right">
                            <div class="form_flex">
                                <div class="select">
                                    <select name="price_min">
                                        <option value="" selected>下限無し</option>
                                        <?php for ($i = 1; $i < 21; $i++) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 25; $i < 51; $i = $i + 5) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 60; $i < 201; $i = $i + 10) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 220; $i < 401; $i = $i + 20) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 220; $i < 401; $i = $i + 20) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <option value="4500000">450万円</option>
                                        <option value="5000000">500万円</option>
                                        <option value="6000000">600万円</option>
                                        <option value="7000000">700万円</option>
                                        <option value="8000000">800万円</option>
                                        <option value="9000000">900万円</option>
                                    </select>
                                    <div class="triangle"></div>
                                </div>
                                <span>～</span>
                                <div class="select">
                                    <select name="price_max">
                                        <option value="" selected>上限無し</option>
                                        <?php for ($i = 1; $i < 21; $i++) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 25; $i < 51; $i = $i + 5) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 60; $i < 201; $i = $i + 10) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 220; $i < 401; $i = $i + 20) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <?php for ($i = 220; $i < 401; $i = $i + 20) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万円</option>
                                        <?php } ?>
                                        <option value="4500000">450万円</option>
                                        <option value="5000000">500万円</option>
                                        <option value="6000000">600万円</option>
                                        <option value="7000000">700万円</option>
                                        <option value="8000000">800万円</option>
                                        <option value="9000000">900万円</option>
                                    </select>
                                    <div class="triangle"></div>
                                </div>
                            </div>

                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>

                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>期間</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="period">
                                    <option value="2week">2週間</option>
                                    <option value="1month">1カ月</option>
                                    <option value="3month">3カ月</option>
                                    <option value="1year">1年</option>
                                    <option value="3year">3年</option>
                                    <option value="" selected>全期間</option>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form double_form">
                        <td class="tb_left">
                            <p>走行距離</p>
                        </td>
                        <td class="tb_right">
                            <div class="form_flex">
                                <div class="select">
                                    <select name="run_min">
                                        <option value="" selected>下限無し</option>
                                        <option value="5000">5,000km</option>
                                        <?php for ($i = 1; $i < 21; $i++) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万km</option>
                                        <?php } ?>
                                    </select>
                                    <div class="triangle"></div>
                                </div>
                                <span>～</span>
                                <div class="select">
                                    <select name="run_max">
                                        <option value="" selected>上限無し</option>
                                        <option value="5000">5,000km</option>
                                        <?php for ($i = 1; $i < 21; $i++) { ?>
                                            <option value="<?php echo $i; ?>0000"><?php echo $i; ?>万km</option>
                                        <?php } ?>
                                    </select>
                                    <div class="triangle"></div>
                                </div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>ミッション</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="mission">
                                    <option value="" selected>全選択</option>
                                    <option value="mt">MT</option>
                                    <option value="at">AT</option>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>評価点</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="point">
                                    <option value="" selected>全選択</option>
                                    <?php for ($i = 0; $i < count($select); $i++) { ?>
                                        <option value="<?php echo $select[$i]['car_points']; ?>"><?php echo $select[$i]['car_points']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>ボディタイプ</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="body">
                                    <option value="" selected>全選択</option>
                                    <?php for ($i = 0; $i < count($selectbody); $i++) { ?>
                                        <option value="<?php echo $selectbody[$i]['body']; ?>"><?php echo $selectbody[$i]['body']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                    <tr class="pulldown_form form">
                        <td class="tb_left">
                            <p>オークション</p>
                        </td>
                        <td class="tb_right">
                            <div class="select">
                                <select name="auction">
                                    <option value="" selected>全選択</option>
                                    <option value="0">オークション中</option>
                                    <option value="1">オークション外</option>
                                </select>
                                <div class="triangle"></div>
                            </div>
                            <!-- エラー文用領域、表示非表示切り替え -->
                            <p class="error">テストエラー</p>
                        </td>
                    </tr>
                </table>
                <input id="submit" type="submit" value="検索する" name="search">
            </form>
        </section>
        <section>
            <h2>あなたが閲覧した車両</h2>
            <!-- 最大4つまで -->
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
        </section>


    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/auction/js/maker_kind.js"></script>
</body>

</html>