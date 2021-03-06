d3.json("/api/beers", function(data) {
 var $i = 1;
 console.log(data.data[$i].name);
 console.log(data.data[$i]);
 var abv = (data.data[$i].abv);
 var ibu = (data.data[$i].ibu);
 var data = [abv, ibu];
 console.log(data);

 var canvas = d3.select("body").append("svg")
  .attr("width", 1500)
  .attr("height", 1500);

  var colorScale = d3.scale.ordinal()
  .range(["red", "blue", "orange"]);

var group = canvas.append("g")
  .attr("transform", "translate(100,100)");

var r = 100;
var p = Math.PI * 2;

var arc = d3.svg.arc()
  .innerRadius(r - 40)
  .outerRadius(r)
  //.startAngle(0)
  //.endAngle(p)
;

var pie = d3.layout.pie()
  .value(function(d) { return d; });

var arcs = group.selectAll(".arc")
  .data(pie(data))
  .enter()
  .append("g")
  .attr("class", "arc");

arcs.append("path")
  .attr("d", arc)
.attr("fill", function(d) { return colorScale(d.data)});

//group.append("path")
  //.attr("d", arc);
arcs.append("text")
  .attr("transform", function (d) {
    return "translate(" + arc.centroid(d) + ")";
  })
  .attr("text-anchor", "middle")
  .attr("font-size", "1.3em")
  .text(function (d) {return d.data;});

});
