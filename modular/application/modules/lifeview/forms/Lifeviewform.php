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

class Lifeview_Form_Lifeviewform extends Zend_Form
{
    public function init()
    {
        $this->setName('album');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $tipo = new Zend_Form_Element_Select('tipo');
        $tipo->setLabel('Tipo')
              ->setMultiOptions(array('bsc'=>'bsc', 'otro'=>'otro'))
              ->setRequired(true)->addValidator('NotEmpty', true);


        $nodo = new Zend_Form_Element_Multicheckbox('nodo');
        $nodo->setLabel('Nodo')
              ->setMultiOptions(array('anb06'=>'ANB06', 'cob02'=>'COB02','chb01'=>'CHB01', 'cob03'=>'COB03', 'cob04'=>'COB04', 'cpb02'=>'CPB02','cub01'=>'CUB01','cyb02'=>'CYB02','ipb01'=>'IPB01','iqb03'=>'IQB03','lsb03'=>'LSB03','pab02'=>'PAB02','pmb03'=>'PMB03','pmb04'=>'PMB04','rab03'=>'RAB03','sab08'=>'SAB08','sab09'=>'SAB09','sab10'=>'SAB10','sab11'=>'SAB11','sab12'=>'SAB12'))
              ->setRequired(true)->addValidator('NotEmpty', true);


      

        $llt = new Zend_Form_Element_Text('llt');
        $llt->setAttrib('id','datepicker');
        $llt->setLabel(' Fecha llt')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('Date', false, array('yy-mm-dd')); 

        $tp_llt = new Zend_Form_Element_Text('tp_llt');
        $tp_llt->setLabel('TP')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');



        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id,$tipo,$nodo,$tp_llt, $llt, $submit));
    }
}