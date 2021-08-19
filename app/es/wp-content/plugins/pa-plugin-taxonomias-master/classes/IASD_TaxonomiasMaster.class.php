<?php


class IASD_TaxonomiasMaster {

	public static function Init() {
		if(class_exists('IASD_Taxonomias')) {
			add_action(IASD_Taxonomias::ACTION_PROJETOS, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_DEPARTAMENTOS, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_EDITORIAS, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_REGIAO, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_COLECOES, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_EVENTOS, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_SEDES_REGIONAIS, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_TIPO_MATERIAL, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_TIPO_MIDIA, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_OWNER, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_SECAO, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
			add_action(IASD_Taxonomias::ACTION_DESTAQUE, array('IASD_TaxonomiasMaster', 'AssignToPosts'));
		}
	}

	public static function AssignToPosts($options = array()) {
		$options[] = 'post';

		return $options;
	}

	public static function ReturnOk() {
		self::ReturnMessage(200, 'OK');
	}
	public static function ReturnMissingFields() {
		self::ReturnMessage(400, 'Missing authentication information');
	}
	public static function ReturnMessage($error_code, $message) {
		header('HTTP/1.0 '.$error_code.' '.$message);
		echo '<h1>HTTP/1.0 '.$error_code.' '.$message.'</h1>';
		die;
	}

	public static function ClientListener() {
		$requestData = $_REQUEST;
		if(!isset($requestData['name']) || !isset($requestData['url']))
			self::ReturnMissingFields();


		header('Content-type: application/json');

		switch ($requestData['action']) {
			case 'taxonomy-request':

				$output_data = array();
				$taxonomy_list = IASD_Taxonomias::GetAllTaxonomies();

				foreach($taxonomy_list as $taxonomy) {
					$output_data[$taxonomy] = get_terms($taxonomy, array('hide_empty' => 0 ) );
					foreach($output_data[$taxonomy] as $k => $term) {
						$output_data[$taxonomy][$k]->extra_information = get_option('xtt_cat_info_' . $term->term_id, array());
						if(isset($output_data[$taxonomy][$k]->extra_information['thumbnail_id']))
							$output_data[$taxonomy][$k]->extra_information['thumbnail_url'] = wp_get_attachment_url( $output_data[$taxonomy][$k]->extra_information['thumbnail_id'] );
					}
				}
				echo json_encode($output_data);
				break;
			case 'menu-request':
				$output_data = PAMenuMaster::RenderMenus();
				echo json_encode($output_data);
				break;
			case 'nav-request':
				$output_data = PANavMaster::RenderMenus();
				echo json_encode($output_data);
				break;
			case 'footer-request':
				$output_data = PAFooterMaster::ToArray();
				echo json_encode($output_data);
				break;
			case 'update-ack':
			case 'ack-request':
				# code...
				self::ReturnOk();
				break;

		}
		die;
	}
}

class PATaxonomiasMaster extends IASD_TaxonomiasMaster {

}

add_action( 'init', array('IASD_TaxonomiasMaster', 'Init') );

add_action( 'wp_ajax_taxonomy-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nopriv_taxonomy-request', array('IASD_TaxonomiasMaster', 'ClientListener') );

//add_action( 'wp_ajax_menu-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
//add_action( 'wp_ajax_nopriv_menu-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nav-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nopriv_nav-request', array('IASD_TaxonomiasMaster', 'ClientListener') );

add_action( 'wp_ajax_footer-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nopriv_footer-request', array('IASD_TaxonomiasMaster', 'ClientListener') );

add_action( 'wp_ajax_update-ack', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nopriv_update-ack', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_ack-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nopriv_ack-request', array('IASD_TaxonomiasMaster', 'ClientListener') );

add_action( 'wp_ajax_footer-request', array('IASD_TaxonomiasMaster', 'ClientListener') );
add_action( 'wp_ajax_nopriv_footer-request', array('IASD_TaxonomiasMaster', 'ClientListener') );



