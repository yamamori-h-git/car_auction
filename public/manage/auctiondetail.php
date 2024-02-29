<?php
require_once '../../config.php';
require_once '../../function.php';
session_start();
if(isset($_POST['edit'])){
    header('location:./auctionedit.php');
    exit();
}else if(isset($_POST['invoice'])){
    header('location:./payrequest.php');
    exit();
}else if(isset($_POST['delete'])){
    header('location:./auctiondeleteconf.php');
    exit();
}


if (isset($_GET['id']) && !isset($_SESSION['listing_id'])) {
    $_SESSION['listing_id'] = $_GET['id'];
}else if(!isset($_SESSION['listing_id'])){
    header('location:./auctionlist.php');
    exit();
}
$list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM auction WHERE listing_id = " . $_SESSION['listing_id'] . "");
$invoice_list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM invoice WHERE listing_id = " . $list[0]['listing_id'] . "");

require_once '../../views/manage/auctiondetail.php';