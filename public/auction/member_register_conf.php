<?php
require_once '../../config.php';
require_once '../../function.php';

session_start();
if (isset($_POST['btn'])) {
    //　エスケープ
    $name = htmlspecialchars($_SESSION['name']); // 氏名
    $date = htmlspecialchars($_SESSION['date']); // 生年月日
    $gender = htmlspecialchars($_SESSION['gender']); // 性別
    $phone = htmlspecialchars($_SESSION['phone']); // 携帯電話
    $number = htmlspecialchars($_SESSION['number']); // 固定電話
    $zip = htmlspecialchars($_SESSION['zip']); // 郵便番号
    if (!strpos($zip, '-')) {
        $zip = substr_replace($zip, '-', 3, 0);
    }
    $address = htmlspecialchars($_SESSION['address']); // 都道府県
    $address2 = htmlspecialchars($_SESSION['address2']); // 市町村・番地・マンション
    $username = htmlspecialchars($_SESSION['username']); // ユーザー名
    $loginid = htmlspecialchars($_SESSION['loginid']); // ログインID
    $mail = htmlspecialchars($_SESSION['mail']); //メールアドレス
    $pass = htmlspecialchars($_SESSION['pass']); //　パスワード

    // customerテーブルINSERT
    $sql = "INSERT INTO customer 
                (customer_name,customer_birth,customer_gender,customer_mobilenumber,customer_number,customer_zip,customer_address,customer_address2,customer_username,customer_loginid,customer_mail,customer_register,customer_delete) 
                VALUES ('$name','$date','$gender','$phone','$number','$zip','$address','$address2','$username','$loginid','$mail','" . date("Y-m-d") . "','0')";
    $insert_id = insert_sql_id(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    // ハッシュ化
    $salt = uniqid();
    $stretch = rand(1000, 10000);
    $hash_pass = get_hash($pass, $salt, $stretch);

    // loginテーブルINSERT&id
    $sql = "INSERT INTO login (login_id,password,salt,stretch) VALUES ('$loginid','$hash_pass','$salt',$stretch)";
    change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    // cookie
    echo $insert_id;
    setcookie('id', $insert_id, time() + 60 * 60 * 24 * 7, '/');
    setcookie('pass', $hash_pass, time() + 60 * 60 * 24 * 7, '/');
    setcookie('username', $username, time() + 60 * 60 * 24 * 7, '/');
    $_SESSION = array();

    // TOP画面に遷移する
    header('location:./index.php');
    exit();
} else {
    $h_date = date('Y年n月j日', strtotime($_SESSION['date']));

    $gender_array = array('M' => '男性', 'F' => '女性', 'N' => '未回答');
    $gender;
    foreach ($gender_array as $key => $value) {
        if ($key == $_SESSION['gender']) {
            $gender = $value;
            break;
        }
    }

    $pass = "";
    $i = 0;
    while ($i < strlen($_SESSION['pass'])) {
        $pass = $pass . "*";
        $i++;
    }
}

require_once '../../views/auction/member_register_conf.php';
