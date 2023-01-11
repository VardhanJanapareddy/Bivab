<?php

namespace BLUEBELLPLUGIN\Inc;


use BLUEBELLPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpbluebell' ),
			'singular_name'     => _x( 'Project Category', 'wpbluebell' ),
			'search_items'      => __( 'Search Category', 'wpbluebell' ),
			'all_items'         => __( 'All Categories', 'wpbluebell' ),
			'parent_item'       => __( 'Parent Category', 'wpbluebell' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpbluebell' ),
			'edit_item'         => __( 'Edit Category', 'wpbluebell' ),
			'update_item'       => __( 'Update Category', 'wpbluebell' ),
			'add_new_item'      => __( 'Add New Category', 'wpbluebell' ),
			'new_item_name'     => __( 'New Category Name', 'wpbluebell' ),
			'menu_name'         => __( 'Project Category', 'wpbluebell' ),
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
			'name'              => _x( 'Service Category', 'wpbluebell' ),
			'singular_name'     => _x( 'Service Category', 'wpbluebell' ),
			'search_items'      => __( 'Search Category', 'wpbluebell' ),
			'all_items'         => __( 'All Categories', 'wpbluebell' ),
			'parent_item'       => __( 'Parent Category', 'wpbluebell' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpbluebell' ),
			'edit_item'         => __( 'Edit Category', 'wpbluebell' ),
			'update_item'       => __( 'Update Category', 'wpbluebell' ),
			'add_new_item'      => __( 'Add New Category', 'wpbluebell' ),
			'new_item_name'     => __( 'New Category Name', 'wpbluebell' ),
			'menu_name'         => __( 'Service Category', 'wpbluebell' ),
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
			'name'              => _x( 'Testimonials Category', 'wpbluebell' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpbluebell' ),
			'search_items'      => __( 'Search Category', 'wpbluebell' ),
			'all_items'         => __( 'All Categories', 'wpbluebell' ),
			'parent_item'       => __( 'Parent Category', 'wpbluebell' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpbluebell' ),
			'edit_item'         => __( 'Edit Category', 'wpbluebell' ),
			'update_item'       => __( 'Update Category', 'wpbluebell' ),
			'add_new_item'      => __( 'Add New Category', 'wpbluebell' ),
			'new_item_name'     => __( 'New Category Name', 'wpbluebell' ),
			'menu_name'         => __( 'Testimonials Category', 'wpbluebell' ),
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
			'name'              => _x( 'Team Category', 'wpbluebell' ),
			'singular_name'     => _x( 'Team Category', 'wpbluebell' ),
			'search_items'      => __( 'Search Category', 'wpbluebell' ),
			'all_items'         => __( 'All Categories', 'wpbluebell' ),
			'parent_item'       => __( 'Parent Category', 'wpbluebell' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpbluebell' ),
			'edit_item'         => __( 'Edit Category', 'wpbluebell' ),
			'update_item'       => __( 'Update Category', 'wpbluebell' ),
			'add_new_item'      => __( 'Add New Category', 'wpbluebell' ),
			'new_item_name'     => __( 'New Category Name', 'wpbluebell' ),
			'menu_name'         => __( 'Team Category', 'wpbluebell' ),
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
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpbluebell' ),
			'singular_name'     => _x( 'Faqs Category', 'wpbluebell' ),
			'search_items'      => __( 'Search Category', 'wpbluebell' ),
			'all_items'         => __( 'All Categories', 'wpbluebell' ),
			'parent_item'       => __( 'Parent Category', 'wpbluebell' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpbluebell' ),
			'edit_item'         => __( 'Edit Category', 'wpbluebell' ),
			'update_item'       => __( 'Update Category', 'wpbluebell' ),
			'add_new_item'      => __( 'Add New Category', 'wpbluebell' ),
			'new_item_name'     => __( 'New Category Name', 'wpbluebell' ),
			'menu_name'         => __( 'Faqs Category', 'wpbluebell' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
		
	}
	
}
