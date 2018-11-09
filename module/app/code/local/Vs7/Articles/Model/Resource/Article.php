<?php
 
class Vs7_Articles_Model_Resource_Article extends Mage_Core_Model_Resource_Db_Abstract {
	
	protected function _construct() {
		$this->_init('vs7_articles/article', 'id');
	}
}
