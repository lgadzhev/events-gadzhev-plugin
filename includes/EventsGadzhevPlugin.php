<?php

/**
 * Class EventsGadzhevPluginClass
 */
class EventsGadzhevPlugin {

	/**
	 * EventsGadzhevPluginClass constructor.
	 */
	function __construct()
	{
		//Initialize custom post type
		add_action( 'init', array( $this, 'custom_post_type' ) );

		// Set predefined custom post fields on inserting event
		add_action( 'wp_insert_post', array( $this, 'set_default_custom_fields' ) );

		// Set predefined custom post fields on updating event
		add_action( 'updated_postmeta', array( $this, 'set_default_custom_fields' ) );

		// Add the custom fields to the content page
		add_filter( 'the_content', array( $this, 'add_custom_fields' ) );

		// Order the list of events by custom field
		add_action( 'pre_get_posts', array( $this, 'order_by' ) );

		// Load the required scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Activates the plugin
	 */
	function activate()
	{
		$this->custom_post_type();
		flush_rewrite_rules();
	}

	/**
	 * Deactivates the plugin
	 */
	function deactivate()
	{
		flush_rewrite_rules();
	}


	/**
	 * Orders the posts
	 *
	 * @param $query
	 */
	function order_by( $query )
	{
		if ( is_post_type_archive() ):
			$query->set( 'order', 'ASC' );
			$query->set( 'meta_key', 'Date' );
			$query->set( 'orderby', 'meta_value' );
		endif;
	}


	/**
	 * Adds custom fields to the archive page
	 */
	function add_custom_fields()
	{
		include dirname( __FILE__ ) . '/archive-event.php';
	}

	/**
	 * Sets predefined custom fields
	 *
	 * @param $post_id
	 *
	 * @return bool
	 */
	function set_default_custom_fields( $post_id )
	{
		add_post_meta( $post_id, 'Date', '', true );
		add_post_meta( $post_id, 'Location', '', true );
		add_post_meta( $post_id, 'URL', '', true );

		return true;
	}

	/**
	 *  Register the custom post type
	 */
	function custom_post_type()
	{
		$labels = array(
			'name'               => 'Events',
			'singular_name'      => 'Event',
			'add_new'            => 'Add Event',
			'all_items'          => 'All Events',
			'add_new_item'       => 'Add Event',
			'edit_item'          => 'Edit Event',
			'new_item'           => 'New Event',
			'view_item'          => 'View Event',
			'search_item'        => 'Search Events',
			'not_found'          => 'No event found',
			'not_found_in_trash' => 'No event found in trash',
			'parent_item_colon'  => 'Parent Event'
		);
		$args   = array(
			'labels'              => $labels,
			'public'              => true,
			'has_archive'         => true,
			'publicly_queryable'  => true,
			'query_var'           => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
				'custom-fields'
			),
			'taxonomies'          => array( 'category', 'post_tag' ),
			'menu_position'       => 0,
			'exclude_from_search' => false,
		);

		register_post_type( 'event', $args );
	}

	/**
	 *  Enqueue the scripts required by the plugin
	 */
	function enqueue()
	{
		wp_enqueue_script( 'mypluginscript', plugins_url( '../assets/script.js', __FILE__ ) );
		wp_enqueue_style( 'jquery-ui-theme-smoothness', sprintf(
				'//ajax.googleapis.com/ajax/libs/jqueryui/%s/themes/smoothness/jquery-ui.css',
				wp_scripts()->registered['jquery-ui-core']->ver ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-datepicker', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.js',
			array( 'jquery', 'jquery-ui-core' ) );
	}
}