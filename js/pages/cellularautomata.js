// Cellular Automata 
// by Francis Tseng

	// Environmental Variables
	var rows = [];
	
	var FPS = 4;

	var side = 10;
	var margin = 1;
	var ruleName = 30;

	var onFill = "#f1db91";
	var offFill = "#5c9fc5";

	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var width = window.innerWidth;
	var height = window.innerHeight * 0.8;
	ctx.canvas.width  = width;
	ctx.canvas.height = height;

	var rowSize = Math.floor( width / side );
	var rowMidpoint = Math.ceil( rowSize / 2 );
	var iterations = Math.floor( height / side );

	// An array describing the rule
	// This is rule 30
	var rule = [ 0, 1, 1, 1, 1, 0, 0, 0 ];

	// Initialize with the center (or closest to center cell) as ON
	var initRow = new Row();
		for ( var i = 0; i < rowSize; i++ ) {
			if ( i == rowMidpoint ) {
				initRow.cells.push( 1 );
			} else {
				initRow.cells.push( 0 );
			}
		}
	rows.push( initRow );


	function Row() {
		this.cells = [];
	}

		function runRow( row ) {

			var nextRow = new Row();

			for ( var i = 0; i < row.cells.length; i++ ) {
				var leftNeighbor, rightNeighbor, neighborhood, newCell;

				if ( i == 0 ) {
					leftNeighbor = 0;
				} else {
					leftNeighbor = row.cells[i - 1];
				}

				if ( i + 1 == row.cells.length ) {
					rightNeighbor = 0;
				} else {
					rightNeighbor = row.cells[i + 1];
				}

				neighborhood = [ leftNeighbor, row.cells[i], rightNeighbor ];

				if ( compareArrays( neighborhood, [0,0,0] ) ) newCell = rule[0]
				else if ( compareArrays( neighborhood, [0,0,1] ) ) newCell = rule[1]
				else if ( compareArrays( neighborhood, [0,1,0] ) ) newCell = rule[2]
				else if ( compareArrays( neighborhood, [0,1,1] ) ) newCell = rule[3]
				else if ( compareArrays( neighborhood, [1,0,0] ) ) newCell = rule[4]
				else if ( compareArrays( neighborhood, [1,0,1] ) ) newCell = rule[5]
				else if ( compareArrays( neighborhood, [1,1,0] ) ) newCell = rule[6]
				else if ( compareArrays( neighborhood, [1,1,1] ) ) newCell = rule[7]

				nextRow.cells.push( newCell );
				
			}

			return nextRow;
		}

	function compareArrays( arrayA, arrayB ) {
		
		if ( arrayA.length == arrayB.length ) {

			for ( var i = 0; i < arrayA.length; i++ ) {
				if ( arrayA[i] != arrayB[i] ) {
					return false;
				}
			}
			return true;

		} else {
			return false;
		}

	}


// Running & drawing	
// ===================================================

	function draw( count ) {


		for ( var i = 0; i < rows[ count ].cells.length; i++ ) {
			if ( rows[ count ].cells[i] == 1 ) {
				ctx.fillStyle = onFill;				
			} else {
				ctx.fillStyle = offFill;
			}
			ctx.fillRect( i * (side + margin), count * (side + margin), side, side );
		}

	}

	var count = 0;
	setInterval( function() {

		if ( count < iterations ) {

			draw( count );			

			rows.push( runRow( rows[ count ] ) );

			count++;

		}

	}, 1000/FPS );	

$(function() {
	
	$('.reset').live( 'click', function() {

		$('.config').hide('fast');

		// Clear canvas
		ctx.canvas.width  = width;
		ctx.canvas.height = height;

		// Re-define the rule based on user config
		rule = [];
		$('#rule .output').each( function() {

			if ( $(this).hasClass('on') ) {
				rule.push(1);
			} else {
				rule.push(0);
			}

		});

		// Reset count
		count = 0;

		// Reset init row based on user config
		initRow.cells = [];

		userConfig = [];
		$('#configuration td').each( function() {

			if ( $(this).hasClass('on') ) {
				userConfig.push(1);
			} else {
				userConfig.push(0);
			}

		});

		var centerCount = 0;		
		for ( var i = 0; i < rowSize; i++ ) {
			
			// Since the user can define the central 13 cells,
			// we have to look at the rowMidpoint +- 6
			if ( i > rowMidpoint - 6 && i < rowMidpoint + 6 ) {

				initRow.cells.push( userConfig[centerCount] );
				centerCount++;

			} else {
				initRow.cells.push( 0 );
			}
		}
		rows = [ initRow ];

	});

	$('.output').live( 'click', function() {

		var num = parseInt( $(this).parent().find('.num').html() );

		if ( $(this).hasClass('on') ) {
			$(this).removeClass('on').addClass('off');
			ruleName -= num; 
		} else {
			$(this).removeClass('off').addClass('on');
			ruleName += num;
		}

		$('.rule-name').html(ruleName);

	});

	$('#configuration td').live( 'click', function() {
		if ( $(this).hasClass('on') ) {
			$(this).removeClass('on').addClass('off');
		} else {
			$(this).removeClass('off').addClass('on');
		}
	});

});
