<?php
/**
 * Plugin Name: DX Lite Slide
 * Description: Lite and simple slider for your WordPress project. Works with placing a shortcode.
 * Author: nofearinc
 * Author URI: http://devwp.eu/
 * Version: 0.1
 * License: GPLv2 or later
 * 
 */
/*
 * Copyright (C) 2013 Mario Peshev

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * */
 
/**
 * The main class for the slider management
 * 
 * @author nofearinc
 *
 */
class DX_Lite_Slide {
	// register CPT for slides
	// register taxonomy for slides
	// register shortcode for the display
	// create admin page for settings (default width/height and shortcode info)
	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'init', array( $this, 'register_dx_slides_cpt' ) );
		add_action( 'init', array( $this, 'register_dx_slides_tax' ) );
		add_action( 'init', array( $this, 'add_dx_slides_shortcode' ) );
		add_action( 'admin_init', array( $this, 'add_slider_settings_page' ) );
	}
	
	/**
	 * Setup the DX Slides post type
	 */
	public function register_dx_slides_cpt() {
		register_post_type( 'dx_slide', array(
				'labels' => array(
				'name' => __('DX Slides', 'dxls'),
				'singular_name' => __('Slide', 'dxls'),
				'add_new' => _x('Add New', 'pluginbase', 'dxls' ),
				'add_new_item' => __('Add New Slide', 'dxls' ),
				'edit_item' => __('Edit Slide', 'dxls' ),
				'new_item' => __('New Slide', 'dxls' ),
				'view_item' => __('View Slide', 'dxls' ),
				'search_items' => __('Search Slide', 'dxls' ),
				'not_found' =>  __('No slides found', 'dxls' ),
				'not_found_in_trash' => __('No slides found in Trash', 'dxls' ),
			),
			'description' => __('Slides for the DX Lite Slide', 'dxls'),
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true, 
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 40, // probably have to change, many plugins use this
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields',
				'page-attributes',
			),
		));
	}
	/**
	 * Setup the Slidegory taxonomy
	 */
	public function register_dx_slides_tax() {
		register_taxonomy( 'dx_slider', array( 'dx_slide' ), array(
			'hierarchical' => true,
			'labels' => array(
			'name' => _x( 'Sliders', 'taxonomy general name', 'dxls' ),
			'singular_name' => _x( 'Slider', 'taxonomy singular name', 'dxls' ),
			'search_items' =>  __( 'Search Sliders', 'dxls' ),
			'popular_items' => __( 'Popular Sliders', 'dxls' ),
			'all_items' => __( 'All Sliders', 'dxls' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Slider', 'dxls' ),
			'update_item' => __( 'Update Slider', 'dxls' ),
			'add_new_item' => __( 'Add New Slider', 'dxls' ),
			'new_item_name' => __( 'New Slider Name', 'dxls' ),
			'separate_items_with_commas' => __( 'Separate Sliders with commas', 'dxls' ),
			'add_or_remove_items' => __( 'Add or remove Slider', 'dxls' ),
			'choose_from_most_used' => __( 'Choose from the most used Slider', 'dxls' )
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		));
		
		register_taxonomy_for_object_type( 'dx_slider', 'dx_slide' );
	}
	public function add_dx_slides_shortcode() {}
	public function add_slider_settings_page() {}
	public function enqueue_scripts() {
		
	}
}

// init
new DX_Lite_Slide();