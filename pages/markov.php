<?php include "header.html" ?>

<style>

body { background:#D1F2F5; }
body, a, a:visited { color:#444; border-bottom:1px dotted #444; }
a:hover, b, h3 { color:#E91F1F; }
h4, h5 {
	border-bottom:1px solid rgba(55, 55, 55, 0.5);
}
.ui-slider-handle { background:#80C99E; border:1px solid #58b27d !important; }
.slider-input { width: 70%; }

</style>


	<div class="intro">
		<h1>Markov Processes</h1>
		<h3>A simple means of describing systems involving multiple states.</h3>

		<div class="cols cols-2">
			<p>Any system where its components can be one of multiple states can be described by a Markov process. If you think about it, almost anything can be described in such a way. For instance, a person's state could be "happy", or "sad", or "angry". The weather could be "sunny" or "rainy". A computer can be "on" or "off. A country can be "free" or "suppressed". You could get more specific and call each potential form of government a "state" as well.</p>
			<p>There's been a lot of work done on these processes - too much to cover here - so this will only provide an introduction to the topic. But the fundamentals of Markov processes are fairly simple!</p>
		</div>
	</div><!-- intro -->

		<div class="cols cols-2">
			<figure>
				<img src="img/markov/fig1.png" />
				<figcaption>
					<h4>States</h4>
					<p>A Markov process describes some system involving multiple potential <b>states</b>, often represented as circles. The constituents of the system can be in any of these states - <em>but only one at a time</em>.</p>
					<p>At any given moment, the system's population is distributed amongst these states. For the example above, let's say we're talking about a population of 100 people. In this example's current iteration, 40 people are in state A, 50 people are in state B, and 10 people are in state C.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/markov/fig2.png" />
				<figcaption>
					<h4>Transition Probabilities</h4>
					<p>The second component of a Markov process are <b>transition probabilities</b>. These describe the probability that the system will change to another state, dependent upon its current state.</p>
					<p>To continue our example: with these transition probabilities, each iteration, 70% of the people in state A become state B, and 20% become state C.</p>
					<p>There's an implied probability that the state <em>won't</em> change. Since an individual state's probability must total 1, it's just 1 minus its other transition probabilities. In the example above, these implied probabilities are the numbers in white.</p>
					<p>So, looking at state A in our example, 10% of the current state A people will remain state A the next iteration.</p>
				</figcaption>
			</figure>
		</div>


		<h2>Markov Equilibrium</h2>
		
		<div class="cols cols-4">
			<figure>
				<img src="img/markov/fig3.png" />
				<figcaption>
					<h4>Equilibrium</h4>
					<p>Given that a set of conditions are met, a Markov process will reach <b>equilbrium</b> (denoted as p*). That is, there's still movement amongst states, but each transition is offset by an opposing transition, such that the <em>overall distribution of states doesn't change</em>.</p>
					<p>To calculate a Markov process's equilibrium, you need to use matrices.</p>

				</figcaption>
			</figure>
			<figure>
				<img src="img/markov/fig4.png" />
				<figcaption>
					<h4>The Transition Matrix</h4>
					<p>We need to represent our system using a <b>transition matrix</b>. This is just a different way of representing the transition probabilities of our system.</p>
					<p>For state A of this current iteration, this transition matrix can be read: 0.1 of state A remains state A next iteration, 0.7 of it becomes state B, and 0.2 of it becomes state C.</p>

				</figcaption>
			</figure>
			<figure>
				<img src="img/markov/fig5.png" />
				<figcaption>
					<h4>The Equilibrium Equation</h4>
					<p>This is the equation we can use to figure out our equilibrium distribution.</p>
					<p>The current distribution is represented by the [p q 1-p-q] matrix. Multiplying the current distribution by the transition matrix gives us the next state. Since we're trying to find the equilibrium - that is, where the next distribution equals the current distribution - we set this to equal the current distribution.</p>

				</figcaption>
			</figure>
			<figure>
				<img src="img/markov/fig6.png" />
				<figcaption>
					<h4>Solving the Equation</h4>
					<p>Solving this requires <a href="http://www.mathwarehouse.com/algebra/matrix/multiply-matrix.php">matrix multiplication</a>. The example results in the equations above.</p>
					<p>Solving for p and q only requires some substitution (that is, solve for p in terms of q in the first equation, then subtitute p in the second equation), giving us the equilibrium state distribution, shown above.</p>

				</figcaption>
			</figure>

		</div>


		<h2>Markov Convergence Theorem</h2>
		<p>The set of conditions necessary for equilibrium are described by the <b>Markov Convergence Theorem</b>. The equilibrium that the Markov process converges on will be <b>unique</b>. Furthermore, the starting distribution of the system has <em>no effect on the final equilibrium</em>. That is, these equilibriums are history-ignorant; what happened in the past has no impact on where the system will be in the end.</p>

		<div class="cols cols-4 numerable">
			<article>
					<h4>Finite states</h4>
					<p>There must be a finite amount of states. There can be millions of millions of states and more - just so long as there isn't an infinite amount.</p>
			</article>
			<article>
					<h4>Fixed transition probabilities</h4>
					<p>The transition probabilities must not change through the course of the process. In some systems, events can influence the transition probabilities and modify them - these systems are disqualified from the convergence theorem.</p>

			</article>
			<article>
					<h4>Can eventually get from any one state to the other</h4>
					<p>No states should be isolated from any others. If you think of a Markov process like a <a href="http://yadonchow.com/topics/networks">network</a>, one that satisfies the convergence theorem would be <em>connected</em>.</p>
			</article>
			<article>
					<h4>Not a simple cycle</h4>
					<p>That is, it can't be a simple periodic system that ends up in a loop - it would never necessarily reach equilibrium.</p>
			</article>

		</div>



	<div class="sources">
		<h4>Sources</h4>
		<ul>
			<li>Page, S. E. (2012). Markov Processes. <a href="https://www.coursera.org/course/modelthinking">Model Thinking.</a></li>
		</ul>
	</div>



<?php include "footer.html" ?>


</body>
</html>
