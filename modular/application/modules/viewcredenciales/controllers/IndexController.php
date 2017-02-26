<?php

class Viewcredenciales_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Viewcredenciales_Model_DbTable_Credencials();
        $this->view->albums = $albums->fetchAll();
    }

    public function addAction()
    {
        $form = new Viewcredenciales_Form_Credencial();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nodo = $form->getValue('nodo');
                $tipo = $form->getValue('tipo');
                $subtipo= $form->getValue('subtipo');
                $ubicacion= $form->getValue('ubicacion');
                $ip= $form->getValue('ip');
                $estado= $form->getValue('estado');
                $usr= $form->getValue('usr');
                $pwd= $form->getValue('pwd');
                $albums = new Viewcredenciales_Model_DbTable_Credencials();
                $albums->addAlbum($nodo,$tipo,$subtipo,$ubicacion,$ip,$estado,$usr,$pwd);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Viewcredenciales_Form_Credencial();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
               $nodo = $form->getValue('nodo');
                $tipo = $form->getValue('tipo');
                $subtipo= $form->getValue('subtipo');
                $ubicacion= $form->getValue('ubicacion');
                $ip= $form->getValue('ip');
                $estado= $form->getValue('estado');
                $usr= $form->getValue('usr');
                $pwd= $form->getValue('pwd');
                $albums = new Viewcredenciales_Model_DbTable_Credencials();
                $albums->updateAlbum($id,$nodo,$tipo,$subtipo,$ubicacion,$ip,$estado,$usr,$pwd);


                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Viewcredenciales_Model_DbTable_Credencials();
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
                $albums = new Viewcredenciales_Model_DbTable_Credencials();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Viewcredenciales_Model_DbTable_Credencials();
            $this->view->album = $albums->getAlbum($id);
        }
    }


}







