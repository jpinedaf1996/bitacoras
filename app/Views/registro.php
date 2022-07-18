<?= $this->extend('template/layout') ?>
<?= $this->section('tittle') ?>
Registro
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="main-container">
	<h2>Registro de bitacora : <?php echo session("user")?></h2>
	<br>
	<div class="row">
		<div class="col-md-3">
			<form name="bitacora-form" id="bitacora-form">
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Fecha</span>
					<input required name="fecha" id="fecha" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control " aria-label="date" aria-describedby="basic-addon1">
				</div>
		</div>
		<div class="col-md-3">
		<div class="input-group mb-3">
		<span class="input-group-text" id="basic-addon1">Turno</span>
		<select required name="turno" id="turno" class="form-select disabled" aria-label="Default select example">
		<option  value="A">Turno A</option>
		<option  value="B">Turno B</option>
		<option  value="C">Turno C (Noche)</option>
		<option  value="D">Turno D (Noche)</option>
		<option  value="E">Turno E (Noche)</option>
		<option  value="F">Turno F</option>
		</select>  
		</div>
		</div>
		<div class="col-md-3">
		<div class="input-group mb-3">
		<span class="input-group-text" id="basic-addon1">Pais</span>
		<select required name="pais" id="pais" class="form-select" aria-label="Default select example">
		</select>  
		</div>
		</div>
		<div class="col-md-3">
		<div class="input-group mb-3">
		<button type="submit" class="btn  btn-primary" id="btn-form-bit" ><i class="fa-solid fa-plus"></i></button>
		</form> 
		<button style="margin-left:10px;" onClick="send()" class="btn btn-success" alt="Guardar" ><i class="fa-solid fa-floppy-disk"></i> </button>
		<button style="margin-left:10px;" onClick="cancel()" class="btn btn-danger "  ><i class="fa-solid fa-rectangle-xmark"></i> </button>
		</div>
		</div>
	</div>
	<br>
	<div id="content-detalle" class="d-none">
		<div class="input-group mb-3">
			<button id="ocultar-menu" onClick="toggleForm()" class="btn btn-sm btn-totggle btn-secondary "><i class="fa-solid fa-bars"></i></button>   
		</div>
		<div class="row">
			<div id="content-form" class="col-md-3">
				<form name="detalle-form" id="detalle-form">
        <div class="mb-3">
						<input required type="text" placeholder="Dispositivo o IP afectado" class="form-control" id="dispositivo" name="dispositivo" >
					</div>
          <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Cliente</span>
            <select required name="cliente" id="cliente" class="form-select" aria-label="Default select example">
              
             </select>  
          </div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Origen</span>
						<select required name="origen" id="origen" class="form-select" aria-label="Default select example">
							<option selected value="">Seleccione el origen del monitoreo</option>
							<option value="1">OpenManager</option>
							<option value="2">Evenlog</option>
							<option value="3">ADAudit</option>
							<option value="4">TM - Email security</option>
							<option value="5">TM - Apex central</option>
							<option value="6">TM - App secutity</option>
						</select>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Tecnologia </span>
						<select required name="tecnologia" id="tecnologia" class="form-select" aria-label="Default select example">
							<option selected value="">Seleccione la tecnologia</option>
							<option value="Virtualizacion">Virtualizacion</option>
							<option value="Firewall">Firewall</option>
							<option value="End-points">End-points</option>
							<option value="Respaldo">Respaldo</option>
							<option value="Redes">Redes</option>
							<option value="AD">AD</option>
						</select>
					</div>
					
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Categoria</span>
						<select required name="categoria" id="categoria" class="form-select" aria-label="Default select example">
							<option selected value="">Seleccione la Categoria</option>
							<option value="Seguridad">Seguridad</option>
							<option value="Rendimiento">Rendimiento</option>
							<option value="Monitoreo">Monitoreo</option>
							<option value="virus">Virus</option>
							<option value="Otro">Otro</option>
						</select>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Criticidad</span>
						<select name="criticidad"  class="form-select" aria-label="Default select example">
							<option value="BAJA">Baja</option>
							<option value="MEDIA">Media</option>
							<option value="ALTA">Alta</option>
						</select>
					</div>
					<div class="mb-3">
						<input required type="text" class="form-control" placeholder="Descripcion  (corta)" name="desc" id="desc">
					</div>
					<div class="mb-3">
						<div class="input-group">
							<textarea required placeholder="comentario" name="comentario" class="form-control" aria-label="With textarea"></textarea>
						</div>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Reportado</span>
						<select class="form-select" name="reportado" id="reportado" aria-label="Default select example">
							<option value="SI">SI</option>
							<option value="NO" selected>NO</option>
						</select>
					</div>
					<div class="mb-3">
						<input required type="text" class="form-control" placeholder="Razon" name="razon" id="razon">
					</div>
					<input type="submit" id="btn-detalle" class="btn btn-primary" value="Registrar">
					<button class="btn btn-secondary" id="btn-limpiar" >Limpiar</button> 
          
				</form>
			</div>
			<div id="content-table" class="col-md-9 ">
				<div class="table-responsive" >
					<table style="text-alight:center; width: 100%" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Borrar</th>
								<th scope="col">Hora</th>
								<th scope="col">Origen</th>
								<th scope="col">Tecnologia</th>
								<th scope="col">Categoria</th>	
								<th scope="col">Cliente</th>							
								<th scope="col">Criticidad</th>
								<th scope="col">Dispositivo</th>
								<th scope="col">Descripcion</th>
								<th scope="col">Comentario</th>
								<th scope="col">Reportado</th>
								<th scope="col">Razon</th>
							</tr>
						</thead>
						<tbody id="detalle-table">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url("/js/app.js")?>"></script>
<?php $this->endSection() ?>
