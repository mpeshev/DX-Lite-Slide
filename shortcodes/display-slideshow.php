<?php
global $wpdb;
global $post;

$dxls_options = get_option('dxls_options');

$dxls_slide_args = array(
	'post_type' => 'dx_slide',
	'post_status' => 'publish',
  	'posts_per_page' => -1,
	'orderby' => 'date', 
	'order' => 'DESC' 
);

ob_start();

if ( $dxls_options['dxls_slide_status'] == 'enabled' ) :

	$dxls_slides_list = new WP_Query( $dxls_slide_args );

	if ( $dxls_slides_list->have_posts() ) :
		echo '<div id="dx-slideshow">';
			while ($dxls_slides_list->have_posts()) : $dxls_slides_list->the_post();
				$dxls_img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
			?>
				<div>
					<img src="<?php echo $dxls_img_url; ?>" width="100%" height="350" />
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