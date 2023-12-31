<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Tree Example</title>

    <style>
	
	.node {
		cursor: pointer;
	}

	.node circle {
	  fill: #fff;
	  stroke: steelblue;
	  stroke-width: 3px;
	}

	.node text {
	  font: 12px sans-serif;
	}

	.link {
	  fill: none;
	  stroke: #ccc;
	  stroke-width: 2px;
	}
	
    </style>

  </head>

  <body>
<div id="chart"></div>
<!-- load the d3.js library -->	
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>
	
<script type="text/javascript">

	function wrap(text, width) {
	    text.each(function () {
	        for (
	            var word,
	                text = d3.select(this),
	                words = text.text().split(/\s+/).reverse(),
	                line = [],
	                lineHeight = 1.1,
	                x = text.attr("x"),
	                y = text.attr("y"),
	                dy = parseFloat(text.attr("dy")) || 0,
	                tspan = text
	                    .text(null)
	                    .append("tspan")
	                    .attr("x", x)
	                    .attr("y", y)
	                    .attr("dy", "1.15em");
	            (word = words.pop());

	        )
	            line.push(word),
	                tspan.text(line.join(" ")),
	                tspan.node().getComputedTextLength() > width &&
	                    (line.pop(),
	                    tspan.text(line.join(" ")),
	                    (line = [word]),
	                    (tspan = text
	                        .append("tspan")
	                        .attr("x", x)
	                        .attr("y", y)
	                        .attr("dy", "1.15em")
	                        .text(word)));
	    });
	}

  var json = 
  {
      "name": "Misisisisi si sii sism simsimsimsim ismi msim sim sim simsi mi smi smi smi smi",
      "children": [
          {
              "name": "I have a very long sentence that needs to be broken up",
              "children": [
                  {
                      "name": "Section 1",
                      "children": [
                          {"name": "Child 1"},
                          {"name": "Child 2"},
                          {"name": "Child 3"}
                      ]
                  },
                  {
                      "name": "Section 2",
                      "children": [
                          {"name": "Child 1"},
                          {"name": "Child 2"},
                          {"name": "Child 3"}
                      ]
                  }
              ]
          },
          {
              "name": "Either you break this up or one of us is in deep trouble",
              "children": [
                  {
                      "name": "Section 1",
                      "children": [
                          {"name": "Child 1"},
                          {"name": "Child 2"},
                          {"name": "Child 3"}
                      ]
                  },
                  {
                      "name": "Section 2",
                      "children": [
                          {"name": "Child 1"},
                          {"name": "Child 2"},
                          {"name": "Child 3"}
                      ]
                  }
              ]
          }
      ]
  };

  var width = 100+'%';
  var height = 800;
  var maxLabel = 250;
  var duration = 500;
  var radius = 4;

  var i = 0;
  var root;

  var tree = d3.layout.tree()
      .size([height, width]);

  var diagonal = d3.svg.diagonal()
      .projection(function(d) { return [d.y, d.x]; });

  var svg = d3.select("#chart").append("svg")
      .attr("width", width)
      .attr("height", height)
          .append("g")
          .attr("transform", "translate(" + maxLabel + ",0)");

  root = json;
  root.x0 = height / 2;
  root.y0 = 0;

  // root.children.forEach(collapse);

  function update(source) 
  {
      // Compute the new tree layout.
      var nodes = tree.nodes(root).reverse();
      var links = tree.links(nodes);

      // Normalize for fixed-depth.
      nodes.forEach(function(d) { d.y = d.depth * maxLabel; });

      // Update the nodes…
      var node = svg.selectAll("g.node")
          .data(nodes, function(d){ 
              return d.id || (d.id = ++i); 
          });

      // Enter any new nodes at the parent's previous position.
      var nodeEnter = node.enter()
          .append("g")
          .attr("class", "node")
          .attr("transform", function(d){ return "translate(" + source.y0 + "," + source.x0 + ")"; })
          .on("click", click);

      nodeEnter.append("circle")
          .attr("r", 0)
          .style("fill", function(d){ 
              return d._children ? "lightsteelblue" : "white"; 
          });

      nodeEnter.append("text")
          .attr("x", function(d){ 
              var spacing = computeRadius(d) + 5;
              return d.children || d._children ? -spacing : spacing; 
          })
          .attr("dy", "3")
          .attr("text-anchor", function(d){ return d.children || d._children ? "end" : "start"; })
          .text(function(d){ return d.name; })
          .style("fill-opacity", 0);

      nodeEnter.select("text").call(wrap, 200); // <++++++++++ wrap it!

      // Transition nodes to their new position.
      var nodeUpdate = node.transition()
          .duration(duration)
          .attr("transform", function(d) { return "translate(" + d.y + "," + d.x + ")"; });

      nodeUpdate.select("circle")
          .attr("r", function(d){ return computeRadius(d); })
          .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

      nodeUpdate.select("text").style("fill-opacity", 1);
      // nodeUpdate.select("text").call(wrap, 200); // <++++++++++ wrap it!
      // Transition exiting nodes to the parent's new position.
      var nodeExit = node.exit().transition()
          .duration(duration)
          .attr("transform", function(d) { return "translate(" + source.y + "," + source.x + ")"; })
          .remove();

      nodeExit.select("circle").attr("r", 0);
      nodeExit.select("text").style("fill-opacity", 0);

      // Update the links…
      var link = svg.selectAll("path.link")
          .data(links, function(d){ return d.target.id; });

      // Enter any new links at the parent's previous position.
      link.enter().insert("path", "g")
          .attr("class", "link")
          .attr("d", function(d){
              var o = {x: source.x0, y: source.y0};
              return diagonal({source: o, target: o});
          });

      // Transition links to their new position.
      link.transition()
          .duration(duration)
          .attr("d", diagonal);

      // Transition exiting nodes to the parent's new position.
      link.exit().transition()
          .duration(duration)
          .attr("d", function(d){
              var o = {x: source.x, y: source.y};
              return diagonal({source: o, target: o});
          })
          .remove();

      // Stash the old positions for transition.
      nodes.forEach(function(d){
          d.x0 = d.x;
          d.y0 = d.y;
      });
  }

  function computeRadius(d)
  {
      if(d.children || d._children) return radius + (radius * nbEndNodes(d) / 10);
      else return radius;
  }

  function nbEndNodes(n)
  {
      nb = 0;    
      if(n.children){
          n.children.forEach(function(c){ 
              nb += nbEndNodes(c); 
          });
      }
      else if(n._children){
          n._children.forEach(function(c){ 
              nb += nbEndNodes(c); 
          });
      }
      else nb++;

      return nb;
  }

  function click(d)
  {
      if (d.children){
          d._children = d.children;
          d.children = null;
      } 
      else{
          d.children = d._children;
          d._children = null;
      }
      update(d);
  }

  function collapse(d){
      if (d.children){
          d._children = d.children;
          d._children.forEach(collapse);
          d.children = null;
      }
  }

  update(root);
</script>
	
  </body>
</html>