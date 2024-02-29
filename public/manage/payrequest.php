<?php
require_once '../../config.php';
require_once '../../function.php';
date_default_timezone_set('Asia/Tokyo');
session_start();
if (isset($_SESSION['listing_id'])) {
    $list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM auction WHERE listing_id = " . $_SESSION['listing_id'] . "");
    if (isset($_POST['btn'])) {
        if (!isset($_POST['pay_limit']) || $_POST['pay_limit'] == '') {
            $err['pay_limit'] = '支払期日を入力してください';
        } else if ($_POST['pay_limit'] < date('Y-m-d') || $_POST['pay_limit'] < $list[0]['auction_enddate']) {
            $err['pay_limit'] = '正しい支払期日を入力して下さい';
        }

        $_SESSION['pay_limit'] = $_POST['pay_limit'];
        if (!isset($err)) {
            header('location:payrequestconf.php');
            exit();
        }
    }
}else{
    header('location:./auctionlist.php');
    exit();
}

require_once '../../views/manage/payrequest.php';
?>