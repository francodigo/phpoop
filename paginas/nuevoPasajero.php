<?php
require_once '../main.php';
$op = new \OPERACIONES\Operaciones('root');
$clases = $op->obtenerClases();
$errorForm = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pasajero = new \ENTITIES\Pasajero();
    if (!empty($_POST['dni']) && !empty($_POST['vuelo']) && !empty($_POST['nombre']) && !empty($_POST['clase'])) {
	$pasajero->documento = \Utils::test_input($_POST['dni']);
	$pasajero->vuelo = \Utils::test_input($_POST['vuelo']);
	$pasajero->nombre = \Utils::test_input($_POST['nombre']);
	$pasajero->clase = \Utils::test_input($_POST['clase']);
	$op->guardarPasajero($pasajero);
    }else{
	$errorForm = "Debe completar todos los campos para continuar";
    }
}

include_once '../paginas/header.php';
?>
<section>
    <form method="post" action="" id="frm_nuevo_pasajero">
	<?php if ($errorForm != '') { ?>
    	<div class="alert alert-danger" role="alert">
    	    <?= $errorForm ?>
    	</div>
	<?php } ?>
    	<input type="hidden" name="vuelo" value="<?= $_GET['vuelo'] ?>" />
    	<div class="form-group col-6">
    	    <label>DNI</label>
    	    <input type="text" id="dni" name="dni" class="form-control" placeholder="Número de Documento" aria-describedby="documentoHelp">
    	    <small id="documentoHelp" class="form-text text-muted">DNI del pasajero</small>   
    	</div>
    	<div class="form-group col-6">
    	    <label>Nombre</label>
    	    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" aria-describedby="nombreHelp">
    	    <small id="nombreHelp" class="form-text text-muted">Nombre del pasajero</small>   
    	</div>
    	<div class="from-group col-6">
    	    <label>Clase</label>
    	    <select name="clase" id="clase" class="form-control">
		    <?php foreach ($clases as $clase) { ?>
			<option value="<?= $clase->id_clase ?>"><?= $clase->descripcion ?></option>
		    <?php } ?>
    	    </select>
    	</div>
    	<br />
    	<button type="button" class="btn btn-primary" id="btn_aceptar_nuevo">Aceptar</button>
        </form>
    </section>
    <?php
    include_once '../paginas/footer.php';
    