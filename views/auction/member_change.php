<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録ページ</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/member_register.css">
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
        <div id="top_text">
            <h1>新規会員登録手続き</h1>
            <p>会員情報を入力してください</p>
            <p><span class="asterisk">※</span>は必須項目です</p>
        </div>
        <form action="../public/member_register.php" method="post">
            <table id="register_form">
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>氏名<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="text" name="name" placeholder="氏名を入力してください" autocomplete="off" required maxlength="255" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['name']) ? $err['name'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="date_form form">
                    <td class="tb_left">
                        <p>生年月日<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="date" name="date" required value="<?php echo isset($_SESSION['date']) ? $_SESSION['date'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['date']) ? $err['date'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="radio_form form">
                    <td class="tb_left">
                        <p>性別<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="radio" name="gender" id="man" value="M" value="M" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == "M" ? "checked" : ""; ?>><label for="man">男性</label>
                        <input type="radio" name="gender" id="woman" value="F"><label for="woman" value="M" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == "F" ? "checked" : ""; ?>>女性</label>
                        <input type="radio" name="gender" id="no_answer" value="N"><label for="no_answer" value="M" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == "N" ? "checked" : ""; ?>>無回答</label>
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['gender']) ? $err['gender'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>電話番号(携帯電話)<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="tel" name="phone" placeholder="電話番号を入力してください" autocomplete="off" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['phone']) ? $err['phone'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>電話番号(固定電話)</p>
                    </td>
                    <td class="tb_right">
                        <input type="tel" name="number" placeholder="電話番号を入力してください" autocomplete="off" value="<?php echo isset($_SESSION['number']) ? $_SESSION['number'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['number']) ? $err['number'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>郵便番号<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input id="address" type="text" name="zip" placeholder="郵便番号を入力してください" autocomplete="off" pattern="[0-9]{3}-[0-9]{4}" required value="<?php echo isset($_SESSION['zip']) ? $_SESSION['zip'] : ''; ?>">
                        <button id="post_code_button">住所検索</button>
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['zip']) ? $err['zip'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>都道府県<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input id="prefecture" type="text" name="address" placeholder="都道府県を入力してください" autocomplete="off" required maxlength="255" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['address']) ? $err['address'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>市町村番地<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input id="Municipality" name="address2" type="text" placeholder="市町村を入力してください" autocomplete="off" required maxlength="255" value="<?php echo isset($_SESSION['address2']) ? $_SESSION['address2'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['address2']) ? $err['address2'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>ユーザ名<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="text" name="username" placeholder="ユーザ名を入力してください" autocomplete="off" required maxlength="20" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['username']) ? $err['username'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>ログインID<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="text" name="loginid" placeholder="ログインIDを入力してください" autocomplete="off" required pattern="^[a-zA-Z0-9]+$" maxlength="20" value="<?php echo isset($_SESSION['loginid']) ? $_SESSION['loginid'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['loginid']) ? $err['loginid'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>メールアドレス<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="email" name="mail" placeholder="メールアドレスを入力してください" autocomplete="off" required maxlength="255" value="<?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : ''; ?>">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['mail']) ? $err['mail'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>パスワード<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <input type="password" name="pass" placeholder="パスワードを入力してください" autocomplete="off" required minlength="4" maxlength="20">
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['pass']) ? $err['pass'] : ''; ?></p>
                    </td>
                </tr>
                <tr class="img_form form">
                    <td class="tb_left">
                        <p>画像</p>
                    </td>
                    <td class="tb_right">
                        <div class="img_flex">
                            <button id="img_button">画像を選択</button>
                            <input id="file_upload" name="img" type="file" id="input1" accept=".png,.jpg,.jpeg,.svg">
                            <div id="icon_thumb"><img id="user_icon" src="" alt=""></div>
                        </div>
                        <!-- エラー文はここで表示非表示を切り替える -->
                        <p><?php echo isset($err['pass']) ? $err['pass'] : ''; ?></p>
                    </td>
                </tr>
            </table>
            <input id="submit" type="submit" name="btn" value="変更を反映する">
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