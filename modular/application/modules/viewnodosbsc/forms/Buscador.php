<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
<script>
	$.expr[':'].icontains = function(obj, index, meta, stack){
    return (obj.textContent || obj.innerText || jQuery(obj).text() || '').toLowerCase().indexOf(meta[3].toLowerCase()) >= 0;
    };
    $(document).ready(function(){   
        $('#buscador').keyup(function(){
                     buscar = $(this).val();
                     $('#lista tr').removeClass('resaltar');
                            if(jQuery.trim(buscar) != ''){
                               $("#lista tr:icontains('" + buscar + "')").addClass('resaltar');
                            }
            });
    });   
</script>
<?php 

class Application_Form_Buscador extends Zend_Form{
    public function init()
    {
    	$this->setName('buscar');
    	$id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int2');

    	$buscador = new Zend_Form_Element_Text('buscador');
        $buscador->setAttrib('id','buscar');
        $buscador->setLabel('buscador')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty'); 
    



        $submit2 = new Zend_Form_Element_Submit('submit2');
        $submit2->setAttrib('id', 'submit2');}

}