<?php

class Hwaxe_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Hwaxe_Model_DbTable_Hwaxe();
        $this->view->albums = $albums->fetchAll($albums->select()->order('id DESC')); 
    }

    public function addAction()
    {
        $form = new Hwaxe_Form_Hwaxeform();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $board = $form->getValue('Board');
                $nodo = $form->getValue('nodo');
                $fecha = $form->getValue('fecha');
                $Position= $form->getValue('Position');
                $Type= $form->getValue('Type');
                $ManufacturedDate= $form->getValue('ManufacturedDate');
                $ProductName= $form->getValue('ProductName');
                $ProductNumber= $form->getValue('ProductNumber');
                $SerialNumber= $form->getValue('SerialNumber');
                $albums = new Hwaxe_Model_DbTable_Hwaxe();
                $albums->addAlbum($Board,$nodo,$fecha,$Position,$Type,$ManufacturedDate,$Productname,$Productnumber,$Serialnumber);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Hwaxe_Form_Hwaxeform();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $Board = $form->getValue('Board');
                $nodo = $form->getValue('nodo');
                $fecha = $form->getValue('fecha');
                $Position= $form->getValue('Position');
                $Type= $form->getValue('Type');
                $ManufacturedDate= $form->getValue('ManufacturedDate');
                $ProductName= $form->getValue('ProductName');
                $ProductNumber= $form->getValue('ProductNumber');
                $SerialNumber= $form->getValue('SerialNumber');
                $albums = new Application_Model_DbTable_Hwaxe();
                $albums->updateAlbum($id, $Board,$nodo,$fecha,$Position,$Type,$ManufacturedDate,$ProductName,$ProductNumber,$SerialNumber);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Hwaxe_Model_DbTable_Hwaxe();
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
                $albums = new Hwaxe_Model_DbTable_Hwaxe();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Hwaxe_Model_DbTable_Hwaxe();
            $this->view->album = $albums->getAlbum($id);
        }
    }


}







