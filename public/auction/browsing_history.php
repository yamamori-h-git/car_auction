<?php 
require_once '../../config.php';
require_once '../../function.php';
if (isset($_COOKIE['id'])) {
    $select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT A.customer_id , A.car_id,A.favorite_flag,B.*,C.img_id,C.ext  FROM `favorite` A INNER JOIN `car_view` B ON A.car_id = B.car_id INNER JOIN `car_img` C ON B.car_id = C.car_id WHERE A.customer_id = '" . $_COOKIE['id'] ."' ;");
    //print_r($select);
    if(empty($select)){
        //$sql = "INSERT INTO `favorite`(`customer_id`, `car_id`, `favorite_flag`) VALUES ('" . $_COOKIE['id'] ."','" . $car_id ."',1)";
        //change_sql(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
        $select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT A.customer_id , A.car_id,A.favorite_flag,B.*,C.img_id,C.ext  FROM favorite A INNER JOIN car_view B ON A.car_id = B.car_id INNER JOIN car_img C ON B.car_id = C.car_id WHERE A.customer_id = '" . $_COOKIE['id'] ."' AND A.favorite_flag = 1 group by C.car_id ;");
        //echo 'ない';
    }
    else{
        //echo 'ある';
        $select = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT A.customer_id , A.car_id,A.favorite_flag,B.*,C.img_id,C.ext  FROM favorite A INNER JOIN car_view B ON A.car_id = B.car_id INNER JOIN car_img C ON B.car_id = C.car_id WHERE A.customer_id = '" . $_COOKIE['id'] ."' AND A.favorite_flag = 1 group by C.car_id ;");
    }
} else {
    header("Location: ./index.php");
    exit;
}
//print_r(($select));

require_once '../../views/auction/favorite.php';

?>