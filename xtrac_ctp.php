<?php
/**
 * Plugin Name
 *
 * @package           xtrac_cpt
 * @author            Tom Osborne
 * @copyright         2022 Xtrac Limited
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Xtrac CPT
 * Plugin URI:        https://github.com/tom-osborne-xtrac/xtrac-cpt
 * Description:       Custom Post Types for Xtrac Knowledge Base
 * Version:           1.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tom Osborne
 * Author URI:        https://github.com/tom-osborne-xtrac
 * Text Domain:       xtrac-cpt
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
Changelog:
v1.0
- Created plugin; Copied code across from 'xtrac-one' theme; Tidied code

v1.1
- Added "Lessons_Learnt" post type
*/

/* ------------------------------------------------------------------------- */
/* CUSTOM POST TYPES ------------------------------------------------------- */
/* ------------------------------------------------------------------------- */


/* Register and configure custom post types -------------------------------- */

function xtrac_cpt_register_cpts() {
	// XT REPORTS
	$labels = array(
		"name" => __( 'XT Reports', '' ),
		"singular_name" => __( 'XT Report', '' ),
		"menu_name" => __( 'XT Reports', '' ),
		"all_items" => __( 'All XT Reports', '' ),
		"add_new" => __( 'Add New', '' ),
		"add_new_item" => __( 'Add New XT Report', '' ),
		"edit_item" => __( 'Edit XT Report', '' ),
		"new_item" => __( 'New XT Report', '' ),
		"view_item" => __( 'View XT Report', '' ),
		"search_items" => __( 'Search XT Report', '' ),
		"not_found" => __( 'No XT Reports found', '' ),
		"not_found_in_trash" => __( 'No XT Reports found in Trash', '' ),
		"parent_item_colon" => __( 'Parent XT Report:', '' ),
		"featured_image" => __( 'Featured Image for this XT Report', '' ),
		"set_featured_image" => __( 'Set Featured Image for this XT Report', '' ),
		"remove_featured_image" => __( 'Remove Featured Image for this XT Report', '' ),
		"use_featured_image" => __( 'Use as Featured Image for this XT Report', '' ),
		"archives" => __( 'XT Report Archives', '' ),
		"insert_into_item" => __( 'Insert into XT Report', '' ),
		"uploaded_to_this_item" => __( 'Uploaded to this XT Report', '' ),
		"filter_items_list" => __( 'Filter XT Report list', '' ),
		"items_list_navigation" => __( 'XT Reports list navigation', '' ),
		"items_list" => __( 'XT Reports list', '' ),
		"parent_item_colon" => __( 'Parent XT Report:', '' ),
		);
	$args = array(
		"label" => __( 'XT Reports', '' ),
		"labels" => $labels,
		"description" => "XT reports that have been issued by Xtrac",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "xt-reports", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-admin-generic",
		"menu_position" => 5,
		"supports" => array( "title", "editor", "thumbnail", "revisions", "author", "post-formats", "comments" ),		
		"taxonomies" => array( "category", "post_tag" ),		
		"yarpp_support" => true,
		"searchwp_support" => true,
	);
	register_post_type( "xt_report", $args );

	//GUIDES
	$labels = array(
		"name" => __( 'Guides', '' ),
		"singular_name" => __( 'Guide', '' ),
		"add_new_item" => __( 'Add New Guide', '' ),
    );
	$args = array(
		"label" => __( 'Guides', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "guides", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-media-document",
		"menu_position" => 6,
		"supports" => array( "title", "editor", "thumbnail", "custom-fields", "author", "post-formats", "comments" ),
		"taxonomies" => array( "category", "post_tag", "project_code", "technical_area", "sales_territory" ),
		"yarpp_support" => true,
		"searchwp_support" => true,
	);
	register_post_type( "guides", $args );

	//MATERIALS HANDBOOKS
	$labels = array(
		"name" => __( "Material Handbooks", "" ),
		"singular_name" => __( "Material Handbook", "" ),
	);
	$args = array(
		"label" => __( "Material Handbooks", "" ),
		"labels" => $labels,
		"description" => "Material handbooks, created and managed by Metallurgy",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capabilities" => array(
			"edit_post" => "edit_material_handbook",
			"edit_posts" => "edit_material_handbooks",
			"edit_others_posts" => "edit_other_material_handbooks",
	        "publish_posts" => "publish_material_handbooks",
	        "read_post" => "read_material_handbook",
	        "read_private_posts" => "read_private_material_handbooks",
	        "delete_post" => "delete_material_handbook"
	        ),
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "material_handbook", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-archive",
		"menu_position" => 7,
		"supports" => array( "title", "editor", "author", "thumbnail", "revisions", "page-attributes" ),
		"taxonomies" => array( "post_tag" ),
		"yarpp_support" => true,
		"searchwp_support" => true,
	);
	register_post_type( "material_handbook", $args );

	//HEAT TREAT CODES
	$labels = array(
		"name" => __( "HT Codes", "" ),
		"singular_name" => __( "HT Codes", "" ),
	);
	$args = array(
		"label" => __( "HT Codes", "" ),
		"labels" => $labels,
		"description" => "Heat Treat Codes, created and managed by Metallurgy",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "ht_code", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-book",
		"menu_position" => 8,
		"supports" => array( "title", "editor", "author", "thumbnail", "revisions", "page-attributes" ),
		"taxonomies" => array( "post_tag" ),
		"yarpp_support" => true,
		"searchwp_support" => true,
	);
	register_post_type( "ht_code", $args );

	// SNIPPETS
	$labels = array(
		"name" => __( 'Snippets', '' ),
		"singular_name" => __( 'Snippet', '' ),
		"all_items" => __( 'All Snippets', '' ),
		"add_new" => __( 'Add New Snippet', '' ),
		"add_new_item" => __( 'Add New Snippet', '' ),
	);
	$args = array(
		"label" => __( 'Snippets', '' ),
		"labels" => $labels,
		"description" => "Short pieces of information not related to projects or reports.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "snippet", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 8,
		"supports" => array( "title", "editor", "thumbnail", "author", " searchwp", "comments" ),
		"taxonomies" => array( "post_tag", "project_code", "technical_area" ),
		"yarpp_support" => true,
	);
	register_post_type( "snippet", $args );

	// Lessons learnt
	function cptui_register_my_cpts_lessons_learnt() {

		/**
		 * Post Type: Lessons Learnt.
		 */
	
		$labels = array(
			"name" => __( "Lessons Learnt", "custom-post-type-ui" ),
			"singular_name" => __( "Lessons Learnt", "custom-post-type-ui" ),
		);
	
		$args = array(
			"label" => __( "Lessons Learnt", "custom-post-type-ui" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"delete_with_user" => false,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "lessons_learnt", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
			"taxonomies" => array( "category", "post_tag", "rl_media_tag", "project_code", "technical_area" ),
		);
	
		register_post_type( "lessons_learnt", $args );
	}
	
	add_action( 'init', 'cptui_register_my_cpts_lessons_learnt' );
	
}
add_action( 'init', 'xtrac_cpt_register_cpts' );


/* Register custom post types in AUTHOR, TAG and CATEGORY archives --------- */
/* ------------------------------------------------------------------------- */

function cpt_register_tags( $query ) {
    if ( $query->is_tag() && $query->is_main_query() || $query->is_category() && $query->is_main_query() || $query->is_author() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'xt_report', /*'condition_assessment',*/ 'snippet', 'guides', 'material_handbook', 'ht_code' ) );
    }
}
add_action( 'pre_get_posts', 'cpt_register_tags' );


/* Add CPTs to home loop --------------------------------------------------- */
/* ------------------------------------------------------------------------- */

function xtrac_cpt_cptsInHomeLoop( $query ) {
	if ( is_home() && $query->is_main_query() )  {
		$query->set( 'post_type', array( 'post', 'condition_assessment', 'xt_report', 'snippet', 'guides', 'material_handbook') ); 
			return $query; 
	} 
}
add_filter( 'pre_get_posts', 'xtrac_cpt_cptsInHomeLoop' );


/* ADD CPTs TO RSS FEED ---------------------------------------------------- */
/* ------------------------------------------------------------------------- */

function extend_feed($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'extend_feed');



/* Add custom post types to archive widget drop down------------------------ */
/* ------------------------------------------------------------------------- */

function custom_getarchives_where( $where ){
    $where = str_replace( "post_type = 'post'", "post_type IN ( 'post', 'xt_report', 'snippet', 'guides', 'material_handbook', 'ht_code' )", $where );
    return $where;
}
add_filter( 'getarchives_where', 'custom_getarchives_where' );




/* ------------------------------------------------------------------------- */
/* CUSTOM TAXONOMIES ------------------------------------------------------- */
/* ------------------------------------------------------------------------- */

/* Register and configure custom taxonomies -------------------------------- */

function cptui_register_my_taxes() {

	// SALES TERRITORIES -> XT Reports, Guides
	$labels = array(
		"name" => __( 'Sales Territories', '' ),
		"singular_name" => __( 'Sales Territory', '' ),
		);
	$args = array(
		"label" => __( 'Sales Territories', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Sales Territories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'sales_territory', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "sales_territory", array( /*"condition_assessment",*/ "xt_report", "guides"), $args );

	// PROJECT CODES -> XT Reports, Guides, Snippets
	$labels = array(
		"name" => __( 'Project Codes', '' ),
		"singular_name" => __( 'Project Code', '' ),
		"separate_items_with_commas" => __( 'Separate with commas', '' ),
		);
	$args = array(
		"label" => __( 'Project Codes', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Project Codes",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'project-codes', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "project_code", array( /*"condition_assessment",*/ "xt_report", "lessons_learnt", "guides", "snippet" ), $args );

	// TECHNICAL AREAS -> XT Reports, Guides, Snippets
	$labels = array(
		"name" => __( 'Technical Areas', '' ),
		"singular_name" => __( 'Technical Area', '' ),
		);
	$args = array(
		"label" => __( 'Technical Areas', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Technical Areas",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'technical_area', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "technical_area", array( /*"condition_assessment",*/ "xt_report", "lessons_learnt", "guides", "snippet" ), $args );

// End cptui_register_my_taxes()
}
add_action( 'init', 'cptui_register_my_taxes' );