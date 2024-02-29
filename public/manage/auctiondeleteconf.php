<?php
require_once '../../config.php';
require_once '../../function.php';
session_start();
$list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM auction WHERE listing_id = " . $_SESSION['listing_id'] . "");
$startdate = new DateTime($list[0]['auction_startdate']);
$enddate = new DateTime($list[0]['auction_enddate']);

if(isset($_POST['btn'])){
    change_sql(HOST,USER_ID,PASSWORD,DB_NAME,'UPDATE auction SET delete_flg = 1 WHERE listing_id = '.$_SESSION['listing_id'].'');
    $_SESSION['msg'] = "オークション番号".$_SESSION['listing_id']."の情報を削除しました";
    unset($_SESSION['listing_id']);
    header('location:./auctionlist.php');
    exit();
}
require_once '../../views/manage/productdeletecheck.php';
?>