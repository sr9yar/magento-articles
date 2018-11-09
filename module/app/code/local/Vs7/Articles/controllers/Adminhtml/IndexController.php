<?php
class Vs7_Articles_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		//return Mage::getSingleton('admin/session')->isAllowed('articles/index');
		return true;
	}

	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Articles"));
	   $this->renderLayout();
    }
}