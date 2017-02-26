<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    
        $albums = new Application_Model_DbTable_Albums();
        $this->view->albums = $albums->fetchAll();
    }

    public function addAction()
    {
        $form = new Application_Form_Album();
        $form->submit->setLabel('Agregar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $tipo = $form->getValue('tipo');
                $nodo = $form->getValue('nodo');
                $tp_llt = $form->getValue('tp_llt');
                $tp= $form->getValue('tp');
                $albums = new Application_Model_DbTable_Albums();
                $albums->addAlbum($tipo, $nodo,$tp_llt,$tp);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
            
    }

    public function editAction()
    {
        $form = new Application_Form_Album();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $tipo = $form->getValue('tipo');
                $nodo = $form->getValue('nodo');
                $tp_llt = $form->getValue('tp_llt');
                $tp = $form->getValue('tp');
                $albums = new Application_Model_DbTable_Albums();
                $albums->updateAlbum($id, $tipo,$nodo, $tp_llt,$tp,$antiguedad);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Application_Model_DbTable_Albums();
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
                $albums = new Application_Model_DbTable_Albums();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Application_Model_DbTable_Albums();
            $this->view->album = $albums->getAlbum($id);
        }
    }


            public function seleccionarAction(){
                

}



public function seleccionarhwAction(){
                

}

public function seleccionarhwaxeAction(){
                

}

public function seleccionarnodosbscAction(){
                

}

public function seleccionarnodoshlrAction(){
                

}

public function seleccionarnodosmgwAction(){
                

}

public function seleccionarnodosmscAction(){
                

}
public function seleccionarnodosrncAction(){
                

}

public function seleccionarubicacionAction(){
                

}

public function seleccionarcredencialesAction(){
                

}

}







