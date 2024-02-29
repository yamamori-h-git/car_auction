<?php
require_once '../../config.php';
require_once '../../function.php';

session_start();
// 登録ボタンが押されたとき
if (isset($_POST['btn'])) {
    //エラーチェック
    // 氏名
    if (!isset($_POST['name']) || $_POST['name'] == "") {
        $err['name'] = '名前を入力してください';
    }
    // 生年月日
    if (!isset($_POST['date']) || $_POST['date'] == "") {
        $err['date'] = '生年月日を入力してください';
    } else {
        $date = str_replace('/', '-', $_POST['date']);
        if (!preg_match('|\d{4}\-\d{1,2}\-\d{1,2}|', $date) || $date > date('Y-m-d')) {
            $err['date'] = '正しい生年月日を入力してください';
        }
    }
    // 性別
    if (!isset($_POST['gender']) || $_POST['gender'] == "") {
        $err['gender'] = '性別を選択してください';
    } else {
        $_SESSION['gender'] = $_POST['gender'];
    }
    // 携帯電話番号
    if (!isset($_POST['phone']) || $_POST['phone'] == "") {
        $err['phone'] = '携帯電話番号を入力してください';
    } else if (!preg_match("/\A0[5789]0[-(]?\d{4}[-)]?\d{4}\z/", $_POST['phone']) && !preg_match("/\A0(\d{1}[-(]?\d{4}|\d{2}[-(]?\d{3}|\d{3}[-(]?\d{2}|\d{4}[-(]?\d{1})[-)]?\d{4}\z/", $_POST['phone'])) {
        $err['phone'] = '正しい携帯電話番号を入力してください';
    }
    // 固定電話番号
    if (isset($_POST['numer']) && !preg_match("/\A0(\d{1}[-(]?\d{4}|\d{2}[-(]?\d{3}|\d{3}[-(]?\d{2}|\d{4}[-(]?\d{1})[-)]?\d{4}\z/", $_POST['number'])) {
        $err['number'] = '正しい固定電話番号を入力してください';
    }
    //郵便番号
    if (!isset($_POST['zip']) || $_POST['zip'] == "") {
        $err['zip'] = '郵便番号を入力してください';
    } else if (!preg_match("/\A\d{3}-?\d{4}\z/", $_POST['zip'])) {
        $err['zip'] = '正しい郵便番号を入力してください';
    }
    //都道府県
    if (!isset($_POST['address']) || $_POST['address'] == "") {
        $err['address'] = '都道府県を入力してください';
    }
    // 市区町村
    if (!isset($_POST['address2']) || $_POST['address2'] == "") {
        $err['address2'] = '市区町村を入力してください';
    }
    //　ユーザー名
    if (!isset($_POST['username']) || $_POST['username'] == "") {
        $err['username'] = "ユーザー名を入力してください";
    } else {
        $username = htmlspecialchars($_POST['username']);
        $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM customer WHERE customer_username = '" . $username . "'");
        if (mb_strlen($_POST['username']) > 20) {
            $err['username'] = 'ユーザー名は20文字以内で入力してください';
        } else if (!empty($result)) {
            $err['username'] = 'ユーザー名が既にあります。異なるユーザー名を入力してください';
        }
    }

    // ログインID
    if (!isset($_POST['loginid']) || $_POST['loginid'] == "") {
        $err['loginid'] = 'ログインIDを入力してください';
    } else {
        $loginid = htmlspecialchars($_POST['loginid']);
        $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM customer WHERE customer_loginid = '" . $loginid . "'");
        if (mb_strlen($_POST['loginid']) > 20) {
            $err['loginid'] = 'ログインIDは20文字以内で入力してください';
        } else if (!empty($result)) {
            $err['loginid'] = 'ログインIDが既にあります。異なるログインIDを入力してください';
        }
    }
    // メールアドレス
    if (!isset($_POST['mail']) || $_POST['mail'] == "") {
        $err['mail'] = 'メールアドレスを入力してください';
    } else {
        $mail = htmlspecialchars($_POST['mail']);
        $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM customer WHERE customer_mail = '" . $mail . "'");
        if (!preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', 'xxx@xxx.com')) {
            $err['mail'] = '正しいメールアドレスを入力してください';
        } else if (!empty($result)) {
            $err['mail'] = 'メールアドレスが既に登録されています。異なるメールアドレスを入力してください';
        }
    }
    // パスワード
    if (!isset($_POST['pass']) || $_POST['pass'] == "") {
        $err['pass'] = 'パスワードを入力してください';
    } else if (mb_strlen($_POST['pass']) < 4 || mb_strlen($_POST['pass']) > 20) {
        $err['pass'] = 'パスワードは4文字以上20文字以内で入力してください';
    }

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['number'] = $_POST['number'];
    $_SESSION['zip'] = $_POST['zip'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['address2'] = $_POST['address2'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['loginid'] = $_POST['loginid'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['pass'] = $_POST['pass'];

    if (!isset($err)) {
        // エラーが無いとき
        header('location:./member_register_conf.php');
        exit();
    }
}
if (isset($_GET['back'])) {
    $err['pass'] = '再度パスワードを入力してください';
}
require_once '../../views/auction/member_register.php';
