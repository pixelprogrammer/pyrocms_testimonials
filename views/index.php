<div class="content-body">
	{{ testimonials }}
        {{ if { helper:count start="0" } > 0 }}
            <div class="divider"></div>
        {{ endif }}
        <h3>
            {{ name }}
        </h3>
        {{ if { settings:testimonial_show_bio } == 1 }}
            <em>{{ bio }}</em>
        {{ endif }}
        <p>"{{ text }}"</p>
        {{ if { settings:testimonial_show_website } == 1 AND website_url != '' }}
            <p>
                <a class="link" href="{{ website_url }}">website</a>
            </p>
        {{ endif }}
	{{ /testimonials }}
</div>