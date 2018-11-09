<?php
  

class Vs7_Articles_Block_Adminhtml_Article_Grid  extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('articlesGrid');
        // This is the primary key of the database
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
  
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('vs7_articles/article')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
  
    protected function _prepareColumns()
    {

        $this->addColumn('id', array(
            'header'    => Mage::helper('vs7_articles')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'id',
        ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('vs7_articles')->__('Title'),
            'align'     =>'left',
            'index'     => 'title',
        ));

        $this->addColumn('image', array(
            'header'    => Mage::helper('vs7_articles')->__('Image'),
            'align'     =>'left',
            'index'     => 'image',
        ));

        $this->addColumn('active', array(
            'header'    => Mage::helper('vs7_articles')->__('Active'),
            'align'     =>'left',
            'index'     => 'active',
        ));


        return parent::_prepareColumns();
    }
  
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
  
    public function getGridUrl()
    {
      return $this->getUrl('*/*/grid', array('_current'=>true));
    }
  
  
} 
