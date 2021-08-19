<?php

class PANavMaster {
	public static function Init() {
		register_nav_menu('multisite_1',    __('Global N1 (Topo)', 'iasd'));
		register_nav_menu('multisite_aba1', __('Global N3 Aba 1 (Departamentos)', 'iasd'));
		register_nav_menu('multisite_aba2', __('Global N3 Aba 2 (Sedes Regionais)', 'iasd'));
		register_nav_menu('multisite_aba3', __('Global N3 Aba 3 (Serviços)', 'iasd'));

	}

	public static function RenderMenus() {
		$menus = array();
		$menus['multisite_1'] = self::RenderJson('multisite_1');
		$menus['multisite_1']['submenus'] = array('multisite_aba1', 'multisite_aba2', 'multisite_aba3');
		$menus['multisite_aba1'] = self::RenderJson('multisite_aba1');
		$menus['multisite_aba2'] = self::RenderJson('multisite_aba2');
		$menus['multisite_aba3'] = self::RenderJson('multisite_aba3');
		return $menus;
	}

	public static function RenderJson($location) {
		$locations = get_nav_menu_locations();
		if(!isset($locations[$location]))
			return '';
		if(!$locations[$location])
			return '';


		$menu_id = $locations[$location];
		$menu = wp_get_nav_menu_object( $menu_id );

		$output = array();
		$output['name'] = $menu->name;
		$output['structure'] = wp_nav_menu(array('theme_location' => $location, 'echo' => false, 'container' => false, 'items_wrap' => '[%3$s]', 'walker' => new IASD_JSON_Walker()));

		return $output;
	}
}
add_action( 'init', array('PANavMaster', 'Init'), 100);


if(!class_exists('IASD_JSON_Walker')) {
	class IASD_JSON_Walker extends Walker_Nav_Menu {
		public $count_in_level = array();
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= ",\n\"items\":[\n";
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$output .= "]\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
			$dbfield_parent = $this->db_fields['parent'];
			$parent = 'l_' . $item->$dbfield_parent;
			if(!isset($this->count_in_level[$parent]))
				$this->count_in_level[$parent] = 0;

			$this->count_in_level[$parent]++;

			if(!is_object($args)) {
				$args = new stdClass();
				$args->link_before = '';
				$args->after = '';
				$args->before = '';
				$args->link_after = '';
				$args->theme_location = '';
			}

			if ($item->hasChildren){
				$item->classes[] = 'has_children';
			}

			$pre_output = array();
			$pre_output['href'] = $item->url;
			$pre_output['target'] = $item->target;
			$pre_output['classes'] = $item->classes;
			$pre_output['title'] = $item->title;
			$pre_output['xfn'] = $item->xfn;
			if($this->count_in_level[$parent] > 1)
				$output .= ',';
			$output .= '{"info":' . json_encode($pre_output);
		}

		function end_el( &$output, $category, $depth = 0, $args = array() ) {
			$output .= "}\n";
		}

		function IASD_JSON_Walker() {
		}
	}
}

/*function testaMenu() {
	PANavMaster::RenderJson('master_footer_2');
	die;
}

add_action('init', 'testaMenu', 999999);*/



