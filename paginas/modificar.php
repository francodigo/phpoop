<?php
require_once '../main.php';

use OPERACIONES\Operaciones as Operaciones;

$mensaje = "";
if(isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}
//use ENTITIES\Ciudad as Ciudad;

$id = $_GET['id_vuelo'];
$op = new Operaciones('root');
$vuelo = $op->obtenerVueloXId($id);
$ciudades = $op->obtenerCiudades();
$pasajeros = $op->obtenerPasajeros($id);
include_once '../paginas/header.php';
?>

<section>
    <h1>Modificar Vuelo</h1>
    <form>
	<input type="hidden" name="vuelo" id="vuelo" value="<?php echo $id; ?>" />
	<div class="form-group col-6">
	    <label>Aerolínea</label>
	    <input type="text" class="form-control" aria-describedby="aerolineaHelp" id="aerolinea" placeholder="Aerolínea" value="<?= $vuelo->aerolinea ?>" />
	    <small id="aerolineaHelp" class="form-text text-muted">Línea Aérea que llevará a cabo el vuelo</small>
	</div>
	<div class="form-group col-6">
	    <label>Origen</label>
	    <select class="form-control" id="origen" name="origen">
		<?php foreach ($ciudades as $ciudad) { ?>
    		<option value="<?php echo $ciudad->id_ciudad; ?>" <?php echo ($vuelo->origen == $ciudad->descripcion) ? 'selected' : ''; ?>><?= utf8_encode($ciudad->descripcion) ?></option>
		<?php } ?>
	    </select>
	</div>
	<div class="form-group col-6">
	    <label>Destino</label>
	    <select class="form-control" id="destino" name="destino">
		<?php foreach ($ciudades as $ciudad) { ?>
    		<option value="<?php echo $ciudad->id_ciudad; ?>" <?php echo ($vuelo->destino == $ciudad->descripcion) ? 'selected' : ''; ?>><?= utf8_encode($ciudad->descripcion) ?></option>
		<?php } ?>
	    </select>
	</div>
    </form>
    <?php if($mensaje != ""){ ?>
    <div class="alert alert-success" role="alert">
	<?= $mensaje ?>
    </div>
    <?php } ?>
    <div class="row" style="padding-bottom: 1%;padding-top: 2%;">
	<h4 class="col">Listado de Pasajeros</h4>
	<button type="button" id="btn_nuevo" class=" float-right btn btn-primary btn-lg" style="margin-right: 6%;">Agregar Pasajero</button>
    </div>

    <table class="table table-sm  table-hover table-dark">
	<thead>
	    <tr>
		<th scope="col">Documento</th>
		<th scope="col">Nombre</th>
		<th scope="col">Clase</th>
		<th scope="col"></th>
	    </tr>
	</thead>
	<tbody>
	    <?php foreach ($pasajeros as $pasajero) { ?>
    	    <tr>
    		<th scope="row"><?= $pasajero->documento ?></th>
    		<td><?= $pasajero->nombre; ?></td>
    		<td><?= $pasajero->clase ?></td>
    	    </tr>
	    <?php } ?>
	</tbody>
    </table>
</section>
<?php
include_once '../paginas/footer.php';

