<?php
date_default_timezone_set('Asia/Tokyo');
session_start();
require_once '../../config.php';
require_once '../../function.php';

if (isset($_POST['search'])) { //メーカー
    $date = new DateTime(date('Y-m-d', time()));
    $_SESSION['serach'] = $_POST['search'];
    $_SESSION['maker'] = $_POST['maker'];
    $_SESSION['kind'] = $_POST['kind'];
    $model_year_max = $_POST['model_year_max'];
    $model_year_min = $_POST['model_year_min'];
    $price_min = $_POST['price_min'];
    $price_max = $_POST['price_max'];
    $run_min = $_POST['run_min'];
    $run_max = $_POST['run_max'];
    if ($model_year_min > $model_year_max) { //年式最小と最大が逆に入力されたときの処理
        $model_year = $model_year_min;
        $model_year_min = $model_year_max;
        $model_year_max = $model_year;
    }
    if ($price_min > $price_max) { //価格最小と最大が逆に入力されたときの処理
        $price = $price_min;
        $price_min = $price_max;
        $price_max = $price;
    }
    if ($run_min > $run_max) { //走行距離最小と最大が逆に入力されたときの処理
        $run = $run_min;
        $run_min = $run_max;
        $run_max = $run;
    }
    if ($model_year_min != '') {
        $_SESSION['model_year_min'] = $model_year_min;
    } else {
        $_SESSION['model_year_min'] = '0000-00-00';
    }
    if ($model_year_max != '') {
        $_SESSION['model_year_max'] = $model_year_max;
    } else {
        $_SESSION['model_year_max'] = '9999-12-31';
    }
    if ($_POST['color'] != '') {
        $_SESSION['color'] = '=' .  $_POST['color'];
    } else {
        $_SESSION['color'] = '';
    }

    if ($price_min != '') { //価格最小
        $_SESSION['price_min'] = $price_min;
    } else {
        $_SESSION['price_min'] = '0';
    }

    if ($price_max != '') { //価格最大
        $_SESSION['price_max'] = $price_max;
    } else {
        $_SESSION['price_max'] = '100000000';
    }

    if ($_POST['period'] == '2week') { //期間
        $date->modify('-2 week'); // 2週間前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
    } else if ($_POST['period'] == '1month') {
        $date->modify('-1 month'); // 1か月前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
    } else if ($_POST['period'] == '3month') {
        $date->modify('-3 month'); // 3か月前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
    } else if ($_POST['period'] == '1year') {
        $date->modify('-1 year'); // 1年前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
    } else if ($_POST['period'] == '3year') {
        $date->modify('-3 year'); // 3年前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
    } else {
        $_SESSION['period'] = '';
    }

    if ($_POST['mission'] != '') {
        $_SESSION['mission'] = '=' .  $_POST['mission'];
    } else {
        $_SESSION['mission'] = '';
    }
    if ($_POST['point'] != '') {
        $_SESSION['point'] = '=' .  $_POST['point'];
    } else {
        $_SESSION['point'] = '';
    }
    if ($_POST['body'] != '') {
        $_SESSION['body'] = '=' .  $_POST['body'];
    } else {
        $_SESSION['body'] = '';
    }


    if ($_POST['auction'] == '0') { //オークション中
        $_SESSION['auction'] = $_POST['auction'];
    } else if ($_POST['auction'] == '1') { //オークション外
        $_SESSION['auction'] = $_POST['auction'];
    } else {
        $_SESSION['auction'] = '';
    }

    if ($run_min != '') { //走行距離最小
        $_SESSION['run_min'] = $run_min;
    } else {
        $_SESSION['run_min'] = '0';
    }

    if ($run_max != '') {
        $_SESSION['run_max'] = $run_max; //走行距離最大
    } else {
        $_SESSION['run_max'] = '100000000';
    }
}
if (isset($_SESSION['serach'])) {
    $sql = "SELECT * FROM `auction_top` WHERE ";
    if ($_SESSION['maker'] != '') {
        $maker = "maker = '" .  $_SESSION['maker'] . "' AND ";
        $sql = $sql . $maker;
    }
    if ($_SESSION['kind'] != '') { //車種
        $kind = "model_name = '" .  $_SESSION['kind'] . "' AND ";
        $sql = $sql . $kind;
    }
    if ($_SESSION['model_year_min'] != '') { //年式最小
        $model_year_min_sql = "car_year >= '" . $_SESSION['model_year_min'] . "-01-01' AND ";
        $sql = $sql . $model_year_min_sql;
    } else {
        $model_year_min_sql = "car_year >= '" .  $_SESSION['model_year_min'] . "' AND ";
        $sql = $sql . $model_year_min_sql;
    }

    if ($_SESSION['model_year_max'] != '') { //年式最大
        $model_year_max_sql = "car_year <= '" .  $_SESSION['model_year_max'] . "-12-31' AND ";
        $sql = $sql . $model_year_max_sql;
    } else {
        $model_year_max_sql = "car_year <= '" .  $_SESSION['model_year_max'] . "' AND ";
        $sql = $sql . $model_year_max_sql;
    }
    if ($_SESSION['color'] != '') { //色
        $color = "color_name = '" .  $_SESSION['color'] . "' AND ";
        $sql = $sql . $color;
    }
    if ($_SESSION['price_min'] != '') { //価格最小
        $price_min_sql = "car_purchase >= " .  $_SESSION['price_min'] . " AND ";
        $sql = $sql . $price_min_sql;
    } else {
        $price_min_sql = "car_purchase >= " .  $_SESSION['price_min'] . " AND ";
        $sql = $sql . $price_min_sql;
    }
    if ($_SESSION['price_max'] != '') { //価格最大
        $price_max_sql = "car_purchase <= " .  $_SESSION['price_max'] . " AND ";
        $sql = $sql . $price_max_sql;
    } else {
        $price_max_sql = "car_purchase < " .  $_SESSION['price_max'] . " AND ";
        $sql = $sql . $price_max_sql;
    }

    if ($_SESSION['period'] == '2week') { //期間
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_SESSION['period'] == '1month') {
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_SESSION['period'] == '3month') {
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_SESSION['period'] == '1year') {
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_SESSION['period'] == '3year') {
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    }

    if ($_SESSION['mission'] != '') { //ミッション
        $mission = "mission = '" .  $_SESSION['mission'] . "' AND ";
        $sql = $sql . $mission;
    }

    if ($_SESSION['point'] != '') { //評価点
        $point = "car_points = '" .  $_SESSION['point'] . "' AND ";
        $sql = $sql . $point;
    }
    if ($_SESSION['body'] != '') { //ボディタイプ
        $body = "body = '" .  $_SESSION['body'] . "' AND ";
        $sql = $sql . $body;
    }
    if ($_SESSION['auction'] == '0') { //オークション中
        $auction = "auction_startdate <= '" .  date('Y-m-d H:i:s', time()) . "' AND auction_enddate >= '" .  date('Y-m-d H:i:s', time()) . "' AND ";
        $sql = $sql . $auction;
    } else if ($_SESSION['auction'] == '1') { //オークション外
        $auction = "(auction_startdate >= '" .  date('Y-m-d H:i:s', time()) . "' OR auction_enddate <= '" .  date('Y-m-d H:i:s', time()) . "') AND ";
        $sql = $sql . $auction;
    }

    if ($_SESSION['run_min'] != '') { //走行距離最小
        $run_min_sql = "mileage >= " .  $_SESSION['run_min'] . " AND ";
        $sql = $sql . $run_min_sql;
    } else {
        $run_min_sql = "mileage >= " .  $_SESSION['run_min'] . " AND ";
        $sql = $sql . $run_min_sql;
    }

    if ($_SESSION['run_max'] != '') {
        $run_max_sql = "mileage <= " .  $_SESSION['run_max'] . " AND ";
        $sql = $sql . $run_max_sql;
    } else {
        $run_max_sql = "mileage < " .  $_SESSION['run_max'] . " AND ";
        $sql = $sql . $run_max_sql;
    }
    $sql = $sql . "contract_flg = 0 ORDER BY `auction_top`.`car_id` ASC;";
    $result = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    $auction_list = [];
    $car_list = [];
    $auction_img = [];
    $car_img = [];
    foreach ($result as $key => $value) {
        if ($value['auction_startdate'] >= date('Y-m-d 00:00:00') && $value['auction_enddate'] <= date('Y-m-d 23:59:59')) {
            if ($value['auction_enddate'] >= date('Y-m-d H:i:s')) {
                $auction_list[] = $value;
                $img = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM car_img WHERE car_id = " . $value['car_id'] . " GROUP BY car_id");
                $auction_img[] = $img;
            }
        } else {
            $car_list[] = $value;
            $img = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM car_img WHERE car_id = " . $value['car_id'] . " GROUP BY car_id");
            $car_img[] = $img;
        }
    }
}
if(!isset($_POST['serach']) && !isset($_SESSION['serach'])){
    header('location:index.php');
    exit;
}
require_once '../../views/auction/car_list.php';
