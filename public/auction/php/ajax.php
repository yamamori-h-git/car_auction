<?php 

header('Access-Control-Allow-Origin: *');
//CORS
//header('Access^Control-Allow-Origin: http://localhost:9000')の設定
header("Content-type:  application/json; charset=UTF-8");
$id = $_POST['id'];
require_once '../../../config.php';
require_once '../../../function.php';
$select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM `auction_top` WHERE maker = '" . $id . "' ORDER BY `auction_top`.`car_id` ASC;");


echo json_encode($select,JSON_UNESCAPED_UNICODE);
// http://jws.jalan.net/APILite/HotelSearch/V1/
?>