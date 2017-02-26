<?php



class Hwaxe_Model_DbTable_hwaxe extends Zend_Db_Table_Abstract
{

    protected $_name = 'hw_axe';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);

        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addAlbum($Board,$Nodo,$fecha,$Position,$Type,$ManufacturedDate,$ProductName,$ProductNumber,$SerialNumber)
    {
        $data = array(
            'Board' => $Board,
            'nodo' => $nodo,
            'fecha' => $fecha,
            'Type' =>$Type,
            'Position' =>$Position,
            'ManufacturedDate'=>$ManufacturedDate,
            'ProductName'=>$Productname,
            'ProductNumber'=>$ProductNumber,
            'SerialNumber'=>$SerialNumber
        );
        $this->insert($data);
    }

    public function updateAlbum($id,$Board,$Nodo,$fecha,$Position,$Type,$ManufacturedDate,$ProductName,$ProductNumber,$SerialNumber)
    {
        $data = array(
            'Board' => $Board,
            'nodo' => $nodo,
            'fecha' => $fecha,
            'Type' =>$Type,
            'Position' =>$Position,
            'ManufacturedDate'=>$ManufacturedDate,
            'ProductName'=>$ProductName,
            'ProductNumber'=>$ProductNumber,
            'SerialNumber'=>$SerialNumber
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int)$id);
    }

}

