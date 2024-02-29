$(".car_img").click(function () {
  console.log("OK");
  var new_src = $(this).attr("src");
  $("#car_hero_img").attr("src", new_src);
});
