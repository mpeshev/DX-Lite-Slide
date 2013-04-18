<?php
global $post;

// Get slider options
$dxls_options = get_option( 'dxls_options' );

// Get values from DX Slide Options
if ( ! empty( $dxls_options['width'] ) ) {
	$width = $dxls_options['width'];
} else {
	$width = '100%';
}

if ( ! empty( $dxls_options['height'] ) ) {
	$height = $dxls_options['height'];
} else {
	$height = '350px';
}

if ( ! empty( $dxls_options['position'] ) ) {
	$dx_position = $dxls_options['position'];
} else {
	$dx_position = 'none';
}

if ( ! empty( $dxls_options['order'] ) ) {
	$dx_order = $dxls_options['order'];
} else {
	$dx_order = 'desc';
}

// Define defaults for user params
$dxls_slider_user_atts = array(
	'width' => $width,
	'height' => $height,
	'position' => 'none',
	'category' => '',
	'order' => $dx_order
);

// Merge with user params
$args = $dxls_slider_user_atts;
if( ! empty( $atts ) && is_array( $atts ) ) {
	$args = wp_parse_args( $atts, $args );
}

// Disallow any float other than left, right or none
$default_positions = array( 'left', 'right', 'none' );
if( ! in_array( $args['position'], $default_positions ) ) {
	$args['position'] = 'none';
}

// Query arguments, yeah
//$order = in_array( $args['order'], array( 'asc', 'desc' ) ) ? $args['order'] : 'desc';

$dxls_slide_args = array(
	'post_type' => 'dx_slide',
	'post_status' => 'publish',
  	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => $args['order']
);


// Fetch from a given slides category
if( ! empty( $args['category'] ) ) {
	$dxls_slide_args['dx_slider'] = $args['category'];
}

ob_start();
?>

<style type="text/css">
	.dx-slideshow {
		display: inline-block;
		width: <?php echo $args['width']; ?>;
		height: <?php echo $args['height']; ?>;
		float: <?php echo $args['position']; ?>;
	}
	
	.dx-slideshow img.dx-slide-img {
		width: <?php echo $args['width']; ?>;
		height: <?php echo $args['height']; ?>;
	}
</style>

<?php
if ( $dxls_options['dxls_slide_status'] == 'enabled' ) :

	$dxls_slides_list = new WP_Query( $dxls_slide_args );

	if ( $dxls_slides_list->have_posts() ) :
		echo '<div class="dx-slideshow" style="display: inline-block; float: ' . $args["position"] . '; width: ' . $args["width"] . '; height: ' . $args["height"] . ';">';
			while ($dxls_slides_list->have_posts()) : $dxls_slides_list->the_post();
				$dxls_img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
				echo '<div>';
					echo '<img class="dx-slide-img" src=" ' . $dxls_img_url . ' " style="width: ' . $args["width"] . '; height: ' . $args["height"] . ';" />';
				echo '</div>';
			endwhile; 	
		echo '</div>';
	endif;
	wp_reset_query();
endif;
?>

<?php 
return ob_get_clean();
?>