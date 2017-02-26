<?php



class Nodosrnc_Model_DbTable_Rncs extends Zend_Db_Table_Abstract
{

    protected $_name = 'nodos_rnc';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addAlbum($nodo, $tp_ltt, $version)
    {
        $data = array(
            'nodo' => $nodo,
            'tp_ltt' => $tp_ltt,
            'version' => $version
        );
        $this->insert($data);
    }

    public function updateAlbum($id,$nodo, $tp_ltt, $version)
    {
        $data = array(
            'nodo' => $nodo,
            'tp_ltt' => $tp_ltt,
            'version' => $version
            
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int)$id);
    }

    public function getNodoList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'nodo','value' => 'nodo'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

    public function getLttList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'tp_ltt','value' => 'tp_ltt'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}


    public function getVersionList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'version','value' => 'version'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

}

