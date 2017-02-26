<?php

class Ubicacion_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Ubicacion_Model_DbTable_Ubicacions();
        $this->view->albums = $albums->fetchAll($albums->select()->order('id DESC')); 
    }

    public function addAction()
    {
        $form = new Ubicacion_Form_Ubicacion();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nodo = $form->getValue('nodo');
                $tipo = $form->getValue('tipo');
                $subtipo= $form->getValue('subtipo');
                $ubicacion= $form->getValue('ubicacion');
                $direccion= $form->getValue('direccion');
                $ip= $form->getValue('ip');
                $estado= $form->getValue('estado');
                $oss= $form->getValue('oss');
                $cobertura= $form->getValue('cobertura');
                $albums = new Ubicacion_Model_DbTable_Ubicacions();
                $albums->addAlbum($nodo,$tipo,$subtipo,$ubicacion,$direccion,$ip,$estado,$estado,$oss,$cobertura);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Ubicacion_Form_Ubicacion();
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
                $direccion= $form->getValue('direccion');
                $ip= $form->getValue('ip');
                $estado= $form->getValue('estado');
                $oss= $form->getValue('oss');
                $cobertura= $form->getValue('cobertura');
                $albums = new Ubicacion_Model_DbTable_Ubicacions();
                $albums->updateAlbum($id,$nodo,$tipo,$subtipo,$ubicacion,$direccion,$ip,$estado,$estado,$oss,$cobertura);


                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Ubicacion_Model_DbTable_Ubicacions();
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
                $albums = new Ubicacion_Model_DbTable_Ubicacions();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Ubicacion_Model_DbTable_Ubicacions();
            $this->view->album = $albums->getAlbum($id);
        }
    }


}







