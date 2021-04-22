<script>

  import Matter from 'matter-js';

    // module aliases
    var Engine = Matter.Engine,
        Render = Matter.Render,
        Runner = Matter.Runner,
        Common = Matter.Common,
        MouseConstraint = Matter.MouseConstraint,
        Mouse = Matter.Mouse,
        Composite = Matter.Composite,
        Vertices = Matter.Vertices,
        Svg = Matter.Svg,
        Body = Matter.Body,
        Bodies = Matter.Bodies;
//
// // provide concave decomposition support library
//   Common.setDecomp(require('poly-decomp'));

  // create an engine
  var engine = Engine.create(),
      world = engine.world;

  // create a renderer
  var render = Render.create({
      element: document.body,
      engine: engine,
      options: {
        width: window.innerWidth,
        height: window.innerHeight,
        background: 'transparent',
        wireframes: false,
      }
  });

Render.run(render);

// create runner
var runner = Runner.create();
Runner.run(runner, engine);

    engine.gravity.y = -1;
    engine.gravity.x = -1;


  // create two boxes and a ground
  var boxA = Bodies.rectangle(400, 200, 80, 80);
  var boxB = Bodies.rectangle(450, 50, 80, 80);
  // var ground = Bodies.rectangle(400, 610, 810, 60, { isStatic: true });

  // add all of the bodies to the world
  Composite.add(engine.world, [boxA, boxB]);

  // Walls
  var offset = 300,
  		wall = {
  			angle: 0,
  			width: window.innerWidth,
  			height: window.innerHeight
  		},
  		wallSettings = {
  			isStatic: true,
  			render: {
  				fillStyle: 'transparent'
  			}
  		};

  Composite.add(world, [
      	Bodies.rectangle(wall.width/2, -offset/2, wall.width, offset, wallSettings), // top
      	Bodies.rectangle(wall.width + offset/2, wall.height/2 - 6000, offset, wall.height + 12000, wallSettings), // right
      	Bodies.rectangle(wall.width/2, wall.height + offset/2, wall.width, offset, wallSettings), // bottom
      	Bodies.rectangle(-offset/2, wall.height/2 - 6000, offset, wall.height + 12000, wallSettings), //left
      ]);


  // svg test

  // add bodies
      if (typeof fetch !== 'undefined') {
          var select = function(root, selector) {
              return Array.prototype.slice.call(root.querySelectorAll(selector));
          };

          var loadSvg = function(url) {
              return fetch(url)
                  .then(function(response) { return response.text(); })
                  .then(function(raw) { return (new window.DOMParser()).parseFromString(raw, 'image/svg+xml'); });
          };



          loadSvg('/assets/svg/svg.svg').then(function(root) {
              var color = Common.choose(['#f19648', '#f5d259', '#f55a3c', '#063e7b', '#ececd1']);

              var vertexSets = select(root, 'path')
                  .map(function(path) { return Svg.pathToVertices(path, 30); });

              Composite.add(world, Bodies.fromVertices(400, 80, vertexSets, {
                  render: {
                      fillStyle: color,
                      strokeStyle: color,
                      lineWidth: 1
                  }
              }, true));
          });
      } else {
          Common.warn('Fetch is not available. Could not load SVG.');
      }

  // add mouse control
  var mouse = Mouse.create(render.canvas),
      mouseConstraint = MouseConstraint.create(engine, {
          mouse: mouse,
          constraint: {
              stiffness: 0.2,
              render: {
                  visible: false
              },
          }
      });

  Render.setPixelRatio(render, 'auto');

  Composite.add(world, mouseConstraint);

  // keep the mouse in sync with rendering
  render.mouse = mouse;

  // run the renderer
  Render.run(render);

  // create runner
  var runner = Runner.create();

  // run the engine
  Runner.run(runner, engine);

  // $("canvas").css({"position": "absolute", "top": "0", "left": "0"});


</script>

<!-- <div use:init></div> -->

<style lang="scss">



  canvas{
    position: absolute;
    top: 0;
    left: 0;
  }

</style>
