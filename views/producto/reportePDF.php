<?php
/**
 * Created by PhpStorm.
 * User: naxog
 * Date: 18-12-2017
 * Time: 11:20
 */
?>
<h1 align="center">Lista de Productos</h1>
<table class="table" border="1">
    <thead class="thead-inverse">
    <tr>

        <th>Nombre</th>
        <th>Precio</th>
    </tr>
    </thead>
    <?php
    foreach($productos as $data){
        echo "<tr>";
        echo "<td>".$data['nombre']."</td>";
        echo "<td>"."$".$data['precio']."</td>";
        echo "</tr>";
    }
    ?>
</table>