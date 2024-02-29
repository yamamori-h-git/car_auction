<?php
require_once '../../config.php';
require_once '../../function.php';
setcookie('id', 1, time() + 30 * 60 * 60);
if (isset($_COOKIE['id'])) {
    $list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM customer c INNER JOIN login l ON c.customer_loginid = l.login_id WHERE c.customer_id = " . $_COOKIE['id'] . "");
    if ($_COOKIE['pass'] == $list[0]['password']) {
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
            }
            // 携帯電話番号
            if (!isset($_POST['phone']) || $_POST['phone'] == "") {
                $err['phone'] = '携帯電話番号を入力してください';
            } elseif (!preg_match("/\A0[5789]0[-(]?\d{4}[-)]?\d{4}\z/", $_POST['phone']) && !preg_match("/\A0(\d{1}[-(]?\d{4}|\d{2}[-(]?\d{3}|\d{3}[-(]?\d{2}|\d{4}[-(]?\d{1})[-)]?\d{4}\z/", $_POST['phone'])) {
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
                if (strlen($_POST['username']) > 20) {
                    $err['username'] = 'ユーザー名は20文字以内で入力してください';
                } else {
                    if ($_COOKIE['username'] != $username) {
                        $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM customer WHERE customer_username = '" . $username . "'");
                        if (!empty($result)) {
                            $err['username'] = 'ユーザー名が既にあります。異なるユーザーIDを入力してください';
                        }
                    }
                }
            }

            // 画像
            if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'svg') {
                    $err['img'] = "画像の拡張子はpng,jpg,jpeg,svgのいずれかのみ登録可能です";
                }
            }

            if (isset($err)) {
                // エラーがあるとき
                $list[0]['customer_name'] = $_POST['name'];
                $list[0]['customer_birth'] = $_POST['date'];
                $list[0]['customer_gender'] = $_POST['gender'];
                $list[0]['customer_number'] = $_POST['number'];
                $list[0]['customer_mobilenumber'] = $_POST['phone'];
                $list[0]['customer_zip'] = $_POST['zip'];
                $list[0]['customer_address'] = $_POST['address'];
                $list[0]['customer_address2'] = $_POST['address2'];
                $list[0]['customer_username'] = $_POST['username'];
                $list[0]['ext'] = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            } else {
                // エラーが無いとき
                //　エスケープ
                $name = htmlspecialchars($_POST['name']); // 氏名
                $date = htmlspecialchars($_POST['date']); // 生年月日
                $gender = htmlspecialchars($_POST['gender']); // 性別
                $phone = htmlspecialchars($_POST['phone']); // 携帯電話
                $number = htmlspecialchars($_POST['number']); // 固定電話
                $zip = htmlspecialchars($_POST['zip']); // 郵便番号
                if (!strpos($zip, '-')) {
                    $zip = substr_replace($zip, '-', 3, 0);
                }
                $address = htmlspecialchars($_POST['address']); // 都道府県
                $address2 = htmlspecialchars($_POST['address2']); // 市町村・番地・マンション
                $username = htmlspecialchars($_POST['username']); // ユーザー名

                // ファイル変更があるかどうか
                if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
                    // ディレクトリ内のファイルを取得
                    $files = glob('../../users/icon/' . $_COOKIE['id'] . '.*');
                    // ファイルを削除
                    if ($files !== false && count($files) > 0) {
                        foreach ($files as $file) {
                            if (is_file($file)) {
                                unlink($file);
                            }
                        }
                    }
                    $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                    $Path = "../../users/icon/" . $_COOKIE['id'] . "." . $ext;
                    move_uploaded_file($_FILES['img']['tmp_name'], $Path);

                    $sql = "UPDATE customer SET customer_name = '$name' , customer_birth = '$date' , customer_gender = '$gender' , customer_number = '$number', customer_mobilenumber = '$phone' , customer_zip = '$zip' , customer_address = '$address' , customer_address2 = '$address2' , customer_username = '$username' ,ext = '$ext' WHERE customer_id = " . $_COOKIE['id'] . "";
                    change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
                } else {
                    $sql = "UPDATE customer SET customer_name = '$name' , customer_birth = '$date' , customer_gender = '$gender' , customer_number = '$number', customer_mobilenumber = '$phone' , customer_zip = '$zip' , customer_address = '$address' , customer_address2 = '$address2' , customer_username = '$username' WHERE customer_id = " . $_COOKIE['id'] . "";
                    change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
                }
                $list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM customer c INNER JOIN login l ON c.customer_loginid = l.login_id WHERE c.customer_id = " . $_COOKIE['id'] . "");
                $msg = '会員情報を変更しました';
            }
        }
    } else {
        //パスワードの不一致
        header('location:top.php');
        exit();
    }
} else {
    header('location:top.php');
    exit();
}
require_once '../../views/auction/member_change.php';
