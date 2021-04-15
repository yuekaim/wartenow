<script>

  import Matter from 'matter-js';

  // module aliases
  let Engine = Matter.Engine,
      Render = Matter.Render,
      Runner = Matter.Runner,
      Bodies = Matter.Bodies,
      Composite = Matter.Composite;

  let engine, render, runner;

  function init( canvas ){
    // this function is called, when the div is ready
    // setup matter.js
    engine = Engine.create();
    render = Render.create({
      element: canvas,
      engine: engine
    });
    // start playback
    run();
  }

  function composition(){
    // this function creates an array of shapes
    var boxA = Bodies.rectangle(400, 200, 80, 80);
    var boxB = Bodies.rectangle(450, 50, 80, 80);
    var ground = Bodies.rectangle(400, 610, 810, 60, { isStatic: true });
    return [boxA, boxB, ground];
  }

  function run(){
    let comp = composition();
    Composite.add(engine.world, comp);

    Render.run(render);
    runner = Runner.create();
    Runner.run(runner, engine);
  }

</script>

<div use:init></div>

<style lang="scss">

  div {
    border: 3px solid red;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    position: absolute;
    z-index: 99999999999;

  }

</style>
