<?php
// Get slider options
$dxls_options = get_option('dxls_options');

// Define defaults for user params
$dxls_slider_user_atts = array(
	'width' => '100%',
	'height' => '350px',
	'position' => 'none',
	'category' => '',
	'order' => 'desc'
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
$order = in_array($args['order'], array( 'asc', 'desc' )) ? $args['order'] : 'desc'; 

$dxls_slide_args = array(
	'post_type' => 'dx_slide',
	'post_status' => 'publish',
  	'posts_per_page' => -1,
	'orderby' => 'date', 
	'order' => $order
);


// Fetch from a given slides category
if( ! empty( $args['category'] ) ) {
	$dxls_slide_args['dx_slider'] = $args['category'];
}

ob_start();
?>
<style type="text/css">
	#dx-slideshow {
		width: <?php echo $args['width']; ?>;
		height: <?php echo $args['height']; ?>;
		float: <?php echo $args['position']; ?>;
	}
</style>
<?php 

if ( $dxls_options['dxls_slide_status'] == 'enabled' ) :

	$dxls_slides_list = new WP_Query( $dxls_slide_args );

	if ( $dxls_slides_list->have_posts() ) :
		echo '<div id="dx-slideshow">';
			while ($dxls_slides_list->have_posts()) : $dxls_slides_list->the_post();
				$dxls_img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
			?>
				<div>
					<img src="<?php echo $dxls_img_url; ?>" width="<?php echo $args['width'] ?>" height="<?php echo $args['height']; ?>" />
				</div>
			<?php 
			endwhile; 	
		echo '</div>';
	endif;
	wp_reset_query();
endif;
?>

<?php 
return ob_get_clean();
?>