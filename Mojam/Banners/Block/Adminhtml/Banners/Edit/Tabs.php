<?php

class Mojam_Banners_Block_Adminhtml_Banners_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

        public function __construct()
    {
        $helper = Mage::helper('mojambanners');

        parent::__construct();
        $this->setId('news_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($helper->__('News Information'));
    }

    protected function _prepareLayout()
    {
        $helper = Mage::helper('mojambanners');

        $this->addTab('general_section', array(
            'label' => $helper->__('General Information'),
            'title' => $helper->__('General Information'),
            'content' => $this->getLayout()->createBlock('mojambanners/adminhtml_banners_edit_tabs_general')->toHtml(),
        ));
        $this->addTab('custom_section', array(
            'label' => $helper->__('Custom Fields'),
            'title' => $helper->__('Custom Fields'),
            'content' => $this->getLayout()->createBlock('mojambanners/adminhtml_banners_edit_tabs_custom')->toHtml(),
        ));
        return parent::_prepareLayout();
    }

}