<?php include "header.html" ?>

<style>

body { background:#3679A6; }
a:hover, b, h3 { color:#F9B390; }

table { border-spacing:1px; border-collapse:separate; margin:0 0 5% 0; }
td { width:20px; height:20px; text-align:center; }
td.num { text-align:right; padding:0 5px 0 0; }
td.on { background:#f1db91; }
td.off { background:#5c9fc5; }
td.output, #configuration td { cursor:pointer; }

</style>


	<div class="intro">
		<h1>Cellular Automata</h1>
		<h3>A model describing emergent properties of simple rule-based systems.</h3>

		<div class="cols cols-2">
			<p>Cellular automata is a model, developed by <a href="http://en.wikipedia.org/wiki/John_von_Neumann">John von Neumann</a>, that illustrates how simple rule-based systems, over time, can display surprisingly complex behavior. This results of these simple rules can look so intentional that you'd have a hard time believing it wasn't designed!</p>
			<p>An oft-cited example of cellular automata is <a href="http://en.wikipedia.org/wiki/Conway's_Game_of_Life">John Conway's</a> Game of Life. Using only three rules, the resultant patterns appear to "move" with purpose, like life (hence the name)!</p>
			<p>Let's take a quick look at 1D cellular automata, which are a simpler form of cellular automata.</p>			
		</div>
	</div><!-- intro -->

		<div class="float-2 numerable">
			<figure>
				<img src="img/cellularautomata/fig1.png" />
				<figcaption>
					<h4>Row by row</h4>
					<p>With 1D cellular automata, we work with rows of cells. We could have any number of cells in a row, but for simplicity, for now we'll only have five cells.</p>
					<p>We start with one row, and add on additional rows over time. A grid is formed, giving us an overview of the entire system.</p>
					<p>It's worth noting that some variations of cellular automata, such as the aforementioned "Game of Life", start out with a grid of cells rather than a row.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/cellularautomata/fig2.png" />
				<figcaption>
					<h4>Cells can be ON or OFF</h4>
					<p>Cells can be either <b>ON</b> or <b>OFF</b> (or if you prefer, ALIVE or DEAD), depending on the state of its neighboring cells. A cell and it's neighbors is known as its "<b>neighborhood</b>". For each possible neighborhood, we'll define a subsequent state for the central cell. These definitions will form a "<b>rule</b>" governing how the system works. This rule is applied to a row to determine how the subsequent row will look.</p>
					<p>First, we'll have to define a starting arrangement of ON and OFF cells. This initial setup, or "<b>configuration</b>" can impact the form the system takes. That is, two systems using the same rule, but with different configurations, can have different results. For this example, we'll have the middle cell start as ON.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/cellularautomata/fig3.png" />
				<figcaption>
					<h4>There are eight possible neighborhoods & 256 rules</h4>
					<p>In total, there are <b>eight possible neighborhoods</b>. For each of these neighborhoods, we need to define what happens to the target cell (the cells identified by the downward arrow) in the next iteration. We'll use the right-hand results for our example rule.</p>
					
					<img src="img/cellularautomata/fig3-1.png" class="left" />
					<p>For instance, in our example the second row tells us: if the left neighbor is OFF, the right neighbor is ON, and the target cell is OFF, then the target cell turns ON in the next iteration.</p>

					<p class="clear">Because there are eight neighborhoods, each with two possible outcomes, we have, in total, <b>256 possible rules</b> (2<sup>8</sup> = 256).</p>
					<p>Note the numbers on the left of each row. These numbers are used to "name" rules. A rule's name is calculated by adding the row numbers where the target cell turns on. In this example, we've defined Rule 30: rows 2, 4, 8, and 16 all result in an ON target cell, and 2 + 4 + 8 + 16 = 30.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/cellularautomata/fig4.png" />
				<figcaption>
					<h4>Iterate and stack the rows</h4>
					<p>We run our system by applying our rules to each cell, and then placing the resultant row beneath the current row.</p>
					<p>This is the result of our example system after running it for eight turns. Not too impressive...but then again, we're only looking at a very small portion of the system. Let's try looking at the bigger picture...</p>
				</figcaption>
			</figure>
		</div>

	<div class="demo clear">
		<h2>The Big Picture</h2>
		<p>Here we can see the emergent structures of Rule 30. From this simple rule, we get a remarkable pattern. Try configuring your own rules and see what you can come up with! (I suggest Rule 26)</p>

		<button class="reset">Restart</button>		
		<button class="configure">Configure</button>			

		<div class="canvas-wrapper">
			<div class="config">
				<h4>Configure <a href="#" class="close">X</a></h4>

				<div class="float-2">
					<article>
						<table id="rule">
							<tr class="labels"><td /><td /><td>*</td><td /><td /><td>*</td></tr>
							<tr>
								<td class="num">1</td>
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td>&raquo;</td>
								<td class="output off" />
							</tr>
							<tr>
								<td class="num">2</td>
								<td class="off" />
								<td class="off" />
								<td class="on" />
								<td>&raquo;</td>
								<td class="output on" />
							</tr>
							<tr>
								<td class="num">4</td>
								<td class="off" />
								<td class="on" />
								<td class="off" />
								<td>&raquo;</td>
								<td class="output on" />
							</tr>
							<tr>
								<td class="num">8</td>
								<td class="off" />
								<td class="on" />
								<td class="on" />
								<td>&raquo;</td>
								<td class="output on" />
							</tr>
							<tr>
								<td class="num">16</td>
								<td class="on" />
								<td class="off" />
								<td class="off" />
								<td>&raquo;</td>
								<td class="output on" />
							</tr>
							<tr>
								<td class="num">32</td>
								<td class="on" />
								<td class="off" />
								<td class="on" />
								<td>&raquo;</td>
								<td class="output off" />
							</tr>
							<tr>
								<td class="num">64</td>
								<td class="on" />
								<td class="on" />
								<td class="off" />
								<td>&raquo;</td>
								<td class="output off" />
							</tr>
							<tr>
								<td class="num">128</td>
								<td class="on" />
								<td class="on" />
								<td class="on" />
								<td>&raquo;</td>
								<td class="output off" />
							</tr>
						</table>

						Rule <span class="rule-name">30</span>
					</article>

					<article>

						Set the starting configuration:
						<table id="configuration">
							<tr>
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="on" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
								<td class="off" />
							</tr>
						</table>

					<button class="reset">Run</button>								

					</article>


				</div>

			</div> <!-- config -->
			<canvas id="canvas">
				Unfortunately, your browser does not yet support HTML5 canvas. For the full experience, try upgrading your browser!
			</canvas>
		</div> <!-- canvas-wrapper -->

	</div> <!-- demo -->

	<h2>Classes</h2>
	<p>If you've played around with the cellular automata generator enough, you may have noticed that some rules lead to certain kinds of results. Some might become static and unchanging, some might repeat patterns in cycles, some might seem completely random, or some might produce very rich and complex patterns. The output of these rules can be sorted into the following four classes:</p>
	<div class="cols cols-4">
			<figure>
					<img src="img/cellularautomata/class1.png" />
				<figcaption>
					<h4>Class I: Static</h4>
					<p>Class I rules quickly converge on a state and remain in that state. The pictured example is rule 251.</p>
				</figcaption>
			</figure>	

			<figure>
					<img src="img/cellularautomata/class2.png" />
				<figcaption>
					<h4>Class II: Periodic</h4>
					<p>Class II rules regularly alternate between some states. The pictured example is rule 119.</p>
				</figcaption>
			</figure>

			<figure>
					<img src="img/cellularautomata/class3.png" />
				<figcaption>
					<h4>Class III: Chaotic</h4>
					<p>Class III rules generate chaotic and random patterns. No distinct structures can be observed (unlike in Class IV rules). The pictured example is rule 45. Rule 30 is also an example of this.</p>
				</figcaption>
			</figure>

			<figure>
				<img src="img/cellularautomata/class4.png" />
				<figcaption>
					<h4>Class IV: Complex</h4>
					<p>Class IV rules produce very complex patterns, in which you can observe the movement of "particles" (i.e. structures within the pattern). The pictured example is rule 110.</p>
				</figcaption>
			</figure>		
	</div>

	<h2>Lambda (&#x3BB;)</h2>
	<div class="cols cols-2">
		<p><b>Lambda (&#x3BB;)</b> is an alternative way of identifying rules that also provides insight to how complexity emerges from these rules. The lambda value of a rule is just its number of "on" cells. So &#x3BB;'s minimum value would be 0, and maximum value would be 8.</p>
		<p>Rule 30 would have a &#x3BB; = 4. Sometimes lambda is written with a denominator equal to the total number of possible neighborhoods (i.e. 8). So rule 30 could also be written as &#x3BB; = 4/8.</p>
	</div>
	<p>Below is a table showing the relationship between &#x3BB; and the complexity of the output (that is, Class III and Class IV rules). As you can see, intermediate &#x3BB; values are what result in complexity. Intermediate &#x3BB; values indicate greater interdependence. That is, the influence of neighbors on outcome states are greater. Thus, greater interdependence seems to result in greater complexity.</p>
	<table class="data-table">
		<tr class="labels">
			<td>&#x3BB;</td>
			<td>Matching rules (out of 256)</td>
			<td>Class III rules</td>
			<td>Class IV rules</td>
		</tr>
		<tr>
			<td>0</td>
			<td>1</td>
			<td>0</td>
			<td>0</td>
		</tr>
		<tr>
			<td>1</td>
			<td>8</td>
			<td>0</td>
			<td>0</td>
		</tr>
		<tr>
			<td>2</td>
			<td>28</td>
			<td>2</td>
			<td>0</td>
		</tr>
		<tr>
			<td>3</td>
			<td>56</td>
			<td>4</td>
			<td>1</td>
		</tr>
		<tr class="highlighted">
			<td>4</td>
			<td>70</td>
			<td>20</td>
			<td>4</td>
		</tr>
		<tr>
			<td>5</td>
			<td>56</td>
			<td>4</td>
			<td>1</td>
		</tr>
		<tr>
			<td>6</td>
			<td>28</td>
			<td>2</td>
			<td>0</td>
		</tr>
		<tr>
			<td>7</td>
			<td>8</td>
			<td>0</td>
			<td>0</td>
		</tr>
		<tr>
			<td>8</td>
			<td>1</td>
			<td>0</td>
			<td>0</td>
		</tr>
	</table>

	<div class="sources">
		<h4>Sources</h4>
		<ul>
			<li>Page, S. E. (2012). Cellular Automata. <a href="https://www.coursera.org/course/modelthinking">Model Thinking.</a></li>
			<li>Wolfram, S. (2002). <a href="www.wolframscience.com/">A New Kind of Science</a>.
		</ul>
	</div>



<?php include "footer.html" ?>

<!-- page-specific scripts -->
<script src="js/pages/cellularautomata.js"></script>

</body>
</html>

