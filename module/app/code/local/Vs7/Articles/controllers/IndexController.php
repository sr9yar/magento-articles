<?php

class Vs7_Articles_IndexController extends Mage_Core_Controller_Front_Action
{

     
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function testAction()
    {

        $collection = Mage::getModel('vs7_articles/article')
            ->getCollection()
            ->setOrder('id','asc');


            foreach($collection as $data)
            {

            $ret .= $data->getData('title').'<br />';

            }
            echo $ret;

       // phpinfo();

        //echo 'gg ';
        // $this->loadLayout();
        // $this->renderLayout();
    }




}