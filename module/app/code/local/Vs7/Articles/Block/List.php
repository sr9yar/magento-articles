<?php

class Vs7_Articles_Block_List extends Mage_Core_Block_Template
{

  public function getTitle()
  {
      return [
        'heading' => 'List of articles',
        ];
  }

  public function getList()
  {

    $articleCollection = Mage::getSingleton('vs7_articles/article')
        ->getCollection()
        ->setOrder('id','asc');

      return [
        'data' => $articleCollection,
        ];

  }


  public function getSingle($id)
  {

    $item = Mage::getSingleton('vs7_articles/article')
    ->getCollection()
        ->getItemById($id);
      return ['data'=>[$item]];

  }

  public function checkArticleId() {

      // Mage::app()->getRequest()->getParam('store')
      $params = $this->getRequest()->getParams();
      foreach ($params as $key => $value) 
      {
          if($key == 'article_id')
          {
              return !!$value ? $value : null;
          }
      }

      return null;

  }



}


