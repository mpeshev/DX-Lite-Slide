<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<h2><?php _e( 'Lite Slide Help', 'dxls' ); ?></h2>
</div>

<div>
	<p>
		<strong><em>Important</em></strong>: Currently you can add one Slider per page.
	</p>
	<p class="dx-question">
		How to display the DX Slides?
	</p>
	<p class="dx-answer">
		In your Post/Page use shortcode:<br />
		[dx_display_slideshow]
		
		<p>
			You can use <em>do_shortcode</em> function in your WordPress Template files:<br />
			&lt;&#63;php echo do_shortcode( '[dx_display_slideshow]' ); &#63;&gt;
		</p>
	</p>
	<p class="dx-question">
		Shortcode attributes
	</p>
	<p class="dx-answer">
		<p>
			<strong>Width</strong> - set Slider width.<br />
			<em>Example:</em><br />
			[dx_display_slideshow width="500px"]
		</p>
		<p>
			<strong>Height</strong> - set Slider height.<br />
			<em>Example:</em><br />
			[dx_display_slideshow height="300px"]
		</p>
		<p>
			<strong>Category</strong> - you can display slides from specific slider category.<br />
			<em>Example:</em><br />
			[dx_display_slideshow category="Slider Category"] - where "Slider Category" is the name of your desired category.
		</p>
		<p>
			<strong>Position</strong> - set position (left, right, none) in your Slider.<br />
			<em>Example:</em><br />
			[dx_display_slideshow position="left"]
		</p>
		<p>
			<strong>Order</strong> - you can set order for your slides - desc/asc.<br />
			<em>Example:</em><br />
			[dx_display_slideshow order="desc"]
		</p>
	</p>
	<p>
	<strong>Shortcode <em>Example:</em></strong><br />
	[dx_display_slideshow category="Homepage" width="350px" height="200px" position="none" order="desc"]
	</p>
</div>