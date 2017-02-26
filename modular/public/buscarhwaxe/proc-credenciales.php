<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conexion();

$sql="select * from credenciales where nodo LIKE '".$q."%'  or tipo LIKE '".$q."%' or subtipo LIKE '".$q."%'  or ubicacion LIKE '".$q."%'  or ip LIKE '".$q."%'  or estado LIKE '".$q."%'  or usr LIKE '".$q."%'  or pwd LIKE '".$q."%'";
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
    <th>NODO</th>
    <th>TIPO</th>
    <th>SUBTIPO</th>
    <th>UBICACION</th>
    <th>IP</th>
    <th>ESTADO</th>
    <th>USER</th>
    <th>PASSWORD</th>
    <th>OPERACION</th>
    

</tr>
<tbody>
<?php while($fila=mysql_fetch_array($res)){ ?>
    <tr role="row" class="odd">
    <td class="sorting_1 clear"><?php  echo $fila['nodo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['tipo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['subtipo'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['ubicacion'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['ip'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['estado'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['usr'] ?></td>
    <td class="sorting_1 clear"><?php  echo $fila['pwd'] ?></td>


    </tr>
        <?php  

}

}

?>
</tbody></table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2>TODO</h2>