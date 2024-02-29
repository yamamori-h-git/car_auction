<?php
require_once '../../config.php';
require_once '../../function.php';

session_start();
date_default_timezone_set('Asia/Tokyo');
$startdate = DateTime::createFromFormat('Y-m-d\TH:i', $_SESSION['startdate']);
$enddate = DateTime::createFromFormat('Y-m-d\TH:i', $_SESSION['enddate']);
require_once '../../views/manage/producteditcheck.php';

if (isset($_POST['btn'])) {
    $car_id = htmlspecialchars($_SESSION['car_id']);
    $startdate = htmlspecialchars($_SESSION['startdate']);
    $enddate = htmlspecialchars($_SESSION['enddate']);
    $listing_price = htmlspecialchars($_SESSION['listing_price']);
    $buyout = htmlspecialchars($_SESSION['buyout']);
    $sql = "UPDATE auction SET car_id = $car_id,auction_startdate = '$startdate',auction_enddate = '$enddate',listing_price = $listing_price,buyout = $buyout WHERE listing_id = ".$_SESSION['listing_id']."";
    change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    unset($_SESSION['car_id']);
    unset($_SESSION['m_car_id']);
    unset($_SESSION['startdate']);
    unset($_SESSION['enddate']);
    unset($_SESSION['listing_price']);
    unset($_SESSION['buyout']);
    header('location:./auctiondetail.php');
    exit();
}

?>