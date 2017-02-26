<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function () {
    $.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        firstDay: 1
    }).datepicker("setDate", new Date(fecha1));

 });


//$("#imprimir").html('Hola ' + diferencia);
  </script>
  <style>

  form{
    margin-left:5%;
  }
  h1{
    color:#0000FF;
    margin-left:5%;
  }
    
  h2{

    color:#0000FF;
    font-size:15;
    font-weight: 10;
    

  }



  </style>
  <?php

class Hwaxe_Form_Hwaxeform extends Zend_Form
{
    public function init()
    {
        $this->setName('hw_axe');

         $hwTb= new Hwaxe_Model_DbTable_hwaxe();

          $this->setMethod('post');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        

     

          $hw_list = $selecthw->getAlbumList();
          $Board = new Zend_Form_Element_Select('Board');

          $Board ->setLabel('Board:')
                 ->setRequired(true)->addValidator('NotEmpty', true);
                 ->addMultiOptions( $hw_list);

        $selecthw = new Hwaxe_Model_DbTable_hwaxe();

          $nodo_list = $selecthw->getNodoList();

          $nodo = new Zend_Form_Element_Select('nodo');

          $nodo ->setLabel('Nodo:')
                ->setRequired(true)->addValidator('NotEmpty', true)
                ->addMultiOptions( $nodo_list);



      

        $fecha = new Zend_Form_Element_Text('fecha');
        $fecha->setAttrib('id','datepicker');
        $fecha->setLabel('fecha')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('Date', false, array('yy-mm-dd')); 



          $position_list = $selecthw->getPositionList();

          $position = new Zend_Form_Element_Select('position');

          $position ->setLabel('Position:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $position_list);

      

          $type_list = $selecthw->getTypeList();

          $type = new Zend_Form_Element_Select('type');

          $type ->setLabel('Type:')
                ->setRequired(true)->addValidator('NotEmpty', true)
                ->addMultiOptions( $type_list);

        

          $manufacturade_list = $selecthw->getPositionList();

          $ManufacturedDate = new Zend_Form_Element_Select('ManufacturedDate');

          $ManufacturedDate ->setLabel('ManufacturedDate:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $manufacturade_list);

      

          $productname_list = $selecthw->getPositionList();

          $ProductName = new Zend_Form_Element_Select('ProductName');

          $ProductName ->setLabel('ProductName:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $productname_list);

          $ProductNumber_list = $selecthw->getPositionList();

          $ProductNumber = new Zend_Form_Element_Select('ProductNumber');

          $ProductNumber ->setLabel('Productnumber:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $productnumber_list);

        $ProductNumber = new Zend_Form_Element_Select('ProductNumber');
        $ProductNumber->setLabel('ProductNumber')
              ->setMultiOptions(array('anb06'=>'ANB06', 'cob02'=>'COB02','chb01'=>'CHB01', 'cob03'=>'COB03', 'cob04'=>'COB04', 'cpb02'=>'CPB02','cub01'=>'CUB01','cyb02'=>'CYB02','ipb01'=>'IPB01','iqb03'=>'IQB03','lsb03'=>'LSB03','pab02'=>'PAB02','pmb03'=>'PMB03','pmb04'=>'PMB04','rab03'=>'RAB03','sab08'=>'SAB08','sab09'=>'SAB09','sab10'=>'SAB10','sab11'=>'SAB11','sab12'=>'SAB12'))
              ->setRequired(true)->addValidator('NotEmpty', true); 

         $SerialNumber = new Zend_Form_Element_Select('SerialNumber');
        $SerialNumber->setLabel('SerialNumber')
              ->setMultiOptions(array('anb06'=>'ANB06', 'cob02'=>'COB02','chb01'=>'CHB01', 'cob03'=>'COB03', 'cob04'=>'COB04', 'cpb02'=>'CPB02','cub01'=>'CUB01','cyb02'=>'CYB02','ipb01'=>'IPB01','iqb03'=>'IQB03','lsb03'=>'LSB03','pab02'=>'PAB02','pmb03'=>'PMB03','pmb04'=>'PMB04','rab03'=>'RAB03','sab08'=>'SAB08','sab09'=>'SAB09','sab10'=>'SAB10','sab11'=>'SAB11','sab12'=>'SAB12'))
              ->setRequired(true)->addValidator('NotEmpty', true); 




        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id,$Board,$nodo,$fecha,$Position,$Type,$ManufacturedDate,$ProductBame,$ProductNumber,$SerialNumber, $submit));
    }
}