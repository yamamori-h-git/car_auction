$('body').on('click','#favorite_insert', function(){
    let flag = 0;
    $.ajax({
        url: './php/car_detail_ajax.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'car_id': $(this).val()
            ,'flag' : flag
        },
        caches: false
    })
        //Ajaxリクエストが成功したとき発動
        .done((data, textStatus) => {
            // $('#output').text(data);
            $("#favorite").html(
                '<button id="favorite_delete" value="' + $(this).val() + '">お気に入りに登録済み</button>' 
            );

        })
        //Ajaxリクエストが失敗したとき発動
        .fail((jqXHR, textStatus, errorThrown) => {
            console.log("jqXHR          : " + jqXHR.status); // HTTPステータスを表示
            console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラーなどのエラー情報を表示
            console.log("errorThrown    : " + errorThrown.message); // 例外情報を表示
        })
})
$('body').on('click','#favorite_delete', function(){
    let flag = 1;
    $.ajax({
        url: './php/car_detail_ajax.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'car_id': $(this).val()
            ,'flag' : flag
        },
        caches: false
    })
        //Ajaxリクエストが成功したとき発動
        .done((data, textStatus) => {
            // $('#output').text(data);
            $("#favorite").html(
                '<button id="favorite_insert" value="' + $(this).val() + '">お気に入りに登録する</button>' 
            );

        })
        //Ajaxリクエストが失敗したとき発動
        .fail((jqXHR, textStatus, errorThrown) => {
            console.log("jqXHR          : " + jqXHR.status); // HTTPステータスを表示
            console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラーなどのエラー情報を表示
            console.log("errorThrown    : " + errorThrown.message); // 例外情報を表示
        })

        
})
$('body').on('click','#login',function(){
    location.href = './login.php';
})