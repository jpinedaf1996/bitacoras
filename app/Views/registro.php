<?= $this->extend('template/layout') ?>

<?= $this->section('tittle') ?>
Registro
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="main-container">
<h2>Registro de bitacora - Usuario: <?php echo session("name")?></h2>
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
          <option Selected value="1">Primer turno</option>
          <option value="2">Segundo turno</option>
          <option value="3">Tercer turno</option>
          <option value="4">otro</option>
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
    <input type="submit" class="btn  btn-primary" id="btn-form-bit" value="Crear bitacora">
    </form> 
    <button style="margin-left:15px;" onClick="send()" class="btn btn-danger btn-sm"  >Finalizar bitacora </button>
      </div>
    </div>
  </div>
<br>
<div id="content-detalle" class="d-none">
  <div class="row">
  
  <div class="col-md-3">
  <form name="detalle-form" id="detalle-form">
    <div class="mb-3">
      <input required type="text" placeholder="Producto" class="form-control" id="producto" name="producto" >
    </div>
    <div class="mb-3">
      
      <input required type="text" class="form-control" placeholder="Tegnologia" name ="tegnologia" id="tegnologia">
    </div>
    <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Cliente</span>
          <select required name="cliente" id="cliente" class="form-select" aria-label="Default select example">
          <option value="1">DIANA</option>
          <option value="2">BCR</option>
          <option value="3">Intelector</option>
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
        <div class="input-group">
        <textarea required placeholder="comentario" name="comentario" class="form-control" aria-label="With textarea"></textarea>
      </div>
    </div>
    <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Restablecio</span>
          <select class="form-select" name="restablecio" aria-label="Default select example">
          <option value="SI" >SI</option>
          <option value="NO" selected>NO</option>
        </select>  
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
    <div class="col-md-9 ">
      <div class="w-100 table-responsive" >
    <table style="text-alight:center" class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Borrar</th>
          <th scope="col">Hora</th>
          <th scope="col">Producto</th>
          <th scope="col">Tegnologia</th>
          <th scope="col">Cliente</th>
          <th scope="col">Criticidad</th>
          <th scope="col">Comentario</th>
          <th scope="col">Restablecio</th>
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