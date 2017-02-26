<?php



class Credenciales_Model_DbTable_Credencials extends Zend_Db_Table_Abstract
{

    protected $_name = 'credenciales';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addAlbum($nodo,$tipo,$subtipo,$ubicacion,$ip,$estado,$usr,$pwd)
    {
        $data = array(
            'nodo' => $nodo,
            'tipo' => $tipo,
            'subtipo' => $subtipo,
            'ubicacion' => $ubicacion,
            'ip' => $ip,
            'estado' => $estado,
            'usr' => $usr,
            'pwd' => $pwd,
        );
        $this->insert($data);
    }

    public function updateAlbum($id,$nodo,$tipo,$subtipo,$ubicacion,$ip,$estado,$usr,$pw)
    {
        $data = array(
            'nodo' => $nodo,
            'tipo' => $tipo,
            'subtipo' => $subtipo,
            'ubicacion' => $ubicacion,
            'ip' => $ip,
            'estado' => $estado,
            'usr' => $usr,
            'pwd' => $pwd,
            
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

    public function gettipoList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'tipo','value' => 'tipo'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}


    public function getsubtipoList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'subtipo','value' => 'subtipo'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getUbicacionList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'ubicacion','value' => 'ubicacion'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getEstadoList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'estado','value' => 'estado'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getIpList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'ip','value' => 'ip'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getUsrList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'usr','value' => 'usr'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getPwdList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'pwd','value' => 'pwd'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}
}

