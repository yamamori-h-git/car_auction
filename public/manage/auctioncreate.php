<?php
require_once '../../config.php';
require_once '../../function.php';

session_start();
unset($_SESSION['sql']);
$car_list = select(HOST,USER_ID,PASSWORD,DB_NAME,"SELECT car.car_id FROM car_main car LEFT JOIN auction auction ON car.car_id = auction.car_id WHERE (auction.listing_id IS NULL) OR (auction.auction_enddate < CURRENT_TIMESTAMP AND auction.contract_flg = 0) ORDER BY car.car_id;");
if (isset($_POST['btn'])) {
    // エラーチェック
    //車両番号
    if (!isset($_POST['car_id']) || $_POST['car_id'] == '') {
        $err['car_id'] = '車両番号を入力してください';
    } else if (!is_numeric($_POST['car_id'])) {
        $err['car_id'] = '半角数字で入力してください';
    } else {
        $car_id = htmlspecialchars($_POST['car_id']);
        $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM car_main WHERE car_id = $car_id");
        if (empty($result)) {
            $err["car_id"] = "車両番号がありません";
        } else {
            $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM auction WHERE car_id = $car_id AND contract_flg = 1");
            if (!empty($result)) {
                $err["car_id"] = "落札された車両を出品することはできません";
            } else {
                $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM auction WHERE car_id = $car_id AND auction_enddate >= NOW()");
                if (!empty($result)) {
                    $err['car_id'] = "オークション終了前の出品済み車両を出品することはできません";
                }
            }
        }
    }

    // オークション開始日時
    if (!isset($_POST['startdate']) || $_POST['startdate'] == '') {
        $err['startdate'] = 'オークション開始日時を入力してください';
    } else if ($_POST['startdate'] < date('Y-m-d')) {
        $err['startdate'] = '正しいオークション開始日時を入力してください';
    }
    // オークション終了日時
    if (!isset($_POST['enddate']) || $_POST['enddate'] == '') {
        $err['enddate'] = 'オークション終了日時を入力してください';
    } else if ($_POST['enddate'] < date('Y-m-d')) {
        $err['enddate'] = '正しいオークション終了日時を入力してください';
    }

    // 出品価格
    if (!isset($_POST['listing_price']) || $_POST['listing_price'] == '') {
        $err['listing_price'] = '出品価格を入力してください';
    } else if (!is_numeric($_POST['listing_price'])) {
        $err['listing_price'] = '半角数字で入力してください';
    }

    // 即決価格
    if (!isset($_POST['buyout']) || $_POST['buyout'] == '') {
        $err['buyout'] = '即決価格を入力してください';
    } else if (!is_numeric($_POST['buyout'])) {
        $err['buyout'] = '半角数字で入力してください';
    } else if (is_numeric($_POST['listing_price']) && $_POST['listing_price'] > $_POST['buyout']) {
        $err['buyout'] = '出品価格より高い価格を設定してください';
    }

    $_SESSION['car_id'] = $_POST['car_id'];
    if (!isset($err['startdate']) && !isset($err['enddate'])) {
        if ($_POST['startdate'] > $_POST['enddate']) {
            $_SESSION['startdate'] = $_POST['enddate'];
            $_SESSION['enddate'] = $_POST['startdate'];
        } else {
            $_SESSION['startdate'] = $_POST['startdate'];
            $_SESSION['enddate'] = $_POST['enddate'];
        }
    } else {
        $_SESSION['startdate'] = $_POST['startdate'];
        $_SESSION['enddate'] = $_POST['enddate'];
    }
    $_SESSION['listing_price'] = $_POST['listing_price'];
    $_SESSION['buyout'] = $_POST['buyout'];

    if (!isset($err)) {
        header('location:./auctioncreateconf.php');
        exit();
    }
}
require_once '../../views/manage/product.php';
?>