<?php

class Mojam_Banners_Block_Adminhtml_Banners_Edit_Tabs_General extends Mage_Adminhtml_Block_Widget_Form
{

     protected function _prepareForm()
    {

        $helper = Mage::helper('mojambanners');
        $model = Mage::registry('current_mybanners');


        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('general_form', array(
                    'legend' => $helper->__('General Information')
                ));

        $fieldset->addField('title', 'text', array(
            'label' => $helper->__('Title'),
            'required' => true,
            'name' => 'title',
        ));

        $fieldset->addField('content', 'editor', array(
            'label' => $helper->__('Content'),
            'required' => true,
            'name' => 'content',
        ));

        $fieldset->addField('created', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'label' => $helper->__('Created'),
            'name' => 'created'
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}