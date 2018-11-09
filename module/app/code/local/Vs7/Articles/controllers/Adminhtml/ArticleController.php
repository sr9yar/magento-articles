<?php

class Vs7_Articles_Adminhtml_ArticleController extends Mage_Adminhtml_Controller_Action 
{


    public function indexAction()
    {

    //    $this->loadLayout();
    //    $this->_title($this->__("1 Articles "));
    //    $this->renderLayout();

            $this->_forward('grid',NULL,NULL,[]);
    }



    public function gridAction()
    {

         $this->loadLayout();
         $this->_title($this->__("grid Articles"));

        //  $block = $this->getLayout()->createBlock('vs7_articles/adminhtml_article')->toHtml();
        // $this->getResponse()->setBody($block);

        $block = $this->getLayout()->createBlock('vs7_articles/adminhtml_article');
        $this->getLayout()->getBlock('content')->insert($block);
        $this->renderLayout();

    }


    public function newAction()
    {
        $this->_forward('edit',NULL,NULL,[]);
    }


    public function editAction()
    {

         $this->loadLayout();

         $id = Mage::app()->getRequest()->getParam('id');
         $article = Mage::getModel('vs7_articles/article');

         if($id){
            $this->_title($this->__("Edit Article"));
            $article->load($id);

            if (!$article->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('cms')->__('An article with this ID doesn\'t exist.')
                );
                $this->_redirect('*/*/');
                return;
            }

            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $article->setData($data);
            }


         } else {
            $this->_title($this->__("Create an Article"));





         }






        Mage::register('vs7_articles_data', $article);

        //  $block = $this->getLayout()->createBlock('vs7_articles/adminhtml_article')->toHtml();
        // $this->getResponse()->setBody($block);


        $block = $this->getLayout()->createBlock('vs7_articles/adminhtml_article_edit');
        $this->getLayout()->getBlock('content')->insert($block);
        $this->renderLayout();

    }






    public function saveAction()
    {
        // check if data sent
        if ($data = $this->getRequest()->getPost()) {

            //init model and set data
            $model = Mage::getModel('vs7_articles/article');
            $id = $this->getRequest()->getParam('id');

            if ($id) {
                $model->load($id);
           }

            $data['id'] = $id;
            $model->setData($data);

            $model->setActive( isset($data['active']) ? 1 : 0 );

                if ($_FILES['new_image']['size'] != 0 )
                {
                $uploader = new Varien_File_Uploader( $_FILES['new_image'] ); 
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png','flv'));
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                $uploader->setAllowCreateFolders(true);
    
                $media_path = Mage::getBaseDir('media') . DS ;
                $imgFilename = time() . '.jpg';
    
                $uploader->save($media_path, $imgFilename);
    
    
                $model->setImage( DS. 'media' .  DS.$imgFilename);
            }


            // try to save it
                try {
                    // save the data
                    $model->save();

                    // display success message
                    Mage::getSingleton('adminhtml/session')->addSuccess(
                        Mage::helper('cms')->__('The article has been saved.'));
                    // clear previously saved data from session
                    Mage::getSingleton('adminhtml/session')->setFormData(false);
                    // check if 'Save and Continue'
                    if ($this->getRequest()->getParam('back')) {
                        $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current'=>true));
                        return;
                    }
                    // go to grid
                    $this->_redirect('*/*/');
                    return;

                } catch (Mage_Core_Exception $e) {
                    $this->_getSession()->addError($e->getMessage());
                }
            catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('cms')->__('An error occurred while saving the article.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('id' => $id ));
            return;
        }
        $this->_redirect('*/*/');
    }


    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('id')) {
            $title = "";
            try {
                // init model and delete
                $model = Mage::getModel('vs7_articles/article');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('cms')->__('The article has been deleted.'));

                $this->_redirect('*/*/');
                return;

            } catch (Exception $e) {

                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }

        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('cms')->__('Unable to find a article to delete.'));

        $this->_redirect('*/*/');
    }




}


