import 'pathseg';
import Matter from 'matter-js';
// import {decomp, quickDecomp} from 'poly-decomp';
import Decomp from 'poly-decomp';

const width = window.innerWidth;
const height = window.innerHeight;

const svgs = [
    '/assets/svg/svg.svg',
    '/assets/svg/wartenau.svg'
];

export var animation = function( canvas ) {

    var Engine = Matter.Engine,
        Render = Matter.Render,
        Runner = Matter.Runner,
        Common = Matter.Common,
        MouseConstraint = Matter.MouseConstraint,
        Mouse = Matter.Mouse,
        Composite = Matter.Composite,
        Vertices = Matter.Vertices,
        Svg = Matter.Svg,
        Bodies = Matter.Bodies;

    // provide concave decomposition support library
    Common.setDecomp(Decomp);

    // create engine
    var engine = Engine.create(),
        world = engine.world;

    // create renderer
    var render = Render.create({
        element: canvas,
        engine: engine,
        options: {
            width: width,
            height: height,
            background: 'transparent',
            wireframes: false,
        }
    });

    Render.run(render);


    // create runner
    var runner = Runner.create();
    Runner.run(runner, engine);

    engine.gravity.y = -0.1;
    engine.gravity.x = -1;
    //
    // // add bodies
    // if (typeof fetch !== 'undefined') {
    //     var select = function(root, selector) {
    //         return Array.prototype.slice.call(root.querySelectorAll(selector));
    //     };
    //
    //     var loadSvg = function(url) {
    //         return fetch(url)
    //             .then(function(response) { return response.text(); })
    //             .then(function(raw) { return (new window.DOMParser()).parseFromString(raw, 'image/svg+xml'); });
    //     };
    //
    //     svgs.forEach(function(path, i) {
    //         loadSvg(path).then(function(root) {
    //             var color = "#000";
    //
    //             var vertexSets = select(root, 'path')
    //                 .map(function(path) { return Vertices.scale(Svg.pathToVertices(path, 30), 0.4, 0.4); });
    //
    //             Composite.add(world, Bodies.fromVertices(100 + i * 150, 200 + i * 50, vertexSets, {
    //                 render: {
    //                     fillStyle: color,
    //                     strokeStyle: color,
    //                     lineWidth: 1
    //                 }
    //             }, true));
    //         });
    //     });
    //
    // } else {
    //     Common.warn('Fetch is not available. Could not load SVG.');
    // }

    // create two boxes and a ground
    var shape1 = Bodies.circle(400, 150, 10, {
        render:{
          fillStyle: '#000',
          strokeStyle: '#000',
          lineWidth: 1
        }
    });
    var shape2 = Bodies.circle(300, 50, 30, {
        render:{
          fillStyle: 'transparent',
          strokeStyle: '#000',
          lineWidth: 1
        }
    });


    var boxA = Bodies.rectangle(400, 80, 180, 50, {
                render: {
                    sprite: {
                        texture: '/assets/svg/wartenau.svg'
                    }
                }}
            );
    var boxB = Bodies.rectangle(200, 100, 80, 50, {
                render: {
                    sprite: {
                        texture: '/assets/svg/hfbk.svg'
                    }
                }}
            );
    var boxC = Bodies.rectangle(600, 200, 80, 50, {
                render: {
                    sprite: {
                        texture: '/assets/svg/art.svg'
                    }
                }}
            );
    var boxD = Bodies.rectangle(600, 200, 180, 50, {
                render: {
                    sprite: {
                        texture: '/assets/svg/education.svg'
                    }
                }}
            );
    // var ground = Bodies.rectangle(400, 610, 810, 60, { isStatic: true });

    // add all of the bodies to the world
    Composite.add(engine.world, [boxA, boxB, boxC, boxD, shape1, shape2]);

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

    // add mouse control
    var mouse = Mouse.create(render.canvas),
        mouseConstraint = MouseConstraint.create(engine, {
            mouse: mouse,
            constraint: {
                stiffness: 0.2,
                render: {
                    visible: false
                }
            }
        });

    Composite.add(world, mouseConstraint);

    // keep the mouse in sync with rendering
    render.mouse = mouse;

    // fit the render viewport to the scene
    Render.lookAt(render, {
        min: { x: 0, y: 0 },
        max: { x: width, y: height }
    });

    // context for MatterTools.Demo
    return {
        engine: engine,
        runner: runner,
        render: render,
        canvas: render.canvas,
        stop: function() {
            Matter.Render.stop(render);
            Matter.Runner.stop(runner);
        }
    };
};

if (typeof module !== 'undefined') {
    module.exports = animation;
}
