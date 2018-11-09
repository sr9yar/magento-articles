<?php
class Vs7_Articles_Block_Adminhtml_Article extends Mage_Adminhtml_Block_Widget_Grid_Container
{

        public function __construct()
        {
                parent::__construct();
                $this->_controller = 'adminhtml_article';
                $this->_blockGroup = 'vs7_articles';
                $this->_headerText = Mage::helper('vs7_articles')->__('Article Manager');
                $this->_addButtonLabel = Mage::helper('vs7_articles')->__('Add Article');


                

        } 

       protected function _prepareLayout()
       {

          $this->setChild('grid',
          $this->getLayout()
                        ->createBlock( 'vs7_articles/adminhtml_article_grid',    $this->_controller . '.grid')  
                        );
          return parent::_prepareLayout();
       }
}









//
// <?php
// class Vs7_Articles_Block_Adminhtml_Article extends Mage_Adminhtml_Block_Widget_Grid_Container
// 
// {
//     protected function _construct()
//     {
//         // parent::_construct();
//         
//         /**
//          * The $_blockGroup property tells Magento which alias to use to
//          * locate the blocks to be displayed within this grid container.
//          * In our example this corresponds to Articles/Block/Adminhtml.
//          */
// 
//         // The blockGroup must match the first half of how we call the block, and controller matches the second half
//         // ie. foo_bar/adminhtml_baz
// 
//         $this->_blockGroup = 'vs7_articles';
//         
//         /**
//          * $_controller is a bit of a confusing name for this property. This 
//          * value in fact refers to the folder containing our Grid.php and 
//          * Edit.php. In our example, Articles/Block/Adminhtml/Article, 
//          * so we use 'article'.
//          */
//         $this->_controller = 'adminhtml_article';
//         
//         /**
//          * The title of the page in the admin panel.
//          */
//         // $this->_headerText = Mage::helper('vs7_articles')
//         //     ->__('Articles');
//         $this->_headerText = $this->__('Baz');
//         parent::__construct();
//     }
//     
//     public function getCreateUrl()
//     {
//         /**
//          * When the Add button is clicked, this is where the user should
//          * be redirected to. In our example, the method editAction of 
//          * ArticleController.php in Articles module.
//          */
//         return $this->getUrl(
//             'vs7_articles_admin/article/edit'
//         );
//     }
// }