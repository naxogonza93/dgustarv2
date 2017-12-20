<?php
//se recibe variable que viene del controller...
//esa variable se llama 'clientes'
?>
<h1 align="center">Lista de Clientes</h1>
<table class="table" border="1" >
    <thead class="thead-inverse">
    <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>
    </thead>
    <?php
    foreach($clientes as $data){
        echo "<tr>";
        echo "<td>".$data['rut_cliente']."</td>";
        echo "<td>".$data['nombre']."</td>";
        echo "<td>".$data['apellido']."</td>";
        echo "</tr>";
    }
    ?>
</table>