<?php
 
class Vs7_Articles_Model_Resource_Article_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
	
	protected function _construct() {
		parent::_construct();
		$this->_init(
			'vs7_articles/article',
			'vs7_articles/article'
		);
	}
}