<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/payrequest.css">
    <title>支払い請求作成画面</title>
</head>
<body>

    <h2>支払請求作成</h2>
    <div>
    <form action="../../public/manage/payrequest.php" method="POST">
    <p>出品番号</p>
    <input type="text" class="group1" name="listing_id" placeholder="出品番号を入力して下さい"  value="<?php echo $list[0]['listing_id']; ?>" disabled>
    <p>車両番号</p>
    <input type="text" class="group1" name="car_id" placeholder="車両番号を入力して下さい" value="<?php echo $list[0]['car_id']; ?>" disabled>
    <p>落札者会員番号</p>
    <input type="text" class="group1" name="customer_id" placeholder="落札者会員番号を入力して下さい" value="<?php echo $list[0]['customer_id']; ?>" disabled>
    <p>請求金額</p>
    <input type="text" class="group1" name="payment" placeholder="請求金額を入力して下さい" value="<?php echo $list[0]['payment']; ?>" disabled>
    <p>支払期限</p>
    <input type="date" class="group1" name="pay_limit" placeholder="支払期限を入力して下さい" value="<?php echo isset($_SESSION['pay_limit']) ? $_SESSION['pay_limit'] : ''; ?>">
    <p class="error"><?php echo isset($err['pay_limit']) ? $err['pay_limit'] : ''; ?></p>

    <a href="../../public/manage/auctiondetail.php" class="btn back">戻る</a>
    <button type="submit" class="btn" name="btn">確認に移る</button>
    
    </form>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>