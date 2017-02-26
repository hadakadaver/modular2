<?php



class Hwccp_Model_DbTable_hws extends Zend_Db_Table_Abstract
{

    protected $_name = 'hw_ccp';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addAlbum($subrack,$nodo,$vendorUnitFamilyType,$vendorUnitTypeNumber,$serialNumber,$unitPosition,$ProductName,$fecha)
    {
        $data = array(
            'subrack' => $subrack,
            'nodo' => $nodo,
            'vendorUnitFamilyType'=>$vendorUnitFamilyType,
            'vendorUnitTypeNumber'=>$vendorUnitTypeNumber,
            'serialNumber'=>$serialNumber,
            'unitPosition'=>$unitPosition,
            'ProductName'=>$ProductName,
            'fecha' => $fecha
        );
        $this->insert($data);
    }

    public function updateAlbum($id,$subrack,$nodo,$vendorUnitFamilyType,$vendorUnitTypeNumber,$serialNumber,$unitPosition,$ProductName,$fecha)
    {
        $data = array(
            'subrack' => $subrack,
            'nodo' => $nodo,
            'vendorUnitFamilyType'=>$vendorUnitFamilyType,
            'vendorUnitTypeNumber'=>$vendorUnitTypeNumber,
            'serialNumber'=>$serialNumber,
            'unitPosition'=>$unitPosition,
            'ProductName'=>$ProductName,
            'fecha' => $fecha
            
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int)$id);
    }


    public function getAlbumList()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'nodo','value' => 'nodo'));

    

    $result = $this->getAdapter()->fetchAll($select);

    return $result;

}


    public function getSubrackList()

    {

    $select  = $this->_db->select()

    ->from($this->_name,

    array('key' => 'subrack','value' => 'subrack'));

    

    $result1 = $this->getAdapter()->fetchAll($select);

    return $result1;

}


    public function getTypenumber()

    {

    $select3  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'vendorUnitTypeNumber','value' => 'vendorUnitTypeNumber'));

    

    $result2 = $this->getAdapter()->fetchAll($select3);

    return $result2;

}


  public function getVendorType()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'vendorUnitFamilyType','value' => 'vendorUnitFamilyType'));

    

    $result3 = $this->getAdapter()->fetchAll($select);

    return $result3;

}

public function getSerialNumber()

    {

    $select  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'serialNumber','value' => 'serialNumber'));

    

    $result4 = $this->getAdapter()->fetchAll($select);

    return $result4;

}

public function getPosition()

    {

    $select5  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'unitPosition','value' => 'unitPosition'));

    

    $result4 = $this->getAdapter()->fetchAll($select5);

    return $result4;

}




public function getManufacturer()

    {

    $select7  = $this->_db->select()

    ->distinct()
    ->from($this->_name,

    array('key' => 'ProductName','value' => 'ProductName'));

    

    $result6 = $this->getAdapter()->fetchAll($select7);

    return $result6;

}
}

