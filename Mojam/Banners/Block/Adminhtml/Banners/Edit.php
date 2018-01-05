<?php

class Mojam_Banners_Block_Adminhtml_Banners_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'mojambanners';
        $this->_controller = 'adminhtml_banners';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('mojambanners');
        $model = Mage::registry('current_mybanners');

        if ($model->getId()) {
            return $helper->__("Edit News item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add News item");
        }
    }

}