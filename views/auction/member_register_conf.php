<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録ページ</title>
    <link rel="stylesheet" href="../../public/auction/css/destyle.css">
    <link rel="stylesheet" href="../../public/auction/css/common.css">
    <link rel="stylesheet" href="../../public/auction/css/member_register_conf.css">
</head>

<body>
    <header>
        <div id="header_flex">
            <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
            <!-- <form action="" method="get">
                <input id="search_box" type="text">
                <input id="search_button" type="submit" value="検索" maxlength="255">
            </form> -->
            <!-- <div id="header_icons">
                <p><img src="../../public/auction/img/material/bell.svg" alt=""></p> -->
            <!-- ログイン状態で切り替え -->
            <!-- <p><img src="../../public/auction/img/material/login.svg" alt=""></p> -->
            <!-- <p><img src="../../public/auction/img/material/logout.svg" alt=""></p> -->
            <!-- ユーザアイコン(画像はcssのbackground-imgで指定) -->
            <!-- <div id="header_user_icon"><img src="../../users/icon/4560209144081.jpg" alt=""></div>
            </div> -->
        </div>
    </header>
    <main>
        <div id="top_text">
            <h1>新規会員登録手続き</h1>
            <p>会員情報を入力してください</p>
            <p><span class="asterisk">※</span>は必須項目です</p>
        </div>
        <form action="../../public/auction/member_register_conf.php" method="post">
            <!-- class="tb_right"のtdに値を入れてください -->
            <table id="register_form">
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>氏名<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['name']; ?></p>
                    </td>
                </tr>
                <tr class="date_form form">
                    <td class="tb_left">
                        <p>生年月日<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $h_date; ?></p>
                    </td>
                </tr>
                <tr class="radio_form form">
                    <td class="tb_left">
                        <p>性別<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $gender; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>電話番号(携帯電話)<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['phone']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>電話番号(固定電話)</p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['number']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form post_code">
                    <td class="tb_left">
                        <p>郵便番号<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['zip']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>都道府県<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['address']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>市町村番地<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['address2']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>ユーザ名<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['username']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>ログインID<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['loginid']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>メールアドレス<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $_SESSION['mail']; ?></p>
                    </td>
                </tr>
                <tr class="text_form form">
                    <td class="tb_left">
                        <p>パスワード<span class="asterisk">※</span></p>
                    </td>
                    <td class="tb_right">
                        <p><?php echo $pass; ?></p>
                    </td>
                </tr>
            </table>
            <div class="button_flex">
                <!-- リンクは書いておいてください -->
                <button class="return"><a href="./member_register.php?back">入力画面に戻る</a></button>
                <input id="submit" type="submit" name="btn" value="登録する">
            </div>
        </form>
    </main>
    <footer>
        <p><img id="logo" src="../../public/auction/img/logo/logo.png" alt=""></p>
        <p>©HAL自動車売買株式会社</p>
    </footer>
</body>

</html>