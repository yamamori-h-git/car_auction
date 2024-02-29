<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/auctionsearch.css">
    <title>出品情報検索画面</title>
</head>

<body>
    <div>
        <h2>出品検索</h2>
        <form action="../../public/manage/auctionsearch.php" method="POST">
            <div class="style">
                <p>出品番号</p>
                <input type="text" class="group1" name="listing_id" pattern="[0-9]+" title="数字のみを入力してください" placeholder="出品番号を入力して下さい">
                <p>車両番号</p>
                <input type="text" class="group1" name="car_id" pattern="[0-9]+" title="数字のみを入力してください" placeholder="車両番号を入力して下さい">
                <p>オークション日</p>
                <input type="date" class="group1" name="auction_date" placeholder="2023-01-01">
                <p>落札状況</p>
                <div class="radio">
                    <label><input type="radio" name="flg" value="" checked/>全選択</label>
                    <label><input type="radio" name="flg" value="1" />落札済み</label>
                    <label><input type="radio" name="flg" value="0" />未落札</label>
                </div>

                <button type="submit" class="btn" name="btn">検索</button>
                <p><a href="../../public/manage/auctionlist.php">戻る</a></p>
        </form>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>