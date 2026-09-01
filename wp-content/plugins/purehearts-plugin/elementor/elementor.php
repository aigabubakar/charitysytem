<?php

namespace PUREHEARTSPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'slider_v1',
		'about_us',
		'urgent_cause',
		'our_causes_v1',
		'recent_donors',
		'our_benefits',
		'video_tour',
		'our_recent_events',
		'our_team',
		'our_testimonials',
		'latest_news',
		'newsletter',
		//Home Page Two
		'slider_v2',
		'emergency_cause',
		'our_participate',
		'our_causes_v2',
		'benefits_services',
		'about_us_v2',
		'video_tour_v2',
		'our_recent_events_v2',
		'our_funfacts',
		'our_clients',
		'latest_news_v2',
		'map_and_info',
		'visit_our_store',
		//Inner Pages
		'about_us_v3',
		'our_history',
		'feature_services',
		'our_contribution',
		'annual_reports',
		'become_volunteer',
		'coming_soon_title',
		'our_faqs',
		'portfolio_2_column',
		'portfolio_3_column',
		'portfolio_4_column',
		'portfolio_details',
		'donations_2_column',
		'donations_3_column',
		'donations_list_view',
		'event_grid_view',
		'event_list_view',
		'blog_grid_view',
		'contact_us',
		'feature_of_contact',
		'google_map',
		'charity_shops_info',
		
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = PUREHEARTSPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\PUREHEARTSPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'purehearts',
			[
				'title' => esc_html__( 'Purehearts', 'purehearts' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'purehearts' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();