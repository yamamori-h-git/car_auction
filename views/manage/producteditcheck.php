<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/productcheck.css">
    <title>出品情報編集確認画面</title>
</head>
<body>

    <h2>編集内容を確認してください</h2>
    <form action="../../public/manage/auctioneditconf.php" method="POST">
        <div class="style">
            <p>車両番号:<?php echo $_SESSION['car_id']; ?></p>
            <p>オークション開始日時:<?php echo $startdate->format('Y年m月d日 H時i分'); ?></p>
            <p>オークション終了日時:<?php echo $enddate->format('Y年m月d日 H時i分'); ?></p>
            <p>出品価格:<?php echo number_format($_SESSION['listing_price']); ?>円</p>
            <p>即決価格:<?php echo number_format($_SESSION['buyout']); ?>円</p>
            <button type="submit" class="btn" name="btn">出品</button>
            <p><a href="../../public/manage/auctiondetail.php">戻る</a></p>
        </div>
    </form>
    
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>