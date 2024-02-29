<?php
require_once '../../config.php';
require_once '../../function.php';
session_start();
$_SESSION = array();
if(isset($_POST['btn'])){
    $sql = "SELECT * FROM auction WHERE";
    if($_POST['listing_id'] != ''){
        $sql.=" listing_id = ".$_POST['listing_id']." AND";
    }

    if($_POST['car_id'] != ''){
        $sql.=" car_id = ".$_POST['car_id']." AND";
    }

    if($_POST['auction_date'] != ''){
        $sql.=" auction_startdate LIKE '".$_POST['auction_date']."%' AND";
    }
    if($_POST['flg'] == 0){
        $sql.=" contract_flg = 0 AND";
    }else if($_POST['flg'] == 1){
        $sql.=" contract_flg = 1 AND";
    }
    
    $_SESSION['sql'] = $sql;
    header('location:./auctionlist.php');
    exit();
}
require_once '../../views/manage/auctionsearch.php';
?>