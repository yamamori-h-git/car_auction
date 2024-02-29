<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/common.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="css/caredit.css">
    <title>車両情報編集画面</title>
</head>
<body>
<div>
    <h2>車両情報編集</h2>
    <form action="" method="">
    <div class="style">
    <p>登録する車両を選択</p>
    <div class="img_flex">
        <button id="img_button">画像を選択</button>
        <input id="file_upload" name="img" type="file" id="input1" accept=".png,.jpg,.jpeg,.svg" multiple>
        <div id="icon_thumb"><img id="user_icon" src="" alt=""></div>
    </div> 
    
    <p>車両名</p>
    <input type="text" class="group1" name="" placeholder="ハイエース">
    <p>メーカー名</p>
    <input type="text" class="group1" name="" placeholder="トヨタ">
    <p>年式</p>
    <input type="text" class="group1" name="" placeholder="2014-01-31">
    <p>走行距離</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>車検有効期限</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>ボディタイプ</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>排気量</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>輸入モデル年代</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>ミッション</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>型式</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>色の名称</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>仕入値</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>評価点</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>車両削除</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>ドア数</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>起動方式</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>点検記録簿</p>
    <div class="radio t1">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    
    <p>車体番号</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>輸入経路</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>車歴(事故歴)</p>
    <div class="radio t2">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>引き渡し条件</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>乗車定員数</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>燃料</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>修理歴</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>リサイクル預託金</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>所有車歴</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>車両登録日時</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>車種名</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>グレード名</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>グレード番号</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>ハンドル</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" />無</label>
    </div>
    <p>エアコン</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>パワーウィンドウ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />自動</label>
    <label><input type="radio" name="" value="" />手動</label>
    </div>
    <p>集中ドアロック</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>ABS</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>エアバッグ</p>
    <div class="radio">
    <input type="text" class="group1" name="" placeholder="">
    <p>ETC</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>キーレスエントリー</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>スマートキー</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>CD取付</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>MDビデオ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>DVDビデオ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>テレビ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>ナヴィゲーション</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>バックカメラ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>電動スライドドア</p>
    <input type="text" class="group1" name="" placeholder="">
    <p>サンルーフ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>本革シート</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>純正エアロパーツ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>純正アルミパーツ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>横滑り防止装置</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />正常</label>
    <label><input type="radio" name="" value="" />異常</label>
    </div>
    <p>トラクションコントロール</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>寒冷地帯使用者である</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>福祉車両である</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>ローダウンしている</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>禁煙車である</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>ペット同乗</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>限定車である</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>取扱説明書</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>新車時保証</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    <p>スペアタイヤ</p>
    <div class="radio">
    <label><input type="radio" name="" value="" />有</label>
    <label><input type="radio" name="" value="" />無</label>
    </div>
    
    <button type="submit" class="btn">確認に移る</button>
    </form>

    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>