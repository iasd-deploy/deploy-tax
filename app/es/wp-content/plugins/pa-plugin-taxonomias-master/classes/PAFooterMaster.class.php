<?php

class PAFooterMaster {
	public static function AdminMenu() {
		add_submenu_page( 'pa-adventistas', 'Rodapé', 'Rodapé', 'edit_pages', 'pa-adv-master-footer', array('PAFooterMaster', 'AdminMenuRender'));

		register_setting('pa-adv-master-footer', 'pafooter_master_facebook');
		register_setting('pa-adv-master-footer', 'pafooter_master_twitter');
		register_setting('pa-adv-master-footer', 'pafooter_master_google');
		register_setting('pa-adv-master-footer', 'pafooter_master_youtube');
		register_setting('pa-adv-master-footer', 'pafooter_master_rss');
		register_setting('pa-adv-master-footer', 'pafooter_master_endereco');

		add_settings_section('pa-adv-master-footer-default', __('Configurações do Rodapé', 'iasd'), array(__CLASS__, 'AdminMenuInfoSection'), 'pa-adv-master-footer');
		add_settings_field('pafooter_master_facebook', __('Facebook', 'iasd'), array(__CLASS__, 'AdminMenuFieldSetting'), 'pa-adv-master-footer', 'pa-adv-master-footer-default', 'pafooter_master_facebook');
		add_settings_field('pafooter_master_twitter',  __('Twitter', 'iasd'),  array(__CLASS__, 'AdminMenuFieldSetting'), 'pa-adv-master-footer', 'pa-adv-master-footer-default', 'pafooter_master_twitter');
		add_settings_field('pafooter_master_google',   __('Google+', 'iasd'),  array(__CLASS__, 'AdminMenuFieldSetting'), 'pa-adv-master-footer', 'pa-adv-master-footer-default', 'pafooter_master_google');
		add_settings_field('pafooter_master_youtube',  __('Youtube', 'iasd'),  array(__CLASS__, 'AdminMenuFieldSetting'), 'pa-adv-master-footer', 'pa-adv-master-footer-default', 'pafooter_master_youtube');
		add_settings_field('pafooter_master_rss',      __('Feed RSS', 'iasd'), array(__CLASS__, 'AdminMenuFieldSetting'), 'pa-adv-master-footer', 'pa-adv-master-footer-default', 'pafooter_master_rss');
		add_settings_field('pafooter_master_endereco', __('Endereço', 'iasd'), array(__CLASS__, 'AdminMenuFieldSetting'), 'pa-adv-master-footer', 'pa-adv-master-footer-default', 'pafooter_master_endereco');
	}
	public static function AdminMenuInfoSection() {
		echo '<p>' . __('Use os campos abaixo para configurar o rodapé global', 'iasd') . '</p>';
	}
	public static function AdminMenuFieldSetting($setting_name) {
		switch ($setting_name) {
			case 'pafooter_master_endereco':
				echo '<textarea name="'.$setting_name.'" id="'.$setting_name.'" class="widefat">'. get_option($setting_name) .'</textarea>';
				break;
			default:
				echo '<input name="'.$setting_name.'" id="'.$setting_name.'" type="input" value="'. get_option($setting_name) .'" class="widefat" />';
				break;
		}
	}

	public static function AdminMenuRender() {
?>
<div class="wrap">
	<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<?php
		do_settings_sections('pa-adv-master-footer');
?>
		<div id="major-publishing-actions">
			<div id="publishing-action">
				<input type="submit" name="pa-adv-update" id="pa-adv-update" class="button-primary"
					value="<?php _e('Salvar'); ?>" name="Salvar" tabindex="4">
			</div>
		</div>
	</form>
</div>
<?php
	}


	public static function ToArray() {
		$output = array();
		$fields = array('pafooter_master_facebook', 'pafooter_master_twitter', 'pafooter_master_google', 'pafooter_master_youtube', 'pafooter_master_rss', 'pafooter_master_titulo', 'pafooter_master_resumo', 'pafooter_master_endereco');
		foreach ($fields as $field) {
			$output[$field] = get_option( $field );
		}

		$output['footer_1'] = PANavMaster::RenderJson('master_footer_1');
		$output['footer_2'] = PANavMaster::RenderJson('master_footer_2');
		$output['footer_3'] = PANavMaster::RenderJson('master_footer_3');

		return $output;
	}
}

add_action('admin_menu', array('PAFooterMaster', 'AdminMenu'), 100);
add_action('network_admin_menu', array('IASD_Taxonomias', 'AdminMenu'), 100);


