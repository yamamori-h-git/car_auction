<?php
require_once '../../config.php';
require_once '../../function.php';

session_start();
unset($_SESSION['listing_id']);
unset($_SESSION['car_id']);
unset($_SESSION['startdate']);
unset($_SESSION['enddate']);
unset($_SESSION['listing_price']);
unset($_SESSION['buyout']);
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

$page_limit = 0;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['clear'])) {
    $_SESSION = array();
}

$page_back = $page - 1;
$page_next = $page + 1;
$const_num = 10;
//ページャの処理
$num = pager_num(HOST, USER_ID, PASSWORD, DB_NAME, 'auction', $const_num); //ページの総数
$page_num = ($page - 1) * $const_num; //
if (isset($_SESSION['sql'])) {
    $sql = $_SESSION['sql'] . " delete_flg = 0 ORDER BY listing_id DESC LIMIT $page_num , $const_num;";
} else {
    $sql = "SELECT * FROM auction WHERE delete_flg = 0 ORDER BY listing_id DESC LIMIT $page_num , $const_num;";
}
$list = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
require_once '../../views/manage/auctionlist.php';
