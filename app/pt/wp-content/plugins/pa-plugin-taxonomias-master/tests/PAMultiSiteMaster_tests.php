<?php

/**
* 
*/
class PAMultiSiteMaster_Tests extends WP_UnitTestCase{
	
	function setUp() {
		parent::setUp();
		// $args = array( 'name' => 'União Central Brasileira' , 'slug' => 'ucb', 'taxonomy' => 'xtt-pa-sedes' );
		// $return_id_term = $this->factory->term->create_object($args);
		// $args = array( 'name' => 'União Sul Brasileira' , 'slug' => 'usb', 'taxonomy' => 'xtt-pa-sedes' );
		// $return_id_term = $this->factory->term->create_object($args);
	}

	function test_if_init_action_is_setted_up() {
		$this->assertGreaterThan(0, has_action('init', array('PAMultiSiteMaster','Init')));
	}

	# test if ajax hook is setted up
	function test_if_update_multisite_ajax_is_setted_up() {
		$this->assertGreaterThan(0, has_action('wp_ajax_updateMultiSiteList', array('PAMultiSiteMaster','updateMultiSiteList')));
	}

	# test if updateMultiSiteList can save wp option list
	function test_if_update_multisite_can_save_list() {
		# mock $_POST data 
		$_POST['install'] = 'usb';
		$_POST['install_title'] = 'União Sul Brasileira';
		$_POST['sites'] = array('/jovens/','/mulher/');

		# do_action_ajax
		$return = do_action('wp_ajax_updateMultiSiteList');

		# check if wp_option is setted up
		$expected_data = serialize(array($_POST['install'] => array( 'title' => $_POST['install_title'], 'sites' => $_POST['sites']) ) );
		$actual_data = get_option( 'pa_multisite_list' );
		$this->assertEquals($expected_data, $actual_data);
	}

	# test if fails when not passing install param
	function test_if_fails_when_not_passing_params() {
		# do_action_ajax
		$return = do_action('wp_ajax_updateMultiSiteList');

		# check if wp_option is setted up
		$actual_data = get_option( 'pa_multisite_list' );
		$this->assertFalse($actual_data, 'wp_option expected to be false');
	}

	# test if fails when not passing sites param
	function test_if_fails_when_not_passing_sites_param() {
		# do_action_ajax
		$return = do_action('wp_ajax_updateMultiSiteList');
		$_GET['install'] = 'iasd.local';

		# check if wp_option is setted up
		$actual_data = get_option( 'pa_multisite_list' );
		$this->assertFalse($actual_data, 'wp_option expected to be false');
	}

	# test if ajax hook for getMultiSiteList is setted up
	function test_if_ajax_hook_for_getMultiSiteList_is_setted_up() {
		$this->assertGreaterThan(0, has_action('wp_ajax_getMultiSiteList', array('PAMultiSiteMaster','getMultiSiteList')));
	}

	# test if returns right json data
	function test_if_returns_right_json_data() {
		# mock $_GET data 
		$_GET['install'] = 'ucb';
		$_GET['install_title'] = 'União Central Brasileira';
		$_GET['sites'] = array('ministerio-jovem','ministerio-da-mulher');

		# do_action_ajax
		do_action('wp_ajax_updateMultiSiteList');

		# check if wp_option is setted up
		$expected_data = serialize(array($_GET['install'] => $_GET['sites']));
		$actual_data = get_option( 'pa_multisite_list' );

		$_GET['install'] = 'usb';
		$_GET['install_title'] = 'União Sul Brasileira';
		$_GET['sites'] = array('ministerio-jovem');
		do_action('wp_ajax_updateMultiSiteList');

		$_GET['slug'] = 'ministerio-jovem';
		# trigger ajax function

		# inicializar sedes
		$args = array( 'name' => 'União Central Brasileira' , 'slug' => 'ucb', 'taxonomy' => 'xtt-pa-sedes' );
		$this->factory->term->create_object($args);
		$args = array( 'name' => 'União Sul Brasileira' , 'slug' => 'usb', 'taxonomy' => 'xtt-pa-sedes' );
		$this->factory->term->create_object($args);
		$args = array( 'name' => 'União Centro-Oeste Brasileira' , 'slug' => 'ucob', 'taxonomy' => 'xtt-pa-sedes' );
		$this->factory->term->create_object($args);
		// $sedes = get_terms( 'xtt-pa-sedes', array( 'hide_empty' => 0 ) );

		# inicializar departamentos
		$args = array( 'name' => 'União Central Brasileira' , 'slug' => 'ucb', 'taxonomy' => 'xtt-pa-sedes' );
		$this->factory->term->create_object($args);
		$args = array( 'name' => 'União Sul Brasileira' , 'slug' => 'usb', 'taxonomy' => 'xtt-pa-sedes' );
		$this->factory->term->create_object($args);
		$departamentos = get_terms( 'xtt-pa-sedes', array( 'hide_empty' => 0 ) );

		do_action('wp_ajax_getMultiSiteList');


	}

}