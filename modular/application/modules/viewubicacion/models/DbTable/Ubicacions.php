<?php



class Viewubicacion_Model_DbTable_Ubicacions extends Zend_Db_Table_Abstract
{

    protected $_name = 'ubicacion';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addAlbum($nodo,$tipo,$subtipo,$ubicacion,$direccion,$ip,$estado,$oss,$cobertura)
    {
        $data = array(
            'nodo' => $nodo,
            'tipo' => $tipo,
            'subtipo' => $subtipo,
            'ubicacion' => $ubicacion,
            'direccion' => $direccion,
            'ip' => $ip,
            'estado' => $estado,
            'oss' => $oss,
            'cobertura' => $cobertura,
        );
        $this->insert($data);
    }

    public function updateAlbum($id,$nodo,$tipo,$subtipo,$ubicacion,$direccion,$ip,$estado,$oss,$cobertura)
    {
        $data = array(
            'id' =>'id',
            'nodo' => $nodo,
            'tipo' => $tipo,
            'subtipo' => $subtipo,
            'ubicacion' => $ubicacion,
            'direccion' => $direccion,
            'ip' => $ip,
            'estado' => $estado,
            'oss' => $oss,
            'cobertura' => $cobertura,
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

public function getDireccionList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'direccion','value' => 'direccion'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getOssList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'oss','value' => 'oss'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}

public function getcoberturaList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'cobertura','value' => 'cobertura'));

    

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
}

