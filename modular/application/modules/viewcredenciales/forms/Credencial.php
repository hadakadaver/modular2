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

class Viewcredenciales_Form_Credencial extends Zend_Form
{
    public function init()
    {
        $this->setName('credenciales');

       

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');


     

          $this->setMethod('post');

          

          $selecthw = new Viewcredenciales_Model_DbTable_Credencials();

          $nodo_list = $selecthw->getNodoList();

          $nodo = new Zend_Form_Element_Select('nodo');

          $nodo ->setLabel('Nodo:')

            ->addMultiOptions($nodo_list);


          $tipo_list = $selecthw->gettipoList();

          $tipo = new Zend_Form_Element_Select('tipo');

          $tipo ->setLabel('tipo:')
                ->setRequired(true)->addValidator('NotEmpty', true)
                ->addMultiOptions( $tipo_list);


         $subtipo_list = $selecthw->getsubtipoList();

          $subtipo = new Zend_Form_Element_Select('subtipo');

          $subtipo ->setLabel('Subtipo:')
                ->setRequired(true)->addValidator('NotEmpty', true)
                ->addMultiOptions( $subtipo_list);



          $ubicacion_list = $selecthw->getUbicacionList();

          $ubicacion = new Zend_Form_Element_Select('ubicacion');

          $ubicacion ->setLabel('Version:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $ubicacion_list);


          $estado_list = $selecthw->getEstadoList();

          $estado = new Zend_Form_Element_Select('estado');

          $estado ->setLabel('Estado:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $estado_list);

          $ip_list = $selecthw->getipList();

          $ip = new Zend_Form_Element_Select('ip');

          $ip ->setLabel('Ip:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $ip_list);


           $usr_list = $selecthw->getUsrList();

          $usr = new Zend_Form_Element_Select('usr');

          $usr ->setLabel('Ip:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $usr_list);

          $pwd_list = $selecthw->getPwdList();

          $pwd = new Zend_Form_Element_Select('pwd');

          $pwd->setLabel('pwd:')
                    ->setRequired(true)->addValidator('NotEmpty', true)
                    ->addMultiOptions( $pwd_list);


      

          
         $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
      

        $this->addElements(array($id,$nodo,$tipo,$subtipo,$ubicacion,$ip,$estado,$usr,$pwd,$submit));
    }
}