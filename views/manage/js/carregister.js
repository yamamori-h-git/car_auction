// フォームを隠してボタンを付ける
document.getElementById("img_button").addEventListener("click", (e) => {
    e.preventDefault();
    document.getElementById("file_upload").click();
});

// サムネ表示
// $(function () {
//     $('#file_upload').change(function () {
//         window.URL = window.URL || window.webkitURL;
//         if (window.URL) {
//             var IMGFILE = $('input[name="img"]').prop('files')[0];
//             var IMGURL = window.URL.createObjectURL(IMGFILE);
//             $('#user_icon').attr("src", IMGURL).onload = function () {
//                 window.URL.revokeObjectURL(IMGURL);
//             };
//             document.getElementById('user_icon').style.display = "block";
//         } else {
//             alert("ブラウザがサムネ表示に対応していません(´；ω；｀)");
//         }
//     });
// });

function preview(elem, output = '') {
    Array.from(elem.files).map((file) => {
        const blobUrl = window.URL.createObjectURL(file)
        output+=`<img src=${blobUrl}>`
    })   
    elem.nextElementSibling.innerHTML = output
}