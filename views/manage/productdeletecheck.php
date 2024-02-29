<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/productdeletecheck.css">
    <title>出品削除確認画面</title>
</head>

<body>

    <h2>削除内容を確認してください</h2>
    <form action="../../public/manage/auctiondeleteconf.php" method="POST">
        <div class="style">
            <p>車両番号:<?php echo $list[0]['car_id']; ?></p>
            <p>オークション開始日時:<?php echo $startdate->format('Y年m月d日 H時i分'); ?></p>
            <p>オークション終了日時:<?php echo $enddate->format('Y年m月d日 H時i分'); ?></p>
            <p>出品価格:<?php echo number_format($list[0]['listing_price']); ?>円</p>
            <p>即決価格:<?php echo number_format($list[0]['buyout']); ?>円</p>
            <button type="submit" class="btn" name="btn">削除</button>
            <p><a href="../../public/manage/auctiondetail.php">戻る</a></p>
        </div>
    </form>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>