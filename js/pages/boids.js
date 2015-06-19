// Canvas Boids
// Based on Casey Reas / Ben Fry / Daniel Shiffman's Processing boids
// http://processing.org/learning/topics/flocking.html
//
// Ported & modified for HTMl5 canvas by Francis Tseng

	// Environmental Variables
	var neighborDist = 40;
	var maxSpeed = 0.005;
	var maxForce = 0.001;
	var separationDist = 20;
	var r = 2.0;

	var Flock;
	var initBoidCount = 150;
	var FPS = 10;
	var fill = "rgba(0, 0, 255, .5)";

	// Boid size
	var twidth = 10;
	var theight = 6;

	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var width = window.innerWidth;
	var height = window.innerHeight * 0.8;


// Boid
// ===================================================

	function Boid( loc_ ) {
		this.acc = new Vector(0,0);
		this.vel = new Vector( ( Math.random() - 0.5 ) * 2, ( Math.random() - 0.5 ) * 2 );
		this.loc = loc_;

		this.run = runBoid;
		this.flock = flockBoid;
		this.update = updateBoid;
		this.seek = seekBoid;
		this.arrive = arriveBoid;
		this.steer = steerBoid;
		this.borders = bordersBoid;
	}

		function runBoid( boids ) {
			this.flock( boids );
			this.update();
			this.borders();
		}

		// Calculate boid acceleration according to other boids
		function flockBoid( boids ) {
			var sep = separate( this, boids );
			var ali = align( this, boids );
			var coh = cohesion( this, boids );

			// Arbitrarily weigh these forces:
			sep.mult( 2.0 );
			ali.mult( 1.0 );
			coh.mult( 1.0 );

			// Add the force vectors to acceleration
			this.acc.add( sep );
			this.acc.add( ali );
			this.acc.add( coh );
		}

		// Update boid position
		function updateBoid() {
			this.vel.add( this.acc );
			this.vel.lim( maxSpeed );
			this.loc.add( this.vel );

			this.acc.reset();
		}

		// Steer, no slowdown
		function seekBoid( target ) {
			this.acc.add( this.steer( target, false ) );
		}

		// Steer, w/ slowdown
		function arriveBoid( target ) {
			this.acc.add( this.steer( target, true ) );
		}

		// Wraparound

		function bordersBoid() {
			if ( this.loc.x < -r ) this.loc.x = width + r;
			if ( this.loc.y < -r ) this.loc.y = height + r;
			if ( this.loc.x > width + r ) this.loc.x = -r;
			if ( this.loc.y > height + r ) this.loc.y = -r;
		}

		// Calculates steering vector towards a target
		// If slowdown = true, the boid slows down as it approaches the target
		function steerBoid( target, slowdown ) {

			var steer = new Vector(0,0);

			// A vector pointing from boid location to the target
			var desired = target.sub( target, this.loc );

			// Distance from the target is the magnitude of the vector
			var dist = desired.mag();

			if ( dist > 0 ) {

				desired.norm();

				if ( slowdown && dist < 100.0 ) {
					// Slowdown...
					desired.mult( maxSpeed * ( dist / 100 ) );
				} else {
					desired.mult( maxSpeed );
				}

				steer = target.sub( desired, this.vel );
				steer.lim( maxForce );

			}

			return steer;

		}


		// Separation
		// Finds nearby boids,
		// if within separationDist, steer away
		function separate( current, boids ) {

			// Keeps track of how many boids
			var count = 0;

			var sum = new Vector(0,0);

			for ( var i = 0; i < boids.length; i++ ) {
				var dist = distance( current.loc, boids[i].loc );			

				if ( dist > 0 && dist < separationDist ) {
					var diff = subtract( current.loc, boids[i].loc );
					diff.norm();
					diff.div( dist );
					sum.add( diff );
					count++;
				}
			}

			// Find the average
			if ( count > 0 ) {
				sum.div( count );
			}

			return sum;

		}


		// Alignment
		// Finds nearby boids,
		// gets average velocity
		function align( current, boids ) {

			// Keeps track of how many boids
			var count = 0;

			var sum = new Vector(0,0);

			for ( var i = 0; i < boids.length; i++ ) {
				var dist = distance( current.loc, boids[i].loc );

				if ( dist > 0 && dist < neighborDist ) {
					sum.add ( boids[i].vel );
					count++;
				}
			}

			if ( count > 0 ) {
				sum.div( count );
				sum.lim( maxForce );
			}

			return sum;

		}


		// Cohesion
		// Finds nearby boids,
		// calculates steering vector towards their avg. location
		function cohesion( current, boids ) {

			// Keeps track of how many boids
			var count = 0;

			var sum = new Vector(0,0);

			for ( var i = 0; i < boids.length; i++ ) {
				var dist = distance( current.loc, boids[i].loc );			

				if ( dist > 0 && dist < neighborDist ) {
					sum.add ( boids[i].loc );
					count++;
				}
			}

			if ( count > 0 ) {
				sum.div( count );
				return current.steer( sum, false );
			}

			return sum;

		}



// Flock
// ===================================================
	function Flock() {
		this.boids = [];

		this.run = runFlock;
		this.addBoid = addBoid;
	}

		// Update each boid in the flock
		function runFlock( boids ) {
			for ( var i = 0; i < boids.length; i++ ) {
				boids[i].run( boids );
			}
		}

		// Add a new boid to the flock
		function addBoid( boid ) {
			this.boids.push( boid );
		}



// 2D Vectors	
// ===================================================

	function Vector( x_, y_ ) {
		this.x = x_;
		this.y = y_;

		this.add = add;
		this.sub = subtract;
		this.div = divide;
		this.mult = multiply;
		this.dist = distance;
		this.mag = magnitude;
		this.norm = normalize;
		this.lim = limit;
		this.reset = reset;
		this.head = heading;
	}

		function add( vectorA, vectorB ) {
			if ( !vectorB ) {
				this.x += vectorA.x;
				this.y += vectorA.y;
			} else {
				var vectorC = new Vector( vectorA.x + vectorB.x, vectorA.y + vectorB.y );
				return vectorC;
			}
		}

		function subtract( vectorA, vectorB ) {
			if ( !vectorB ) {
				this.x -= vectorA.x;
				this.y -= vectorA.y;
			} else {
				var vectorC = new Vector( vectorA.x - vectorB.x, vectorA.y - vectorB.y );
				return vectorC;
			}
		}

		function multiply( n ) {
			this.x *= n;
			this.y *= n;
		}

		function divide( n ) {
			this.x /= n;
			this.y /= n;
		}

		function distance( vectorA, vectorB ) {
			if ( !vectorB ) {
				var dx = this.x - vectorA.x;
				var dy = this.y - vectorA.y;
			} else {
				var dx = vectorA.x - vectorB.x;
				var dy = vectorA.y - vectorB.y;
			}

			return Math.sqrt( dx*dx + dy*dy )
		}
		
		function magnitude() {
			return Math.sqrt( this.x*this.x + this.y*this.y );
		}

		function normalize() {
			m = magnitude();
			if ( m > 0 ) {
				div( m );
			}
		}

		function limit( max ) {
			if ( magnitude() > max ) {
				normalize();
				mult( max );
			}
		}

		function reset() {
			this.x = 0;
			this.y = 0;
		}

		function heading() {
			var angle = Math.atan2( -this.y, this.x );
			return ( -1 * angle );
		}	



// Running & drawing	
// ===================================================

	function initBoids() {
		flock = new Flock();
		for ( var i = 0; i < initBoidCount; i++ ) {
			flock.addBoid( new Boid( new Vector( Math.random() * width, Math.random() * height ) ) );
		}
	}

	function draw() {

		ctx.canvas.width  = width;
		ctx.canvas.height = height;

		ctx.clearRect(0, 0, width, height);
		ctx.fillStyle = fill;

		for ( var i = 0; i < flock.boids.length; i++ ) {
			var boidX = flock.boids[i].loc.x;
			var boidY = flock.boids[i].loc.y;
			ctx.save();
			ctx.translate( boidX, boidY );
			ctx.rotate( flock.boids[i].vel.head() );
			ctx.beginPath();
				ctx.moveTo(0, 0); // Top Corner
				ctx.lineTo(twidth, theight); // Bottom Right
				ctx.lineTo(0, theight); // Bottom Left
			ctx.closePath();
			ctx.fill();
			ctx.restore();
		}
	}

	function resetBoids() {
		flock.boids = [];
		initBoids();
	}

	initBoids();
	setInterval( function() {

		// Update the boids in our flock
		flock.run( flock.boids );

		// Draw the boids!
		draw();

	}, 1000/FPS );

$(function() {

	$('.reset').live('click',function() {

		$('.config').hide('fast');

		resetBoids();
	});

	$('#canvas').live('mousedown', function(e) {
		var newX = e.pageX - this.offsetLeft;
		var newY = e.pageY - this.offsetTop;
		flock.addBoid( new Boid( new Vector( newX, newY ) ) );
	});

	$('#numBoids').slider({
		max:750,
		min:10,
		step:1,
		value:150,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			initBoidCount = ui.value;			
		}
	});
	$('#neighborRadius').slider({
		max:200,
		min:10,
		step:1,
		value:40,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			neighborDist = ui.value;
		}
	});
	$('#sepRadius').slider({
		max:150,
		min:10,
		step:1,
		value:20,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			separationDist = ui.value;			
		}
	});
	$('#boidSize').slider({
		max:400,
		min:50,
		step:1,
		value:100,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value + '%');
			twidth = 10 * (ui.value / 100);
			theight = 6 * (ui.value / 100);
		}

	});

});
