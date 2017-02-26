<?php



class Lifeview_Model_DbTable_Lifeview extends Zend_Db_Table_Abstract
{

    protected $_name = 'nodos_llt';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        $row=$this->order('llt DESC');
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addAlbum($tipo, $nodo, $tp_llt, $llt)
    {
        $data = array(
            'tipo' => $tipo,
            'nodo' => $nodo,
            'tp_llt' => $tp_llt,
            'llt' =>$llt,
        );
        $this->insert($data);
    }

    public function updateAlbum($id,$tipo, $nodo, $tp_llt, $llt)
    {
        $data = array(
            'tipo' => $tipo,
            'nodo' => $nodo,
            'tp_llt' => $tp_llt,
            'llt' =>$llt
            
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int)$id);
    }

}

