<?php
require_once '../../config.php';
require_once '../../function.php';
$flag = false; //お気に入りに使うフラグ
$list = [];
$list2 = [];
$car_id = $_GET['id'];
if (isset($car_id)) {
    $select_top = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM `car_view` WHERE car_id = '" . $car_id . "';");
    $select_body = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM `auction_top` WHERE car_id = '" . $car_id . "';");
    $warranty_card = $select_top[0]['warranty_card'];
    $car_year = date('Y', strtotime($select_top[0]['car_year'])) . '年代';
    $mileage = $select_top[0]['mileage'] . 'km';
    $displacement = $select_top[0]['displacement'] . 'cc';
    $expiration = date('Y月m月d日', strtotime($select_top[0]['expiration']));

    $list = [
        '保証' => $warranty_card,
        '年式' => $car_year,
        '走行距離' => $mileage,
        '排気量' => $displacement,
        '車検有効期限' => $expiration
    ];
    $maker = $select_top[0]['maker'];
    $body = $select_top[0]['body'];
    $mission = $select_top[0]['mission'];
    $color = $select_top[0]['color_name'];
    $point = $select_top[0]['car_points'] . '点';
    $car_history = $select_top[0]['car_history'];
    $car_repair = $select_top[0]['repair_history'];
    $capacity = $select_top[0]['passenger_capacity'] . '人';
    $grade = $select_top[0]['grade_name'];
    $etc = $select_top[0]['etc'];
    $navi = $select_top[0]['navi'];
    $listing_date = date('Y月m月d日 H時i分s秒～', strtotime($select_body[0]['listing_date']));
    $slide_door = $select_top[0]['slide_door'];
    $smoke = $select_top[0]['non_smoking_cars'];
    $pet = $select_top[0]['pet_car'];
    $limited = $select_top[0]['limited_car'];
    $explanation = $select_top[0]['explanation'];
    $cold_car = $select_top[0]['cold_car'];

    if (isset($_COOKIE['id'])) {
        $select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM favorite WHERE customer_id = '" . $_COOKIE['id'] . "' AND car_id = '" . $car_id . "' AND favorite_flag = 1 ;");
        if (empty($select)) {
            $flag = true;
        }
    }
} else {
    header("Location: ./car_list.php");
    exit;
}

require_once '../../views/auction/car_detail.php';
