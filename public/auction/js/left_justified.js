var $grid = $(".car_list"),
  emptyCells = [],
  i;

for (i = 0; i < $grid.find(".car").length; i++) {
  emptyCells.push($("<div>", { class: "car is-empty" }));
}
$grid.append(emptyCells);
