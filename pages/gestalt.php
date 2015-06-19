<?php include "header.html" ?>

<style>

body { background:#688080; }
a:hover, b, h3 { color:#FCCD87; }

</style>


	<div class="intro">
		<h1>Gestalt Principles</h1>
		<h3>A set of principles describing our visual perception.</h3>

		<div class="cols cols-2">
			<p>We have the remarkable ability of making sense of complex visual arrangements of objects. Let's say you're walking down the street and you see a car (how exciting!). When we see a car, why do we see it as a single "car" entity and not just a collection of wheels, chassis, and windows? Why do we only see those parts as constituent of the car, and not the parking meter it's parked beside?</p>
			<p>This is what the <b>gestalt principles</b> (or "gestalt laws") describe - our innate tendency to intuitively make a whole from a jumble of parts picked from noisy scenes. This tendency towards perceiving the world as orderly is known as the "<b>law of Prägnanz</b>", and is often considered the underlying principle for the gestalt laws. Note that the gestalt principles are only descriptive, they don't explain <em>why</em> we perceive things this way.</p>
			<p>Because these principles describe how we can group relevant parts of a scene, they're also referred to as "<b>principles of grouping</b>". These principles are especially important in visual design because they occupy the "non-thinking" space. We don't consciously group objects in a scene, we naturally perceive the grouping as a natural property of the scene.</p>
			<p>This section only covers <em>visual</em> gestalt principles, though there are gestalt principles for <a href="http://doc.gold.ac.uk/~ma503am/essays/gestalt/">other sensory perception.</a> Most examples for this section have been adapted from <a href="http://www.scholarpedia.org/article/Gestalt_principles">Scholarpedia</a>.</P>
		</div>
	</div><!-- intro -->

	<h2>The Principles</h2>
	<p>These gestalt principles are presented in simple form. In reality, these principles work in complex combinations, and may compete with or enhance one another.</p>
	<div class="cols cols-4">
		<figure>
				<img src="img/gestalt/fig1.png" />
				<figcaption>
					<h4>Proximity</h4>
					<p>Elements that are closer together, relative to the arrangement of other elements in the scene, are assumed to form a group.</p>
					<p>In cases where there are varying proximities amongst objects (rows 2 & 3), it's surprisingly hard to override this proximity principle and force yourself into perceiving different group arrangements. Where proximities are more or less equal (row 1), this proximity principle doesn't have much potency and - with some effort - you can willfully perceive subgroups.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig2-1.png" class="animate" />
				<figcaption>
					<h4>Common Fate</h4>
					<p>Elements that move synchronously (move together) are assumed to form a group.</p>
					<p>Mouseover the figure to see how a group emerges when objects move together.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig3-1.png" class="animate" />
				<figcaption>
					<h4>Similarity</h4>
					<p>Elements that are similar to each other - in color, shape, size, orientation, etc - are assumed to form a group.</p>
					<p>Mouseover the figure to see how the perception of that central group vanishes if there's no color to set it apart.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig5-1.png" class="animate" />
				<figcaption>
					<h4>Continuity</h4>
					<p>Elements that are aligned together are assumed to form a continuous whole.</p>
					<p>This figure technically forms a solid whole, but is perceived as two overlapping curved lines. Mouseover the figure to see the lines distingushed by color. The assumption of two continuous lines is much stronger than assumption of two V-shaped figures joined at their angles.</p>
				</figcaption>
			</figure>
	</div>
	<div class="cols cols-4">
			<figure>
				<img src="img/gestalt/fig4.png" />
				<figcaption>
					<h4>Symmetry</h4>
					<p>Elements that are symmetrical to each other are assumed to form a group.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig6-1.png" class="animate" />
				<figcaption>
					<h4>Closure</h4>
					<p>Elements that are part of a closed figure are assumed to form a group (and the figure is perceptually complete).</p>
					<p>Although technically incomplete, we perceive this object as a circle.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig7.png" />
				<figcaption>
					<h4>Common Region</h4>
					<p>Elements enclosed in the same closed region are assumed to form a group.</p>
					<p>In the figure above, you can see how this principle overrides the proximity principle. Without the defined region, it's very hard to perceive that pair grouping. With the region, it becomes quite easy.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig8.png" />
				<figcaption>
					<h4>Element Connectedness</h4>
					<p>Elements that are connected by other elements are assumed to form a group.</p>
					<p>Like the common region principle, element connectedness overrides the proximity principle in the figure above.</p>
				</figcaption>
			</figure>

	</div>
	<div class="cols cols-3">
		<figure>
				<img src="img/gestalt/fig9-1.png" class="animate" />
				<figcaption>
					<h4>Past Experience</h4>
					<p>Elements that we've seen grouped together in the past are assumed to form a group in this present instance as well. This principle also describes how our recognition of objects is influenced by past encounters with similar visual stimuli.</p>
					<p>This principle is important for reading. With messy handwriting (or cursive), words can look like scribbles. However, advanced readers can make sense of these muddled words. Their familiarity with Roman letters allow them to more easily extract individual letters and resolve ambiguity. </p>
				</figcaption>
			</figure>
		<figure>
				<img src="img/gestalt/fig10-1.png" class="animate" />
				<figcaption>
					<h4>Good Gestalt</h4>
					<p>Elements that are part of a pattern which is a "good Gestalt" - that is, they are simple, orderly, balanced, etc - are assumed to form a group. It can sort of be thought as <a href="http://math.ucr.edu/home/baez/physics/General/occam.html">Occam's Razor</a> applied to visual perception. It is also known as the "law of Prägnanz", and sometimes is considered the overarching gestalt principle for all the others.</p>
					<p>In the figure above, the simplest arrangement if objects is two overlapping rectangles, rather than two irregular shapes.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig11.png" />
				<figcaption>
					<h4>Figure-Ground Articulation</h4>
					<p>Figure-ground articulation isn't always included as a gestalt principle, but it is at least related. It refers to the perceptual separation of foreground elements or a figure and the background, based on some visual heuristics.</p>
					<p>The background typically has less visual saliency (it's less attractive to the eye) and seems to expand beyond the figure (that is, it's usually larger than the figure). The figure and the background differ by color and some other properties. The border separating the background and the figure seem to be part of the figure, defining its shape.</p>
				</figcaption>
			</figure>
	</div>

	<h2>Properties of Gestalt Systems</h2>
	<p>These are properties of gestalt systems - again, gestalt theory only describes these properties, but does not explain their underlying mechanisms.</p>
	<div class="cols cols-4">
		<figure>
				<img src="img/gestalt/fig12.png" />
				<figcaption>
					<h4>Emergence</h4>
					<p>Complex shapes being perceived from the aggregation of simple rules and as a unified whole, as opposed to a mere sum of its parts. The car example is a result of emergence - we don't see the car as a combination of a wheels, chassis, and glass, and then realize it's a car. We just see immediately perceive it as a unified whole that we call a car.</p>
				<p>The figure above is a famous example of emergence. A dalmatian emerges from the scene - not piece by piece, but as a coherent whole.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig13.png" class="animate" />
				<figcaption>
					<h4>Reification</h4>
					<p>The generation/extrapolation of elements that aren't explicitly defined, yet are perceived. That is, there is a perception of more information than is actually present in the sensory stimulus.</p>
					<p>In the figure above, there are no lines explicitly defining the triangle, but we can clearly perceive one, implied by the arrangement of the other objects.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig14-1.png" class="animate" />
				<figcaption>
					<h4>Multistability</h4>
					<p>This property is responsible for many optical illusions - there are multiple interpretations of an object that perception oscillates between. Some famous examples are the Rubin vase and the Necker cube.</p>
					<p>In the Necker cube above, the cube can either be perceived with the encircled corner (mouseover to see) pointing towards you or away from you. Both are perfectly valid perceptions of the cube.</p>
				</figcaption>
			</figure>
			<figure>
				<img src="img/gestalt/fig15.png" />
				<figcaption>
					<h4>Invariance</h4>
					<p>Objects are recognized independent of properties such as their rotation, transformation, scale, lighting conditions, feature variation, etc. We recognize a car as a car at night, during the day time, when they're facing away from us, when we view their side, when they're blue or red, and so on.</p>
				</figcaption>
			</figure>
	</div>

	<div class="sources">
		<h4>Sources</h4>
		<ul>
			<li>Dejan Todorovic (2008) <a href="http://www.scholarpedia.org/article/Gestalt_principles">Gestalt principles</a>. <a href="http://www.scholarpedia.org/">Scholarpedia</a>, 3(12):5345.</li>
			<li><a href="http://en.wikipedia.org/wiki/Gestalt_psychology">Gestalt Psychology</a>. Wikipedia.</li>
			<li>Emergence image from <a href="http://architecturehell.files.wordpress.com/2009/08/emergence.jpg?w=510&h=407">Architecture Hell</a></li>
		</ul>
	</div>



<?php include "footer.html" ?>

<!-- page-specific scripts -->
<script>

$(function() {

		$('.animate').live( 'mouseover', function() {
			var imgSrc = $(this).attr('src');
			var imgNum = imgSrc.substr(-5)[0];
			imgSrc = imgSrc.replace( '-'+imgNum, '-2' );
			$(this).attr( 'src', imgSrc );
		}).live( 'mouseleave', function() {
			var imgSrc = $(this).attr('src');
			var imgNum = imgSrc.substr(-5)[0];
			imgSrc = imgSrc.replace( '-'+imgNum, '-1' );
			$(this).attr( 'src', imgSrc );
		});

});

</script>

</body>
</html>

