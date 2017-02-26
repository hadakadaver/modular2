<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conexion();

$sql="select * from hw_ccp where subrack LIKE '".$q."%'  or nodo LIKE '".$q."%' or fecha LIKE '".$q."%' or vendorUnitTypeNumber LIKE '".$q."%' or serialNumber LIKE '".$q."%' or unitPosition LIKE '".$q."%' or ProductName LIKE '".$q."%'";
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
    <th>Subrack</th>
    <th>Nodo</th>
    <th>Fecha LLT</th>
    <th>vendortype</th>
    <th>typenumber</th>
    <th>serial</th>
    <th>unitposition</th>
    <th>product</th>

</tr>
<tbody>
<?php while($fila=mysql_fetch_array($res)){ ?>
    <tr role="row" class="odd">
    <td class="sorting_1 clear"><?php  echo $fila['subrack'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['nodo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['fecha'] ?></td>
     <td class="sorting_1 clear"><?php echo $fila['vendorUnitFamilyType'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['vendorUnitTypeNumber'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['serialNumber'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['unitPosition'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['ProductName'] ?></td>
    </tr>
        <?php  

}

}

?>
</tbody></table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2>TODO</h2>