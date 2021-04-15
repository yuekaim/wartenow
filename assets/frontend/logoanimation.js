

Array.prototype.sample = function(){
  return this[Math.floor(Math.random()*this.length)];
}



// This code is based on the example of the Processing legend Daniel Schiffman
// https://github.com/CodingTrain/p5-matter/blob/master/02_bouncing_balls/sketch.js

var Engine = Matter.Engine;
var Render = Matter.Render;
var World = Matter.World;
var Bodies = Matter.Bodies;
var Composite = Matter.Composite;
var Composites = Matter.Composites;
var Body = Matter.Body;

var Mouse = Matter.Mouse;
var MouseConstraint = Matter.MouseConstraint;

var engine;
var world;
var bodies;


var mouseBall;

var canvas;

var mouseConstraint;

let myFont;
function preload() {
  // myFont = loadFont('EduFavrit-Regular.woff');
}
//
// mouseBall = Bodies.circle(mouseX, mouseY, 30);
// World.add(world, mouseBall);


  // Make elements
  function makeCircle(x, y) {
    var params = {
      restitution: 0.7,
      friction: 0.2
    }
   return Bodies.circle(x, y, 60, params);
    // return Bodies.rectangle(x, y, 90, 60, params);
  }


function setup() {
  var width = window.innerWidth,
      height = window.innerHeight;

  canvas = createCanvas(width, height);
  $("canvas").css({"position": "absolute", "top": "0", "left": "0"});

  // Mouse positions don't align
  // But it does work if I force pixel density of 1
  // pixelDensity(1);
  // Can I instead tell mouse to divide its xy by 2?

  // create an engine
  engine = Engine.create();
  world = engine.world;

  // initiate mouse
  var mouse = Mouse.create(canvas.elt);
  var mouseParams = {
    mouse: mouse,
    constraint: {
      stiffness: 0.1,
    }
  }

  mouseConstraint = MouseConstraint.create(engine, mouseParams);
  mouseConstraint.mouse.pixelRatio = pixelDensity();
  World.add(world, mouseConstraint);

  // Set walls
  var params = {
    isStatic: true
  }

  var ground = Bodies.rectangle(width / 2, height, width, 1, params);
  var wall1 = Bodies.rectangle(0, height / 2, 1, height, params);
  var wall2 = Bodies.rectangle(width, height / 2, 1, height, params);
  var top = Bodies.rectangle(width / 2, 0, width, 1, params);

  World.add(world, ground);
  World.add(world, wall1);
  World.add(world, wall2);
  World.add(world, top);
  //

var word = ['w','a','r','t','e','n','a','u'];
  // x, y, columns, rows, column gap, row gap
  //var stack = Composites.stack(20, 50, 15, 10, 20, 20, makeCircle);
  var stack = Composites.stack(0, height /2, word.length, 1, 10, 10, makeCircle);
  bodies = stack.bodies;

  // add all of the bodies to the world
  World.add(world, stack);

  // run the engine
  Engine.run(engine);
}

function draw() {
  // World.add(world, mouseBall);

  // World.add(world, mouseBall);
  // mouseBall = Bodies.circle(mouseX, mouseY, 20, {render: {fillStyle: '#bbb'}});
  // Matter.Composite.add(world, mouseBall);
  // Matter.Composite.remove(world, mouseBall);

  background("transparent");
  strokeWeight(0);

  // set cursor
  fill("#000");
  circle(mouseX, mouseY,30);

  // textSize(50);
  // text("HFBK\nART EDUCATION", 40, 200);

var word = ['w','a','r','t','e','n','a','u'];
  for (var i = 0; i < bodies.length; i++) {

    var circleL = bodies[i];
    var pos = circleL.position;
    var r = circleL.circleRadius;
    var angle = circleL.angle;

    var fontSize = 100;

    textSize(fontSize);

    var txt1 = word.shift();
    var wordWith = textWidth(txt1);

    push();
    translate(pos.x, pos.y);
    rotate(angle);

    // set rectangle in background, change fill to solid color to see it
    rectMode(CENTER);
    fill(255, 0, 0, 0);
    rect(0, 0, wordWith, fontSize);

    // set text
    fill(0);
    textAlign(CENTER);
    // textFont(myFont);
    text(txt1, 0, fontSize / 2);

    pop();
  }
}
