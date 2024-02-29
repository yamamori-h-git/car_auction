<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/auctionlist.css">
    <title>オークション情報一覧画面</title>
</head>

<body>
    <div id="container">
        <div id="left">
            <ul>
                <li><a href="../../public/manage/carlist.php">車両一覧</a></li>
                <li><a href="../../public/manage/auctionlist.php">オークション一覧</a></li>
                <li><a href="">ユーザー一覧</a></li>
                <li><a href="">ログアウト</a></li>
            </ul>
        </div>

        <div id="right">
            <p class="msg"><?php echo isset($msg)?$msg:'';?></p>
            </ul>
            <h2>オークション一覧</h2>
            <div id="group">
                <a href="../../public/manage/auctionlist.php?clear" class="button search">検索クリア</a>
                <a href="../../public/manage/auctionsearch.php" class="button">オークションを検索する</a>
                <a href="../../public/manage/auctioncreate.php" class="button entry">出品する</a>
            </div>

            <table>
                <tr>
                    <th>出品番号</th>
                    <th>車両番号</th>
                    <th>オークション開始日時</th>
                    <th>オークション終了日時</th>
                    <th>出品価格</th>
                    <th>即決価格</th>
                    <th></th>
                </tr>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['listing_id']; ?></td>
                        <td><?php echo $value['car_id']; ?></td>
                        <td><?php echo $value['auction_startdate']; ?></td>
                        <td><?php echo $value['auction_enddate']; ?></td>
                        <td><?php echo number_format($value['listing_price']); ?>円</td>
                        <td><?php echo number_format($value['buyout']); ?>円</td>
                        <td class="color"><a href="../../public/manage/auctiondetail.php?id=<?php echo $value['listing_id']; ?>">詳細</a></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="page">
                <?php if ($page_back == 0) { ?>
                    <p><span>
                            <<</span>
                    </p>
                    <p><span>
                            <</span>
                    </p>
                <?php } else { ?>
                    <p><a href="./auctionlist.php?page=<?php echo $page_back; ?>">
                            <<</a>
                    </p>
                    <p><a href="./auctionlist.php?page=1">
                            <</a>
                    </p>
                <?php } ?>

                <?php for ($i = 1; $i <= $num; $i++) { ?>
                    <p><?php if ($page == $i) { ?>
                            <span><?php echo $i; ?></span>
                        <?php } else { ?>
                            <a href="./auctionlist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php } ?>
                    </p>
                <?php } ?>
                <?php if ($page_next <= $num) { ?>
                    <p><a href="./auctionlist.php?page=<?php echo $page_next; ?>">></a></p>
                    <p><a href="./auctionlist.php?page=<?php echo $num; ?>">>></a></p>
                <?php } else { ?>
                    <p><span>></span></p>
                    <p><span>>></span></p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>