<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie('name', '', time() + 60 * 60);
require_once '../../config.php';
require_once '../../function.php';
$msg = '';
if (isset($_POST['btn'])) {


    $id = $_POST['id']; //ID名
    $pass = $_POST['pass']; //パスワード
    $err = []; //エラー分を入れる配列
    if (!isset($id) || $id == '') {
        $err['id'] = 'ログインIDを入力してください';
    }
    if (!isset($pass) || $pass == '') {
        $err['pass'] = 'パスワードを入力してください';
    }
    $id = htmlspecialchars($id);
    $pass = htmlspecialchars($pass);
    $_SESSION['id'] = $id;
    if (strlen($id) > 20) {
        $err['id'] = '20文字以内で入力してください';
    }
    if (strlen($id) != mb_strlen($id)) {
        $err['id'] = '全角・半角英数字で入力してください';
    }


    if (empty($err)) {
        $select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM login A INNER JOIN customer B ON A.login_id= B.customer_loginid WHERE A.login_id ='" . $id . "' ;");

        //$select = select(HOST, USER_ID, PASSWORD, "ih15", "SELECT * FROM member WHERE login_id ='" . $id . "' AND password ='" . $password . "';");
        //print_r($select);
        if (empty($select)) {
            $err['pass'] = 'ログインIDまたはパスワードが間違っています。';
        } else {
            $pass = get_hash($pass, $select[0]['salt'], $select[0]['stretch']);
            if ($pass == $select[0]['password']) {
                setcookie('id', $select[0]['customer_id'], time() + 60 * 60);
                setcookie('name', $select[0]['login_id'], time() + 60 * 60);
                setcookie('pass', $select[0]['password'], time() + 60 * 60);
                header("Location: ./index.php");
                exit;
            } else {
                $err['pass'] = 'ログインIDまたはパスワードが間違っています。';
            }
        }
    }
}

require_once '../../views/auction/login.php';
