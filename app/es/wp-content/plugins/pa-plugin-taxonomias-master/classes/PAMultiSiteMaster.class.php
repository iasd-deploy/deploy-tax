<?php

class PAMultiSiteMaster {

	const PA_MULTISITE_OPTION_NAME = 'pa_multisite_list';

	public static function Init() {
		
		# register ajax hook updateMultiSiteList
		add_action( 'wp_ajax_updateMultiSiteList', array('PAMultiSiteMaster', 'updateMultiSiteList') );
		add_action( 'wp_ajax_nopriv_updateMultiSiteList', array('PAMultiSiteMaster', 'updateMultiSiteList') );
		# register ajax hook getMultiSiteList
		add_action( 'wp_ajax_getMultiSiteList', array('PAMultiSiteMaster', 'getMultiSiteList') );
		add_action( 'wp_ajax_nopriv_getMultiSiteList', array('PAMultiSiteMaster', 'getMultiSiteList') );

		// $tax_url = self::GetServerUrl();
		$tax_url = get_bloginfo( 'url' );
		$main_url = str_replace('tax.', '', $tax_url);
		update_option('pa-multisite-main-url', $main_url );
		
	}

	public static function updateMultiSiteList() {

		$install = $_REQUEST['install'];
		$sites = $_REQUEST['sites'];

		if(isset($install) && count($sites)>0){

			$ms_list = get_option( 'pa_multisite_list', array());
			if(!is_array($ms_list))
				$ms_list = array();
			$ms_list[$install] = array( 'sites' => $sites );

			update_option( 'pa_multisite_list', $ms_list );

			echo json_encode(array('return'=>'OK'));
		} else {
			return new WP_Error('broke', __("Insuficient params"));
		}
	}

	public static function getMultiSiteList() {
		# get request data
		// $slug = $_GET['slug'];
		$slug = isset($_REQUEST['slug']) ? $_REQUEST['slug'] : '';
		if(!$slug) {
			return false;
		}

		if($slug=='portal_home'){
		//	$slug = '';
		}

		$found = array();
		$install_list = get_option( 'pa_multisite_list', array());

		if(isset($_GET['debug'])){
			echo "<pre>"; 
			print_r($install_list);
			die;
		}
		if(isset($_GET['deploy'])){
			#
			echo "<pre>";
			foreach($install_list as $i_slug => $deptos) {

				if($i_slug=='iasd'){
					continue;
				}


				foreach($deptos['sites'] as $d){

					// var_dump($d); die;
					if($d=='/'){
						continue;
					}

					$site_url = get_option('pa-multisite-main-url');
					$site_url = str_replace('/pt', '', $site_url);
					$site_url = str_replace('http://', 'http://'.$i_slug.'.', $site_url);
					$site_url = $site_url.$d;
					$site_url = $site_url.'wp-admin/admin-ajax.php?action=TriggerMultiSiteUpdate';
					
					echo "<a href='$site_url' target='_blank'>$d</a><br>";

				}
				// die;

			}

			die;
		}

		if(!is_array($install_list))
			return false;
		
		# get all xtt-pa-sedes taxonomy
		$terms = get_terms( 'xtt-pa-sedes', array( 'hide_empty' => 0 ) );

		$ar = array();

		foreach ($terms as $term) {
			$term_data = get_option("xtt_cat_info_{$term->term_id}");

			$site_url = get_option('pa-multisite-main-url');
			$site_url = str_replace('/pt', '', $site_url);
			$site_url = str_replace('http://', 'http://'.$term->slug.'.', $site_url.'/'. (($slug != 'portal_home') ? $slug : ''));

			// check if option has sites list

			$sites_list = ( @is_array($install_list[$term->slug]['sites']) ) ? $install_list[$term->slug]['sites'] : array();

			$slugFound = false;
			foreach($sites_list as $s) {
				$slug_trim = str_replace('/', '', $s);

				if($slug_trim==$slug) {
					$slugFound = true;
					$ar[$term->slug] = $site_url;
				}
			}
			if(!$slugFound) {
				$ar[$term->slug] = '';
			}
		}

		echo json_encode($ar);
	}
}

# register init ation
add_action( 'init', array('PAMultiSiteMaster', 'Init'), 100);