$(function () {
    //検索ボタンをクリックされたときに実行
    $("#post_code_button").click(function (e) {
        e.preventDefault();
        //入力値をセット
        var param = { zipcode: $('#address').val() }
        //zipcloudのAPIのURL
        var send_url = "http://zipcloud.ibsnet.co.jp/api/search";
        $.ajax({
            type: "GET",
            cache: false,
            data: param,
            url: send_url,
            dataType: "jsonp",
            success: function (res) {
                //結果によって処理を振り分ける
                if (res.status == 200) {
                    $('#prefecture').val(res.results[0].address1);
                    $('#prefecture').val(res.results[0].address1);
                    $('#Municipality').val(res.results[0].address2+res.results[0].address3);
                    console.log(res.results[0]);
                //     $('#zip_result').html(html);
                 } else {
                     //エラーだった時
                     //エラー内容を表示
                     $('#zip_result').html(res.message);

                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
            }
        });
    });
});
