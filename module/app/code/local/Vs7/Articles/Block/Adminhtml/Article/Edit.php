<?php
class Vs7_Articles_Block_Adminhtml_Article_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        parent::__construct();
                
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_article';
        $this->_blockGroup = 'vs7_articles';
  
        $this->_updateButton('save', 'label', Mage::helper('vs7_articles')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('vs7_articles')->__('Delete Item'));
    }
  
    public function getHeaderText()
    {

        if( Mage::registry('vs7_articles_data') && Mage::registry('vs7_articles_data')->getId() ) {
            return Mage::helper('vs7_articles')->__("Edit Item '%s' ", $this->htmlEscape(Mage::registry('vs7_articles_data')->getTitle()));
        } else {
            return Mage::helper('vs7_articles')->__("Add Item" );
        }

    }


    protected function _prepareLayout()
    {

        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }

        $article = Mage::registry('vs7_articles_data');
        return parent::_prepareLayout();

    }

} 




