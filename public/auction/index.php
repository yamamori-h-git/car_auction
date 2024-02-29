<?php
date_default_timezone_set('Asia/Tokyo');
session_start();
$_SESSION = array();
session_destroy();
require_once '../../config.php';
require_once '../../function.php';
$select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM `auction_top` ORDER BY `auction_top`.`car_id` ASC;");
$selectbody = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT DISTINCT body FROM `auction_top` ORDER BY `auction_top`.`car_id` ASC;");
//echo date('Y-m-d H:i:s', time());
//$date = new DateTime(date('Y-m-d', time()));
//$model_year_max = $_POST['model_year_max'];
//$model_year_min = $_POST['model_year_min'];
//$price_min = $_POST['price_min'];
//$price_max = $_POST['price_max'];
//$run_min = $_POST['run_min'];
//$run_max = $_POST['run_max'];
//if ($model_year_min > $model_year_max) { //年式最小と最大が逆に入力されたときの処理
//  $model_year = $model_year_min;
//$model_year_min = $model_year_max;
//$model_year_max = $model_year;
//}
//if ($price_min > $price_max) { //価格最小と最大が逆に入力されたときの処理
//$price = $price_min;
//$price_min = $price_max;
//$price_max = $price;
//}
//if ($run_min > $run_max) { //走行距離最小と最大が逆に入力されたときの処理
//  $run = $run_min;
//    $run_min = $run_max;
//    $run_max = $run;
//}
$sql = "SELECT * FROM `auction_top` WHERE ";
if (isset($_POST['search'])) { //メーカー
    if ($_POST['maker'] != '') {
        $_SESSION['maker'] = $_POST['maker'];
        $maker = "maker = '" .  $_POST['maker'] . "' AND ";
        $sql = $sql . $maker;
    }
    if ($_POST['kind'] != '') { //車種
        $_SESSION['kind'] = '=' .  $_POST['kind'];
        $kind = "model_name = '" .  $_POST['kind'] . "' AND ";
        $sql = $sql . $kind;
    }
    if ($model_year_min != '') { //年式最小
        $_SESSION['model_year_min'] = $model_year_min;
        $model_year_min_sql = "car_year >= '" . $model_year_min . "-01-01' AND ";
        $sql = $sql . $model_year_min_sql;
    } else {
        $_SESSION['model_year_min'] = '0000-00-00';
        $model_year_min_sql = "car_year >= '" .  $_SESSION['model_year_min'] . "' AND ";
        $sql = $sql . $model_year_min_sql;
    }
    if ($model_year_max != '') { //年式最大
        $_SESSION['model_year_max'] = $model_year_max;
        $model_year_max_sql = "car_year <= '" .  $model_year_max . "-12-31' AND ";
        $sql = $sql . $model_year_max_sql;
    } else {
        $_SESSION['model_year_max'] = '9999-12-31';
        $model_year_max_sql = "car_year <= '" .  $_SESSION['model_year_max'] . "' AND ";
        $sql = $sql . $model_year_max_sql;
    }
    if ($_POST['color'] != '') { //色
        $_SESSION['color'] = '=' .  $_POST['color'];
        $color = "color_name = '" .  $_POST['color'] . "' AND ";
        $sql = $sql . $color;
    }
    if ($price_min != '') { //価格最小
        $_SESSION['price_min'] = $price_min;
        $price_min_sql = "car_purchase >= " .  $price_min . " AND ";
        $sql = $sql . $price_min_sql;
    } else {
        $_SESSION['price_min'] = '0';
        $price_min_sql = "car_purchase >= " .  $_SESSION['price_min'] . " AND ";
        $sql = $sql . $price_min_sql;
    }
    if ($price_max != '') { //価格最大
        $_SESSION['price_max'] = $price_max;
        $price_max_sql = "car_purchase <= " .  $price_max . " AND ";
        $sql = $sql . $price_max_sql;
    } else {
        $_SESSION['price_max'] = '100000000';
        $price_max_sql = "car_purchase < " .  $_SESSION['price_max'] . " AND ";
        $sql = $sql . $price_max_sql;
    }
    if ($_POST['period'] == '2week') { //期間
        $date->modify('-2 week'); // 2週間前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_POST['period'] == '1month') {
        $date->modify('-1 month'); // 1か月前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_POST['period'] == '3month') {
        $date->modify('-3 month'); // 3か月前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_POST['period'] == '1year') {
        $date->modify('-1 year'); // 1年前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    } else if ($_POST['period'] == '3year') {
        $date->modify('-3 year'); // 3年前の日付を取得する場合
        $_SESSION['period'] = $date->format('Y-m-d');
        $period = "car_date >= '" .  $_SESSION['period'] . "' AND ";
        $sql = $sql . $period;
    }
    if ($_POST['mission'] != '') { //ミッション
        $_SESSION['mission'] = '=' .  $_POST['mission'];
        $mission = "mission = '" .  $_POST['mission'] . "' AND ";
        $sql = $sql . $mission;
    }
    if ($_POST['point'] != '') { //評価点
        $_SESSION['point'] = '=' .  $_POST['point'];
        $point = "car_points = '" .  $_POST['point'] . "' AND ";
        $sql = $sql . $point;
    }
    if ($_POST['body'] != '') { //ボディタイプ
        $_SESSION['body'] = '=' .  $_POST['body'];
        $body = "body = '" .  $_POST['body'] . "' AND ";
        $sql = $sql . $body;
    }
    if ($_POST['auction'] == '0') { //オークション中
        $_SESSION['auction'] = date('Y-m-d H:i:s', time());
        $auction = "auction_startdate <= '" .  date('Y-m-d H:i:s', time()) . "' AND auction_enddate >= '" .  date('Y-m-d H:i:s', time()) . "' AND ";
        $sql = $sql . $auction;
    } else if ($_POST['auction'] == '1') { //オークション外
        $_SESSION['auction'] = date('Y-m-d H:i:s', time());
        $auction = "(auction_startdate >= '" .  date('Y-m-d H:i:s', time()) . "' OR auction_enddate <= '" .  date('Y-m-d H:i:s', time()) . "') AND ";
        $sql = $sql . $auction;
    }
    if ($run_min != '') { //走行距離最小
        $_SESSION['run_min'] = $run_min;
        $run_min_sql = "mileage >= " .  $run_min . " AND ";
        $sql = $sql . $run_min_sql;
    } else {
        $_SESSION['run_min'] = '0';
        $run_min_sql = "mileage >= " .  $_SESSION['run_min'] . " AND ";
        $sql = $sql . $run_min_sql;
    }
    if ($run_max != '') {
        $_SESSION['run_max'] = $run_max; //走行距離最大
        $run_max_sql = "mileage <= " .  $run_max . " ";
        $sql = $sql . $run_max_sql;
    } else {
        $_SESSION['run_max'] = '100000000';
        $run_max_sql = "mileage < " .  $_SESSION['run_max'] . " ";
        $sql = $sql . $run_max_sql;
    }
    $sql = $sql . "ORDER BY `auction_top`.`car_id` ASC;";


    //print_r($_SESSION);
}



require_once '../../views/auction/index.php';
