<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/productedit.css">
    <title>出品情報編集画面</title>
</head>

<body>
    <div>
        <h2>出品編集</h2>
        <form action="../../public/manage/auctionedit.php" method="POST">
            <div class="style">
                <p>車両番号</p>
                <input type="text" class="group1" name="car_id" placeholder="車両番号を入力して下さい" value="<?php echo isset($_SESSION['car_id']) ? $_SESSION['car_id'] : ''; ?>">
                <p class="error"><?php echo isset($err['car_id']) ? $err['car_id'] : ''; ?></p>
                <p>オークション開始日時</p>
                <input type="datetime-local" class="group1" name="startdate" placeholder="2014-01-31 14:00:00" value="<?php echo isset($_SESSION['startdate']) ? $_SESSION['startdate'] : ''; ?>">
                <p class="error"><?php echo isset($err['startdate']) ? $err['startdate'] : ''; ?></p>
                <p>オークション終了日時</p>
                <input type="datetime-local" class="group1" name="enddate" placeholder="2014-01-31 14:00:00" value="<?php echo isset($_SESSION['enddate']) ? $_SESSION['enddate'] : ''; ?>">
                <p class="error"><?php echo isset($err['enddate']) ? $err['enddate'] : ''; ?></p>
                <p>出品価格</p>
                <input type="text" class="group1" name="listing_price" placeholder="出品価格を入力して下さい" value="<?php echo isset($_SESSION['listing_price']) ? $_SESSION['listing_price'] : ''; ?>">
                <p class="error"><?php echo isset($err['listing_price']) ? $err['listing_price'] : ''; ?></p>
                <p>即決価格</p>
                <input type="text" class="group1" name="buyout" placeholder="即決価格を入力して下さい" value="<?php echo isset($_SESSION['buyout']) ? $_SESSION['buyout'] : ''; ?>">
                <p class="error"><?php echo isset($err['buyout']) ? $err['buyout'] : ''; ?></p>
                <a href="../../public/manage/auctiondetail.php" class="btn back">戻る</a>
                <button type="submit" class="btn" name="btn">確認に移る</button>
                
            </div>
        </form>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>