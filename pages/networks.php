<?php include "header.html" ?>

<style>

body { background:#f1e6cd; }
body, a, a:visited { color:#444; border-bottom:1px dotted #444; }
a:hover, b, h3 { color:#EF6B6C; }
h4, h5 {
	border-bottom:1px solid rgba(55, 55, 55, 0.5);
}
.ui-slider-handle { background:#80C99E; border:1px solid #58b27d !important; }
.slider-input { width: 70%; }

</style>


	<div class="intro">
		<h1>Networks</h1>
		<h3>Network theory underlies any system involving connections, and can reveal many insights about these systems.</h3>

		<div class="cols cols-2">
			<p>Networks - also referred to as "graphs" - are everywhere. Any system involving relationships or connections are networks. The study of networks has become especially popular since the advent of the internet, and has grown more and more as social networking becomes increasingly widespread. Network theory has been used for a huge variety of purposes, from <a href="http://www.ted.com/talks/nicholas_christakis_how_social_networks_predict_epidemics.html">predicting disease outbreaks</a> to tracing the <a href="https://studieninteressierte.uni-hohenheim.de/uploads/tx_uniscripts/25720/A7020_KIM_2011.pdf#page=37">diffusion of innovation (PDF)</a> and ideas to figuring out what <a href="http://infolab.stanford.edu/~backrub/google.html">search results to deliver</a>.</p>
			<p>Because "networks" is an extremely broad topic, what's presented here is more of an introduction rather than a comprehensive guide. Hopefully this will provide some initial insight and a starting point for further exploration!</p>
		</div>
	</div><!-- intro -->

		<div class="cols cols-3">
			<figure>
				<img src="img/networks/fig1.png" />
				<figcaption>
					<h4>Nodes & edges</h4>
					<p>Networks consist of nodes and edges. <b>Nodes</b> are the "things" that are connected together - they can be people, computers, Facebook friends...anything. When referring to people, nodes are often called "agents". Nodes are connected together by <b>edges</b>.</p>
					<p>Edges can have <b>weights</b> or other parameters associated with them. For example, say I have two friends, Jack and Jill. If I consider Jack my best friend, and Jill only an acquaintance, then in my friend network, I would give the edge connecting me and Jack a higher friendship value than the edge connecting me and Jill.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/networks/fig2.png" />
				<figcaption>
					<h4>Directed or undirected</h4>
					<p>A network can be either <b>directed</b> or <b>undirected</b>; these labels describe the nature of the edges in the network.</p>
					<p><b>Directed networks</b> have edges that point from one node to another. They can run one way, or both ways. Node A can influence node B, but it does not imply that the reverse is true. An example of a directed network is Twitter. You can follow someone (a one way edge), but they don't have to follow you back.</p>
					<p><b>Undirected networks</b> have edges that are mutual; they can't be one way. If node A can influence node B, then node B can also influence node A. An example of an undirected network is Facebook. You can add someone as a friend, but they must also add you as a friend (through accepting your friend request) before you are connected.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/networks/fig3.png" />
				<figcaption>
					<h4>Connected or unconnected</h4>
					<p>Networks can be either <b>connected</b> or <b>unconnected</b>. A connected network has a path from any node to any other node. That is, all nodes are connected to each other in some way.</p>
					<p>An unconnected network is just a network that is not connected. There are groups within the network that are isolated from other groups.</p>
				</figcaption>
			</figure>
		</div>

		<div class="cols cols-3">
			<figure>
				<img src="img/networks/fig4.png" />
				<figcaption>
					<h4>Path Length</h4>
					<p>Another network metric is its <b>path length</b>. Path length is the minimum number of edges between two nodes. In the example above, the path length from node A to node B is three.</p>
					
					<p>The path length for a network is the average path length of all node pairs within the network. So, to calculate the network path length, you would evaluate the path length for every possible pair of connected nodes, and then average these results.</p>

				</figcaption>
			</figure>
			<figure>
				<img src="img/networks/fig5.png" />
				<figcaption>
					<h4>The clustering coefficient</h4>
					<p><b>The clustering coefficient</b> can help provide a quick idea of how tightly clustered the network is. A higher clustering coefficient indicates a more tightly clustered network. It's equal to the percentage of node triplets that are completely connected. These fully-connected node triplets can be thought of as triangles, with the nodes as the points and the edges as the sides. So the clustering coefficient can be represented as:</p>
					<figure><img src="img/networks/eq2.png" /></figure>
					<p>Calculating the clustering coefficient can seem like a daunting task. It's made easier by a simple formula that allows you to quickly evaluate the total number of possible triangles in the network (i.e. the denominator in the previous equation):</p>
					<figure><img src="img/networks/eq3.png" /></figure>
				</figcaption>
			</figure>
			<figure>
				<img src="img/networks/fig6.png" />
				<figcaption>
					<h4>Neighbors & degree</h4>
					<p>A node's <b>neighbors</b> are the nodes it is directly connected to. That is, all nodes that have a path length of one from a given node. However, it is important to note that in some contexts, a node's neighbors can refer to <em>any</em> connected nodes, and is quantified by their path lengths. For example, a 1-Neighbor is a neighbor with a path length of one, a 2-Neighbor is a neighbor with a path length of two, and so on. </p>
					<p>Neighbors are related to a node's <b>degree</b>, which is the number of edges that the node has.  In the above figure, node A has a degree of three.</p>
					<p>The degree metric can also be applied to the network as a whole, in which case it is the average degree of all the nodes in that network. A shortcut for calculating the network degree is:</p>
					<figure><img src="img/networks/eq1.png" /></figure>					
				</figcaption>
			</figure>
		</div>


	<div class="demo clear">
		<h2>Networks in Action</h2>
		<p>There are many, many different ways of thinking about and working with networks. Presented here are just three of the simpler ways.</p>

		<div class="sub-demo">
			<button class="reset reset-ra">Restart</button>		
			<button class="configure">Configure</button>			

			<div class="canvas-wrapper">
				<div class="config">
					<h4>Configure <a href="#" class="close">X</a></h4>

					<div class="float-2">
						<article>
							<table id="settings">
							<tr>
								<td width="40%">Number of Nodes:</td>
								<td class="slider-input"><div class="slider" id="raNodes"></div></td>
								<td class="slider-val">20</td>
							</tr>
							<tr>
								<td>Connection Probability:</td>
								<td class="slider-input"><div class="slider" id="raProb"></div></td>
								<td class="slider-val">5%</td>
							</tr>
						</table>
						</article>

						<article>

							<button class="reset reset-ra">Run</button>								

						</article>


					</div>

				</div> <!-- config -->

				<div class="demo-info">
					<h5>Random Attachment</h5>
					<p>In <b>random attachment</b>, nodes have a certain probability P of connecting to each other.</p>
					<p>For a large N (number of nodes), there is a threshold probability (a tipping point), where the graph almost always ends up becoming connected. This threshold probability is:</p>
					<figure><img src="img/networks/eq4.png" /></figure>
				</div>

				<canvas id="random-attachment" class="side-canvas">
					Unfortunately, your browser does not yet support HTML5 canvas. For the full experience, try upgrading your browser!
				</canvas>
			</div> <!-- canvas-wrapper -->
		</div> <!-- sub-demo -->

		<div class="sub-demo">
			<button class="reset reset-sw">Restart</button>		
			<button class="configure">Configure</button>			

			<div class="canvas-wrapper">
				<div class="config">
					<h4>Configure <a href="#" class="close">X</a></h4>

					<div class="float-2">
						<article>
							<table id="settings">
							<tr>
								<td width="40%">Number of clusters:</td>
								<td class="slider-input"><div class="slider" id="swClusters"></div></td>
								<td class="slider-val">8</td>
							</tr>
							<tr>
								<td>Nodes per cluster</td>
								<td class="slider-input"><div class="slider" id="swNodes"></div></td>
								<td class="slider-val">10</td>
							</tr>
							<tr>
								<td>Connection probability:</td>
								<td class="slider-input"><div class="slider" id="swProb"></div></td>
								<td class="slider-val">10%</td>
							</tr>
						</table>
						</article>

						<article>

							<button class="reset reset-sw">Run</button>								

						</article>


					</div>

				</div> <!-- config -->

				<div class="demo-info">
					<h5>Small Worlds</h5>
					<p><b>Small worlds</b> most aptly applies to representing social networks and other similar organizations that are characterized by <b>local clusters</b> (i.e. "cliques").
					<figure><img src="img/networks/fig7.png" /></figure>
					<p>Members within these local clusters have some probability of knowing <b>random friends</b> who connect local clusters together. As this probability increases, the network's clustering coefficient increases, and the network path length increases (the network becomes more interconnected).
					<figure><img src="img/networks/fig8.png" /></figure>
				</div>

				<canvas id="small-worlds" class="side-canvas">
					Unfortunately, your browser does not yet support HTML5 canvas. For the full experience, try upgrading your browser!
				</canvas>
			</div> <!-- canvas-wrapper -->
		</div> <!-- sub-demo -->

		<div class="sub-demo">
			<button class="reset reset-pa">Restart</button>		
			<button class="configure">Configure</button>			

			<div class="canvas-wrapper">
				<div class="config">
					<h4>Configure <a href="#" class="close">X</a></h4>

					<div class="float-2">

						<article>
							<table id="settings">
							<tr>
								<td width="40%">Number of nodes</td>
								<td class="slider-input"><div class="slider" id="paNodes"></div></td>
								<td class="slider-val">50</td>
							</tr>
						</table>
						</article>

						<article>

							<button class="reset reset-pa">Run</button>								

						</article>


					</div>

				</div> <!-- config -->

				<div class="demo-info">
					<h5>Preferential Attachment</h5>
					<p>In <b>preferential attachment</b> nodes are added each iteration and connect to existing nodes. They are more likely to connect to nodes that have a high degree.
					<p>These networks end up developing <b>supernodes</b> as a result of a snowballing effect. The highly connected nodes are more likely to pick up newly added nodes, thus becoming even more connected and subsequently even more likely to attract new nodes the next iteration. Consequently, these networks typically result in <b>long-tail distributions</b>, with most of the network's edges being concentrated among a few supernodes, with the remaining edges being sparsely distributed among the remaining majority of nodes.</p>
					<p>Preferential attachment networks are highly susceptible to <b>targeted attacks</b> - the failure of supernodes will have wide-reaching consequences across the network. However, they are relatively safe against <b>random failure</b>, since these supernodes represent only a small portion of the overall node population.</p>
				</div>

				<canvas id="preferential-attachment" class="side-canvas">
					Unfortunately, your browser does not yet support HTML5 canvas. For the full experience, try upgrading your browser!
				</canvas>
				Edge distribution
			</div> <!-- canvas-wrapper -->
		</div> <!-- sub-demo -->

	</div> <!-- demo -->

	<div class="sources">
		<h4>Sources</h4>
		<ul>
			<li>Page, S. E. (2012). Networks. <a href="https://www.coursera.org/course/modelthinking">Model Thinking.</a></li>
		</ul>
	</div>



<?php include "footer.html" ?>

<!-- page-specific scripts -->
<script src="/js/libs/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/pages/networks.js"></script>

</body>
</html>
