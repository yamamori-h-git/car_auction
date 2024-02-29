<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/auctiondetail.css">
    <title>オークション情報詳細画面</title>
</head>

<body>
    <h2>オークション詳細</h2>
    <form action="../../public/manage/auctiondetail.php" method="POST">
        <div class="style">
            <p>出品番号:<?php echo $list[0]['listing_id']; ?></p>
            <p>車両番号:<?php echo $list[0]['car_id']; ?></p>
            <p>オークション開始日時:<?php echo $list[0]['auction_startdate']; ?></p>
            <p>オークション終了日時:<?php echo $list[0]['auction_enddate']; ?></p>
            <p>出品価格:<?php echo number_format($list[0]['listing_price']); ?>円</p>
            <p>即決価格:<?php echo number_format($list[0]['buyout']); ?>円</p>
            <p>出品日時:<?php echo $list[0]['listing_date']; ?></p>
            <p>落札価格::<?php echo $list[0]['contract_price']; ?></p>
            <p>落札者会員番号:<?php echo $list[0]['customer_id']; ?></p>
            <p>支払金額:<?php echo $list[0]['payment']; ?></p>
            <p>支払日時:<?php echo $list[0]['pay_date']; ?></p>
            <p>落札状況:<?php echo $list[0]['contract_flg'] == 0 ? "未落札" : "落札済み"; ?></p>
            <button type="submit" class="btn" name="edit" value="edit" formaction="">編集</button>
            <?php if (empty($invoice_list)) { ?>
                <button type="submit" class="btn" name="invoice" value="invoice" formaction="" <?php echo $list[0]['contract_flg'] == 0? "disabled" : ''; ?>>請求書作成</button>
            <?php }else{ ?>
                <button type="submit" class="btn" name="invoice" value="invoice" formaction="" disabled>作成済み</button>
            <?php } ?>
            <button type="submit" class="btn" name="delete" value="delete" formaction="">削除</button>
            <p id="back"><a href="../../public/manage/auctionlist.php">戻る</a></p>
        </div>
    </form>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>