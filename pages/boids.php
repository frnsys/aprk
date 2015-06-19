<?php include "header.html" ?>

<style>

	body, .ui-slider-handle { background:#6fc430; }
	a:hover, b, h3 { color:#F7DD5F; }
	.ui-slider-handle { border:1px solid #599C26 !important; }

	.config .reset { float:left; margin:1em 0 0 0; }
	.slider-input { width: 70%; }

</style>

	<div class="intro">
		<h1>Boids Algorithm</h1>
		<h3>A model for describing flocking behavior.</h3>

		<div class="cols cols-2">
			<p>The Boids algorithm, developed by <a href="http://www.red3d.com/cwr/">Craig Reynolds</a>, was originally intended to simulate the flocking of birds, but it can be applied to any environment involving swarming or flocking behavior - even the <a href="http://www.gamasutra.com/view/feature/1815/modeling_opinion_flow_in_humans_.php?print=1">swarming of public opinions</a>. Pretty amazing, huh?</p>
			<p>The algorithm uses three behaviors to determine the movement of an individual "boid", based on its neighbors: <b>cohesion, alignment, and separation</b>. Using just these three parameters, the Boids algorithm generates swarming behavior so impressive that it <a href="http://www.red3d.com/cwr/resume.html">won an Academy Award</a>! </p>
		</div>
	</div><!-- intro -->

		<div class="cols cols-3">
			<figure>
				<img src="img/boids/fig1.png" />
				<figcaption>
					<h4>Cohesion</h4>
					<p>A boid moves towards the average postion of its neighbors.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/boids/fig2.png" />
				<figcaption>
					<h4>Alignment</h4>
					<p>A boid aligns its steering direction towards the average direction of its neighbors.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/boids/fig3.png" />
				<figcaption>
					<h4>Separation</h4>
					<p>A boid moves away from neighbors that are too close.</p>
				</figcaption>
			</figure>
		</div>

	<div class="demo">
		<h2>Boids in Action</h2>

		<button class="reset">Restart</button>
		<button class="configure">Configure</button>		

		<div class="canvas-wrapper">
			<div class="config">
				<h4>Configure <a href="#" class="close">X</a></h4>

				<div class="float-2">
					<article>

					<table id="settings">
							<tr>
								<td width="20%">Number of boids:</td>
								<td class="slider-input"><div class="slider" id="numBoids"></div></td>
								<td class="slider-val">150</td>
							</tr>
							<tr>
								<td>Neighbor radius:</td>
								<td class="slider-input"><div class="slider" id="neighborRadius"></div></td>
								<td class="slider-val">40</td>
							</tr>
							<tr>
								<td>Separation radius:</td>
								<td class="slider-input"><div class="slider" id="sepRadius"></div></td>
								<td class="slider-val">20</td>
							</tr>
							<tr>
								<td>Boid size:</td>
								<td class="slider-input"><div class="slider" id="boidSize"></div></td>
								<td class="slider-val">100%</td>
							</tr>
						</table>

					<button class="reset">Run</button>														
						
					</article>

					<figure>
						<img src="img/boids/config.png" />
						<figcaption>Boids base their behavior on boids within their <em>neighbor radius</em>. They will try to move away from boids that are within their <em>separation radius</em>.</figcaption>
					</figure>


				</div>

			</div> <!-- config -->
			<canvas id="canvas">
				Unfortunately, your browser does not yet support HTML5 canvas. For the full experience, try upgrading your browser!
			</canvas>
		</div> <!-- canvas-wrapper -->

	</div> <!-- demo -->

	<div class="sources">
		<h4>Sources</h4>
		<ul>
			<li>Reynolds, C. W. (1987). <a href="http://www.red3d.com/cwr/papers/1987/boids.html">Flocks, herds, and schools: A distributed behavioral model</a>. Computer Graphics, 21(4) (SIGGRAPH '87 Conference Proceedings). 25-34.</li>
			<li>Reynolds, C. W. "<a href="http://www.red3d.com/cwr/boids/">Boids: Background and update</a>." Boids (Flocks, Herds, and Schools: A Distributed Behavioral Model).</li>
			<li>Cole, S. (2006, September 28). <a href="http://www.gamasutra.com/view/feature/1815/modeling_opinion_flow_in_humans_.php?print=1">Modeling opinion flow in humans using boids algorithm & social network analysis</a>. Gamasutra - The Art & Business of Making Games.</li>
			<li>Shiffman, D. <a href="http://processing.org/learning/topics/flocking.html">Flocking \ Learning \ Processing.org</a>. From which the above code is adapted.
		</ul>
	</div>



<?php include "footer.html" ?>

<!-- page-specific scripts -->
<script src="/js/libs/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/pages/boids.js"></script>


</body>
</html>
