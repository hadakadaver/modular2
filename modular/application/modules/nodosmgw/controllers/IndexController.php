<?php

class Nodosmgw_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Nodosmgw_Model_DbTable_Mgws();
        $this->view->albums = $albums->fetchAll($albums->select()->order('id DESC')); 
    }

    public function addAction()
    {
        $form = new Nodosmgw_Form_Mgw();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nodo = $form->getValue('nodo');
                $tp_ltt = $form->getValue('tp_ltt');
                $version= $form->getValue('version');
                $albums = new Nodosmgw_Model_DbTable_Mgws();
                $albums->addAlbum($nodo, $tp_ltt,$version);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Nodosmgw_Form_Mgw();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $nodo = $form->getValue('nodo');
                $tp_ltt = $form->getValue('tp_ltt');
                $version = $form->getValue('version');
                $albums = new Nodosmgw_Model_DbTable_Mgws();
                $albums->updateAlbum($id,$nodo, $tp_ltt,$version);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Nodosmgw_Model_DbTable_Mgws();
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
                $albums = new Nodosmgw_Model_DbTable_Mgws();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Nodosmgw_Model_DbTable_Mgws();
            $this->view->album = $albums->getAlbum($id);
        }
    }


}







