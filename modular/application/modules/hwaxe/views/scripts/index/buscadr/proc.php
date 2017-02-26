<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conexion();

$sql="select * from hw_axe where Board LIKE '".$q."%'  or nodo LIKE '".$q."%' or fecha LIKE '".$q."%' or Position LIKE '".$q."%' or ManufacturedDate LIKE '".$q."%'  or ProductName LIKE '".$q."%' or ProductNumber LIKE '".$q."%' or SerialNumber LIKE '".$q."%'";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

echo '<b>No hay sugerencias</b>';

}else{

echo '<b>Sugerencias:</b><br />';

while($fila=mysql_fetch_array($res)){ ?>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
<thead>
<tr role="row" class="odd">
    <th>Board</th>
    <th>Nodo</th>
    <th>Fecha LLT</th>
    <th>Position</th>
    <th>Manufacturade</th>
    <th>Productname</th>
    <th>Productnumber</th>
    <th>Serialnumber</th>
</tr>
</thead>
<tbody>
    <tr role="row" class="odd">
    <td class="sorting_1 clear"><?php  echo $fila['Board'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['nodo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['fecha'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['Position'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['ManufacturedDate'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['ProductName'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['ProductNumber'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['SerialNumber'] ?></td>

    </tr></tbody></table>
        <?php  

}

}

?>
