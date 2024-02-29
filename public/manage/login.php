<?php

setcookie('id', '', time() - 100);
setcookie('pass', '', time() - 100);
session_start();
$_SESSION = array();
session_destroy();
require_once '../../config.php';
require_once '../../function.php';
$msg = '';
if (isset($_POST['insert'])) {

    setcookie('id', '', time() + 60 * 60);
    setcookie('pass', '', time() + 60 * 60);

    $id = $_POST['login_id']; //ID名
    $password = $_POST['password']; //パスワード
    $err = []; //エラー分を入れる配列
    if (!isset($id) || $id == '') {
        $err['id'] = 'ログインID入力されてない';
    }
    if (!isset($password) || $password == '') {
        $err['password'] = 'パスワード入力されていない';
    }

    if (empty($err)) {
        $id = htmlspecialchars($id);
        $password = htmlspecialchars($password);
        $select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM manage WHERE manage_loginid ='" . $id . "' AND password ='" . $password . "';");
        //print_r($select);
        if (empty($select)) {
            $msg = 'ログインIDまたはパスワードが間違っています。';
        } else {
            setcookie('id', $select[0]['manage_loginid'], time() + 60 * 60);
            setcookie('pass', $select[0]['password'], time() + 60 * 60);
            header("Location: ./home.php");
            exit;
        }
    }
}

require_once '../../views/manage/login.php';
