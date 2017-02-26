<?php

class Lifeview_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Lifeview_Model_DbTable_Lifeview();
        $this->view->albums = $albums->fetchAll($albums->select()->order('id DESC'));
    }

  /*  public function addAction()
    {
        $form = new Lifeview_Form_Lifeviewform();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $tipo = $form->getValue('tipo');
                $nodo = $form->getValue('nodo');
                
               
                $tp_llt = $form->getValue('tp_llt');
                $llt= $form->getValue('llt');
                $albums = new Lifeview_Model_DbTable_Lifeview();
                foreach ($nodo as $nodos) {
                    # code...
                $albums->addAlbum($tipo, $nodos,$tp_llt,$llt);}
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Lifeview_Form_Lifeviewform();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $tipo = $form->getValue('tipo');
                $nodo = $form->getValue('nodo');
                $tp_llt = $form->getValue('tp_llt');
                $llt = $form->getValue('llt');
                $albums = new Lifeview_Model_DbTable_Lifeview();
                foreach ($nodo as $nodos) {
                    # code...
               
                $albums->updateAlbum($id, $tipo,$nodos, $tp_llt,$llt,$antiguedad);}
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Lifeview_Model_DbTable_Lifeview();
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
                $albums = new Lifeview_Model_DbTable_Lifeview();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Lifeview_Model_DbTable_Lifeview();
            $this->view->album = $albums->getAlbum($id);
        }
    } /*/


}







