<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       twestfall2763.sb.cis
 * @since      1.0.0
 *
 * @package    Staff_Directory
 * @subpackage Staff_Directory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Staff_Directory
 * @subpackage Staff_Directory/admin
 * @author     Thomas Westfall <something@something.com>
 */
 

class Staff_Directory_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Staff_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Staff_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/staff-directory-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Staff_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Staff_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/staff-directory-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function register_staff_directory_post_type() {
		register_post_type( 'staff-directory',
			array(
				'labels' => array(
				'name' => __( 'Staff Directory' ),
				'singular_name' => __( 'Staff Directory' )
				
				),
				'supports' => array('thumbnail', 'title', 'archive', 'editor'),
				
				
			'public' => true,
			'has_archive' => true,
		
			)
		);	
		
	}
		public function display_staff_directory_meta_fields() {
		//https://developer.wordpress.org/reference/functions/add_meta_box/
		//add_meta_box(id,title,callback,screen,context,priority,callback_args)
		add_meta_box("staff_directory_meta", "Staff Directory Details", array($this,"render_staff_directory_meta_options"), "staff-directory", "normal", "default");
		//add_meta_box("staff_directory_sort", "Staff Directory Sort", array($this,"render_staff_directory_sort"), "staff_directory_sort", "normal", "default");
	}
	public function render_staff_directory_meta_options() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/staff-directory-admin-display.php';
		
	}
	
	
	public function save_staff_directory_meta_fields() {
		
		global $post;
		$staff_directory_first_name = sanitize_text_field( $_POST['staff_directory_first_name'] );
		update_post_meta($post->ID, "staff_directory_first_name", $staff_directory_first_name);
		$staff_directory_last_name = sanitize_text_field( $_POST['staff_directory_last_name'] );
		update_post_meta($post->ID, "staff_directory_last_name", $staff_directory_last_name);
		$staff_directory_email = sanitize_text_field( $_POST['staff_directory_email'] );
		update_post_meta($post->ID, "staff_directory_email", $staff_directory_email);
		$staff_directory_phone = sanitize_text_field( $_POST['staff_directory_phone'] );
		update_post_meta($post->ID, "staff_directory_phone", $staff_directory_phone);
		$staff_directory_job = sanitize_text_field( $_POST['staff_directory_job'] );
		update_post_meta($post->ID, "staff_directory_job", $staff_directory_job);
		$staff_directory_sort_order = sanitize_text_field( $_POST['staff_directory_sort_order'] );
		update_post_meta($post->ID, "staff_directory_sort_order", $staff_directory_sort_order);
		$staff_directory_biography = sanitize_text_field( $_POST['staff_directory_biography'] );
		update_post_meta($post->ID, "staff_directory_biography", $staff_directory_biography);
	
		$staff_directory_full_bio = sanitize_text_field( $_POST['staff_directory_full_bio'] );
		update_post_meta($post->ID, "staff_directory_full_bio", $staff_directory_full_bio);
		//post type 
		//$staff_directory_portrait = $_POST['staff_directory_portrait'];
		//$contents = file_get_contents($staff_irectory_portrait); 
	    //update_post_meta($post->ID, "staff_directory_portrait", $contents);
		//when you create the post type make it allow featured images
		//tittle and editor add a bunch of the supports custom type
//postmeta_img_insert($post_id,$image_url);

//function postmeta_img_insert($post_id,$image_url)
/*
$post_id = get_the_ID();
$image_url = $staff_directory_portrait
// Add Featured Image to Post

$upload_dir = wp_upload_dir(); // Set upload folder

$image_data = file_get_contents($image_url); // Get image data

$filename   = basename($image_url); // Create image file name

 

// Check folder permission and define file location

if (wp_mkdir_p( $upload_dir['path'] ) ) {

$file = $upload_dir['path'] . '/' . $filename;

}

else {

$file = $upload_dir['basedir'] . '/' . $filename;

}

 

// Create the image  file on the server

file_put_contents( $file, $image_data );

 

// Check image file type

$wp_filetype = wp_check_filetype( $filename, null );

 

// Set attachment data

$attachment = array(

'post_mime_type' => $wp_filetype['type'],

'post_title'     => sanitize_file_name( $filename ),

'post_content'   => '',

'post_status'    => 'inherit'

);

 

// Create the attachment

$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

 

// Include image.php

require_once(ABSPATH . 'wp-admin/includes/image.php');

 

// Define attachment metadata

$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

 

// Assign metadata to attachment

wp_update_attachment_metadata( $attach_id, $attach_data );

 

// Add image to custom filed

add_post_meta($post_id,<image custom field name>, $attach_id , true);

 

// And finally assign featured image to post

set_post_thumbnail( $post_id, $attach_id );


		*/
	
}	
	
	public function add_theme_thumbnails() {
		add_theme_support( 'post-thumbnails' );
	}
	
	function staff_directory_sort_menu(){
		//add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
		add_submenu_page( 'edit.php?post_type=staff-directory', 'Sort', 'Sort', 'manage_options', 'staff_directory_sort', array($this,'render_staff_directory_sort') ); 
	}

	public function render_staff_directory_sort() {
		//die('render_staff_directory_sort');
		require_once plugin_dir_path( __FILE__ ) . 'partials/staff-directory-admin-sort.php';
	}
	

}
