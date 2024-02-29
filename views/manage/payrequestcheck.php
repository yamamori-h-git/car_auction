<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/payrequestcheck.css">
    <title>支払請求確認画面</title>
</head>

<body>

    <h2>請求内容を確認してください</h2>
    <form action="../../public/manage/payrequestconf.php" method="POST">
        <div class="style">
            <p>出品番号:<?php echo $list[0]['listing_id']; ?></p>
            <p>車両番号:<?php echo $list[0]['car_id']; ?></p>
            <p>落札者会員番号:<?php echo $list[0]['customer_id']; ?></p>
            <p>請求金額:<?php echo $list[0]['payment']; ?></p>
            <p>支払期日:<?php echo $_SESSION['pay_limit']; ?></p>
            <button type="submit" class="btn" name="btn">作成する</button>
            <p><a href="../../public/manage/payrequest.php">戻る</a></p>
        </div>
    </form>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>