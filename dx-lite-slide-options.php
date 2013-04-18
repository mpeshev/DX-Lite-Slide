<?php 
global $wpdb;
global $post;
?>

<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<h2><?php _e( 'Lite Slide Options Page', 'dxls' ); ?></h2>
</div>

<?php $dxls_options = get_option( 'dxls_slide_options' ); ?>

<hr />

<h3>
<?php echo _e( 'Enable/Disable Slider', 'dxls' ); ?>
</h3>

<?php 
$dxls_options = get_option( 'dxls_options' );

if ( isset( $_POST['dxls_slide_status_submit'] ) ) {
	$dxls_options['dxls_slide_status'] = $_POST['dxls_slide_status'];			
  	update_option( 'dxls_options', $dxls_options );
}
?>

<form method="post" action="">
	<?php if ( ! empty( $dxls_options['dxls_slide_status'] ) && $dxls_options['dxls_slide_status'] == 'enabled' ) : ?>
		<input type="radio" checked="checked" name="dxls_slide_status" value="enabled" id="dxls_slide_enabled" />
		<label for="dxls_slide_enabled">Enabled</label><br />
		<input type="radio" name="dxls_slide_status" value="disabled" id="dxls_slide_dsabled" />
		<label for="dxls_slide_dsabled">Disabled</label><br />
	<?php else : ?>
		<input type="radio" name="dxls_slide_status" value="enabled" id="dxls_slide_enabled" />
		<label for="dxls_slide_enabled">Enabled</label><br />
		<input type="radio" checked="checked" name="dxls_slide_status" value="disabled" id="dxls_slide_dsabled" />
		<label for="dxls_slide_dsabled">Disabled</label>
	<?php endif; ?>
	
	<p class="submit">
		<input type="submit" name="dxls_slide_status_submit" class="button-primary" value="<?php _e('Save Changes', 'dxls'); ?>" />
	</p>
</form>

<hr />

<?php
$dxls_options = get_option('dxls_options');

if ( isset( $_POST['dxls_slide_options_submit'] ) ) {
	$dxls_options['width'] = $_POST['width'];
	$dxls_options['height'] = $_POST['height'];
	$dxls_options['order'] = $_POST['order'];
  	update_option('dxls_options', $dxls_options);
}
?>

<form method="post" action="">
	<label for="width">Slider width</label>
	<input type="text" id="width" name="width" value="<?php if ( ! empty( $dxls_options['width'] ) ) esc_attr_e( $dxls_options['width'] ); ?>" /><br />
	<label for="height">Slider height</label>
	<input type="text" id="height" name="height" value="<?php if ( ! empty( $dxls_options['height'] ) ) esc_attr_e( $dxls_options['height'] ); ?>" /><br />
	<label for="order">Slider Order</label>
	<select id="order" name="order">
		<?php 
		if ( $dxls_options['order'] == 'desc' ) {
			echo '<option value="desc" selected="selected">DESC</option>';
			echo '<option value="asc">ASC</option>';
		} else {
			echo '<option value="desc">DESC</option>';
			echo '<option value="asc" selected="selected">ASC</option>';
		}
		?>
	</select>
		
	<p class="submit">
		<input type="submit" name="dxls_slide_options_submit" class="button-primary" value="<?php _e('Save Changes', 'dxls'); ?>" />
	</p>
</form>