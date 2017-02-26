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

class Viewnodosbsc_Form_Bsc extends Zend_Form
{
    public function init()
    {
        $this->setName('nodos_bsc');

       

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');


     

          $this->setMethod('post');

          

          $selecthw = new Viewnodosbsc_Model_DbTable_Bscs();

          $hw_list = $selecthw->getNodoList();

          $nodo = new Zend_Form_Element_Select('nodo');

          $nodo ->setLabel('Nodo:')

            ->addMultiOptions($hw_list);


          $ltt_list = $selecthw->getLttList();

          $tp_ltt = new Zend_Form_Element_Select('tp_ltt');

          $tp_ltt ->setLabel('tp_ltt:')
                ->setRequired(true)->addValidator('NotEmpty', true)
                ->addMultiOptions( $ltt_list);




          $version_list = $selecthw->getVersionList();

          $version = new Zend_Form_Element_Select('version');

          $version ->setLabel('Version:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $version_list);

      

          
         $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
      

        $this->addElements(array($id,$nodo,$tp_ltt,$version,$submit));
    }
}