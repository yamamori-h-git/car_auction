<?php

header('Access-Control-Allow-Origin: *');
//CORS
//header('Access^Control-Allow-Origin: http://localhost:9000')の設定
header("Content-type:  application/json; charset=UTF-8");
$car_id = $_POST['car_id'];
$flag = $_POST['flag'];
require_once '../../../config.php';
require_once '../../../function.php';
$select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT `customer_id`, `car_id`, `favorite_flag` FROM favorite WHERE customer_id = '" . $_COOKIE['id'] . "' AND car_id = '" . $car_id . "'  ;");
if ($flag == 0) {
    //登録処理
    if (empty($select)) {
        //echo 'DBにない';
        $sql = "INSERT INTO `favorite`(`customer_id`, `car_id`, `favorite_flag`) VALUES ('" . $_COOKIE['id'] ."','" . $car_id ."',1)";
        change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
        //$select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT A.customer_id , A.car_id,A.favorite_flag,B.*,C.img_id,C.ext  FROM favorite A INNER JOIN car_view B ON A.car_id = B.car_id INNER JOIN car_img C ON B.car_id = C.car_id WHERE A.customer_id = '" . $_COOKIE['id'] . "' AND A.favorite_flag = 1 group by C.car_id ;");
        
    } else {
        //echo 'DBにある';
        $sql = "UPDATE `favorite` SET `favorite_flag`= 1 WHERE customer_id = '" . $_COOKIE['id'] . "' AND car_id = '" . $car_id . "' ;";
        change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
        //$select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT A.customer_id , A.car_id,A.favorite_flag,B.*,C.img_id,C.ext  FROM favorite A INNER JOIN car_view B ON A.car_id = B.car_id INNER JOIN car_img C ON B.car_id = C.car_id WHERE A.customer_id = '" . $_COOKIE['id'] . "' AND A.favorite_flag = 1 group by C.car_id ;");
    }
    //$select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT A.customer_id , A.car_id,A.favorite_flag,B.*,C.img_id,C.ext  FROM favorite A INNER JOIN car_view B ON A.car_id = B.car_id INNER JOIN car_img C ON B.car_id = C.car_id WHERE A.customer_id = '" . $_COOKIE['id'] . "' AND A.favorite_flag = 1 group by C.car_id ;");
} else {
    //削除処理
    $sql = "UPDATE `favorite` SET `favorite_flag`= 0 WHERE customer_id = '" . $_COOKIE['id'] . "' AND car_id = '" . $car_id . "' ;";
    change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
}



echo json_encode($select, JSON_UNESCAPED_UNICODE);
// http://jws.jalan.net/APILite/HotelSearch/V1/
