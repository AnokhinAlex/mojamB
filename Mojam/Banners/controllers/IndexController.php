<?php
/*
class Mojam_Banners_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        echo '<h1>1111111(mysqupercontent)</h1>';
    }

}
*/

/*
class Mojam_Banners_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}
*/


/*
class Mojam_Banners_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $resource = Mage::getSingleton('core/resource');
        $read = $resource->getConnection('core_read');
        $table = $resource->getTableName('mojambanners/table_mojambanners');

        $select = $read->select()
                ->from($table, array('news_id', 'title', 'content', 'created'))
                ->order('created DESC');

        $news = $read->fetchAll($select);
        Mage::register('some', $news);

        $this->loadLayout();
        $this->renderLayout();
    }

}
*/
/*
class Mojam_Banners_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $news = Mage::getModel('mojambanners/banners')->getCollection()->setOrder('created', 'ASC');
        $viewUrl = Mage::getUrl('Banners/index/view');

        echo '<h1>News</h1>';
        foreach ($news as $item) {
            echo '<h2><a href="' . $viewUrl . '?id=' . $item->getId() . '">' . $item->getTitle() . '</a></h2>';
        }
    }

    public function viewAction()
    {
        $newsId = Mage::app()->getRequest()->getParam('id', 0);
        $news = Mage::getModel('mojambanners/banners')->load($newsId);

        if ($news->getId() > 0) {
            echo '<h1>' . $news->getTitle() . '</h1>';
            echo '<div class="content">' . $news->getContent() . '</div>';
        } else {
            $this->_forward('noRoute');
        }
    }

}
*/
class Mojam_Banners_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        
    }

    public function viewAction()
    {
        $newsId = Mage::app()->getRequest()->getParam('id', 0);
        $news = Mage::getModel('mojambanners/banners')->load($newsId);

        if ($news->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('banners.content')->assign(array(
                "newsItem" => $news,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

}
