<div class="content-body">
	The testimonials page. I will have to create a view for this later.
	{{ testimonials }}
		<h3>
			<a href="{{ website_url }}">{{ name }}</a>
		</h3>
		<em>{{ bio }}</em>
		<p>"{{ text }}"</p>
	{{ /testimonials }}
</div>