<?php
  
class Vs7_Articles_Block_Adminhtml_Article_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
                            array(
                                        'id' => 'edit_form',
                                        'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                                        'method' => 'post',
                                        'enctype' => 'multipart/form-data',
                                     )
        );


        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();
  
        $data = $this->_getFormData();

        $fieldset = $form->addFieldset('vs7_articles_form', array( 'legend'=>Mage::helper('vs7_articles')->__('Item information') ,'class'=>'fieldset-wide' ));
        

        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('vs7_articles')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
            'index'      => 'title',
        ));
        
      //   $fieldset->addField('text', 'textarea', array(
      //     'label'     => Mage::helper('vs7_articles')->__('Text'),
      //     'class'     => 'required-entry',
      //     'required'  => true,
      //     'name'      => 'text',
      //     'index'      => 'text',
      // ));
        

    $fieldset->addField('text', 'editor', array(
        'name'      => 'text',
        'style'     => 'height:36em;',
        'required'  => true,
        'disabled'  => false,
        'config'    => $wysiwygConfig
    ));


      $fieldset->addField('active', 'checkbox', array(
          'label'     => Mage::helper('vs7_articles')->__('Active'),
          'required'  => false,
          'name'      => 'active',
          'index'      => 'active',
          'checked'    => !!$data['active'] ? true : false,
          'values' => array(0,1),
      ));



      $fieldset->addField('image', 'text', array(
        'label' => Mage::helper('vs7_articles')->__('Current Image'),
        'name' => 'image',
        'index' => 'image',
        'disabled'  => true,
        'required' => false,
      ));



      $fieldset->addField('new_image', 'file', array(
        'label' => Mage::helper('vs7_articles')->__('Upload New Image'),
        'name' => 'new_image',
        'index' => 'new_image',
        'required' => false,
      ));

        $form->setUseContainer(true);

        // $form->addValues($this->_getFormData());

        
        if (!empty($data)) {
            $form->addValues($data);
        }


        $this->setForm($form);
        return parent::_prepareForm();
    }



    protected function _getFormData()
    {
        $data = Mage::getSingleton('adminhtml/session')->getFormData();

        if (!$data && Mage::registry('vs7_articles_data')->getData()) {
            $data = Mage::registry('vs7_articles_data')->getData();
        }

        return (array) $data;
    }




} 