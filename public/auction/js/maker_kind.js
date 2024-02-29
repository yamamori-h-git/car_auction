
$("#maker").change(function () {
    $.ajax({
        url: './php/ajax.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'id': $(this).val()
        },
        caches: false
    })
        //Ajaxリクエストが成功したとき発動
        .done((data, textStatus) => {
            // $('#output').text(data);
            var maker = $(this).val();
            if (maker !== "") {
                if (maker === data[0]['maker']) {
                    for (let i = 0; i < data.length; i++) {
                        $("#kind").html(
                            '<option value="">すべての車種</option>' +
                            '<option value="' + data[i]['car_name'] + '">' + data[i]['car_name'] + '</option>'
                        );
                    }
                }
            }
            else{
                $("#kind").html(
                    '<option value="">すべての車種</option>'
                );
            }

        })
        //Ajaxリクエストが失敗したとき発動
        .fail((jqXHR, textStatus, errorThrown) => {
            console.log("jqXHR          : " + jqXHR.status); // HTTPステータスを表示
            console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラーなどのエラー情報を表示
            console.log("errorThrown    : " + errorThrown.message); // 例外情報を表示
        })


    // メーカー名
    //     var maker = $(this).val();
    //     if (maker === 'トヨタ') {

    //         // 車種用のliのかたまり
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="aisisu">アイシス</option>' +
    //             '<option value="akua">アクア</option>' +
    //             '<option value="abaron">アバロン</option>' +
    //             '<option value="abensisusedan">アベンシスセダン</option>' +
    //             '<option value="abensisuwagon">アベンシスワゴン</option>' +
    //             '<option value="arion">アリオン</option>' +
    //             '<option value="arisuto">アリスト</option>' +
    //             '<option value="aritettula">アリテッツァ</option>' +
    //             '<option value="aritettulazi-ta">アリテッツァジータ</option>' +
    //             '<option value="arufa-do">アルファード</option>'
    //         );
    //     } else if (maker === 'nissan') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="atorasutorakku">アトラストラック</option>' +
    //             '<option value="atorasuroko">アトラスロコ</option>' +
    //             '<option value="abeni-ru">アベニール</option>' +
    //             '<option value="abeni-ruka-go">アベニールカーゴ</option>' +
    //             '<option value="abeni-ruwagon">アベニールワゴン</option>' +
    //             '<option value="infiniteli">インフィニティ</option>' +
    //             '<option value="infiniteliq45">インフィニティQ45</option>' +
    //             '<option value="wingroad">ウイングロード</option>' +
    //             '<option value="ekusutoreiru">エクストレイル</option>' +
    //             '<option value="esukarugo">エスカルゴ</option>'
    //         );
    //     } else if (maker === 'honda') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="avansia">アヴァンシア</option>' +
    //             '<option value="akyura">アキュラ</option>' +
    //             '<option value="akuteli">アクティ</option>' +
    //             '<option value="akutelistreet">アクティストリート</option>' +
    //             '<option value="akutelitrack">アクティトラック</option>' +
    //             '<option value="akuteliban">アクティバン</option>' +
    //             '<option value="acord">アコード</option>' +
    //             '<option value="acordinspire">アコードインスパイア</option>' +
    //             '<option value="acordku-pe">アコードクーペ</option>' +
    //             '<option value="acordtuara-">アコードツアラー</option>'
    //         );
    //     } else if (maker === 'matuda') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="........">........</option>' +
    //             '<option value=".........">.........</option>' +
    //             '<option value="akusera">アクセラ</option>' +
    //             '<option value="akuserahaiburiddo">アクセラハイブリッド</option>' +
    //             '<option value="atenza">アテンザ</option>' +
    //             '<option value="atenzasportwagon">アテンザスポーツワゴン</option>' +
    //             '<option value="atenzawagon">アテンザワゴン</option>' +
    //             '<option value="anfinimpv">アンフィニMPV</option>' +
    //             '<option value="anfinims-8">アンフィニMS-8</option>' +
    //             '<option value="anfinims-9">アンフィニMS-9</option>'
    //         );
    //     } else if (maker === 'subaru') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="arusio-ne">アルシオーネ</option>' +
    //             '<option value="arusio-nesvx">アルシオーネSVX</option>' +
    //             '<option value="inpuressa">インプレッサ</option>' +
    //             '<option value="inpuressag4">インプレッサG4</option>' +
    //             '<option value="inpuressawrx">インプレッサWRX</option>' +
    //             '<option value="inpuressaanesisu">インプレッサアネシス</option>' +
    //             '<option value="inpuressasport">インプレッサスポーツ</option>' +
    //             '<option value="inpuressasporthybrid">インプレッサスポーツハイブリッド</option>' +
    //             '<option value="inpuressasportwagon">インプレッサスポーツワゴン</option>' +
    //             '<option value="vivio">ヴィヴィオ</option>'
    //         );
    //     } else if (maker === 'mitubisi') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value=".mmc">.MMC</option>' +
    //             '<option value=".....">.....</option>' +
    //             '<option value="ai">アイ</option>' +
    //             '<option value="aimi-bu">アイ・ミーブ</option>' +
    //             '<option value="autrander">アウトランダー</option>' +
    //             '<option value="autranderphev">アウトランダーPHEV</option>' +
    //             '<option value="aspair">アスパイア</option>' +
    //             '<option value="asufarutofinisher">アスファルトフィニッシャー</option>' +
    //             '<option value="airtreck">エアトレック</option>' +
    //             '<option value="airoace">エアロエース</option>'
    //         );
    //     } else if (maker === 'daihatu') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="atore-">アトレー</option>' +
    //             '<option value="atore-7">アトレー7</option>' +
    //             '<option value="atore-wagon">アトレーワゴン</option>' +
    //             '<option value="apuro-zu">アプローズ</option>' +
    //             '<option value="arutelisu">アルティス</option>' +
    //             '<option value="wake">ウェイク</option>' +
    //             '<option value="esse">エッセ</option>' +
    //             '<option value="opty">オプティ</option>' +
    //             '<option value="cast">キャスト</option>' +
    //             '<option value="quu">クー</option>'
    //         );
    //     } else if (maker === 'suzuki') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="alt">アルト</option>' +
    //             '<option value="alteco">アルトエコ</option>' +
    //             '<option value="alttarbors">アルトターボRS</option>' +
    //             '<option value="althassuru">アルトハッスル</option>' +
    //             '<option value="altban">アルトバン</option>' +
    //             '<option value="altrapan">アルトラパン</option>' +
    //             '<option value="altrapanshokora">アルトラパンショコラ</option>' +
    //             '<option value="ignis">イグニス</option>' +
    //             '<option value="esqud">エスクード</option>' +
    //             '<option value="every">エブリー</option>'
    //         );
    //     } else if (maker === 'isuzu') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="asuka">アスカ</option>' +
    //             '<option value="wizard">ウィザード</option>' +
    //             '<option value="elga">エルガ</option>' +
    //             '<option value="elf">エルフ</option>' +
    //             '<option value="elfnkr">エルフNKR</option>' +
    //             '<option value="elfnpr">エルフNPR</option>' +
    //             '<option value="elfut">エルフUT</option>' +
    //             '<option value="elfdunp">エルフダンプ</option>' +
    //             '<option value="elftrack">エルフトラック</option>' +
    //             '<option value="ga-ra">ガーラ</option>'
    //         );
    //     } else if (maker === 'hino') {
    //         $("#kind").html(
    //             '<option value="all_kind">すべての車種</option>' +
    //             '<option value="kontessa">コンテッサ</option>' +
    //             '<option value="superdorufin">スーパードルフィン</option>' +
    //             '<option value="superdorufinprofia">スーパードルフィンプロフィア</option>' +
    //             '<option value="serega">セレガ</option>' +
    //             '<option value="seregar">セレガR</option>' +
    //             '<option value="sonota">その他</option>' +
    //             '<option value="dutro">デュトロ</option>' +
    //             '<option value="dutroru-toban">デュトロルートバン</option>' +
    //             '<option value="track">トラック</option>' +
    //             '<option value="dorufin">ドルフィン</option>'
    //         );
    //     }

}
);
