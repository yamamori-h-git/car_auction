<?php 
if(isset($A)){
    if ($A % 2 == 0) {
        //偶数の場合の処理
        $class = "white";
    } else {
        //奇数の場合の処理
        $class = "gray";
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/carlist.css">
    <title></title>
</head>
<body>
    <div id="container">
        <div id="left">
            
            <ul>
                <li><a href="">車両一覧</a></li>
                <li><a href="">オークション一覧</a></li>
                <li><a href="">ユーザー一覧</a></li>
                <li><a href="">ログアウト</a></li>
            </ul>
        </div>

        <div id="right">
            <p class="msg">車両番号○○の情報を削除しました</p>
            </ul>
            <h2>車両一覧</h2>
            <div id="group">
                <a href="" class="button">車両を検索する</a>
                <a href="" class="button entry">車両を登録する</a>
            </div>
            
            <table>
                <tr>
                    <th>車両番号</th>
                    <th>メーカー</th>
                    <th>車種名</th>
                    <th>登録日時</th>
                    <th>状況</th>
                    <th></th>
                </tr>
                <tr class="<?php echo $class ;?>">
                    <td>1</td>
                    <td>トヨタ</td>
                    <td>ハイエース</td>
                    <td>YYYY-MM-DD</td>
                    <td>入札中</td>
                    <td class="color"><a href="">詳細</a></td>
                </tr>
                <tr class="<?php echo $class ;?>">
                    <td>2</td>
                    <td>トヨタ</td>
                    <td>ハイエース</td>
                    <td>YYYY-MM-DD</td>
                    <td>入札中</td>
                    <td class="color"><a href="">詳細</a></td>
                </tr>
            </table>
        </div>

    </div>
    

</body>
</html>