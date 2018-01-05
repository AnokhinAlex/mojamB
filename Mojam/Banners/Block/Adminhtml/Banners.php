<?php
/*
class Mojam_Banners_Block_Adminhtml_Banners extends Mage_Adminhtml_Block_Abstract
{

    public function _toHtml()
    {
        return '<h1>News Module: Admin section</h1>';
    }

}
*/
class Mojam_Banners_Block_Adminhtml_Banners extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('mojambanners');
        $this->_blockGroup = 'mojambanners';
        $this->_controller = 'adminhtml_banners';

        $this->_headerText = $helper->__('News Management');
        $this->_addButtonLabel = $helper->__('Add News');
    }

}