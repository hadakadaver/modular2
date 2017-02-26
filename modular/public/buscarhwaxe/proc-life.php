<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conexion();

$sql="select * from nodos_llt where nodo LIKE '".$q."%'  or nodo LIKE '".$q."%' or tipo LIKE '".$q."%' or llt LIKE '".$q."%' or tp_llt LIKE '".$q."%' ";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

echo '<b>No hay sugerencias</b>';

}else{

echo '<b>Sugerencias:</b><br />';

 ?>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">

<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
<tr role="row" class="odd">
    <th>Tipo</th>
    <th>Nodo</th>
    <th>Fecha LLT</th>
    <th>TP</th>
    <th>Antiguedad</th>
 
</tr>
<tbody>
<?php while($fila=mysql_fetch_array($res)){ ?>
    <tr role="row" class="odd">
    <td class="sorting_1 clear"><?php  echo $fila['nodo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['tipo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['llt'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['tp_llt'] ?></td>
     <td class="sorting_1 clear"><?php
     //AQUI SE CALCULA LA ANTIGUEDAD
    $fechadb=$fila['llt']; $fechahoy=date('Y-m-d');
    $dias = strtotime($fechahoy)-strtotime($fechadb);  
    $diferencia = intval($dias/86400);  
    echo $diferencia;   ?> </td>

    </tr>
        <?php  

}

}

?>
</tbody></table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2>TODO</h2>