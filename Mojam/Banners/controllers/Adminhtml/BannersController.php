<?php
/*
class Mojam_Banners_Adminhtml_BannersController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        echo '<h1>News Module: Admin section</h1>';
    }

}
*/



class Mojam_Banners_Adminhtml_BannersController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('mojambanners');
        $this->_addContent($this->getLayout()->createBlock('mojambanners/adminhtml_banners'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }
/*
    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_mybanners', Mage::getModel('mojambanners/banners')->load($id));

        $this->loadLayout()->_setActiveMenu('mojambanners');
        $this->_addContent($this->getLayout()->createBlock('mojambanners/adminhtml_banners_edit'));
        $this->renderLayout();
    }
*/
    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $model = Mage::getModel('mojambanners/banners');

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $model->setData($data)->setId($id);
        } else {
            $model->load($id);
        }
        Mage::register('current_mybanners', $model);

        $this->loadLayout()->_setActiveMenu('mojambanners');
        $this->_addLeft($this->getLayout()->createBlock('mojambanners/adminhtml_banners_edit_tabs'));
        $this->_addContent($this->getLayout()->createBlock('mojambanners/adminhtml_banners_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('mojambanners/banners');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('mojambanners/banners')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

     public function massDeleteAction()
    {
        $news = $this->getRequest()->getParam('news', null);

        if (is_array($news) && sizeof($news) > 0) {
            try {
                foreach ($news as $id) {
                    Mage::getModel('mojambanners/banners')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d news have been deleted', sizeof($news)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select news'));
        }
        $this->_redirect('*/*');
    }

 

}