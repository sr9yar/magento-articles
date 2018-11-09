<?php
 
class Vs7_Articles_Model_Article extends Mage_Core_Model_Abstract {
	
	const VISIBILITY_HIDDEN = '0';
	const VISIBILITY_DIRECTORY = '1';

	protected function _construct() {
		$this->_init('vs7_articles/article');
	}



	public function getActive()
	{
			return array(
					self::VISIBILITY_HIDDEN 
							=> Mage::helper('vs7_articles')
										 ->__('Hidden'),
					self::VISIBILITY_DIRECTORY
							=> Mage::helper('vs7_articles')
										 ->__('Visible in Directory'),
			);
	}

}