<?php

class Viewnodosrnc_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Viewnodosrnc_Model_DbTable_Rncs();
        $this->view->albums = $albums->fetchAll();
    }

    public function addAction()
    {
        $form = new Viewnodosrnc_Form_Rnc();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nodo = $form->getValue('nodo');
                $tp_ltt = $form->getValue('tp_ltt');
                $version= $form->getValue('version');
                $albums = new Viewnodosrnc_Model_DbTable_Rncs();
                $albums->addAlbum($nodo, $tp_ltt,$version);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Viewnodosrnc_Form_Rnc();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $nodo = $form->getValue('nodo');
                $tp_ltt = $form->getValue('tp_ltt');
                $version = $form->getValue('version');
                $albums = new Viewnodosrnc_Model_DbTable_Rncs();
                $albums->updateAlbum($id,$nodo, $tp_ltt,$version);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Viewnodosrnc_Model_DbTable_Rncs();
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
                $albums = new Viewnodosrnc_Model_DbTable_Rncs();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Viewnodosrnc_Model_DbTable_Rncs();
            $this->view->album = $albums->getAlbum($id);
        }
    }


}







