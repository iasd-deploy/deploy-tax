<?php

class PAMenuMaster {
	public static function Init() {
		register_nav_menu('master_header', __('Menu Global: Header', 'thema_capa'));
		register_nav_menu('master_footer_1', __('Footer 1', 'thema_capa'));
		register_nav_menu('master_footer_2', __('Footer 2', 'thema_capa'));
		register_nav_menu('master_footer_3', __('Footer 3', 'thema_capa'));
	}

	public static function RenderMenus() {
		$menus = array();
		$menus['master_header'] = self::RenderMenu('master_header', true, true);
		$menus['master_footer_1'] = self::RenderMenu('master_footer_1');
		$menus['master_footer_2'] = self::RenderMenu('master_footer_2');
		$menus['master_footer_3'] = self::RenderMenu('master_footer_3');
		return $menus;
	}

	public static function RenderMenu($location, $as_link = false, $as_responsive = false) {
		$locations = get_nav_menu_locations();
		if(!isset($locations[$location]))
			return '';
		if(!$locations[$location])
			return '';
		$menu_id = $locations[$location];
		$menu = wp_get_nav_menu_object( $menu_id );

$before_menu_responsive = <<<EOD

<!-- Menu Gerado pelo Taxonomias --- INICIO -->
	<div class="menu-global SITEIDENTIFIER">
		<div class="wrap container">
			<div class="menu-header-global-container"> 
				<div class="navbar navbar-inverse">
					<div class="navbar-inner">
						<div class="container">
							<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".%1\$s-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="link_root" href="http://adventistas.org/">ADVENTISTAS.ORG</a>
							<div class="nav-collapse collapse %1\$s-collapse">
								<ul id="%1\$s" class="nav nav-hover %2\$s">%3\$s</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Menu Gerado pelo Taxonomias  --- FIM -->

EOD;

		$before_menu = (($as_link) ? '<a class="link_root" href="http://adventistas.org/"></a>' : '<h4>'.$menu->name.'</h4>') . '<ul id="%1$s" class="%2$s">%3$s</ul>';

		$output = wp_nav_menu(array('theme_location' => $location, 'echo' => false,
			'menu_class' => 'unstyled', 'items_wrap' => ($as_responsive) ? $before_menu_responsive : $before_menu));
		return $output;
	}
}

add_action( 'init', array('PAMenuMaster', 'Init'), 100);




class MultisiteMenuWalker extends Walker {
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
	function start_lvl(&$output, $depth=0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
	function end_lvl(&$output, $depth = 0, $args=array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	function start_el(&$output, $item, $depth = 0, $args= array(), $current_object_id = 0) {
		if(!is_object($args)) {
			$args = new stdClass();
			$args->link_before = '';
			$args->after = '';
			$args->before = '';
			$args->link_after = '';
			$args->theme_location = '';
		}
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		if(isset($item->classes)){
			// $class_name = join(' ',$item->classes);
			list($class_name) = $item->classes;
			if( $item->menu_item_parent == 0 && in_array('current-menu-item', $item->classes) ) {
				$class_name .= " active";
			}
			
		} else {
			$class_name = "";
		}
		$item_class = strlen( trim( $class_name ) ) > 0 ? ' class="' . esc_attr( $class_name ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', '', $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . $item_class .'>';
		$attributes  = ! empty( $item->title ) ? ' title="'  . esc_attr( $item->title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el(&$output, $object, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}

add_filter( 'walker_nav_menu_start_el', array('MultisiteMenuDeptosWalker', 'customFilter'), 10, 4);

class MultisiteMenuDeptosWalker extends Walker {
	public $submenuTitle = "";

	function customFilter($item_output, $item, $depth, $args){
		if (!$item->hasChildren && $depth==0 && $args->theme_location=="multisite_aba2"){
			$item_output .= "<ul>
				<li class=\"visible-desktop\">Clique para ver os sites:</li>
				<li class=\"hidden-desktop\"><a href=\"#\" title=\"Clique para voltar\" class=\"hide_list-link\">« Voltar</a></li>";
			$item_output .= "<li><a href=\"{$item->url}\" title=\"{$item->cTitle}\">{$item->cTitle}</a></li></ul>";
		}
		return $item_output;
	}

	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
	function start_lvl(&$output, $depth = 0, $args = array(), $item) {
		$indent = str_repeat("\t", $depth);
		$output .= "<ul>
		<li class=\"visible-desktop\">Clique para ver os sites:</li>
		<li class=\"hidden-desktop\"><a href=\"#\" title=\"Clique para voltar\" class=\"hide_list-link\">« Voltar</a></li>";
		$output .= "<li><a href=\"#\" title=\"{$item->walker->submenuTitle}\">{$item->walker->submenuTitle}</a></li>";
	}
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	public function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output){
		// check, whether there are children for the given ID and append it to the element with a (new) ID
		$element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
		$element->cTitle = $element->title;
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
	function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
		if(!is_object($args)) {
			$args = new stdClass();
			$args->link_before = '';
			$args->after = '';
			$args->before = '';
			$args->link_after = '';
			$args->theme_location = '';
		}
		$title_slug = sanitize_title($item->title);
		if ($item->hasChildren){
			$item->classes[] = 'has_children';
		}

		$link_class = ($depth==0) ?' class="map-link open-associations-link" data-region="'.$title_slug.'"' : '';

		$this->submenuTitle = $item->title;
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$id = apply_filters( 'nav_menu_item_id', '', $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . '>';
		$attributes  = ! empty( $item->title ) ? ' title="'  . esc_attr( $item->title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . $link_class .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}


