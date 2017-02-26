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

class Hwccp_Form_hw extends Zend_Form
{
    public function init()
    {
        $this->setName('hw');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');


         $hwTb= new Hwccp_Model_DbTable_hws();

          $this->setMethod('post');

          

          $selecthw = new Hwccp_Model_DbTable_hws();

          $hw_list = $selecthw->getAlbumList();

          $nodo = new Zend_Form_Element_Select('nodo');

          $nodo ->setLabel('Nodo:')

            ->addMultiOptions( $hw_list);

//otro
            $selectsr = new Hwccp_Model_DbTable_hws();

          $subrack_list = $selectsr->getSubrackList();

          $subrack = new Zend_Form_Element_Select('subrack');

          $subrack ->setLabel('Subtrack:')

            ->addMultiOptions($subrack_list);

//otro 
            $typenumber_list = $selecthw->getTypenumber();

          $vendorUnitTypeNumber = new Zend_Form_Element_Select('vendorUnitTypeNumber');

          $vendorUnitTypeNumber ->setLabel('TypeNumber:')

            ->addMultiOptions( $typenumber_list);
            
            
//otro

            $vendortype_list = $selecthw->getVendorType();

          $vendorUnitFamilyType = new Zend_Form_Element_Select('vendorUnitFamilyType');

          $vendorUnitFamilyType ->setLabel('Vendortype:')

            ->addMultiOptions( $vendortype_list);
//otro

            $serialNumber_list = $selecthw->getSerialNumber();

          $serialNumber = new Zend_Form_Element_Select('serialNumber');

          $serialNumber ->setLabel('serialNumber:')

            ->addMultiOptions( $serialNumber_list);
       

 //OTRO      

         $unitposition_list = $selecthw->getPosition();

          $unitposition = new Zend_Form_Element_Select('unitPosition');

          $unitposition ->setLabel('unitposition:')
           ->setRequired(true)->addValidator('NotEmpty', true)

            ->addMultiOptions( $unitposition_list);


        //manufacturerdata

            $ProductName_list = $selecthw->getManufacturer();

          $ProductName = new Zend_Form_Element_Select('ProductName');

          $ProductName ->setLabel('ProductName:')
           ->setRequired(true)->addValidator('NotEmpty', true)

            ->addMultiOptions( $ProductName_list);

            

        $fecha = new Zend_Form_Element_Text('fecha');
        $fecha->setAttrib('id','datepicker');
        $fecha->setLabel('fecha')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('Date', false, array('yy-mm-dd')); 

     


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id,$subrack,$nodo,$vendorUnitTypeNumber,$vendorUnitFamilyType,$serialNumber,$unitposition,$ProductName,$fecha, $submit));
    }
}