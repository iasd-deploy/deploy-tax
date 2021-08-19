<?php 

//Faz todos os get dos campos do ACF
function get_banner(){

	$lang = substr(get_locale(), 0, 2);
	if(get_field('ativo', 'option')):

		$utm_sources = "*SITE*";
		$utm_medium = urlencode_deep(get_field('titulo', 'option'));
		$utm_campaign = urlencode_deep(get_field('titulo', 'option'));
		$link = get_field('link', 'option');
		$banner_background = get_field('cor_banner', 'option');
		$imagem_large = get_field('imagem_large', 'option');
		$imagem_medium = get_field('imagem_medium', 'option');
		$imagem_small = get_field('imagem_small', 'option');

		
		$link = $link ."?utm_source=". $utm_sources ."&utm_medium=". $utm_medium ."&utm_campaign=". $utm_campaign;

		$json = array('link' => $link, 'title' => $utm_campaign, 'utm_sources' => $utm_sources, 'alt' => $utm_medium, 'color' => $banner_background, 'imagem_large' => $imagem_large, 'imagem_medium' => $imagem_medium, 'imagem_small'=> $imagem_small);

		return $json;
 	endif;
 	return;
}

//Exibe p json com o cabeçalho correto. 
function response($content) {
	header('Content-Type: application/json');
	echo json_encode($content);
	die;
}

//Recebe o pedido para a API chama a funcão com os GET e envia para a funcão que exibe o json.
function ApiBanner(){

	if(ativo_plugin()){
		$json = get_banner();
		response($json);
	}else{
		echo "ACF não esta ativo!";
		return;
	}
}


//Adiciona a chamada ajax ao hock para consultas
add_action( 'wp_ajax_banner', 'ApiBanner');
add_action( 'wp_ajax_nopriv_banner', 'ApiBanner');


function ativo_plugin(){

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
	if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
		return true;
	} else {
		return false;
	}
}


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {
        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Banner Global'),
            'menu_title'  => __('Banner Global'),
            'parent_slug' => 'pa-adventistas',
        ));
    }
}