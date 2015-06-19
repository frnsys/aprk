/* Networks 
 * by Francis Tseng
 * ra = random attachment
 * sw = small worlds
 * pa = preferential attachment
 */

// note: for preferential attachment, keep track of an array of all edges in the network. then randomly select an edge and then get its parent node

	var nodeID = 0;
	var nodeFill = "#80C99E";
	var edgeFill = "#EF6B6C";
	
	var raCanvas = document.getElementById("random-attachment");
	var raCtx = raCanvas.getContext("2d");

	var swCanvas = document.getElementById("small-worlds");
	var swCtx = swCanvas.getContext("2d");

	var paCanvas = document.getElementById("preferential-attachment");
	var paCtx = paCanvas.getContext("2d");

// Objects

	function Node( _id, _prob ) {
		this.id = _id;
		this.edges = [];
		this.x = 0;
		this.y = 0;
		if ( _prob ) {
			this.prob = _prob;
		}
	}

	function Edge( _toNode, _fromNode, _prob ) {
		this.toNode = _toNode;
		this.toNodeID = _toNode.id;
		this.fromNode = _fromNode;
		this.fromNodeID = _fromNode.id;
		this.nodeIDs = [ _toNode.id, _fromNode.id ];
		if ( _prob ) {
			this.prob = _prob;
		}
	}

	function Cluster( _nodes ) {
		this.nodes = _nodes;
	}


// Functions & Methods

	function include( arr, obj ) {
    return ( arr.indexOf( obj ) != -1 );
	}

	function createEdge( _toNode, _fromNode, _prob ) {
			if ( _prob ) {
				var newEdge = new Edge( _toNode, _fromNode, _prob );
			} else {
				var newEdge = new Edge( _toNode, _fromNode );				
			}
			_toNode.edges.push( newEdge );
			_fromNode.edges.push( newEdge );
			return newEdge;
	}

	function createNode() {
		var newNode = new Node( nodeID );
		nodeID++;
		return newNode;
	}

	function createCluster( size ) {
		nodes = [];
		for ( var i = 0; i < size; i++ ) {
			var newNode = createNode();
			nodes.push( newNode );
		}
		newCluster = new Cluster( nodes );
		return newCluster;
	}

	// Create n nodes, and store the in an array
	function initNodes( n ) {
		var nodes = [];
		for ( var i = 0; i < n; i++ ) {
			var newNode = createNode();
			nodes.push( newNode );
		}
		return nodes;
	}

	function initClusters( n, size ) {
		// n = number of clusters
		// size = size of each cluster
		var clusters = [];
		for ( var i = 0; i < n; i++ ) {
			var newCluster = createCluster( size );
			clusters.push( newCluster );
		}
		return clusters;
	}


// Random attachment
	function randomAttachment( n, p ) {
		var nodes = initNodes( n );
		var edges = [];

		for ( var i = 0; i < nodes.length; i++ ) {
			for ( var j = 0; j < nodes.length; j++ ) {
				if ( i != j ) {
					if ( Math.random() < p ) {
						var newEdge = createEdge( nodes[j], nodes[i] );
						nodes[i].edges.push( newEdge );
						edges.push( newEdge );
					}
				}
			}
		}

		drawNodesEdges( 'random-attachment', raCtx, nodes, edges );
	}
	
// Small Worlds
	function smallWorlds( n, size, p ) {

		var clusters = initClusters( n, size );
		var clustersCopy = clusters;
		var edges = [];

		// Randomly connect clusters according to probability p
		for ( var i = 0; i < clusters.length; i++ ){
			for ( var j = 0; j < size; j++ ) {
				if ( Math.random() <= p ) {
					var clusterNum = Math.floor( Math.random() * n );

					// Ensure that clusterNum isn't the same as the current cluster
					if ( clusterNum == i ) {
						if ( clusterNum + 1 > clusters.length - 1 ) {
							clusterNum--;
						} else {
							clusterNum++;
						}
					}

					// Randomly pick a node in the random cluster
					var nodeNum = Math.floor( Math.random() * size );
					var toNode = clusters[ clusterNum ].nodes[ nodeNum ];					

					var thisNode = clusters[i].nodes[j];
					var newEdge = createEdge( toNode, thisNode );
					thisNode.edges.push( newEdge );
					edges.push( newEdge );
				}
			}
		}

		drawCluster( 'small-worlds', swCtx, clusters, edges );		
	}


// Preferential Attachment
	function preferentialAttachment( n ) {
		//var nodes = initNodes( n );
		var nodes = [];
		var nodeSelection = [];
		var edges = [];

		// Initialize starting network (two nodes, one edge connecting them)		

		nodes.push( createNode() );
		nodes.push( createNode() );
		var initialEdge = createEdge( nodes[0], nodes[1] );
		edges.push( initialEdge );

		for ( var i = 0; i < n - 2; i++ ) {
			var newNode = createNode();

			nodeSelection = [];
			// Calculate weights
			for ( var j = 0; j < nodes.length; j++ ) {
				for ( var k = 0; k < nodes[j].edges.length; k++ ) {
					nodeSelection.push( nodes[j] );
				}
			}

			var selectNum = Math.floor( Math.random() * ( nodeSelection.length ) );
			var newEdge = createEdge( nodeSelection[selectNum], newNode );

			edges.push( newEdge );
			nodes.push( newNode );

		}

		drawNodesEdges( 'preferential-attachment', paCtx, nodes, edges );	
		drawDistribution( paCtx, nodes );
	}


// Running & drawing	
// ===================================================

function checkOverlap( x, y, xs, ys, radius, canvasWidth, canvasHeight, padding ) {

		var range = 8 * radius;

		if ( x - radius < padding || x + radius > canvasWidth + padding || y - radius < padding || y + radius > canvasHeight + padding ) {
			return true;
		}

		for ( var i = 0; i < xs.length; i++ ) {
			if ( x > xs[i] - range && x < xs[i] + range && y > ys[i] - range && y < ys[i] + range ) {
				return true;
			}
		}

		return false;
}

function drawNodesEdges( canvasID, context, nodes, edges ) {

		var padding = 50;
		context.canvas.width = $('#'+canvasID).width();
		context.canvas.height = window.innerHeight * 0.8;		
		var width = context.canvas.width - ( 2 * padding );
		var height = context.canvas.height - ( 2 * padding );

		var radius;
		if ( width > height ) {
			radius = Math.floor( width / (nodes.length * 4) );
		} else {
			radius = Math.floor( height / (nodes.length * 4) );
		}
		if ( radius < 4 ) {
			radius = 4;
		}

		//var x = width / 2 - ( nodes.length * radius );
		var x = width/2;
		var y = height/2;
		var initX = x;
		var initY = y;

		// keep track of x and y's to prevent overlapping
		var xs = [];
		var ys = [];

		xs.push( x );
		ys.push( y );

		// draw nodes
		for ( var i = 0; i < nodes.length; i++ ) {
			nodes[i].x = x;
			nodes[i].y = y;

			context.fillStyle = nodeFill;
			context.beginPath();
			context.arc( x, y, radius, 0, 2 * Math.PI, true );
			context.fill();

		
			// Calculate new x and y
			// need to preserve x and y; they'll be modified by the loop
			var oldX = x;
			var oldY = y;
			do {

				var Xmodifier;
				if ( Math.random() > 0.5 ) {
					Xmodifier = 1;
				} else {
					Xmodifier = -1;
				}
				var Ymodifier;
				if ( Math.random() > 0.5 ) {
					Ymodifier = 1;
				} else {
					Ymodifier = -1;
				}


				x = oldX + ( ( Math.random() + 0.5 ) * Xmodifier * ( 16 * radius ) );
				y = oldY + ( ( Math.random() + 0.5 ) * Ymodifier * ( 16 * radius ) );
			}
			while ( checkOverlap( x, y, xs, ys, radius, width, height, padding ) );

		}

		// draw edges
		for ( var i = 0; i < edges.length; i++ ) {
			var fromX = edges[i].fromNode.x;
			var fromY = edges[i].fromNode.y;
			var toX = edges[i].toNode.x;
			var toY = edges[i].toNode.y;

			context.strokeStyle = edgeFill;		
			context.beginPath();		
			context.moveTo( fromX, fromY );		
			context.lineTo( toX, toY );
			context.stroke();
		}
}

function drawCluster( canvasID, context, clusters, edges ) {

	var radius = 20;
	var nodeRadius = 5;
	var clusterPadding = 20;
	
	var fullDiameter = ( 2 * (radius + nodeRadius) ) + clusterPadding;

	var size = clusters[0].nodes.length;
	var n = clusters.length;

	var theta = (2 * Math.PI) / size;	

	var padding = 50;
	context.canvas.width = $('#'+canvasID).width();
	context.canvas.height = window.innerHeight * 0.8;		
	var width = context.canvas.width - ( 2 * padding );
	var height = context.canvas.height - ( 2 * padding );

	var centerX = width/2 - ( fullDiameter * ( (n/2) - 1 ) );
	var centerY = height/2;

	// draw clusters & nodes
	for ( var i = 0; i < n; i++ ) {
		var angle = 0;	

		for ( var j = 0; j < size; j++ ) {

			var x = centerX + radius * Math.cos(angle);
			var y = centerY + radius * Math.sin(angle);

			clusters[i].nodes[j].x = x;
			clusters[i].nodes[j].y = y;

			context.fillStyle = nodeFill;
			context.beginPath();
			context.arc( x, y, nodeRadius, 0, 2 * Math.PI, true );
			context.fill();

			angle += theta;
			
		}
	
		if ( i % 3 == 0 ) {
			centerX += fullDiameter;
			centerY += fullDiameter;
		} else if ( i % 3 == 1 ) {
			centerY -= 2 * fullDiameter;
		} else {
			centerX += fullDiameter;
			centerY += fullDiameter;
		}
	}

	// draw edges
	for ( var i = 0; i < edges.length; i++ ) {
		var fromX = edges[i].fromNode.x;
		var fromY = edges[i].fromNode.y;
		var toX = edges[i].toNode.x;
		var toY = edges[i].toNode.y;

		context.strokeStyle = edgeFill;		
		context.beginPath();		
		context.moveTo( fromX, fromY );		
		context.lineTo( toX, toY );
		context.stroke();
	}

}

function drawDistribution( context, nodes ) {
	
	edgeCounts = [];

	for ( var i = 0; i < nodes.length; i++ ) {
		edgeCounts.push( nodes[i].edges.length );
	}
	
	edgeCounts = edgeCounts.sort( function(a,b){return b-a} );

	var initX = 0;
	var rectWidth = 20;
	for ( var i = 0; i < edgeCounts.length; i++ ) {
		context.fillStyle = edgeFill;
		context.fillRect( initX, context.canvas.height - (edgeCounts[i] * 10), rectWidth, edgeCounts[i]*10 )
		initX += (rectWidth + 1)
	}

}


var ra_n = 20;
var ra_p = 0.05;
randomAttachment( ra_n, ra_p );

var sw_n = 8;
var sw_s = 10;
var sw_p = 0.1;
smallWorlds( sw_n, sw_s, sw_p );

pa_n = 50;
preferentialAttachment( pa_n );

$(function() {
	
	$('.reset-ra').live( 'click', function() {

		$(this).closest('.sub-demo').find('.config').hide('fast');

		// Clear canvas
		raCtx.canvas.width  = $('#random-attachment').width();
		raCtx.canvas.height = window.innerHeight * 0.8;

		randomAttachment( ra_n, ra_p );

	});

	$('.reset-sw').live( 'click', function() {

		$(this).closest('.sub-demo').find('.config').hide('fast');

		// Clear canvas
		swCtx.canvas.width  = $('#small-worlds').width();
		swCtx.canvas.height = window.innerHeight * 0.8;

		smallWorlds( sw_n, sw_s, sw_p );

	});

	$('.reset-pa').live( 'click', function() {

		$(this).closest('.sub-demo').find('.config').hide('fast');

		// Clear canvas
		paCtx.canvas.width  = $('#preferential-attachment').width();
		paCtx.canvas.height = window.innerHeight * 0.8;

		preferentialAttachment( pa_n );

	});

	$('#raNodes').slider({
		max:40,
		min:10,
		step:1,
		value:20,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			ra_n = ui.value;
		}
	});

	$('#raProb').slider({
		max:100,
		min:0,
		step:1,
		value:5,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value + '%');
			ra_p = ui.value / 100;
		}
	});

	$('#swNodes').slider({
		max:10,
		min:1,
		step:1,
		value:10,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			sw_s = ui.value;
		}
	});

	$('#swClusters').slider({
		max:10,
		min:2,
		step:1,
		value:8,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			sw_n = ui.value;
		}
	});

	$('#swProb').slider({
		max:100,
		min:0,
		step:1,
		value:10,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value + '%');
			sw_p = ui.value / 100;
		}
	});

	$('#paNodes').slider({
		max:200,
		min:1,
		step:1,
		value:50,
		slide: function(event, ui) {
			$(this).closest('tr').find('.slider-val').text(ui.value);
			pa_n = ui.value;
		}
	});



});
