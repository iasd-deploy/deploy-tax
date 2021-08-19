<?php

/**
*
*/
class IASD_TaxonomiasMaster_Tests extends WP_UnitTestCase{

	function test_if_hooks_were_applied() {
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_PROJETOS, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_DEPARTAMENTOS, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_DEPARTAMENTOS, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_EDITORIAS, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_REGIAO, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_COLECOES, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_EVENTOS, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_SEDES_REGIONAIS, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_TIPO_MATERIAL, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_TIPO_MIDIA, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_OWNER, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
		$this->assertGreaterThan(0, has_action(IASD_Taxonomias::ACTION_SECAO, array('IASD_TaxonomiasMaster', 'AssignToPosts')));
	}

	// function test_if_clientlistener_accept_multisite_action() {

	// }

}
