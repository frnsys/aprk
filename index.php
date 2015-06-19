<?php include "pages/header.html" ?>

<style>

	header { display:none; }
	body { background:#cac2a7; text-shadow:1px 1px rgba(100,100,100,0.1);}
	a, a:visited { border:none; }
	a:hover { color:#fff; }

	figure {
		-webkit-border-radius:12px;
		-moz-border-radius:12px;
		border-radius:12px;
	}
	.listing a:hover figure {
		background:rgba(0,0,0,0.2);
	}
	
	.about, figcaption { text-align:center; }
		.about img { width:400px; }
		.about h1 {
			font-size:2em;
			width:80%;
			margin:2em auto;
		}

</style>

	<div class="index">

		<div class="about">
			<img src="img/topics.png" />

			<h1>APRK Topics is an interactive learning resource for interesting knowledge.</h1>
		</div>

		<div class="listing">

			<h4>Currently available topics</h4>
			<div class="cols">
				<a href="/topics/boids">
					<figure>
						<img src="img/boids/icon.png" />
						<figcaption>Boids Algorithm</figcaption>
					</figure>
				</a>

				<a href="/topics/cellularautomata">
					<figure>
						<img src="img/cellularautomata/icon.png" />
						<figcaption>Cellular Automata</figcaption>
					</figure>
				</a>

				<a href="/topics/networks">
					<figure>
						<img src="img/networks/icon.png" />
						<figcaption>Networks</figcaption>
					</figure>
				</a>

				<a href="/topics/operant">
					<figure>
						<img src="img/operant/icon.png" />
						<figcaption>Operant Conditioning</figcaption>
					</figure>
				</a>

				<a href="/topics/gestalt">
					<figure>
						<img src="img/gestalt/icon.png" />
						<figcaption>Gestalt Principles</figcaption>
					</figure>
				</a>

				<a href="/topics/markov">
					<figure>
						<img src="img/markov/icon.png" />
						<figcaption>Markov Processes</figcaption>
					</figure>
				</a>

				<a href="/topics/groupthink">
					<figure>
						<img src="img/groupthink/icon.png" />
						<figcaption>Groupthink</figcaption>
					</figure>
				</a>

			</div> <!-- cols -->

		</div> <!-- listing -->

	</div> <!-- index -->

<?php include "pages/footer.html" ?>

</body>
</html>

