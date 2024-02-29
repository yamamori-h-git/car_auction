<?php
require_once '../../config.php';
require_once '../../function.php';
session_start();
date_default_timezone_set('Asia/Tokyo');
$startdate = DateTime::createFromFormat('Y-m-d\TH:i', $_SESSION['startdate']);
$enddate = DateTime::createFromFormat('Y-m-d\TH:i', $_SESSION['enddate']);

if (isset($_POST['btn'])) {
    $car_id = htmlspecialchars($_SESSION['car_id']);
    $startdate = htmlspecialchars($_SESSION['startdate']);
    $enddate = htmlspecialchars($_SESSION['enddate']);
    $listing_price = htmlspecialchars($_SESSION['listing_price']);
    $buyout = htmlspecialchars($_SESSION['buyout']);
    $sql = "INSERT INTO auction (car_id,auction_startdate,auction_enddate,listing_price,buyout,listing_date) VALUES ($car_id,'$startdate','$enddate',$listing_price,$buyout,'" . date('Y-m-d H:i:m') . "')";
    change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    unset($_SESSION['car_id']);
    unset($_SESSION['startdate']);
    unset($_SESSION['enddate']);
    unset($_SESSION['listing_price']);
    unset($_SESSION['buyout']);
    header('location:./auctionlist.php');
    exit();
}

require_once '../../views/manage/productcheck.php';
?>