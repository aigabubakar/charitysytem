<?php

namespace PUREHEARTSPLUGIN\Inc;


use PUREHEARTSPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wppurehearts' ),
			'singular_name'     => _x( 'Project Category', 'wppurehearts' ),
			'search_items'      => __( 'Search Category', 'wppurehearts' ),
			'all_items'         => __( 'All Categories', 'wppurehearts' ),
			'parent_item'       => __( 'Parent Category', 'wppurehearts' ),
			'parent_item_colon' => __( 'Parent Category:', 'wppurehearts' ),
			'edit_item'         => __( 'Edit Category', 'wppurehearts' ),
			'update_item'       => __( 'Update Category', 'wppurehearts' ),
			'add_new_item'      => __( 'Add New Category', 'wppurehearts' ),
			'new_item_name'     => __( 'New Category Name', 'wppurehearts' ),
			'menu_name'         => __( 'Project Category', 'wppurehearts' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wppurehearts' ),
			'singular_name'     => _x( 'Service Category', 'wppurehearts' ),
			'search_items'      => __( 'Search Category', 'wppurehearts' ),
			'all_items'         => __( 'All Categories', 'wppurehearts' ),
			'parent_item'       => __( 'Parent Category', 'wppurehearts' ),
			'parent_item_colon' => __( 'Parent Category:', 'wppurehearts' ),
			'edit_item'         => __( 'Edit Category', 'wppurehearts' ),
			'update_item'       => __( 'Update Category', 'wppurehearts' ),
			'add_new_item'      => __( 'Add New Category', 'wppurehearts' ),
			'new_item_name'     => __( 'New Category Name', 'wppurehearts' ),
			'menu_name'         => __( 'Service Category', 'wppurehearts' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wppurehearts' ),
			'singular_name'     => _x( 'Testimonials Category', 'wppurehearts' ),
			'search_items'      => __( 'Search Category', 'wppurehearts' ),
			'all_items'         => __( 'All Categories', 'wppurehearts' ),
			'parent_item'       => __( 'Parent Category', 'wppurehearts' ),
			'parent_item_colon' => __( 'Parent Category:', 'wppurehearts' ),
			'edit_item'         => __( 'Edit Category', 'wppurehearts' ),
			'update_item'       => __( 'Update Category', 'wppurehearts' ),
			'add_new_item'      => __( 'Add New Category', 'wppurehearts' ),
			'new_item_name'     => __( 'New Category Name', 'wppurehearts' ),
			'menu_name'         => __( 'Testimonials Category', 'wppurehearts' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wppurehearts' ),
			'singular_name'     => _x( 'Team Category', 'wppurehearts' ),
			'search_items'      => __( 'Search Category', 'wppurehearts' ),
			'all_items'         => __( 'All Categories', 'wppurehearts' ),
			'parent_item'       => __( 'Parent Category', 'wppurehearts' ),
			'parent_item_colon' => __( 'Parent Category:', 'wppurehearts' ),
			'edit_item'         => __( 'Edit Category', 'wppurehearts' ),
			'update_item'       => __( 'Update Category', 'wppurehearts' ),
			'add_new_item'      => __( 'Add New Category', 'wppurehearts' ),
			'new_item_name'     => __( 'New Category Name', 'wppurehearts' ),
			'menu_name'         => __( 'Team Category', 'wppurehearts' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		
	}
	
}
