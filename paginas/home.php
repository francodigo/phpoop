<?php 

require_once '../main.php';
use OPERACIONES\Operaciones as Operaciones;
$op = new Operaciones('root');
$vuelos = $op->obtenerVuelos();
include_once 'header.php';
?>
<h1>Listado de vuelos</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Aerolínea</th>
            <th>Origen</th>
            <th>Destino</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($vuelos as $vuelo){ ?>
        <tr>
            <td><?php echo $vuelo->id_vuelo; ?></td>
            <td><?php echo $vuelo->aerolinea; ?></td>
            <td><?php echo $vuelo->origen; ?></td>
            <td><?php echo $vuelo->destino; ?></td>
            <td><a href="modificar.php?id_vuelo=<?php echo $vuelo->id_vuelo; ?>">Modificar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php 
include_once 'footer.php';




