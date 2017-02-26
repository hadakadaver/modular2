<?php

class Hwccp_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Hwccp_Model_DbTable_hws();
        $this->view->albums = $albums->fetchAll();
    }

    public function addAction()
    {
        $form = new Hwccp_Form_hw();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $subrack = $form->getValue('subrack');
                $nodo = $form->getValue('nodo');
                $vendorUnitFamilyType = $form->getValue('vendorUnitFamilyType');
                $vendorUnitTypeNumber = $form->getValue('vendorUnitTypeNumber');
                $serialNumber = $form->getValue('serialNumber');
                $unitPosition = $form->getValue('unitPosition');
                $ProductName = $form->getValue('ProductName');
                $fecha = $form->getValue('fecha');
                $albums = new Hwccp_Model_DbTable_hws();
                $albums->addAlbum($subrack,$nodo,$vendorUnitFamilyType,$vendorUnitTypeNumber,$serialNumber,$unitPosition,$ProductName,$fecha);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Hwccp_Form_hw();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $subrack = $form->getValue('subrack');
                $nodo = $form->getValue('nodo');
                $vendorUnitFamilyType = $form->getValue('vendorUnitFamilyType');
                $vendorUnitTypeNumber = $form->getValue('vendorUnitTypeNumber');
                $serialNumber = $form->getValue('serialNumber');
                $unitPosition = $form->getValue('unitPosition');
                $ProductName = $form->getValue('ProductName');
                $fecha = $form->getValue('fecha');
                $albums = new Hwccp_Model_DbTable_hws();
                $albums->updateAlbum($id, $subrack,$nodo,$vendorUnitFamilyType,$vendorUnitTypeNumber,$serialNumber,$unitPosition,$ProductName,$fecha);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Hwccp_Model_DbTable_hws();
                $form->populate($albums->getAlbum($id));
            }
        }
        
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $albums = new Hwccp_Model_DbTable_hws();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Hwccp_Model_DbTable_hws();
            $this->view->album = $albums->getAlbum($id);
        }
    }


}







